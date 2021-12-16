<?php require_once('../bootstrap.php');

if(isset($_POST['Login'])){

    if( !empty($_POST['phone']) && !empty($_POST['password'])){
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $hashPass = hash("sha256",$password);

        if($user = $db->GetRow("SELECT * FROM users WHERE phone = ? AND password = ?",["$phone","$hashPass"])){
            
                $_SESSION['userEmail'] = $user['phone'];
                $_SESSION['user_password'] = 'true';
                $_SESSION['type'] = $user['role'];
                redirect($user['phone'],'true',$user['role']);   
            
        }else{
            echo "<script>alert('Mwibeshye Terefone cyangwa Ijambobanga')</script>";
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

    <!-- <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
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
                <h3 class="title">Injira Muri Konti Yawe</h3>
                <form method="post" action="<?php echo URLROOT;?>login">
                    <div class="form-group">
                        <input name="phone" type="tel" class="form-control" id="id_username" placeholder="Terefone">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" id="id_password" placeholder="Ijambobanga">
                    </div>
                    <div class="form-foot">
                        <button name="Login" type="submit" class="btn default-btn">Emeza kwinjira</button>
                        <p>Nta konti ufite? <a href="<?php echo URLROOT;?>register">Iyandikishe Nonaha</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php require_once('_partials/footer.php');?>
    


    

    <?php require_once('../FrontJS.php');?>

</body>

</html>