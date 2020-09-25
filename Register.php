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

    <title>Shopping Portal | Signup</title>

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

    <!-- Demo Purpose Only. Should be removed in production -->
    <link rel="stylesheet" href="assets/css/config.css">

    <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
    <!-- Demo Purpose Only. Should be removed in production : END -->


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li class='active'>Registration</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">create a new account</h4>
                        <p class="text title-tag-line">Create your own Shopping account.</p>
                        <form class="register-form outer-top-xs" role="form" id="register">
                            <p id="res" class="bg-success"></p>
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="fullname"
                                    name="fullname" autocomplete="off" required="required">
                                <small style="color:red;font-family:cursive;"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="reg_email"
                                    name="emailid" autocomplete="off" required>
                                <small style="color:red;font-family:cursive;"></small>
                            </div>

                            <div class="form-group">
                                <label for="contactno">Contact No. <span>*</span></label>
                                <input type="number" class="form-control unicase-form-control text-input" id="contactno"
                                    name="contactno" autocomplete="off" maxlength="10" required>
                                <small style="color:red;font-family:cursive;"></small>
                            </div>

                            <div class="form-group">
                                <label for="password">Password. <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="reg_password" autocomplete="off" name="password" required>
                                <small style="color:red;font-family:cursive;"></small>
                            </div>

                            <div class="form-group">
                                <label for="confirmpassword">Confirm Password. <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="confirmpassword" name="confirmpassword" autocomplete="off" required>
                                <small style="color:red;font-family:cursive;"></small>
                            </div>
                            <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button"
                                id="submit">Sign Up</button>
                              <div class="alter">
                              <span>Already have an account ? <a href="login.php">Click Here</a></span>
                              </div>
                        </form>
                    </div>
                
                    <!-- create a new account -->
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
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
   
    <script src="js/validate.js"></script>