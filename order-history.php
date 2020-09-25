<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

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

    <title>Order History</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

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
                    <div class="col-md-12 col-sm-12 shopping-cart-table ">
                        <div class="table-responsive">
                            <form name="cart" method="post">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">#</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>

                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Price Per unit</th>
                                            <th class="cart-sub-total item">Shipping Charge</th>
                                            <th class="cart-total item">Grandtotal</th>
                                            <th class="cart-description item">Order Date</th>
                                            <th class="cart-total last-item">Action</th>
                                        </tr>
                                    </thead><!-- /thead -->

                                    <tbody>

                                        <?php 
						   if(isset($_SESSION["login"]))
						   {
							$show_orders = $con->prepare("SELECT * FROM orders o, products p WHERE o.productId = p.id AND o.userId = ?");
							$show_orders->bind_param("i", $_SESSION["login"]);
							$show_orders->execute();
							$result = $show_orders->get_result();
                             $cnt = 0;
							while($row = $result->fetch_assoc())
							{
								$cnt++;
								?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>

                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="detail.html">
                                                    <img src="admin/productimages/<?= htmlentities($row["id"]) ?>/<?= $row["productImage1"] ?>"
                                                        alt="product_image" width="84" height="146">
                                                </a>
                                            </td>

                                            <td class="cart-product-name-info">
                                                <h4 class='cart-product-description'>
                                                    <a
                                                        href="product-details.php?pid=<?= $row['id'];?>"><?= $row['productName'];?></a>
                                                </h4>
                                            </td>

                                            <td class="cart-product-quantity">
                                                <?php echo $qty=$row['quantity']; ?>
                                            </td>

                                            <td class="cart-product-sub-total"><?= $price=$row['productPrice']; ?></td>

                                            <td class="cart-product-sub-total">
                                                <?= $shippcharge=$row['shippingCharge']; ?> </td>

                                            <td class="cart-product-grand-total"><?= (($qty*$price)+$shippcharge);?>
                                            </td>

                                            <td class="cart-product-sub-total"><?= $row['orderDate']; ?> </td>

                                            <td>
                                              <?php 
                                                 if($row['orderStatus'] == 0)
                                                 {
                                                     ?>
                                                    <button class="btn btn-danger disabled"><span>CANCEL</span></button>
                                                    <?php
                                                 }
                                                    else
                                                    {
                                                    ?>
                                                        <a href="action.php?cancel_order=<?= htmlentities($row['o_id']);?>" class="btn btn-danger"><span>CANCEL</span></a>
                                                    <?php
                                                    }
                                              ?>
                                            </td>

                                        </tr>
                                        <?php
							}
						   }
						   else
						   {
							   ?>
                                        <h2 class="text-center text-uppercase font-weight-bold">No Products found</h2>
                                        <?php
						   }   			
                        ?>
                                        <?php } ?>
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->

                        </div>
                    </div>

                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
            </form>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <?php echo include('includes/brands-slider.php');?>
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
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