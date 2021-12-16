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


    <div class="hero-slider owl-carousel owl-theme owl-theme-1">
        <div class="hero-slider-item item-bg-1">
            <div class="d-table">
                <div class="d-tablecell">
                    <div class="hero-slider-text">
                        <span class="welcome-text">Murakaza neza Kuri</span>
                        <h1><?php echo $company['name'];?></h1>
                        <p><?php echo $company['summary'];?></p>
                        <div class="slider-btn">
                            <a href="<?php echo URLROOT;?>login" class="default-btn white-btn mr-15">
                                Injira Nonaha
                            </a>
                            <a href="<?php echo URLROOT;?>register" class="default-btn">
                                Iyandikishe Nonaha
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row align-items-center">
        <div class="popular-courses pt-3" >
            <div class="container">
                <div class="section-header" style="margin-bottom:10px;">
                    <i class="icofont-education"></i>
                    <h2>Amasomo</h2>
                    <p>Singombwa kwiga amasomo yose aho muri Befa Lanuage wiga isomo ukeneye.</p>
                </div>
                <div class="single-course col-lg-4 col-md-4 col-sm-12">
                    <a href="#" class="thumb-img">
                        <span class="overly"></span>
                        <img src="<?php echo URLROOT;?>public/assets/img/courses/1.jpg" alt="Course Image">
                    </a>
                    <div class="course-caption">
                        <h3><a href="#">Computer Science & Engineering</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                        <div class="course-foot">
                            <img src="<?php echo URLROOT;?>public/assets/img/instruction/sm1.jpg" alt="instruction">
                            <a href="#">Alister Cook</a>
                            <p class="price">$149</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    

    <div class="ctr-area ctr-bg-2 ptb-100">
        <div class="container">
            <div class="ctr-text-content">
                <a href="<?php echo URLROOT;?>register" class="default-btn">Iyandikishe Nonaha</a>
            </div>
        </div>
    </div>

    <?php require_once('_partials/footer.php');?>
    

    <?php require_once('../FrontJS.php');?>
</body>

</html>