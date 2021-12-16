<header class="top-header">
    <nav class="navbar navbar-expand">

        <div class="left-topbar d-flex align-items-center">
            
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>

        </div>

        <div class="flex-grow-1 search-bar">
            <div class="input-group">
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT;?>student/"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $current_page;?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0"><?php echo $user['names'];?></p>
                                <p class="designattion mb-0"> Umunyeshuri </p>
                            </div>
                            <img src="<?php echo URLROOT;?>assets/images/logo-icon.png" class="user-img" alt="<?php echo $user['names'];?> avatar">
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">	
                        <!-- <a class="dropdown-item" href="<?php echo URLROOT;?>sector/profile"><i
                                class="bx bx-user"></i><span>Profile</span></a> -->
                        <div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" id="logout" href="javascript:;"><i
                                class="bx bx-power-off"></i><span>Gusohoka</span></a>
                    </div>
                </li>
                
            </ul>
        </div>

    </nav>
</header>
<script>

</script>