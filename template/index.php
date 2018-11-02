<?php
include_once '../config/config.php';
include_once '../library/sessionHandler.php';
$config = new Config();
$sessionInstance = Session::getInstance();

if (!isset($sessionInstance->adminName)) {
    $url = $config::BASEURL . 'template/login.php';
    header("Location: $url");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Point of sale </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="../assets/css/material-dashboard.min.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />

        <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script>
            var baseurl = <?php echo $config::BASEURL; ?>
        </script>
    </head>

    <body class="">

        <div class="wrapper ">

            <?php include_once './layouts/sidebarmenu.php'; ?>


            <div class="main-panel">
                <!-- Navbar -->

                <?php include_once './layouts/navbar.php'; ?>
                <!-- End Navbar -->




                <div class="content">
                    <div class="container-fluid">
                        <div class="header text-center ml-auto mr-auto">
                            <h3 class="title">Material Dashboard Heading</h3>
                            <p class="category">Created using Roboto Font Family</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="typography">
                                            <div class="card-title">
                                                <h2>Typography</h2>
                                            </div>
                                            <div class="row">
                                                <div class="tim-typo">
                                                    <h1>
                                                        <span class="tim-note">Header 1</span>The Life of Material Dashboard </h1>
                                                </div>
                                                <div class="tim-typo">
                                                    <h2>
                                                        <span class="tim-note">Header 2</span>The Life of Material Dashboard</h2>
                                                </div>
                                                <div class="tim-typo">
                                                    <h3>
                                                        <span class="tim-note">Header 3</span>The Life of Material Dashboard</h3>
                                                </div>
                                                <div class="tim-typo">
                                                    <h4>
                                                        <span class="tim-note">Header 4</span>The Life of Material Dashboard</h4>
                                                </div>
                                                <div class="tim-typo">
                                                    <h5>
                                                        <span class="tim-note">Header 5</span>The Life of Material Dashboard</h5>
                                                </div>
                                                <div class="tim-typo">
                                                    <h6>
                                                        <span class="tim-note">Header 6</span>The Life of Material Dashboard</h6>
                                                </div>
                                                <div class="tim-typo">
                                                    <p>
                                                        <span class="tim-note">Paragraph</span>
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Quote</span>
                                                    <blockquote class="blockquote">
                                                        <p>
                                                            I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
                                                        </p>
                                                        <small>
                                                            Kanye West, Musician
                                                        </small>
                                                    </blockquote>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Muted Text</span>
                                                    <p class="text-muted">
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                                    </p>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Primary Text</span>
                                                    <p class="text-primary">
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Info Text</span>
                                                    <p class="text-info">
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Success Text</span>
                                                    <p class="text-success">
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Warning Text</span>
                                                    <p class="text-warning">
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers...
                                                    </p>
                                                </div>
                                                <div class="tim-typo">
                                                    <span class="tim-note">Danger Text</span>
                                                    <p class="text-danger">
                                                        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers... </p>
                                                </div>
                                                <div class="tim-typo">
                                                    <h2>
                                                        <span class="tim-note">Small Tag</span>
                                                        Header with small subtitle
                                                        <br>
                                                        <small>Use "small" tag for the headers</small>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php include_once './layouts/footer.php'; ?>


            </div>

        </div>

        <?php include_once './layouts/dashboardsettings.php'; ?>

        <?php include_once './layouts/javaScriptsPlugin.php'; ?>

    </body>

</html>
