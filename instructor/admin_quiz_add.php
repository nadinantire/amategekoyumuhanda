<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 2){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
    //check course
	if(isset($_GET['course'])){
        $courseGUID = $_GET['course'];
        $course = $db->GetRow("SELECT * FROM `courses` WHERE `GUID` = ? ",["$courseGUID"]);

        //save quiz

        if(isset($_POST['save_quiz']) && !empty($_POST['name']) && !empty($_POST['total']) && !empty($_POST['right'])){
            $quizName = $_POST['name'];
            $questionsTotal = $_POST['total'];
            $rightQuestionMark = $_POST['right'];
            $quizID = $function->GUIDv4();
            if($db->InsertData("INSERT INTO `quiz` (`id`, `course`, `title`, 
            `correctAnswerMarks`, 
            `wrongAnswerMarks`, 
            `totalQuestions`, `createdAt`, `updatedAt`) 
            VALUES (?, ?, ?, ?, '0', ?, current_timestamp(), current_timestamp())",
            ["$quizID","$courseGUID","$quizName","$rightQuestionMark","$questionsTotal"])){
                header("location: ".URLROOT."instructor/courses/quiz/".$quizID."/".$questionsTotal);
            }else{

            }
        }
    
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
	<title><?php echo $user['names'];?> | Umwarimu | Isuzuma Bumenyi</title>
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
        $current_page = "Isuzuma Bumenyi Kuri: ".$course['title'];
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
                <div class="row">
						<div class="col-6 col-lg-6 mx-auto">
							<div class="card radius-15">
								<div class="card-body">
									<div class="card-title">
										<h4 class="mb-0">Isuzuma Bumenyi Rishya</h4>
									</div>
									<hr>
                                    <form action="<?php echo URLROOT;?>instructor/courses/<?php echo $course['GUID'];?>/quiz/add" method="post">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Injiza umutwe w'Isuzuma Bumenyi</label>
                                                <div class="col-sm-12">
                                                    <input required name="name" id="name" value="" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Injiza umubare wibibazo byose</label>
                                                <div class="col-sm-12">
                                                    <input required name="total" id="total"  value="" type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Injiza amanota kugisubizo kizima</label>
                                                <div class="col-sm-12">
                                                    <input required name="right" id="right" value="" type="number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 text-center">
                                                    <button type="submit" name="save_quiz" class="btn btn-primary px-4">Emeza Isuzuma Bumenyi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
									
								</div>
							</div>
						</div>
					</div>
					<!--end row-->

				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
        <?php require_once '_partials/footer.php';?>
		
		<!-- end footer -->
	</div>
	<!--start switcher-->
	<!-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="custom-control custom-radio">
					<input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="darkmode">Dark Mode</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
					<label class="custom-control-label" for="lightmode">Light Mode</label>
				</div>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="DarkSidebar">
				<label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="ColorLessIcons">
				<label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
			</div>
		</div>
	</div> -->
	<!--end switcher-->
	<!-- JavaScript -->
    <?php include_once '../JS.php';?>
	
</body>

</html>