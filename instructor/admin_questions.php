<?php require_once '../bootstrap.php';

$credetials = isLoggedIn();
if(($credetials == null && $credetials[0] == null) || $credetials[0] != '' && $credetials[1] == '' || $credetials[2] != 2){
  redirect($credetials[0],$credetials[1],$credetials[2]);
}else{
    require 'Operations.php';
    //check course
	if(isset($_GET['quiz'])){
        $quizGUID = $_GET['quiz'];
        $total = $_GET['total'];
        $quiz = $db->GetRow("SELECT * FROM `quiz` WHERE `id` = ? ",["$quizGUID"]);
        
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
	<title><?php echo $user['names'];?> | Umwarimu | Ibibazo</title>
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
        $current_page = "Ibibazo Kuri: ".$quiz['title'];
        require_once '_partials/nav.php';?>
		
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
                <?php
                    if(isset($_GET['quiz']) && isset($_GET['total'])) 
                    {
                        
                        echo ' 
                        <div class="row">
                        <span class="title1" style="margin-left:35%;font-size:30px;"><b>Injiza ibibazo bikenewe</b></span><br /><br />
                        <div class="col-md-6 col-lg-6 mx-auto">
                        <form class="form-horizontal title1" name="form" action="'.URLROOT.'instructor/quiz/save/'.@$_GET['quiz'].'/'.@$_GET['total'].'/"  method="POST">
                        <fieldset>
                        ';
                
                        for($i=1;$i<=@$_GET['total'];$i++)
                        {
                            echo '
                            <div class="card radius-15">
								<div class="card-body">
									<div class="card-title">
										<h4 class="mb-0"><b>Ikibazo cya&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input--></h4>
									</div>
									<hr>
                            
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
                                        <div class="col-md-12">
                                            <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Andika Ikibazo Cya '.$i.' Hano..."></textarea>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'1"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'1" name="'.$i.'1" placeholder="Andika ihitamo rya A" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'2"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'2" name="'.$i.'2" placeholder="Andika ihitamo rya B" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'3"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'3" name="'.$i.'3" placeholder="Andika ihitamo rya C" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'4"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'4" name="'.$i.'4" placeholder="Andika ihitamo rya D" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br />
                                    <b>Igisubizo nyacyo</b>:<br />
                                    <select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
                                    <option value="a">Hitamo Igisubizo cy\'Ikibazo cya '.$i.'</option>
                                    <option value="a"> Ihitamo A</option>
                                    <option value="b"> Ihitamo B</option>
                                    <option value="c"> Ihitamo C</option>
                                    <option value="d"> Ihitamo D</option> </select><br /><br />
                                    
                                    </div>
                                    </div>'; 
                        }
                        echo '<div class="form-group pb-5 text-center">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12"> 
                                    <input  type="submit" class="btn btn-primary" value="Emeza Kubika Isuzuma Bumenyi" class="btn btn-primary"/>
                                </div>
                              </div>

                        </fieldset>
                        </form></div>';
                    }
                ?>
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

	<!-- JavaScript -->
    <?php include_once '../JS.php';?>
	
</body>

</html>