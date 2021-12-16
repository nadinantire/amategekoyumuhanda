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
    <section class="single-event-area ptb-100">
        <div class="container">
            <div class="single-event-header">
                <h2>ABOUT <?php echo $company['name'];?></h2>
            </div>
            <div class="single-event-description">
                <p><?php echo $company['about'];?></p>
            </div>
            
            <div class="video-content  pb-80">
            <div class="d-table">
            <div class="d-tablecell">
            <div class="sonar-wrapper">
            <div class="sonar-emitter">
            <a href="<?php echo $company['video'];?>" class="play-icon popup-youtube">
            <i class="icofont-play"></i>
            </a>
            <div class="sonar-wave"></div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </section>


    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15949.827802754031!2d30.10199652672592!3d-1.971353377004848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca7b7aa1acc61%3A0x8b5f1fb17ab735d!2sBefa%20Language%20School!5e0!3m2!1sen!2srw!4v1635155628787!5m2!1sen!2srw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>    
    </div>

    <?php require_once('_partials/footer.php');?>
    

    <?php require_once('../FrontJS.php');?>
</body>

</html>