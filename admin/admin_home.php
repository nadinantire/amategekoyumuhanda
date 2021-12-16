<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 1){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
	$students = $db->GetRow("SELECT COUNT(*) as total FROM users
	where users.role = 3");
	if(empty($students['total'])){
		$students['total'] = 0;
	}

	$teachers = $db->GetRow("SELECT COUNT(*) as total FROM users
	where users.role = 2");
	if(empty($teachers['total'])){
		$teachers['total'] = 0;
	}

	$courses = $db->GetRow("SELECT COUNT(*) as total FROM courses");
	if(empty($courses['total'])){
		$courses['total'] = 0;
	}


	$pendingStudent = $db->GetRow("SELECT COUNT(*) as total FROM users");
	if(empty($pendingStudent['total'])){
		$pendingStudent['total'] = 0;
	}

	$paidStudent = $db->GetRow("SELECT COUNT(*) as total FROM users 
	INNER JOIN payments ON users.id = payments.student
	 WHERE payments.transactionStatus = 'SUCCESS' GROUP BY users.names");
	if(empty($paidStudent['total'])){
		$paidStudent['total'] = 0;
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
					<div class="col-12 col-lg-3">
						<div class="card radius-15 bg-wall">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0 text-white"><?php echo $function->bd_nice_number($teachers['total']);?> <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h6>
									</div>
									<div class="ml-auto font-35 text-white"><i class="bx bx-group"></i>
									</div>
								</div>
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white " style="font-weight:bold;">Abarimu Bose</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="card radius-15 bg-danger">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0 text-white"><?php echo $function->bd_nice_number(empty($students['total']) ? 0 : $students['total']);?> <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h6>
									</div>
									<div class="ml-auto font-35 text-white"><i class="bx bx-group"></i>
									</div>
								</div>
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white " style="font-weight:bold;">Abanyeshuri bose</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="card radius-15 bg-primary">
							<div class="card-body">
								<div class="d-flex align-items-cenAter">
									<div>
										<h5 class="mb-0 text-white"><?php echo $function->bd_nice_number($courses['total']);?> <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h5>
									</div>
									<div class="ml-auto font-35 text-white"><i class="bx bx-group"></i>
									</div>
								</div>
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white " style="font-weight:bold;">Amasomo yose</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="card radius-15 bg-success" >
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h4 class="mb-0 text-white"><?php echo $function->bd_nice_number($paidStudent['total']);?> <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h4>
									</div>
									<div class="ml-auto font-35 text-white"><i class="bx bx-group"></i>
									</div>
								</div>
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white " style="font-weight:bold;">Abanyeshuri Bishyuye</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="card radius-15 bg-warning" >
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h4 class="mb-0 "><?php echo $function->bd_nice_number($pendingStudent['total']);?> <i class='bx bxs-up-arrow-alt font-14'></i> </h4>
									</div>
									<div class="ml-auto font-35 "><i class="bx bx-group"></i>
									</div>
								</div>
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 " style="font-weight:bold;">Abanyeshuri Batarishyura</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
					<!--breadcrumb-->
					<div class=" align-items-center mb-3">
                        <div class="ml-auto">
                            
                            <div class="btn-group">	
                                
                                <a href="<?php echo URLROOT;?>admin/instructors/new"class="btn btn-info"><i class="fadeIn animated bx bx-user"></i> Andika Umwarimu Mushya</a>
                            </div>
						</div>
					</div>
					<!--end breadcrumb-->
					
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Abarimu Bose</h4>
							</div>
							<div class="table-responsive">
								<table class="table table-striped ">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Amazina</th>
											<th scope="col">Telefoni</th>
											<th scope="col">Igikorwa</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$instructors = $db->GetRows("SELECT * FROM users WHERE role = 2");
										$flag = 0;
										foreach ($instructors as $instructor ) {
											$flag++;
											?>
										<tr>
											<th scope="row"><?php echo $flag;?></th>
											<td><?php echo $instructor['names']?></td>
											<td><?php echo $instructor['phone']?></td>
											<td><a href="<?php echo URLROOT;?>admin/instructor/edit/<?php echo $instructor['GUID'];?>" class="btn btn-sm btn-primary">Hindura</a> <a href="<?php echo URLROOT;?>admin/instructor/delete/<?php echo $instructor['GUID'];?>" class="btn btn-sm btn-danger">Siba Umwarimu</a></td>
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