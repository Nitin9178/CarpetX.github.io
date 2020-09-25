<?php 

 if(isset($_SESSION['login']))
 {
	$fetch_cart = $con->prepare("SELECT * FROM cart c , products p WHERE c.pro_id = p.id AND c.user_id = ?");
	$fetch_cart->bind_param('i' , $_SESSION['login']);
	$fetch_cart->execute();
	$r = $fetch_cart->get_result();
	$qty = 0;
	$sub_total = 0;
	$total = 0;
	$num = 0;
	while($row = $r->fetch_assoc())
	{
	   $qty = $qty + $row['qty'];
	   $num = $num + 1;
	   $sub_total = $row['productPrice']*$row['qty']+$row['shippingCharge'];
	   $total = $total + $sub_total;
	}
   }
?>
<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="index.php">
                        <h2 class="green-text text-capitalize" style="font-family:'Dancing Script',cursive; font-size:50px;">CarpetX.com</h2>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                <div class="search-area">
                    <form name="search" method="post" action="search-result.php">
                        <div class="control-group">
                            <input class="search-field" class="form-control" placeholder="Search here..." name="product"
                                required="required" pattern="[A-Za-z ]{3,50}"/>
                            <button class="search-button" type="submit" name="search"></button>
                        </div>
                    </form>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->
            </div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <?php
if(!empty($num)){
	?>
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="total-price-basket">
                                <span class="lbl">cart -</span>
                                <span class="total-price">
                                    <span class="sign">Rs.</span>
                                    <span class="value"><?= $total; ?></span>
                                </span>
                            </div>
                            <div class="basket">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <div class="basket-item-count"><span class="count"><?= $num;?></span></div>

                        </div>
                    </a>
                    <ul class="dropdown-menu">

                        <?php
			$sql = $con->prepare("SELECT * FROM cart c , products p WHERE c.pro_id = p.id AND c.user_id = ? ");
			$sql->bind_param("i" , $_SESSION['login']);
			$sql->execute();
			$r = $sql->get_result();
			$totalprice=0;
			$totalqunty=0;
			if(!empty($r)){
			while($row = $r->fetch_assoc()){
				$sub_total = $row['productPrice']*$row['qty'] + $row['shippingCharges'];
				$totalprice = $totalprice + $sub_total;
	?>
                        <li>
                            <div class="cart-item product-summary">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="image">
                                            <a href="product-details.php?pid=<?php echo $row['id'];?>"><img
                                                    src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>"
                                                    width="35" height="50" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">

                                        <h3 class="name"><a
                                                href="product-details.php?pid=<?= $row['id'];?>"><?= $row['productName']; ?></a>
                                        </h3>
                                        <div class="price">
                                            Rs.<?= ($row['productPrice']+$row['shippingCharge']); ?>*<?= $row['qty']; ?>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.cart-item -->

                            <?php } }?>
                            <div class="clearfix"></div>
                            <hr>

                            <div class="clearfix cart-total">
                                <div class="pull-right">

                                    <span class="text">Total :</span><span
                                        class='price'>Rs.<?="$totalprice". ".00"; ?></span>

                                </div>

                                <div class="clearfix"></div>

                                <a href="my-cart.php" class="btn btn-upper btn-primary btn-block mt-20">My Cart</a>
                            </div><!-- /.cart-total-->


                        </li>
                    </ul><!-- /.dropdown-menu-->
                </div><!-- /.dropdown-cart -->
                <?php } else { ?>
                <div class="dropdown dropdown-cart">
                    <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                        <div class="items-cart-inner">
                            <div class="total-price-basket">
                                <span class="lbl">cart -</span>
                                <span class="total-price">
                                    <span class="sign">Rs.</span>
                                    <span class="value">00.00</span>
                                </span>
                            </div>
                            <div class="basket">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <div class="basket-item-count"><span class="count">0</span></div>

                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="cart-item product-summary">
                                <div class="row">
                                    <div class="col-xs-12">
                                        Your Shopping Cart is Empty.
                                    </div>
                                </div>
                            </div><!-- /.cart-item -->
                            <hr>

                            <div class="clearfix cart-total">

                                <div class="clearfix"></div>

                                <a href="index.php" class="btn btn-upper btn-primary btn-block mt-20">Continue
                                    Shooping</a>
                            </div><!-- /.cart-total-->


                        </li>
                    </ul><!-- /.dropdown-menu-->
                </div>
                <?php }?>




                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
            </div><!-- /.top-cart-row -->
        </div><!-- /.row -->

    </div><!-- /.container -->

</div>