<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 1){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
    $response = "";

    if(isset($_POST['update_company'])){

        $name           = $_POST['name'];
        $telephone1     = $_POST['telephone1'];
        $telephon2      = $_POST['telephon2'];
        $email1         = $_POST['email1'];
        $email2         = $_POST['email2'];
        $address        = $_POST['address'];
        $summary        = $_POST['summary'];
        $about          = $_POST['about'];
        $video          = $_POST['video'];
        $twitter        = $_POST['twitter'];
        $facebook       = $_POST['facebook'];
        $youtube        = $_POST['youtube'];
        $instagram      = $_POST['instagram'];

        if($db->UpdateData("UPDATE `company` SET `name` = ?,
         `telephone1` = ?,
         `telephone2` = ?,
         `email1` = ?,
         `email2` = ?,
         `address` = ?,
         `summary` = ?,
         `about` = ?,
         `video` = ?,
         `twitter` = ?,
         `facebook` = ?,
         `youtube` = ?,
         `instagram` = ?
        ",["$name"
        ,"$telephone1"
        ,"$telephon2"
        ,"$email1"
        ,"$email2"
        ,"$address"
        ,"$summary"
        ,"$about"
        ,"$video"
        ,"$twitter"
        ,"$facebook"
        ,"$youtube"
        ,"$instagram"])){
            header("Location: ".URLROOT."admin/settings");
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
	<title><?php echo $user['names'];?> | Umuyobozi | Ahabanza</title>
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
        $current_page = "Ahabanza";
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
				<!--row-->
				<div class="row">
					<div class="col-12 col-lg-6">
						<table class="table table-striped">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>

                                <tr><td>Amazina</td>
                                    <td><?php echo $company['name'];?></td>
                                </tr>
                                

                                <tr><td>Terefoni 1</td>
                                    <td><?php echo $company['telephone1'];?></td>
                                </tr>
                                

                                <tr><td>Terefoni 2</td>
                                    <td><?php echo $company['telephone2'];?></td>
                                </tr>
                                

                                <tr><td>Imeri 1</td>
                                    <td><?php echo $company['email1'];?></td>
                                </tr>
                                

                                <tr><td>Imeri 2</td>
                                    <td><?php echo $company['email2'];?></td>
                                </tr>
                                

                                <tr><td>Aderesi</td>
                                    <td><?php echo $company['address'];?></td>
                                </tr>
                                
                                

                                <tr><td>Incamake</td>
                                    <td><?php echo $company['summary'];?></td>
                                </tr>
                    

                                <tr><td>Ibyerekeye Kompanyi</td>
                                    <td><?php echo $company['about'];?></td>
                                </tr>
                                

                                <tr><td>Amashusho</td>
                                    <td><?php echo $company['video'];?></td>
                                </tr>
                                

                                <tr><td>Twitter</td>
                                    <td><?php echo $company['twitter'];?></td>
                                </tr>
                                

                                <tr><td>Facebook</td>
                                    <td><?php echo $company['facebook'];?></td>
                                </tr>
                                

                                <tr><td>Youtube</td>
                                    <td><?php echo $company['youtube'];?></td>
                                </tr>
                                

                                <tr><td>Instagram</td>
                                    <td><?php echo $company['instagram'];?></td>
                                </tr>
                                

                            </tbody>
                        </table>
					</div>
					<div class="col-12 col-lg-6">
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 class="mb-0">Hindura Ibiranga Kompanyi</h4>
                                </div>
                                <hr>
                                <form action="<?php echo URLROOT;?>admin/settings" method="post" >
                                    <div class="form-body">
                                        <?php echo $response;?>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Amazina</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="name" placeholder="Andika Amazina hano"  value="<?php echo $company['name']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Terefoni 1</label>
                                            <div class="col-sm-12">
                                                <input type="tel" name="telephone1" placeholder="Andika Terefoni 1 hano"  value="<?php echo $company['telephone1']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Terefoni 2</label>
                                            <div class="col-sm-12">
                                                <input type="tel" name="telephon2" placeholder="Andika Terefoni 2 hano"  value="<?php echo $company['telephone2']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Imeri 1</label>
                                            <div class="col-sm-12">
                                                <input type="email" name="email1" placeholder="Andika Imeri 1 hano"  value="<?php echo $company['email1']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Imeri 2</label>
                                            <div class="col-sm-12">
                                                <input type="email" name="email2" placeholder="Andika Imeri 2 hano"  value="<?php echo $company['email1']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Aderesi</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="address" placeholder="Andika Aderesi hano"  value="<?php echo $company['address']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Incamake</label>
                                            <div class="col-sm-12">
                                                <textarea name="summary" placeholder="Andika Incamake hano"  class="form-control"><?php echo $company['summary']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Ibyerekeye Kompanyi</label>
                                            <div class="col-sm-12">
                                                <textarea name="about" placeholder="Andika Ibyerekeye Kompanyi Hano" rows="6"  class="form-control"><?php echo $company['about']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Videwo</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="video" placeholder="Shyiramo Code za videwo"  value="<?php echo $company['video']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Twitter</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="twitter" placeholder="Andika Twitter hano"  value="<?php echo $company['twitter']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Facebook</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="facebook" placeholder="Andika Facebook hano"  value="<?php echo $company['facebook']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Youtube</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="youtube" placeholder="Andika Youtube hano"  value="<?php echo $company['youtube']; ?>"  class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label" style="font-weight:bold;">Instagram</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="instagram" placeholder="Andika Instagram hano"  value="<?php echo $company['instagram']; ?>"  class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" name="update_company" class="btn btn-primary px-4">Emeza Guhindura Ibiranga company</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                
                            </div>
                        </div>
					</div>
				</div>
				<!--end row-->
					
					<div class="col-10 col-lg-10 col-sm-12 mx-auto">
                    <!--breadcrumb-->
					<div class=" align-items-center mb-3">
                        <div class="ml-auto">
                            
                            <div class="btn-group">	
                                
                                <a href="<?php echo URLROOT;?>admin/faq/new"class="btn btn-info"><i class="fadeIn animated bx bx-user"></i> Andika Ikibazo gikunzwe kubazwa</a>
                            </div>
						</div>
					</div>
					<!--end breadcrumb-->
                    <div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Ibibazo bikunze kubazwa</h4>
							</div>
							<div class="">
								<table class="table table-striped ">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Ikibazo</th>
											<th scope="col">Igisubizo</th>
											<th scope="col">Igikorwa</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$faqs = $db->GetRows("SELECT * FROM faq");
										$flag = 0;
										foreach ($faqs as $faq ) {
											$flag++;
											?>
										<tr>
											<th scope="row"><?php echo $flag;?></th>
											<td><p><?php echo $faq['question']?><p></td>
											<td><p><?php echo $faq['answer']?></p></td>
											<td> <a href="<?php echo URLROOT;?>admin/faq/delete/<?php echo $faq['id'];?>" class="btn btn-sm btn-danger">Siba</a></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
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
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
        <?php require_once '_partials/footer.php';?>
		
		<!-- end footer -->
	</div>

	<!-- JavaScript -->
    <?php include_once '../JS.php';?>
	
</body>

</html>