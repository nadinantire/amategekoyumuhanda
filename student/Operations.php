<?php require_once '../bootstrap.php';
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
$phone = $credetials[0];

$user = $db->GetRow("SELECT users.* FROM users
WHERE `users`.`phone` = ? ",["$phone"]);
$studentID = $user['id'];
$conn= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));

//record user answer
if(isset($_GET['quiz']) &&
 !empty($_GET['quiz']) &&
  isset($_GET['total']) &&
   !empty($_GET['total'])
   &&
  isset($_POST['answer']) &&
   !empty($_POST['answer'])
   &&
  isset($_GET['questionID']) &&
   !empty($_GET['questionID'])
   &&
   isset($_GET['n']) &&
   !empty($_GET['n'])) {
    $con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));

    $eid=@$_GET['quiz'];
    $index=@$_GET['n'];
    $total=@$_GET['total'];
    $ans=$_POST['answer'];
    $qid=@$_GET['questionID'];
    $q=mysqli_query($con,"SELECT * FROM answers WHERE questionID='$qid' " );
    
    while($row=mysqli_fetch_array($q) )
    {  $ansid=$row['optionID'];

    }
    //check if answer is correct
    if($ans == $ansid)
    {
        //if answer is correct then
      $q=mysqli_query($con,"SELECT * FROM quiz WHERE id='$eid' " );
      while($row=mysqli_fetch_array($q) ){
        $correctAnswerMarks=$row['correctAnswerMarks'];
      }
      if($index == 1){
        $q=mysqli_query($con,"INSERT INTO marks VALUES(NULL,'$studentID','$eid' ,'0','0','0','0',current_timestamp(),current_timestamp())")or die('Error1');
      }
      $q=mysqli_query($con,"SELECT * FROM marks WHERE quiz='$eid' AND student='$studentID' ")or die('Error48');
      while($row=mysqli_fetch_array($q) ){
        //get scores and correct answer count
        $s=$row['score'];
        $r=$row['correctAnswer'];
      }
      $r++; //correct answer plus one
      $s=$s+$correctAnswerMarks; //add marks to score
      $q=mysqli_query($con,"UPDATE `marks` SET `score`=$s,`level`=$index,`correctAnswer`=$r, updatedAt= current_timestamp()  WHERE  student = '$studentID' AND quiz = '$eid'")or die('Error57');
    
    }else{


        if($index == 1){
            $q=mysqli_query($con,"INSERT INTO marks VALUES(NULL,'$studentID','$eid' ,'0','0','0','0',current_timestamp(),current_timestamp())")or die('Error1');
        }

        $q=mysqli_query($con,"SELECT * FROM marks WHERE quiz='$eid' AND student='$studentID' ")or die('Error48');
        while($row=mysqli_fetch_array($q) ){
            //get scores and wrong answer count
            $s=$row['score'];
            $w=$row['wrongAnswer'];
        }

        $w++;
        $q=mysqli_query($con,"UPDATE `marks` SET `level`=$index,`wrongAnswer`=$w, updatedAt=current_timestamp() WHERE  student = '$studentID' AND quiz = '$eid'")or die('Error80');
        
    }

    if($index != $total){
        
        $index++;

        header('location:'.URLROOT.'student/quiz/'.$eid.'/'.$index.'/'.$total)or die('Error85');
        
    }else{
        header('location:'.URLROOT.'student/results/'.$eid);
    }
  }else if(isset($_GET['quiz']) &&
  !empty($_GET['quiz']) &&
   isset($_GET['total']) &&
    !empty($_GET['total'])
    &&
    isset($_GET['n']) &&
    !empty($_GET['n']) &&
    isset($_GET['q']) && $_GET['q'] == 'retake'){
        $con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));

        $eid=@$_GET['quiz'];
        $n=@$_GET['n'];
        $t=@$_GET['total'];
        $q=mysqli_query($con,"SELECT score FROM marks WHERE quiz='$eid' AND student='$email'" )or die('Error156');
        while($row=mysqli_fetch_array($q) )
        {
          $s=$row['score'];
        }
        $q=mysqli_query($con,"DELETE FROM `marks` WHERE quiz='$eid' AND student='$studentID' " )or die('Error184');

        header('location: '.URLROOT.'student/quiz/'.$eid.'/1/'.$t);
  }
  if(isset($_POST["action"]) && $_POST["action"] == "pay"){
    if(!empty($_POST['phone']) && !empty($_POST['amount']) && !empty($_POST['package'])){
        pay($_POST['phone'],$_POST['amount'],$_POST['package']);
    }else{
        echo "error";
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "checkPaymentStatus"){
    if(!empty($_POST['id'])){
        checkPaymentStatus($_POST['id']);
    }else{
        echo "error";
    }
}
function checkPaymentStatus($transactionId){
    global $db;
    $status = $db->GetRow("SELECT * FROM payments WHERE walletTransactionID = ? ",["$transactionId"]);
    $global_response["status"] = $status['transactionStatus'];
    $global_response["message"] = $status['statusMessage'];
    $json = json_encode($global_response);
    echo $json;
}
function pay($phone, $amount,$package){
    global $db,$conn,$function,$user;
    
    $student = $user;
    $guid = $function->GUIDv4();
    $package = $db->GetRow("SELECT * FROM packages WHERE id = 1");
    
    //expire date 
    //expiry date
    $date = new DateTime();
    //$date->modify("+1 ".$package['period']);
    
    $date->modify("+1 Hour");
    $expiry_time = $date->format('Y-m-d H:i:s') . "\n";
    //payment coodes
    $start=mt_rand();
    $transactionId = uniqid(srand($start), true);
    $organizationId="f60681b7-f09e-47fd-9a6c-7d1b1b758b09";
    $callbackUrl="https://www.amategekoyumuhanda.rw/callback.php";
    $description_title="Murakoze ".$student['names'].", Ifatabuguzi: ".$package["amount"] . " ".$package["currency"] . " Rizarangira ".$expiry_time;
    $description=$description_title;
    // $amount =  $amount;
    $amount =  100;
    $Student_id =  $student['id'];
    
    $telephoneNumber="25" . $phone;
    //added codes 
    
    $data_array =  array(
            "amount"               => $amount,
            "telephoneNumber"      => $telephoneNumber,
            "transactionId"       => $transactionId,
            "organizationId"      => $organizationId,
            "description"         => $description,
            "callbackUrl"          => $callbackUrl,
    
            
    );
    
    //save info
    $query="INSERT INTO `payments` (`id`,GUID,`student`,`transactionID`, `description`, `telephone`, `paidAmount`,`transactionStatus`,`expiryDate`, `createAt`, `updatedAt`) 
    VALUES (NULL, '$guid','$Student_id', '$transactionId', '$description', '$telephoneNumber', '$amount', 'INITIAL','$expiry_time', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    $result=$conn->query($query) or trigger_error($conn->error);
    
    $make_call = callAPI('POST', 'https://opay-api.oltranz.com/opay/paymentrequest', json_encode($data_array));

    $response = json_decode($make_call);
    //update info
    $response_description =  $response->description;
    $response_code = $response->code;
    $response_status =   $response->status;
    $response_transacton_id =  $response->body->transactionId;
    $query2="UPDATE payments SET statusMessage = '$response_description', transactionID = '$response_transacton_id', walletTransactionID = '$response_transacton_id', transactionStatus = '$response_status', transactionStatusCode = '$response_code' WHERE transactionID = '$transactionId'";
    $result2=$conn->query($query2) or trigger_error($conn->error);
    
    $global_response["status"] = $response_status;
    $global_response["transacton_id"] = $response_transacton_id;
    $json = json_encode($global_response);
    echo $json;
}

//added function
function callAPI($method, $url, $data){
  $curl = curl_init();
  switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                              
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
  }
  // OPTIONS:
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'POST /opay/paymentrequest HTTP/1.1',
          'Content-Type: application/json',
          'Accept: application/json',
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  // EXECUTE:
  $result = curl_exec($curl);
  if(!$result){die("Imirongo ya murandasi ntiri gukora, Mugerageze Mukanya");}
  curl_close($curl);
  return $result;
}