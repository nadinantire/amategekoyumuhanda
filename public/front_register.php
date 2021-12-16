<?php require_once('../bootstrap.php');
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

if(isset($_POST['CreateStudent'])){
    if(isset($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['phone']) && 
    !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
        $names  = $_POST['firstName']. ' ' .$_POST['lastName'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        if($password  == $confirmPassword){
            
            $hashPass = hash("sha256",$password);
            $guid = $function->GUIDv4();
            if(!$db->Check("SELECT * FROM users WHERE phone = ? ",["$phone"])){
                if($db->InsertData("INSERT INTO `users` (`id`, `GUID`, `names`, `phone`, 
                `password`, `verified`, 
                `verificationCode`, `role`, `createdAt`, `updatedAt`) 
                VALUES (NULL, ?, ?, ?,  ?, ?, ?, ?, 
                current_timestamp(), current_timestamp())",
                ["$guid","$names","$phone","$hashPass","0","0","3"])){
    
                    $_SESSION['userEmail'] = $phone;
                    $_SESSION['user_password'] = 'true';
                    $_SESSION['type'] = 3;
                    redirect($phone,'true',3);
                }
            }else{
                echo "<script>alert('Iyi nimero isanzwe muri sisiteme!, Gerageza Indi nimero.')</script>";
            }

        }else{
            echo "<script>alert('Ijambo banga ntabwo rihuye!, Gerageza nanone.')</script>";
        }
    }else{
        echo "<script>alert('Uzuza neza Ibisabwa Byose')</script>";
    }
}

?>





<!doctype html>
<html lang="rw">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="<?php echo SITENAME;?>">
    <meta name="description" content="Kwiga Amategeko Y'umuhanda">
    <meta name="keywords" content="Amategeko,Amategekoyumuhanda, amategeko yumuhanda,ibinyabiziga,imodoka,ipikipiki,moto,amagare,imyuga,imihanda,indege,Amategeko y'umuhanda,Umuhanda,traffic rules"/>
    <meta property="og:title" content="<?php echo SITENAME;?> | Kwiga Amategeko Y'umuhanda" />
    <meta property="og:url" content="<?php echo URLROOT; ?>" />
    <meta property="og:description" content="Kwiga Amategeko Y'umuhanda">
    <meta property="og:image" content="<?php echo URLROOT;?>assets/images/logo-icon.png">
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?php echo SITENAME;?>" />
    <meta name="robots" content="index,follow">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image" content="<?php echo URLROOT;?>assets/images/logo-icon.png" />
    <?php require_once('../FrontCSS.php');?>
    <title><?php echo SITENAME;?></title>
</head>

<body>
    <?php require_once('_partials/navbar.php');?>
<!-- 
    <div class="modal fade fade-scale searchmodal" id="searchmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="search-form">
                        <input type="text" class="form-control" id="search" placeholder="Search...">
                        <button type="submit" class="search-btn"><i class="icofont-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


    <section class="login-section pt-100 pb-180">
        <div class="container">
            <div class="register-form box-content">
                <h3 class="title">Iyandikishe</h3>
                <form method="post" action="<?php echo URLROOT;?>register">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="firstName" type="text" class="form-control" id="id_username" placeholder="Izina rya mbere">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="lastName" type="text" class="form-control" id="id_email" placeholder="Izina rya nyuma">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="phone" type="text" class="form-control" id="id_phone_number" placeholder="Terefone">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" id="id_password" placeholder="Ijambobanga">
                    </div>
                    <div class="form-group">
                        <input name="confirmPassword" type="password" class="form-control" id="id_repeat_password" placeholder="Subiramo Ijambobanga">
                    </div>
                    <div class="form-foot">
                        <button name="CreateStudent" type="submit" class="btn default-btn">Emeza Kwiyandikisha</button>
                        <p>Usanzwe ufite konti? <a href="<?php echo URLROOT;?>login">Injira Hano</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php require_once('_partials/footer.php');?>


    <?php require_once('../FrontJS.php');?>
</body>

</html>
