<?php require_once '../bootstrap.php';
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 3){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';

    if(!empty($_GET['quiz']) &&  !empty(@$_GET['n']) &&  !empty(@$_GET['total'])){
        $quizGUID = $_GET['quiz'];
        $quiz = $db->GetRow("SELECT * FROM `quiz` WHERE `id` = ? ",["$quizGUID"]);
        
    }else{
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="dark-sidebar">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?php echo $user['names'];?> | Umunyeshuri | Isuzuma Bumenyi</title>
    <?php include_once '../CSS.php';?>
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<?php require_once '_partials/sidebar.php';?>
		<!--end sidebar-wrapper-->
		
		<!--header-->
        <?php
        $current_page = "Isuzuma Bumenyi";
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
				<div class="card col-md-7 col-lg-7 mx-auto">
						<div class="card-header">Isuzuma bumenyi Kuri: <?php echo $quiz['title'];?></div>
						<div class="card-body ">
							<?php
                            $con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));

                                $eid=@$_GET['quiz'];
                                $index=@$_GET['n'];
                                $total=@$_GET['total'];
                                $q=mysqli_query($con,"SELECT * FROM questions WHERE quiz='$eid' AND questionNumber='$index' " );
                                echo '<div class="panel" style="margin:0%">';
                                while($row=mysqli_fetch_array($q) )
                                {
                                    $qns=$row['question'];
                                    $qid=$row['id'];
                                    echo '<b>Ikibazo Cya &nbsp;'.$index.'&nbsp;::<br /><br /><h3>'.$qns.'</h3></b><br /><br />';
                                }
                                $q=mysqli_query($con,"SELECT * FROM options WHERE question='$qid' " );
                                echo '<form action="'.URLROOT.'student/save/'.$eid.'/'.$index.'/'.$total.'/'.$qid.'" method="POST"  class="form-horizontal">
                                <br />';

                                while($row=mysqli_fetch_array($q) )
                                {
                                    $option=$row['description'];
                                    $optionid=$row['id'];
                                    echo'<input type="radio" name="answer" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
                                }
                                echo'<br /><button type="submit" class="btn btn-primary"><span class="bx bx-check" aria-hidden="true"></span>&nbsp;Emeza Igisubizo</button></form></div>';
                            ?>
						</div>
					</div>

				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> 
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
        <?php require_once '_partials/footer.php';?>
		
		<!-- end footer -->
	</div>
	<!--end switcher-->
	<!-- JavaScript -->
    <?php include_once '../JS.php';?>
	

</body>

</html>