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
            <div class="col-md-4 col-lg-4">
                <div class="contact-info">
                    <i class="icofont-google-map"></i>
                    <h3>Aderesi</h3>
                    <p><?php echo $company['address'];?></p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="contact-info">
                    <i class="icofont-envelope"></i>
                    <h3>Imeri</h3>
                    <p><a href="mailto:niyonkuruelisa@gmail.com"><span class="__cf_email__"
                                data-cfemail="7704020707180503371213021416031e18195914181a">[email&#160;protected]</span></a>
                    </p>
                    <p><a href="#"><span class="__cf_email__"
                                data-cfemail="51383f373e11343524323025383e3f7f323e3c">[email&#160;protected]</span></a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="contact-info">
                    <i class="icofont-phone"></i>
                    <h3>Terefone</h3>
                    <p><a href="#"><?php echo $company['telephone1'];?></a></p>
                    <p><a href="#"><?php echo $company['telephone2'];?></a></p>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form id="contactForm">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Amazina" required
                                data-error="Andika amazina neza">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Imeri"
                                required data-error="Andika Imeri neza">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="msg_subject" placeholder="Ingingo" required
                        data-error="Andika Ingingo neza">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="message" rows="5" placeholder="Ubutumwa"
                        data-error="Andika ubutumwa bwawe" required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="text-center">
                    <button type="submit" id="submit" class="btn default-btn mt-10">Ohereza Ubutumwa</button>
                    <div id="msgSubmit" class="h4 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
            </form>
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