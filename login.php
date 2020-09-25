<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Shopping Portal | Signi-in </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

    <!-- Custome style sheet -->
    <link rel="stylesheet" href="css/signin.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <?php include('includes/top-header.php');?>
        <!-- ============================================== TOP MENU : END ============================================== -->
        <?php include('includes/main-header.php');?>
        <!-- ============================================== NAVBAR ============================================== -->
        <?php include('includes/menu-bar.php');?>
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li class='active'>Authentication</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-lg-6 col-md-6 col-sm-6 sign-in">
                        <h4 class="text-uppercase">sign in</h4>
                        <p class="text-uppercase">Hello, Welcome to your account.</p>

                        <form class="outer-top-xs" id="login_form">
                            <p id="response"></p>
                            <div>
                                <p class="bg-success text-white px-4"> <?php
              
                                      if(isset($_SESSION['msg']))
                                       {
                                     echo $_SESSION['msg'];
                                        } 
                                    else
                                         {
                                  echo  $_SESSION['msg'] = '';
                                         }
                                    ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="log_mail" autocomplete="off" required>
                                <small></small>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password"
                                    class="form-control unicase-form-control text-input" id="log_pass"
                                    autocomplete="off" required>
                                <small></small>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button"
                                name="G_OTP">LOGIN</button>
                                <span style="float:right;">
                                Forgot your passsword <a href="forgot-password.php">click here!</a><br>
                                Don't have any account <a href="Register.php">click here!</a>   
                                </span>
                        </form> 
                    </div>
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div>

        </div>
    </div>
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="js/validate.js" charset="utf-8"></script>

</body>

</html>