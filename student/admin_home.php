<?php require_once '../bootstrap.php';
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 3){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
}
?>
<!DOCTYPE html>
<html lang="en" class="dark-sidebar">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title><?php echo $user['names'];?> | Umunyeshuri | Ahabanza</title>
    <?php include_once '../CSS.php';?>
	
	
	<link href="<?php echo URLROOT;?>assets/plugins/smart-wizard/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
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
				<div id="smartwizard">
								<ul class="nav">

								<?php 
								
								$courses = $db->GetRows("SELECT * FROM `courses`");
								$flag = 0;
								$userID = $user["id"];
								
								//check if student paid or not
								$payment = $db->Check("SELECT * FROM payments WHERE student = ? AND transactionStatus = 'SUCCESS'",["$userID"]);
          						foreach ($courses as $course) {
									  $flag++;
								?>
									<li class="nav-item">
										<a class="nav-link" href="#step-<?php echo $course['GUID'];?>">	<strong> ISOMO RYA <?php echo $flag;?></strong> 
											<br><?php echo $course['title'];?></a>
									</li>
									<?php 
									//stop showing courses if she didn't pay
									if(!$payment && $flag == 2){
										?>
										<li class="nav-item">
											<a class="nav-link" href="#step-1payment">	<strong> KWISHYURA</strong> 
												<br>Ishyura kugirango ubone Amasomo <?php echo count($courses);?> Asigaye</a>
										</li>
										<?php

										break;
										
									}
								  }
									?>
								</ul>
								<div class="tab-content">
									<?php 
									$con= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die("Could not connect to Database".mysqli_error($con));

									foreach ($courses as $course) {
										$flag++;
									?>
									<div id="step-<?php echo $course['GUID'];?>" class="tab-pane" role="tabpanel" aria-labelledby="step-<?php echo $course['GUID'];?>">
										<h3><?php echo $course['summary'];?></h3>
										<?php echo $course['description'];?>
										<h1><center>ISUZUMA BUMENYI RY'ISOMO</center></h1>
										<?php 
											$courseID = $course['GUID'];
											$result = mysqli_query($con,"SELECT * FROM quiz WHERE quiz.course = '$courseID' ORDER BY createdAt DESC") or die('Error1');
											echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
											<tr>
												<td>
													<center><b>#</b></center>
												</td>
												<td>
													<center><b>Ingingo</b></center>
												</td>
												<td>
													<center><b>Ibibazo byose</b></center>
												</td>
												<td>
													<center><b>Amanota</center></b>
												</td>
												<td>
													<center><b>Igikorwa</b></center>
												</td>
											</tr>';
											$c=1;
											
											while($row = mysqli_fetch_array($result)) {
												$title = $row['title'];
												$total = $row['totalQuestions'];
												$marks = $row['correctAnswerMarks'] * $total;
												$quiz = $row['id'];
												
												$q12=mysqli_query($con,"SELECT score FROM marks WHERE quiz='$quiz' AND student='$userID'" )or die('Error98');
												$rowcount=mysqli_num_rows($q12);	
												
												if($rowcount == 0){
													echo '<tr>
															<td><center>'.$c++.'</center>
															</td>
															<td>
																<center>'.$title.'</center>
															</td>
															<td>
																<center>'.$total.'</center>
															</td>
															<td>
																<center>'.$marks*$total.'</center>
															</td>
															<td>
																<center><b><a href="'.URLROOT.'student/quiz/'.$quiz.'/1/'.$total.'" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Tangira Isuzuma</b></span></a></b></center>
															</td>
														</tr>';
												}else{
													echo '<tr style="color:#99cc32">
													<td>
													<center>'.$c++.'</center>
													</td>
													<td><center>'.$title.'&nbsp;<span title="Iri suzuma bumenyi ryakozwe nawe." class="glyphicon glyphicon-ok" aria-hidden="true">
													</span>
													</center>
													</td>
													<td>
													<center>'.$total.'</center></td><td><center>'.$marks*$total.'</center>
													</td>
													<td>
													<center>
													<b><a href="'.URLROOT.'student/retake/'.$quiz.'/1/'.$total.'/retake/" class="pull-right btn btn-warning sub1" style="color:black;margin:0px;"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Subiramo Isuzuma Bumenyi</b>
													</span></a>
													<a href="'.URLROOT.'student/results/'.$quiz.'" class="pull-right btn sub1" style="color:white;margin:0px;background:green"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Reba Amanota Wagize</b>
													</span></a>
													</b>
													</center>
													</td>
													</tr>';
												}
											}
											$c=0;

											echo '</table></div></div>';
										?>
									</div>
									<?php 
									//stop showing courses if she didn't pay
										if(!$payment && $flag == 2){
											break;
											
										}

									}
									if(!$payment){
										$package = $db->GetRow("SELECT * FROM packages");
									
									?>
									<div id="step-1payment" class="tab-pane" role="tabpanel" aria-labelledby="step-1payment">
										<div class="col-8 col-md-8 mx-auto">
											<div class="card card-primary">
												<div class="card-header">
													<h3 class="card-title"><strong> KWISHYURA: 
													Ishyura kugirango ubone Amasomo <?php echo count($courses) -2;?> Asigaye</strong> </h3>
												</div>
												<!-- /.card-header -->
												<!-- form start -->
												<form role="form">
													<div class="card-body">
													<input type="hidden" id="sitename" value="http://localhost/portal/">
													<input type="hidden" id="package" value="3">
													
													<div id="notification" style="display:none;">
													<div class="text-center" id="UserResponses"><b>Tegereza gato...</b></div>
													<div class="progress " id="progress">
														<div class="progress-bar progress-lg bg-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
															<span class="sr-only">Tegereza gato</span>
														</div>
													</div>
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Terefone ya (MTN/Airtel-Tigo) RWANDA</label>
														<input type="email" class="form-control" id="phone" placeholder="078*******" value="0">
														<label class="bg-warning ">Tangiza 07....</label>
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">Amafaranga</label>
														<input type="text" class="form-control " disabled="" id="amount" value="<?php echo $package['amount']?>">
													</div>
													<!-- <div class="form-group">
														<label>Select</label>
														<select class="form-control">
														<option>option 1</option>
														<option>option 2</option>
														</select>
													</div>
													<div class="form-check">
														<input type="checkbox" class="form-check-input" id="exampleCheck1">
														<label class="form-check-label" for="exampleCheck1">Check me out</label>
													</div> -->
													</div>
													<!-- /.card-body -->

													<div class="card-footer">
													<button type="button" id="submit" class="btn btn-primary">Ishyura Nonaha</button>
													</div>
												</form>
											</div>
										</div>	
									</div>
									<?php

									}?>
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
	<!--end switcher-->
	<!-- JavaScript -->
    <?php include_once '../JS.php';?>
	
	<script src="<?php echo URLROOT;?>assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
	<script>
		$(document).ready(function () {
			// Toolbar extra buttons
			
			// Step show event
			$("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
				if (stepNumber === 1) {
					$(".sw-btn-next").addClass('disabled');
					//$(".sw-btn-next").hide();
				}else{
					$(".sw-btn-next").removeClass('disabled');
					//$(".sw-btn-next").show();
				}
				$("#prev-btn").removeClass('disabled');
				$("#next-btn").removeClass('disabled');
				if (stepPosition === 'first') {
					$("#prev-btn").addClass('disabled');
				} else if (stepPosition === 'last') {
					$("#next-btn").addClass('disabled');
				} else {
					$("#prev-btn").removeClass('disabled');
					$("#next-btn").removeClass('disabled');
				}
				
			});
			
			// Smart Wizard
			$('#smartwizard').smartWizard({
				selected: 0,
				theme: 'arrows',
				transition: {
					animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
				},
				toolbarSettings: {
					toolbarPosition: 'both', // both bottom
				},
				onLeaveStep:function(obj, context) {
					alert(context.toStep);
					if (context.fromStep > context.toStep) {
						// Going backward
					} else {
						// Going forward
						
					}
				}
			});
			// External Button Events
			$("#reset-btn").on("click", function () {
				// Reset wizard
				$('#smartwizard').smartWizard("reset");
				return true;
			});
			$("#prev-btn").on("click", function () {
				// Navigate previous
				$('#smartwizard').smartWizard("prev");
				return true;
			});
			$("#next-btn").on("click", function () {
				// Navigate next
				$('#smartwizard').smartWizard("next");
				
				
				return true;
			});
			// Demo Button Events
			$("#got_to_step").on("change", function () {
				// Go to step
				var step_index = $(this).val() - 1;
				$('#smartwizard').smartWizard("goToStep", step_index);
				return true;
			});
			$("#is_justified").on("click", function () {
				// Change Justify
				var options = {
					justified: $(this).prop("checked")
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#animation").on("change", function () {
				// Change theme
				var options = {
					transition: {
						animation: $(this).val()
					},
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#theme_selector").on("change", function () {
				// Change theme
				var options = {
					theme: $(this).val()
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
		});
	</script>
	<script>
	  $(function () {
		var SITEURL = $('#SITEURL').val();
		console.log(SITEURL);
		$('#submit').click(function(){
			
			var phone = $('#phone').val();
			var amount = $('#amount').val();
			var package = $('#package').val();
			
			if(phone.length != 10){
			alert("Andika terefoni neza (Imibare 10)");
			}else if(phone.length < 1){
			alert("Amafaranga SIYO");
			}else{
			$('#notification').css("display", "block");
			$('#submit').css("display", "none");
			$('#progress').css("display", "block");
			
			}

			$.ajax({
				type: 'POST',
				url : SITEURL+'student/Operations.php',
				data:{
				'action'        : 'pay',
				'phone'     : phone,
				'amount'     : amount,
				'package'     : package,
				},

				success : function (data){
				console.log(data)
				is_json  = false;
				json ="";
				try {
              json = $.parseJSON(data);
              is_json = true;
          } catch (e) {
            is_json  = false;
              // not json
          }
          if(data == "error"){
            $('#submit').css("display", "block");
            $('#progress').css("display", "none");
            $('#UserResponses').html('<div class="alert alert-danger alert-dismissible">button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Havutse akabazo,Mugerageze mukanya.</div>');
          }else if( is_json){
            transacton_id = json.transacton_id
            $('#UserResponses').html('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i><b>GUTEGEREZA: </b> Murebe kuri terefoni yanyu!</h5>Emeza Ubwishyu <b>'+amount+'</b> RWF.Kuri Terefoni<br> Nta Message Muri kubona kuri MTN? Kanda *182*7*1#</div>');
            var timer = setInterval(function () {
                console.log(transacton_id)

                $.ajax({
                  type: 'POST',
                  url : SITEURL+'student/Operations.php',
                  data:{
                    'action'        : 'checkPaymentStatus',
                    'id'        : transacton_id,
                  },
                  success : function (data){
                    
                    
                    console.log(data)
                    is_json  = false;
                    json ="";
                    try {
                        json = $.parseJSON(data);
                        is_json = true;
                    } catch (e) {
                      is_json  = false;
                        // not json
                    }

                    if(data == "error"){
                      clearInterval(timer)
                      $('#progress').css("display", "none");
                      $('#submit').css("display", "block");
                      $('#UserResponses').html('<div class="alert alert-danger alert-dismissible">button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>Havutse akabazo,Mugerageze mukanya.</div>');
                    }else if(is_json){
                     if(json.status !== "PENDING"){
                        clearInterval(timer)
                        if(json.status !== "SUCCESS"){
                          $('#submit').css("display", "block");
                          $('#progress').css("display", "none");
                          $('#UserResponses').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>'+json.message+'</div>');
                         
                        }else{
                          $('#progress').css("display", "none");
                          $('#UserResponses').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-check"></i> Alert!</h5>BYAKUNZE. Mwishyuye Amafaranga <b>'+amount+'</b> RWF.</div>');
                          setTimeout(function() { 
							window.location.href = SITEURL+'student/';
                          },6000);
                        }
                      }
                    }else{
                      clearInterval(timer)
                      $('#submit').css("display", "block");
                      $('#progress').css("display", "none");
                      $('#UserResponses').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>'+data+'</div>');
                    }
                  }
                })
            }, 2000);
          }else{
            $('#submit').css("display", "block");
            $('#progress').css("display", "none");
            $('#UserResponses').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h5><i class="icon fas fa-ban"></i> Alert!</h5>'+data+'</div>');
          }
        }
			})
			
		});
	});
	</script>
</body>

</html>