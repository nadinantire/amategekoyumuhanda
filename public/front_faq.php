<?php require_once('../bootstrap.php');?>
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
    <section class="contact-us-section ptb-100 white-bg">
    <div class="container">
        <div class="row">
            <?php
            $faqs = $db->GetRows("SELECT * FROM faq");
            foreach ($faqs as $faq ) {
                
            
            ?>
            <div class="col-md-12 col-lg-12">
                <div class="media single-event-two">

                <div class="media-body">
                <h3><a href="#"><?php echo $faq['question'];?></a></h3>
                <p><?php echo $faq['answer'];?></p>
                
                <img class="speech-icon" src="<?php echo URLROOT;?>public/assets/img/icon/1.png" alt="">
                </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
    </div>
</section>


    <?php require_once('_partials/footer.php');?>
    

    <?php require_once('../FrontJS.php');?>
</body>

</html>