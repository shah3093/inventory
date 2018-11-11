<?php
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

        <link rel="stylesheet" href="../assets/js/plugins/select2/select2.min.css"/>

        <link href="../assets/css/customize.css" rel="stylesheet" />
        <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script>
            var baseurl = "<?php echo $config::BASEURL; ?>";
            var targets = Number(0);
            var table;
        </script>
    </head>

    <body class="<?php echo isset($bodyClass) ? $bodyClass : ""; ?>">

        <div class="wrapper ">

            <?php include_once '../template/layouts/sidebarmenu.php'; ?>


            <div class="main-panel">
                <!-- Navbar -->

                <?php include_once '../template/layouts/navbar.php'; ?>
                <!-- End Navbar -->




                <div class="content">
                    <div class="container-fluid">
                        <?php include_once $viewFile; ?>
                    </div>

                </div>

                <?php include_once '../template/layouts/footer.php'; ?>


            </div>

        </div>

        <?php // include_once '../template/layouts/dashboardsettings.php'; ?>

        <?php include_once '../template/layouts/javaScriptsPlugin.php'; ?>


        <script>
<?php
include_once '../script/mainScript.js';

if (!is_array($javaScriptFile)) {
    include_once $javaScriptFile;
} else {
    foreach ($javaScriptFile as $file) {
        include_once $file;
    }
}
?>
        </script>

    </body>

</html>
