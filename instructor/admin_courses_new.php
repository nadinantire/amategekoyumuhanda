<?php require_once '../bootstrap.php';
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 2){
  redirect($credetials[0],$credetials[1],$credetials[2]);

}else{
    require 'Operations.php';
    $response = "";
    if(isset($_POST['save_course']) && !empty($_POST['title'])){
        
        if(!empty($_POST['summary'])  && !empty($_POST['topics'])  && !empty($_POST['description'])){
            
            $guid           = $function->GUIDv4();
                        $instructor     = $user['GUID'];
                        $title          = $_POST['title'];
                        $summary        = $_POST['summary'];
                        $topics         = $_POST['topics'];
                        $description    = $_POST['description'];

                        if($db->InsertData("INSERT INTO `courses` (`id`, `GUID`, `instructor`, `title`, `summary`, `topics`, `description`,`image`, `createdAt`, `updatedAt`) 
                        VALUES (NULL, ?, ?, ?,?, ?, ?, ?,
                         current_timestamp(), current_timestamp())",
                         ["$guid","$instructor","$title","$summary","$topics","$description",""])){
                            
                            $response ='<div class="alert bg-success text-white alert-dismissible fade show" role="alert">Isomo Ryashyizwe Muri sisiteme.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
                                            </button>
                                        </div>';
                            header('Location: ' . URLROOT . 'instructor/courses');

                        }else{

                            $response ='<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Mwibagiwe Ifoto
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
                                            </button>
                                        </div>';
                        }
            
        }else{
            $response ='<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">Shyiramo ingingo ndetse n\'isomo neza
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">×</span>
                                </button>
                            </div>';
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
	<title><?php echo $user['names'];?> | Umwarimu | Amasomo</title>
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
        $current_page = "Amasomo";
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
										<h4 class="mb-0">Isomo Rishya</h4>
									</div>
									<hr>
                                    <form action="<?php echo URLROOT;?>instructor/courses/new" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <?php echo $response;?>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Umutwe</label>
                                                <div class="col-sm-12">
                                                    <input required name="title" value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Incamake</label>
                                                <div class="col-sm-12">
                                                    <textarea required  name="summary" class="form-control"><?php if(isset($_POST['summary'])){echo $_POST['summary'];} ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Ingingo Zikubiye mw'Isomo</label>
                                                <div class="col-sm-12">
                                                    <textarea  id="elm1" name="topics" class="form-control"><?php if(isset($_POST['topics'])){echo $_POST['topics'];} ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Isomo Rirambuye</label>
                                                <div class="col-sm-12">
                                                    <textarea  id="elm2" name="description" class="form-control"><?php if(isset($_POST['description'])){echo $_POST['description'];} ?></textarea>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12">
                                                    <button type="submit" name="save_course" class="btn btn-primary px-4">Emeza Isomo</button>
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
    <script src="<?php echo URLROOT;?>assets/plugins/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
		  	selector: '#elm1',
			height:200,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
			init_instance_callback : function(editor) {
				var freeTiny1 = document.querySelector('.tox-notifications-container');
                    freeTiny1.style.display = 'none';
                },
			branding: false
		});
        tinymce.init({
		  	selector: '#elm2',
			height:700,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"save table contextmenu directionality emoticons template paste textcolor"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
			init_instance_callback : function(editor) {
				var freeTiny2 = document.querySelector('.tox .tox-notification--in');
                    freeTiny2.style.display = 'none';
                },
			branding: false
		});

        $('#elm2').keyup(function(){
            console.log("Here");
            document.querySelector('.tox .tox-notification--in').style.display = 'none';
            
        });
    </script>
</body>

</html>