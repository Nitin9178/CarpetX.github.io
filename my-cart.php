<?php 
session_start();
error_reporting(0);
include('includes/config.php');

// code for insert product in order table

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

    <title>My Cart</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body class="cnt-home">



    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row inner-bottom-sm">
                <div class="shopping-cart">
                    <div class="col-md-12 col-sm-12 shopping-cart-table">
                        <div class="table-responsive">
                            <form name="cart" method="post">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Pro No.</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>
                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Price</th>
                                            <th class="cart-sub-total item">Shipping Charge</th>
                                            <th class="cart-total last-item">Grandtotal</th>
                                            <th>
                                               <a href="action.php?clean=all" class="btn btn-danger p-1" onclick="return confirm('Are you sure ?')">Clear All</a>
                                            </th>
                                        </tr>
                                    </thead><!-- /thead -->
                                    <tbody>
                                    <?php
        if(isset($_SESSION["login"]))
        {
        $show_pro = $con->prepare("SELECT * FROM cart c , products p WHERE c.pro_id = p.id AND c.user_id = '".$_SESSION["login"]."'");
        $show_pro->bind_param("i", $_SESSION["login"]);
        $show_pro->execute();
        $res = $show_pro->get_result();
        $num = 1;
        $grand_total = 0;
        while($r = $res->fetch_assoc())
         {
             $grand_total = $grand_total + $r['qty']*$r['productPrice']+$r['shippingCharge'];
             $num = $num+1;
	        ?>
               <tr>
                    <td><?= $num; ?></td>
                    <input type="hidden" class="product_id" value="<?= $r["pro_id"] ?>">
                    <td class="cart-image">
                        <a class="entry-thumbnail" href="detail.html">
                         <img src="admin/productimages/<?php echo $r['id'];?>/<?php echo $r['productImage1'];?>" alt="pro-img" width="114" height="146">
                        </a>
                    </td>
                    <td class="cart-product-name-info">
                        <h4 class='cart-product-description'>
                            <a href="product-details.php?pid=<?php echo htmlentities($pd=$r['id']);?>"><?php echo $r['productName'];?></a>
                            </h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-8">
                                    <?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>
                                                        <div class="reviews">
                                                            ( <?php echo htmlentities($num);?> Reviews )
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div><!-- /.row -->

                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="quant-input">
                                                    <input type="number" class="form-control QtyItem" value="<?= $r['qty']; ?>" ]">
                                                </div>
                                            </td>
                                            <input type="hidden" class="pprice" value="<?= $r["productPrice"] ?>">
                                            <td class="cart-product-sub-total">
                                            <span class="cart-sub-total-price"><?= "Rs"." ".htmlentities(number_format($r['productPrice'] , 2)); ?></span>
                                            </td>
                                            <td class="cart-product-sub-total">
                                            <span class="cart-sub-total-price"><?= "Rs"." ".htmlentities(number_format($r['shippingCharge'] , 2)); ?></span>
                                            </td>

                                            <td class="cart-product-grand-total">
                                            <span class="cart-grand-total-price"><?= ($r['qty']*$r['productPrice']+$r['shippingCharge']); ?></span>
                                            </td>
                                            <td>
                                              <a href="action.php?pid=<?= $r['pro_id'] ?>"><i class="fa fa-2x fa-trash"></i></a>
                                            </td>
                                        </tr>
                                       
}
                                        <?php } }
				?>

                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                   
                    <div class="col-md-6 col-sm-12 cart-shopping-total ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="cart-grand-total">
                                            <span class="text-right-md">Grand Total</span>
                                            <span class="inner-left-md"><?="$grand_total". ".00"; ?></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                    <a href="category.php"class="btn btn-upper btn-primary outer-left-xs">
                                                     Continue Shopping</a>  
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="payment-method.php?data=recieve" class="btn btn-primary p-1">PROCEED TO CHECKOUT</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table>
                    </div>
                </div>
            </div>
            </form>

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
     <script src="js/cart.js"></script>
</body>

</html>