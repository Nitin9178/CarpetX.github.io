<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['cid']);

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

    <title>Product Category</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->

</head>

<body class="cnt-home">

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

    <!-- ============================================== ABOUT PAGE CODING : START ============================================== -->
    <div class="about mx-2">
        <div class="container">
            <div class="row">
                <h2 class="text-center text-warning text-capitalize font-weight-normal"
                    style="font-family:Dancing,cursive;" id="head">"Imagination is the true magic carpet"</h2>
                <br>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="images/10.jpg" class="img-fluid" alt="image" id="first_image">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h3 class="text-left font-weight-bold">Welcome ! <strong>CarpetX.com</strong> is a platform to sell
                        the
                        carpets online.
                        A carpet is a textile floor covering typically consisting of an upper layer of pile attached to
                        a
                        backing.
                        Not only is carpet one of the most affordable flooring products, but most are treated with
                        static,
                        stain, and soil resistant treatments, making them incredibly easy to clean and maintain.
                        It can be used as extile at floor, even you can textile that o the wall.
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="product-info">
        <div class="container justify-content-center">
            <h2 class="text-center text-uppercase text-warning font-weight-bold mt-3"><u>products</u></h2>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="card" id="card_1">
                        <div class="card-body">
                            <img src="images/CarpetImages/3D-Printed/roomtiles.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="card-footer">
                            <p class="text-center">Hand-made carpets</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="card" id="card_2">
                        <div class="card-body">
                            <img src="images/CarpetImages/PC_001.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-footer ">
                            <p class="text-center">Printed carpets</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="card" id="card_3">
                        <div class="card-body">
                            <img src="images/CarpetImages/26.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="card-footer">
                            <p class="text-center">Hand-made mats</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="card" id="card_4">
                        <div class="card-body">
                            <img src="images/CarpetImages/28.png" alt="" class="img-fluid">
                        </div>
                        <div class="card-footer">
                            <p class="text-center">Printed mats</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="team">
        <h2 class="text-center text-uppercase font-weight-bold">Our Service</h2>
        <div class="container">
            <div class="about-team">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fa fa-5x fa-truck"></i><br>
                                <h3 class="text-center">Faster-delivery</h3>
                            </div>
                            <div class="card-footer">
                                <p class="text-center">
                                    We have our best fast delivery Service. Our products will be delivered to you within
                                    4-5
                                    days.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fa fa-5x fa-magic"></i><br>
                                <h3 class="text-center text-uppercase">Service</h3>
                            </div>
                            <div class="card-footer">
                                <p class="text-center">
                                    We have an extra option for you. You can purchase your own designs's carpets from
                                    anywhere, anytime.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fa fa-5x fa-money"></i><br>
                                <h3 class="text-center text-uppercase">Secure payment</h3>
                            </div>
                            <div class="card-footer">
                                <p class="text-center">
                                    Your payment gateway is secured with AES level Encryption algorithm. So do not worry
                                    about our debit/credit card details.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="fa fa-5x fa-phone"></i><br>
                                <h3 class="text-center">Contact us</h3>
                            </div>
                            <div class="card-footer">
                                <p class="text-center">
                                    We are giving an option from where you can query ot get the information about our
                                    products.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <h3 class="text-center text-uppercase font-weight-bold">our team</h3>
            <div class="about-service">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="images/Team/profile1.jpg" alt="" class="img-thumbnail img-circle"><br>
                                <h3 class="text-center text-uppercase">Nitin Sinha</h3>
                            </div>
                            <div class="card-footer text-center">
                                <ul>
                                    <li>
                                        <h4>Company : CarpetX.com</h4>
                                    </li>
                                    <li>Nitin sinha has been working in this field from 2 years. He has good
                                        acknowledgement about ccarpets and mostly he makes printed carpets.</li>
                                    Follow him on :
                                    <li>
                                        <a href="#"><i class="fa fa-2x fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-2x fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-2x fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="images/Team/raju.jpg" alt="" class="img-thumbnail img-circle"><br>
                                <h3 class="text-center text-uppercase">Rajiv gupta</h3>
                            </div>
                            <div class="card-footer text-center">
                                <ul>
                                    <li>
                                        <h4>Company : Excellent Carpets</h4>
                                    </li>
                                    <li>Rajiv Gupta has been in this field for 5-6 years and they have best hand-made
                                        carpet makers. Their designr are awesome and adorable.</li>
                                    Follow him on :
                                    <li>
                                        <a href="#"><i class="fa fa-2x fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-2x fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-2x fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="images/Team/rajiv.jpg" alt="" class="img-thumbnail img-circle"><br>
                                <h3 class="text-center text-uppercase">Rajiv baranwal</h3>
                            </div>
                            <div class="card-footer text-center">
                                <ul>
                                    <li>
                                        <h4>Company : Bhadohi Enterprise</h4>
                                    </li>
                                    <li>Raji baranwal has been in the market for 5-6 years. He has one of the best rugs
                                        in carpet industry. Mostly, He is known for coloring the yarns.</li>
                                    Follow him on :
                                    <li>
                                        <a href="#"><i class="fa fa-2x fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-2x fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-2x fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ============================================== ABOUT PAGE CODING : END ============================================== -->



    <div>
        <?php include('includes/footer.php');?>
    </div>
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
    <script src=./js/cart.js></script>
</body>

</html>