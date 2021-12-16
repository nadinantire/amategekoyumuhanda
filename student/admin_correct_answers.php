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
	<title><?php echo $user['names'];?> | Umunyeshuri | Ibisubizo Binoze ku Isuzuma Bumenyi</title>
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
        $current_page = "Ibisubizo Binoze ku Isuzuma Bumenyi: ".$quiz['title'];
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
				<div class="card col-md-9 col-lg-9 mx-auto">
                        <?php
                        $questions = $db->GetRows("SELECT questions.*,options.description FROM questions
                        INNER JOIN answers ON questions.id = answers.questionID 
                        INNER JOIN options ON answers.optionID = options.id
                         WHERE quiz =? ",["$quizGUID"]);
                        $flag = 0;
                        foreach ($questions as $question) {
                            
                            $flag++;
                        ?>
						<div class="card-body bg-light m-2 border">
                            <div class="card-title">
                                <h4 class="mb-0"><?php echo $flag.'. '.$question['question'];?></h4>
                            </div>
                            <hr>
                            <ul>
                                <li class="text-success text-bold"><?php echo $question['description'];?></li>
                            </ul>
						</div>
                        <?php
                        }
                        ?>
                        <a href="<?php echo URLROOT;?>student" class="btn btn-lg btn-primary m-2">Subira Ahabanza</a>
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