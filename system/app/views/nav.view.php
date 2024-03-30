
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparentj ">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1 class="text-light"><a href="home"><span>Agri_Solution_Hub</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="<?php echo ROOT ?>/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar fw-bold ms-auto me-md-4">
                <ul>
                    <li><a class="active " style="color:white" href="<?php echo ROOT ?>">Home</a></li>
                    <li><a href="<?php echo ROOT?>/chat">Chat</a></li>
                    <li><a href="<?php echo ROOT ?>/services">e-Learn Farm</a></li>
                    <!--<li><a href="<php echo ROOT ?>">Team</a></li>-->
                    <li><a href="<?php echo ROOT?>/shop">Shop</a></li>   
                    <li><a href="<?php echo ROOT ?>/contact">Contact Us</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
 

            <?php if(Auth::logged_in()):?>
                <div class="btn-group">
                    <div class=" btn-secondary btn-smdropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="text-dark fw-bold"><?php echo esc(Auth::getUsername()) ?></span>
                    </div>
                    <ul class="dropdown-menu mt-3  dropdown-menu-end bg-success">
                     
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item text-warning"><i class="bi bi-house-door text-warning pe-3"></i> <a class="text-white"href="<?php echo ROOT?>/dashboard">Dashboard</a></div>

                        <div class="dropdown-item"><i class="bi bi-person text-warning  pe-3"></i> <a class="text-white"href="<?php echo ROOT ?>/profile">Account Info</a></div>
                        <div class="dropdown-divider"></div>
                       
                        <div class="dropdown-item"><i class="bi bi-box-arrow-right text-warning pe-3"></i> <a class="text-white" href="logout">Sign Out</a></div>
                    </ul>
                </div>
            <?php else: ?>
                <span class="text-light "><a class="fw-bold" href="login" style="color: white"><i class="bi bi-lock pe-1"></i>Login</a></span>
            <?php endif ?>
            <span style="margin-left:1rem !important; font-size:1.7rem;"><a href="<?php echo ROOT ?>/cart"><i class="bi bi-cart3 fw-bold text-warning"></i></a></span>
            
          

        </div>
    </header><!-- End Header -->




