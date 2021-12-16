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
					
					<div class="card radius-15">
						<div class="card-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>N<sup>0<sup></th>
											<th>Amazina</th>
											<th>Telephone</th>
											<th>Transaction</th>
											<th>Amafaranga</th>
											<th>Rizarangira</th>
											<th>Status</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($conn->error));

											$fetchstudent = $conn->query("SELECT payments.*,users.names FROM payments
											JOIN users ON payments.student = users.id ");
											$flag = 0;
											while ( $row=$fetchstudent->fetch_assoc() ) {
												$flag++;
											?>
											<tr>
												<td><b><?php echo($flag); ?></b></td>
												<td><b><?php echo($row['names']); ?></b></td>
												<td><?php echo($row['telephone']); ?></td>
												<td><?php echo($row['spTransactionID']); ?></td>
												<td><?php echo($row['paidAmount']); ?></td>
												<td><?php echo($row['expiryDate']); ?></td>
												<td style="color:<?php echo $row['transactionStatus'] == "SUCCESS"? 'green' : 'red';?>"><b><?php echo($row['transactionStatus']); ?></b></td>
												<td><?php echo($row['description']); ?></td>
											</tr>
											<?php }
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