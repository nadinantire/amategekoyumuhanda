<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 1){
  redirect($credetials[0],$credetials[1],$credetials[2]);

}else{
    require 'Operations.php';
    $response = "";
    if(isset($_GET['instructor'])){
        $instructorGUID = $_GET['instructor'];
        $instructor  = $db->GetRow("SELECT * FROM users where GUID  =? AND role = 2",["$instructorGUID"]);
        if(!$instructor){
            exit();
        }
    }else{
        exit();
    }
    if(isset($_POST['update_instructor'])){
        
        if(isset($_POST['names']) && !empty($_POST['names']) && !empty($_POST['phone'])){
        $names  = $_POST['names'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        if($password  == $confirmPassword && !empty($password)){
            
            $hashPass = hash("sha256",$password);
            if(!$db->Check("SELECT * FROM users WHERE phone = ? AND GUID != ?",["$phone","$instructorGUID"])){
                if($db->UpdateData("UPDATE `users` set `names` = ? , `phone` = ?, 
                `password` = ? , `updatedAt` = current_timestamp() WHERE GUID = ? AND role = 2",
                ["$names","$phone","$hashPass","$instructorGUID"])){
                    header('Location: '.URLROOT.'admin/');
                }
            }else{
                echo "<script>alert('Iyi nimero isanzwe muri sisiteme!, Gerageza Indi nimero.')</script>";
            }

        }else if($password  == $confirmPassword && empty($password)){
            if(!$db->Check("SELECT * FROM users WHERE phone = ? AND GUID != ?",["$phone","$instructorGUID"])){
                if($db->UpdateData("UPDATE `users` set `names` = ? , `phone` = ?, 
                 `updatedAt` = current_timestamp() WHERE GUID = ? AND role = 2",
                ["$names","$phone","$instructorGUID"])){
                    header('Location: '.URLROOT.'admin/');
                }
            }else{
                echo "<script>alert('Iyi nimero isanzwe muri sisiteme!, Gerageza Indi nimero.')</script>";
            }
        }else {
            echo "<script>alert('Ijambo banga ntabwo rihuye!, Gerageza nanone.')</script>";
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
	<title><?php echo $user['names'];?> | Umuyobozi | Amasomo</title>
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
										<h4 class="mb-0">Umwarimu Mushya</h4>
									</div>
									<hr>
                                    <form action="<?php echo URLROOT;?>admin/instructor/edit/<?php echo $instructorGUID;?>" method="post" >
                                        <div class="form-body">
                                            <?php echo $response;?>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Amazina</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="names" placeholder="Andika Amazina hano" required value="<?php echo $instructor['names']; ?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Terefoni</label>
                                                <div class="col-sm-12">
                                                    <input type="tel" name="phone" placeholder="Andika Terefoni hano" required value="<?php echo $instructor['phone']; ?>"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Ijambobanga</label>
                                                <div class="col-sm-12">
                                                    <input type="password" name="password" placeholder="Andika Ijambobanga hano"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label" style="font-weight:bold;">Subiramo Ijambobanga</label>
                                                <div class="col-sm-12">
                                                    <input type="password" name="confirmPassword" placeholder="Andika Ijambobanga hano"  class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12">
                                                    <button type="submit" name="update_instructor" class="btn btn-primary px-4">Emeza Guhindura Umwarimu</button>
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