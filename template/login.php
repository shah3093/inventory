<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Point of sale
        </title>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        <!-- CSS Files -->
        <link href="../assets/css/material-dashboard.min.css" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />

    </head>

    <body class="off-canvas-sidebar">

        <?php
        $email = NULL;
        $password = NULL;

        $showemptyemail = NULL;
        $showemptypass = NULL;

        if (isset($_GET['email'])) {
            if ($_GET['email'] == "emailIsNull") {
                $showemptyemail = "Email can't be empty";
            } else if ($_GET['email'] == "emailIsNotValid") {
                $showemptyemail = "Email isn't valid";
            } else if ($_GET['email'] == "emailOrPassNotMatched") {
                $showemptyemail = "Email or password not matched";
            } else {
                $email = $_GET['email'];
            }
        }

        if (isset($_GET['password'])) {
            $password = $_GET['password'];
            if ($password == "passwordIsNull") {
                $showemptypass = "Password can't be empty";
            }
        }
        ?>


        <div class="wrapper wrapper-full-page">

            <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('../assets/img/login.jpg'); background-size: cover; background-position: top center;">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="container">
                    <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                        <form class="form" method="post" action="../controller/loginController.php">
                            <div class="card card-login card-hidden">
                                <div class="card-header card-header-rose text-center">
                                    <h4 class="card-title">Login</h4>

                                </div>
                                <?php
                                if ($showemptyemail != NULL || $showemptypass != NULL) {
                                    ?>
                                    <div class="alert alert-danger text-center" role="alert">
                                        <?php echo $showemptyemail . "<br/>" . $showemptypass; ?>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="card-body ">

                                    <span class="bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">email</i>
                                                </span>
                                            </div>
                                            <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" placeholder="Email...">
                                        </div>
                                    </span>
                                    <span class="bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" placeholder="Password...">
                                        </div>
                                    </span>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button type="submit"class="btn btn-rose btn-link btn-lg" >Lets Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>

        <!--   Core JS Files   -->
        <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>

        <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js" ></script>


        <!--  Plugin for Sweet Alert -->
        <script src="../assets/js/plugins/sweetalert2.js"></script>

        <!-- Forms Validations Plugin -->
        <script src="../assets/js/plugins/jquery.validate.min.js"></script>


        <!-- Library for adding dinamically elements -->
        <script src="../assets/js/plugins/arrive.min.js"></script>


        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="../buttons.github.io/buttons.js"></script>

        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../assets/js/material-dashboard.min.js" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="../assets/demo/demo.js"></script>






        <script>
            $(document).ready(function () {
                demo.checkFullPageBackgroundImage();
                setTimeout(function () {
                    // after 1000 ms we add the class animated to the login/register card
                    $('.card').removeClass('card-hidden');
                }, 700);
            });
        </script>

    </body>

</html>
