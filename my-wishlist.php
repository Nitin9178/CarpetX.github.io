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

    <title>My Wishlist</title>
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

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Wishlish</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
		<div class="response"></div>
            <div class="my-wishlist-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>About</th>
                                        <th>cart</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
if(isset($_SESSION["login"]))
{
	$user_id = mysqli_real_escape_string($con , $_SESSION["login"]);
	$select_list = $con->prepare("SELECT * FROM wishlist w , products p WHERE w.productId = p.id AND w.userId = ?");
	$select_list->bind_param("i" ,$user_id);
	$select_list->execute();
	$r = $select_list->get_result();
	while($row = $r->fetch_assoc())
	{
?>

                                    <tr>
                                        <td class="col-md-2"><img
                                                src="admin/productimages/<?php echo htmlentities($row['productId']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                alt="<?php echo htmlentities($row['productName']);?>" width="60" height="100">
                                        </td>
                                        <td class="col-md-6">
                                            <div class="product-name"><a
                                                    href="product-details.php?pid=<?php echo htmlentities($pd=$row['productId']);?>"><?php echo htmlentities($row['productName']);?></a>
                                            </div>
                                            <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>

                                            <div class="rating">
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star non-rate"></i>
                                                <span class="review">( <?php echo htmlentities($num);?> Reviews )</span>
                                            </div>
                                            <?php } ?>
                                            <div class="price">Rs.
                                                <?php echo htmlentities($row['productPrice']);?>.00
                                                <span>$900.00</span>
                                            </div>
                                        </td>
                                        <td class="col-md-2">
										<form role="form" class="add_to_cart">
										   <input type="hidden" class="pid" value="<?= $row['productId']; ?>">
										    <button class="btn btn-warning  AddCart"><i class="fa fa-2x fa-shopping-cart"></i></button>
										</form>
                                        </td>
                                        <td class="col-md-2 close-btn">
                                            <a href="action.php?del=<?= htmlentities($row['productId']);?>"
                                                onClick="return confirm('Are you sure you want to delete?')" class=""><i
                                                    class="fa fa-2x fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php } } else{ ?>
                                    <tr>
                                        <td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
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
	<script src="./js/cart.js"></script>

</body>

</html>
