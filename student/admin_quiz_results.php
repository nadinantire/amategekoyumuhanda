<?php require_once '../bootstrap.php';
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 3){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';

    if(!empty($_GET['quiz'])){
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
	<title><?php echo $user['names'];?> | Umunyeshuri | Igisubizo ku Isuzuma Bumenyi</title>
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
        $current_page = "Amanota ku Isuzuma Bumenyi";
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
				<div class="card col-md-7 col-lg-7 mx-auto">
						<div class="card-body ">
							<?php
                            $con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));
                            $studentID = $user['id'];
                            $studentName = $user['names'];
                            $eid=$quizGUID;
                            $q= mysqli_query($con,"SELECT * FROM marks WHERE quiz='$eid' AND student='$studentID' " )or die('Error157');
                            echo  '<div class="panel">
                            <center>
                                <u>
                                    <h1 class="title" style="color:green">'.$studentName .'</h1>
                                </u>
                            <center>
                            <br />
                            <center>
                            <h4 class="title" style="color:black;">AMANOTA KU ISUZUMA BUMENYI:  '.$quiz['title'].'</h4>
                            <center>
                            
                            <br />
                            <table class="table table-striped title1" style="font-size:20px;">';
    
                            while($row=mysqli_fetch_array($q))
                            {
                                $s=$row['score'];
                                $w=$row['wrongAnswer'];
                                $r=$row['correctAnswer'];
                                $qa=$row['level'];
                                
                                echo '<tr ><td class="text-primary">Ibibazo Byose</td><td class="text-dark">'.$qa.'</td></tr>
                                    <tr ><td class="text-success">Ibibazo Wakoze&nbsp;<span class="bx bx-check" aria-hidden="true"></span></td><td class="text-success">'.$r.'</td></tr> 
                                    <tr ><td class="text-danger">Ibibazo Wishe&nbsp;<span class="bx bx-block" aria-hidden="true"></span></td><td class="text-danger">'.$w.'</td></tr>
                                    <tr style="font-weight:1000;" class="bg-dark"><td class="text-white">Amanota&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td class="text-white">'.$s.'</td></tr>';
                            }
                            
                            echo '</table>
                            <a href="'.URLROOT.'student" class="btn btn-lg btn-primary">Subira Ahabanza</a>
                            <a href="'.URLROOT.'student/correct/'.$quizGUID.'" class="btn btn-lg btn-success">Reba Uko Bisubizwa</a>
                            </div>';
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