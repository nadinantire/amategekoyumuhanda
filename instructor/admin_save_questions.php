<?php require_once '../bootstrap.php';
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
$phone = $credetials[0];

$user = $db->GetRow("SELECT users.* FROM users
WHERE `users`.`phone` = ? ",["$phone"]);
$con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));

//record questions
if(isset($_GET['total']) && isset($_GET['quiz'])) {

        $n=@$_GET['total'];
        $quiz=@$_GET['quiz'];
        $courseID = $db->GetRow("SELECT * FROM `quiz` WHERE `id` = ? ",["$quiz"])['course'];
        
        for($i=1;$i<=$n;$i++){
            
            $qid=uniqid();
            $qns=$_POST['qns'.$i];
            $q3=mysqli_query($con,"INSERT INTO `questions` (`id`, `quiz`, `question`, `choiceNumber`, `questionNumber`, `createdAt`, `updatedAt`) 
            VALUES ('$qid', '$quiz', '$qns', '4', '$i', current_timestamp(), current_timestamp())");
            
            $oaid=uniqid();
            $obid=uniqid();
            $ocid=uniqid();
            $odid=uniqid();

            $a=$_POST[$i.'1'];
            $b=$_POST[$i.'2'];
            $c=$_POST[$i.'3'];
            $d=$_POST[$i.'4'];
            $qa=mysqli_query($con,"INSERT INTO options VALUES  ('$oaid','$qid','$a')") or die('Error61');
            $qb=mysqli_query($con,"INSERT INTO options VALUES  ('$obid','$qid','$b')") or die('Error62');
            $qc=mysqli_query($con,"INSERT INTO options VALUES  ('$ocid','$qid','$c')") or die('Error63');
            $qd=mysqli_query($con,"INSERT INTO options VALUES  ('$odid','$qid','$d')") or die('Error64');
            $e=$_POST['ans'.$i];
            switch($e)
            {
                case 'a': $ansid=$oaid; break;
                case 'b': $ansid=$obid; break;
                case 'c': $ansid=$ocid; break;
                case 'd': $ansid=$odid; break;
                default: $ansid=$oaid;
            }
            $qans=mysqli_query($con,"INSERT INTO answers VALUES  ('$qid','$ansid')");
        }
        header("location: ".URLROOT."instructor/courses/".$courseID."/quiz");
}

if(isset($_GET['quizID'])){

    $quizID = $_GET['quizID'];
    $courseID = $db->GetRow("SELECT * FROM `quiz` WHERE `id` = ? ",["$quizID"])['course'];
    
    $result = mysqli_query($con,"SELECT * FROM questions WHERE quiz='$quizID' ") or die('Error1');
    while($row = mysqli_fetch_array($result)) {
        $qid = $row['id'];
        $r1 = mysqli_query($con,"DELETE FROM options WHERE question='$qid'") or die('Error2');
        $r2 = mysqli_query($con,"DELETE FROM answers WHERE questionID='$qid' ") or die('Error3');
    }
    $r3 = mysqli_query($con,"DELETE FROM questions WHERE quiz='$quizID' ") or die('Error4');
    $r4 = mysqli_query($con,"DELETE FROM quiz WHERE id='$quizID' ") or die('Error5');
    $r4 = mysqli_query($con,"DELETE FROM marks WHERE quiz='$quizID' ") or die('Error6');
    header("location: ".URLROOT."instructor/courses/".$courseID."/quiz");
}
