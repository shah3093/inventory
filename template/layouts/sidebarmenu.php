<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo"><a href="#" class="simple-text logo-mini">
            PS
        </a>

        <a href="#" class="simple-text logo-normal">
            Point of sale
        </a>
    </div>

    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                <img src="../assets/img/faces/avatar.jpg" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        <?php echo $sessionInstance->adminName; ?>
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/dashboard.php"; ?>">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            
             <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/sellout.php"; ?>">
                    <i class="material-icons">shopping_cart</i>
                    <p> Sell out </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/category.php?type=index"; ?>">
                    <i class="material-icons">category</i>
                    <p> Category </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/product.php"; ?>">
                    <i class="material-icons">shopping_basket</i>
                    <p> Product </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/receiving.php"; ?>">
                    <i class="material-icons">receipt</i>
                    <p> Receiving </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/customer.php"; ?>">
                    <i class="material-icons">supervisor_account</i>
                    <p> Customer </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/supplier.php"; ?>">
                    <i class="material-icons">business</i>
                    <p> Supplier </p>
                </a>
            </li>
            
           

            <li class="nav-item">
                <a class="nav-link" href="<?php echo $config::BASEURL . "menus/logout.php"; ?>">
                    <i class="material-icons">lock</i>
                    <p> Logout </p>
                </a>
            </li>

        </ul>



    </div>
</div>