    <header class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <ul class="top-info-links">
                        <li><i class="icofont-google-map"></i> <?php echo $company['address'];?></li>
                        <li><i class="icofont-phone-circle"></i> <?php echo $company['telephone1'];?></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-6 text-end">
                    <ul class="top-social-links">
                        <li><a href="<?php echo $company['twitter'];?>" target="_blank"><i class="icofont-twitter"></i></a></li>
                        <li><a href="<?php echo $company['facebook'];?>" target="_blank"><i class="icofont-facebook"></i></a></li>
                        <li><a href="<?php echo $company['youtube'];?>" target="_blank"><i class="icofont-youtube"></i></a></li>
                        <li><a href="<?php echo $company['instagram'];?>" target="_blank"><i class="icofont-instagram"></i></a></li>
                    </ul>
                    <ul class="login-regi-links">
                        <li><a href="<?php echo URLROOT;?>login">Injira</a></li>
                        <li><a href="<?php echo URLROOT;?>register">Iyandikishe</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <nav class="navbar navbar-expand-lg navbar-light edu-navbar header-sticky">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT;?>">
                <!-- <img src="<?php echo URLROOT;?>public/assets/img/logo.png" alt="Logo"> -->
                <?php echo SITENAME;?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    
                    <li class="nav-item active ">
                        <a class="nav-link" href="<?php echo URLROOT;?>">Ahabanza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT;?>about/">Ibyerekeye twe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT;?>faq/">Ibibazo bikunze kubazwa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT;?>contact/">Twandikire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
