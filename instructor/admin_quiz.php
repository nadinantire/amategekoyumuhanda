<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 2){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
	if(isset($_GET['course'])){
        $courseGUID = $_GET['course'];
        $course = $db->GetRow("SELECT * FROM `courses` WHERE `GUID` = ? ",["$courseGUID"]);
       
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
                <!--breadcrumb-->
					<div class=" align-items-center mb-3">
                        <div class="ml-auto">
                            
                            <div class="btn-group">	
                                
                                <a href="<?php echo URLROOT;?>instructor/courses/<?php echo $course['GUID'];?>/quiz/add" class="btn btn-info"><i class="fadeIn animated bx bx-book-add"></i> Kora Isuzuma Bumenyi Rishya</a>
                            </div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Urutonde rw'Amasuzuma bumenyi y'Isomo: <?php echo $course['title'];?></h4>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table">
									<thead class="thead-dark">
										<tr>
											<th scope="col">#</th>
											<th scope="col">Isuzuma bumenyi</th>
											<th scope="col">Ibibazo</th>
											<th scope="col">Amanota</th>
											<th scope="col">Igikorwa</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                        $quizez = $db->GetRows("SELECT * FROM quiz WHERE course = ? ",["$courseGUID"]);
                                        $flag = 0;
                                        foreach ($quizez as $quiz) {
                                            $flag++;
                                        ?>
                                        <tr>
											<th scope="row"><?php echo $flag;?></th>
											<td><?php echo $quiz['title'];?></td>
											<td><?php echo $quiz['totalQuestions'];?></td>
											<td><?php echo ($quiz['correctAnswerMarks'] * $quiz['totalQuestions']);?></td>
											<td><a href="<?php echo URLROOT;?>instructor/quiz/delete/<?php echo $quiz['id'];?>/" class="btn btn-sm btn-danger">Gusiba</a></td>
										</tr>
                                        <?php
                                         }
                                        ?>
									</tbody>
								</table>
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