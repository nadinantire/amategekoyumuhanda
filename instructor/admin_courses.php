<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 2){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
    $instructor = $user['GUID'];
	
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
    <style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
    </style>
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
					<!--breadcrumb-->
					<div class=" align-items-center mb-3">
                        <div class="ml-auto">
                            
                            <div class="btn-group">	
                                
                                <a href="<?php echo URLROOT;?>instructor/courses/new"class="btn btn-info"><i class="fadeIn animated bx bx-book-add"></i> Kora Isomo Rishya</a>
                            </div>
						</div>
					</div>
					<!--end breadcrumb-->
                    <div class="row">
                    <?php
                    $courses = $db->GetRows("SELECT * FROM `courses` WHERE `instructor` = ? ",["$instructor"]);
                    foreach ($courses as $course) {
                        ?>
                            <div class="col-sm-12 col-md-4 col-4 col-lg-4">
                            
                                <div class="card" >
                                    <!-- <img class="card-img-top" src="<?php //echo URLROOT;?>assets/images/posters/<?php //echo $course['image'];?>" alt="Card image cap"> -->
                                    <div class="card-body">
                                        <h5 class="card-title " style="font-weight:bold;"><?php echo $course['title'];?></h5>
                                        <p class="card-text"><?php echo $course['summary'];?></p>
                                        <a href="<?php echo URLROOT;?>instructor/courses/<?php echo $course['GUID'];?>/edit/" class="btn btn-primary">Hindura Isomo</a>
                                        <a href="<?php echo URLROOT;?>instructor/courses/<?php echo $course['GUID'];?>/quiz" class="btn btn-warning">Isuzuma Bumenyi</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                        
                    </div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
        <!-- Modal -->
        <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card radius-0 border-lg-top-success" stye="margin-bottom: 0px !important;">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user mr-1 font-24 text-success"></i>
                                </div>
                                <h4 class="mb-0 text-success">Isomo Rishya</h4>
                            </div>
                            <hr>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><i class="bx bx-user"></i></span>
                                        </div>
                                        <input type="text" id="names"class="form-control border-left-0" placeholder="Full name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>National ID(NID)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><i class="bx bx-fingerprint"></i></span>
                                        </div>
                                        <input type="number" id="nid"class="form-control border-left-0" placeholder="National Identificaion">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Choose Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><i class="bx bx-card"></i></span>
                                        </div>
                                        <select class="form-control border-left-0" id="ubudehe">
                                            <option value="">Select Level</option>
                                            <?php
                                            foreach($ubudehe as $level){
                                                
                                                ?>
                                                <option value="<?php echo $level['price'];?>"><?php echo $level['price'];?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone 1 No.</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><i class="bx bx-phone-call"></i></span>
                                            </div>
                                            <input type="text" id="phone1" class="form-control border-left-0" placeholder="Phone 1">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone 2 No.</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><i class="bx bx-phone-call"></i></span>
                                            </div>
                                            <input type="text" id="phone2" class="form-control border-left-0" placeholder="Phone 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox center text-center">
                                        <button type="button" id="household_save" class="btn btn-info px-5"><i class="fadeIn animated bx bx-check"></i> Save Changes</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fadeIn animated bx bx-window-close"></i> Close</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal -->
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