<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 1){
  redirect($credetials[0],$credetials[1],$credetials[2]);

}else{
    require 'Operations.php';
    $response = "";
    if(isset($_POST['save_faq'])){
        
        if(isset($_POST['question']) && !empty($_POST['answer'])){
            
        $question       = $_POST['question'];
        $answer         = $_POST['answer'];
        
        if($db->InsertData("INSERT INTO `faq` (`id`, `question`, `answer`, `createdAt`) 
        VALUES (NULL, ?, ?, current_timestamp())",
        ["$question","$answer"])){
            header('Location: '.URLROOT.'admin/settings');
        }else{
            echo "<script>alert('Uzuza neza Ikibazo n'Igisubizo cyacyo neza')</script>";

        }
        
    }else{
        echo "<script>alert('Uzuza neza Ibisabwa Byose')</script>";
    }

        
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="dark-sidebar">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?php echo $user['names'];?> | Umuyobozi | Ibibazo bikunze kubazwa</title>
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
        $current_page = "Umwarimu Mushya";
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					
                    <div class="row">
						<div class="col-12 col-lg-12 mx-auto">
							<div class="card radius-15">
								<div class="card-body">
									<div class="card-title">
										<h4 class="mb-0">Ikibazo Gikunze kubazwa Gishya</h4>
									</div>
									<hr>
                                    <form action="<?php echo URLROOT;?>admin/faq/new" method="post" >
                                        <div class="form-body">
                                            <?php echo $response;?>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Ikibazo gikunze ubazwa</label>
                                                <div class="col-sm-12">
                                                    <textarea name="question" rows="5" placeholder="Andika Ikibazo gikunze kubazwa hano"  class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Igisubizo</label>
                                                <div class="col-sm-12">
                                                    <textarea name="answer" rows="5" placeholder="Andika Igisubizo Hano"  class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12">
                                                    <button type="submit" name="save_faq" class="btn btn-primary px-4">Emeza</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
									
								</div>
							</div>
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
	<!-- JavaScript -->
    <?php include_once '../JS.php';?>
    
</body>

</html>