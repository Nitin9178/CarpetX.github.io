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

    <title> CarpetX.com</title>

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

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="furniture-container homepage-container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        <?php include('includes/side-menu.php');?>
                        <!-- ================================== TOP NAVIGATION : END ================================== -->
                    </div><!-- /.sidemenu-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                        <!-- ========================================== SECTION – HERO ========================================= -->

                        <div id="hero" class="homepage-slider3">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                <div class="full-width-slider">
                                    <div class="item" style="background-image: url(assets/images/sliders/banner4.jpg);">
                                        <!-- /.container-fluid -->
                                    </div><!-- /.item -->
                                </div><!-- /.full-width-slider -->

                                <div class="full-width-slider">
                                    <div class="item full-width-slider"
                                        style="background-image: url(assets/images/sliders/banner1.jpg);">
                                    </div><!-- /.item -->
                                </div><!-- /.full-width-slider -->

                                <div class="full-width-slider">
                                    <div class="item full-width-slider"
                                        style="background-image: url(assets/images/sliders/banner5.jpg);">
                                    </div><!-- /.item -->
                                </div>

                            </div><!-- /.owl-carousel -->
                        </div>

                        <!-- ========================================= SECTION – HERO : END ========================================= -->
                        <!-- ============================================== INFO BOXES ============================================== -->
                        <div class="info-boxes wow fadeInUp">
                            <div class="info-boxes-inner">
                                <div class="row">
                                    <div class="col-md-6 col-sm-4 col-lg-4">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <i class="icon fa fa-dollar"></i>
                                                </div>
                                                <div class="col-xs-10">
                                                    <h4 class="info-box-heading green">money back</h4>
                                                </div>
                                            </div>
                                            <h6 class="text">30 Day Money Back Guarantee.</h6>
                                        </div>
                                    </div><!-- .col -->

                                    <div class="hidden-md col-sm-4 col-lg-4">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <i class="icon fa fa-truck"></i>
                                                </div>
                                                <div class="col-xs-10">
                                                    <h4 class="info-box-heading orange pb-1">free shipping</h4>
                                                </div>
                                            </div>
                                            <h6 class="text">free ship-on oder over Rs. 600.00</h6>
                                        </div>
                                    </div><!-- .col -->

                                    <div class="col-md-6 col-sm-4 col-lg-4">
                                        <div class="info-box">
                                            <div class="row">
                                                <div class="col-xs-2">
                                                    <i class="icon fa fa-gift"></i>
                                                </div>
                                                <div class="col-xs-10">
                                                    <h4 class="info-box-heading red">Special Sale</h4>
                                                </div>
                                            </div>
                                            <h6 class="text">All items-sale up to 20% off </h6>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- /.row -->
                            </div><!-- /.info-boxes-inner -->

                        </div><!-- /.info-boxes -->
                        <!-- ============================================== INFO BOXES : END ============================================== -->
                    </div><!-- /.homebanner-holder -->

                </div><!-- /.row -->

                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
                    <div class="more-info-tab clearfix">
                        <h3 class="new-product-title pull-left">Featured Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                            <li><a href="#books" data-toggle="tab">Carpets</a></li>
                            <li><a href="#furniture" data-toggle="tab">Mats</a></li>
                        </ul><!-- /.nav-tabs -->
                    </div>

                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    <?php
$ret=mysqli_query($con,"select * from products order by rand() limit 6");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...
?>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300" alt="">
                                                        </a>
                                                    </div><!-- /.image -->
                                                </div><!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?>
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        <span class="price">
                                                            Rs.<?php echo htmlentities($row['productPrice']);?> </span>
                                                        <span
                                                            class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?>
                                                        </span>

                                                    </div><!-- /.product-price -->

                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>

                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>

                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>




                        <div class="tab-pane" id="books">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php
$ret=mysqli_query($con,"select * from products where category=7 limit 4");
while ($row=mysqli_fetch_array($ret)) 
{
?>


                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        <span class="price">
                                                            Rs. <?php echo htmlentities($row['productPrice']);?> </span>
                                                        <span
                                                            class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>

                                                    </div><!-- /.product-price -->

                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>

                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>

                        <div class="tab-pane" id="furniture">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php
$ret=mysqli_query($con,"select * from products where category=8 limit 4");
while ($row=mysqli_fetch_array($ret)) 
{
?>


                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                                            <img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300" alt=""></a>
                                                    </div>


                                                </div>


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        <span class="price">
                                                            Rs.<?php echo htmlentities($row['productPrice']);?> </span>
                                                        <span
                                                            class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>

                                                    </div>

                                                </div>
                                                <?php if($row['productAvailability']=='In Stock'){?>
                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ============================================== TABS ============================================== -->

            </div>
            </section>
            <?php include('includes/brands-slider.php');?>
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


</body>

</html>