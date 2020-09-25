<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['pay']))
{
	if($_SESSION['login'])
	{
		    $user_id = mysqli_real_escape_string($con , $_SESSION['login']);
			$state = mysqli_real_escape_string($con , $_POST['state']);
			$city = mysqli_real_escape_string($con , $_POST['city']);
			$address = mysqli_real_escape_string($con , $_POST['address']);
			$pcode = mysqli_real_escape_string($con , $_POST['pin_code']);
			$debit = mysqli_real_escape_string($con , $_POST['Debit_number']);
			$cvv = mysqli_real_escape_string($con , $_POST['CVV']);
			$exp_date = mysqli_real_escape_string($con , $_POST['exp_date']);

			///////////// FETCH CITY AND STATE NAME ////////////////

			$fetch_state = $con->prepare("SELECT * FROM state s , city c WHERE s.state_id = ? AND c.city_id = ?");


		if($_GET['pro_id'])
		{
			$pro_id = mysqli_real_escape_string($con , $_GET['pro_id']);
			
			$check_card = $con->prepare("SELECT * FROM orders WHERE userId = ?");
			$check_card->bind_param("i", $user_id);
			$check_card->execute();
			$row = $check_card->get_result();
			$res = $row->fetch_assoc();
			$deb_num = $res['card_num'];
			$cvv_num = $res['cvv'];
			$orderStatus = 1;
			$qty = 1;

			if(($debit === $deb_num) && ($cvv != $cvv_num))
			{
                   ?>
                       <script>
						  alert("Invalid CVV number");
						  return false;
					   </script>
				   <?php
			}
			else if(($debit != $deb_num) && ($cvv === $cvv_num))
			{
                   ?>
                       <script>
						  alert("Invalid card number");
						  return false;
					   </script>
				   <?php
			}
			else{

				////// FETCHING THE PRICE OF GOT PRODUCT ID
				$get_price = $con->prepare("SELECT productPrice AS price FROM products WHERE id = ?");
				$get_price->bind_param("i", $pro_id);
				$get_price->execute();
				$res = $get_price->get_result();
				$row = $res->fetch_assoc();
				$price = $row['price'];

                //////// INSERTING THE DATA INTO ORDERS
				$take_orders = $con->prepare("INSERT IGNORE INTO orders(userId , productId , quantity , state , city , address , payment , card_num , cvv , orderStatus)VALUES(?,?,?,?,?,?,?,?,?,?)");
				$take_orders->bind_param("iiiiisddii", $user_id , $pro_id , $qty , $state , $city , $address , $price , $debit , $cvv , $orderStatus);
				$take_orders->execute();
				?>
                   <script>
					   alert("Orders have been submitted");
					   location.href = "category.php";
				   </script>
				<?php
			}
		}
		else if($_GET['data'] || $_GET['data'] == 'recieve')
		{
			 /////////////  FROM THE CART
			 $fetch_product_info = $con->prepare("SELECT c.user_id , c.qty  , c.pro_id  , p.productPrice  FROM cart c JOIN products p ON c.pro_id = p.id WHERE c.user_id = ?");
			 $fetch_product_info->bind_param("i" , $_SESSION["login"]);
			 $fetch_product_info->execute();
			 $result = $fetch_product_info->get_result();
			 while($row = $result->fetch_assoc())
			 {
				 // PREPARING ALL THE INFORMATIONS
			 $qty = $row["qty"];
			 $total_price = $qty*$row["productPrice"]+$row["shippingCharge"];

			 ///// NOW I WILL INSERT THE DATA INTO ORDERS TABLE
	         $take_orders = $con->prepare("INSERT IGNORE INTO orders(userId , productId , quantity , state , city , address , payment , card_num , cvv , orderStatus)VALUES(?,?,?,?,?,?,?,?,?,?)");
				$take_orders->bind_param("iiiiisddii", $user_id , $pro_id , $qty , $state , $city , $address , $total_price , $debit , $cvv , $orderStatus);
				$take_orders->execute();
				?>
                   <script>
					   alert("Orders have been submitted");
					   location.href = "category.php";
				   </script>
				<?php
			
			 ///// NOW DELETE THE DATA FROM CART THOSE HAVE BEEN PURCHASED
			 $delete_cart = $con->prepare("DELETE FROM cart WHERE user_id = ?");
			 $delete_cart->bind_param("i", $user_id);
			 $delete_cart->execute();
			 }	  
			}
		else if($_GET['order'])
		{
			$order_id = mysqli_real_escape_string($con, $_GET['order']);
			$status = '1';
			// Fetch Details of special orders

		    $update_order = $con->prepare("UPDATE special_order SET ");
		}
	}
	else
	{
       ?>
         <script>
			alert("Please login first to purchase this..");
			location.href = "login.php";
		 </script>
	   <?php
	}
}
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

	    <title>Shopping Portal | Payment Method</title>
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
		<link rel="stylesheet" href="assets/css/config.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home">
	
		
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Payment Method</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box bg-secondary faq-page inner-bottom-sm">
			<div class="row">
			<p id="response"></p>
			<div class="col-md-6 col-sm-12 purchase">
			<h4 class="text-center text-capitalize">Product information</h4>
			    <table class="table table-bordered table-stripped">
				   <thead>
				       <tr>
					       <th class="text-center font-weight-bold text-uppercase">
						        <span>Product Name</span>
						   </th>
						   <th class="text-center font-weight-bold text-uppercase">
						        <span class="estimate-title">Qty</span>
						   </th>
						   <th class="text-center font-weight-bold text-uppercase">
						        <span class=" text-center">price</span>
						   </th class="text-center font-weight-bold text-uppercase">
						   <th>
						        <span class="text-center ">Shipping charge</span>
						   </th>
						   <th class="text-center font-weight-bold text-uppercase">
						        <span class=" text-center estimate-title">t_price</span>
						   </th>
					   </tr>
				   </thead>
				   <tbody>
					  <?php 
					  if(isset($_SESSION["login"]))
					  {
						$user_id = mysqli_real_escape_string($con , $_SESSION["login"]);
						if($_GET['pro_id'])
						{
						   $pro_id = mysqli_real_escape_string($con, $_GET['pro_id']);
						   $search_pro = $con->prepare("SELECT * FROM products WHERE id = ?");
						   $search_pro->bind_param("i", $pro_id);
						   $search_pro->execute();
						   $r = $search_pro->get_result();
						   $total_price = 0;
						   $qty = 1;
						   while($row = $r->fetch_assoc())
						   {
							   $total_price = $row["productPrice"]+$row["shippingCharge"];
							   ?>
                        <tr class="text-uppercase text-dark font-weight-bold">
							    <td>
								  <p><?= $row["productName"] ?></p>
								</td>
								<td>
								<p><?= $qty ?></p>
								</td>
								<td>
								<p ><?= $row["productPrice"] ?></p>
								</td>
								<td>
								<p ><?= $row["shippingCharge"] ?></p>
								</td>
								<td>
								<p><?= $total_price ?></p>
								</td>
						</tr>
						
							   <?php
						   }
						}
						else if($_GET['data'] || $_GET['data'] == 'recieve')
						{	
						 $sql = $con->prepare("SELECT * FROM cart c, products p WHERE c.pro_id = p.id AND c.user_id = ?");
						 $sql->bind_param("i" , $user_id);
						 $sql->execute();
						 $r = $sql->get_result();
						while($data = $r->fetch_assoc())
						 {
							 $grand_total = $grand_total + $data["productPrice"]*$data["qty"] + $data["shippingCharge"];
							?>
                        <tr class="text-uppercase text-dark font-weight-bold">
							    <td>
								  <p><?= $data["productName"] ?></p>
								</td>
								<td>
								<p><?= $data["qty"] ?></p>
								</td>
								<td>
								<p ><?= $data["productPrice"] ?></p>
								</td>
								<td>
								<p ><?= $data["shippingCharge"] ?></p>
								</td>
								<td>
								<p><?= ($data["productPrice"] * $data["qty"])+$data["shippingCharge"] ?></p>
								</td>
						</tr>
							<?php  
							}
						}
						else if($_GET['order'])
						{
							$fetch_data = $con->prepare("SELECT * FROM special_order WHERE user_id = ? AND s_id = ?");
							$fetch_data->bind_param("ii", $_SESSION['login'] , $_GET['order']);
							$fetch_data->execute();
							$s_amount = 0;

							$res = $fetch_data->get_result();
							while($row = $res->fetch_assoc())
							{
								?>
                            <tr class="text-uppercase text-dark font-weight-bold">
							    <td>
								  <p>UNKNOWN</p>
								</td>
								<td>
								<p><?= $row["qty"] ?></p>
								</td>
								<td>
								<p ><?= $row["Amount"] ?></p>
								</td>
								<td>
								   <p>NULL</p>
								</td>
								<td>
								    <p><?=$s_amount =  $row['qty'] * $row['Amount'] ?></p>
								</td>
						</tr>
								<?php
							}
						}
						else
						{
							?>
                               <h2 class="text-center text-info text-uppercase">No Data Found</h2>
							   <script>
							       location.href="category.php";
							   </script>
							<?php
						}
							
					  }
					  else
					  {
                         ?>
                           <script>
						      location.href = "login.php";
						   </script>
						 <?php
					  }
					  ?>
					  <tfoot class="bg-primary">
					       <th colspan="3" rowspan="0">
							   <h4 class="text-uppercae">Grand total</h4>
						   </th>
						   <th colspan="2" rowspan="0">
						   <?php 
							   if($_GET['pro_id'])
							   {
								   ?>
								<h4 class="text-right font-weight-bold"><?= $total_price;?></h4>
								<?php
							   }  
							   else if($_GET['data'])
							   {
								   ?>
                                   <h4 class="text-right font-weight-bold"><?= $grand_total;?></h4>
								   <?php
							   }
							   else {
								?>
								<h4 class="text-right font-weight-bold"><?= $s_amount;?></h4>
								<?php
							   }
						   ?>
						   </th>
					  </tfoot>
				   </tbody>
				</table>
			</div>
                    <div class="col-md-6 col-sm-12 estimate-ship-tax">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-standard">
                                        <span class="estimate-title ">Billing Address And Payment </span>
										<ul style="float:right;padding-right:1rem;">
									  <li>
										<img src="assets\images\payments\3.png" alt="" class="mb-2">
										<img src="assets\images\payments\4.png" alt="" class="mb-2">
										<img src="assets\images\payments\5.png" alt="" class="mb-2">
									   </li>
									</ul>
                                    </th>
									
                                </tr>
                            </thead>
							
                            <tbody>
                                <tr>
                                    <td>

									<form id="ship_form" method="POST" action="">
											<div class="form-group">
                                                <label class="info-title" for="Billing State ">Shipping State
                                                    <span>*</span></label>
                                               <select class="form-control" name="state"  id="state" required>
											      <option value="">Select state</option>
											   </select>
											   <small></small>
                                            </div>
											<br>
                                            
                                            <div class="form-group">
											   <label class="info-title" for="Billing City">Shipping City
                                                    <span>*</span></label>
													<select class="form-control" name="city"  id="city" required>
											      <option value="">Select city</option>
											   </select>
											</div>
											   
											<div class="form-group">
                                                <label class="info-title" for="Billing City">Shipping Address
                                                    <span>*</span></label>
													<textarea id="address" name="address" cols="30" class="form-control" required autocomplete="off"></textarea>		
                                            </div>

											<div class="form-group">
                                                <label class="info-title" for="Billing City">Pin Code
                                                    <span>*</span></label>
													<input class="form-control"type="number" id="pin_code" name="pin_code" maxlength="6" required autocomplete="off">
                                            </div>
											<div class="form-group">
                                                <label class="info-title" for="Billing City">Debit Card Number
                                                    <span>*</span></label>
													<input class="form-control"type="number" id="Debit_number" name="Debit_number" maxlength="16" required autocomplete="off">
                                            </div>
											<div class="row">
											   <div class="col-sm-4">
												   <div class="form-group">
                                                     <label class="info-title" for="Billing City">CVV Number
                                                     <span>*</span></label>
													 <input class="form-control" type="number" id="CVV" name="CVV" maxlength="4" required autocomplete="off">
                                                   </div>
												</div>
												<div class="col-sm-8">
												<div class="form-group">
                                                     <label class="info-title" for="Billing City">Exp Date
                                                     <span>*</span></label>
													 <input class="form-control" type="date" id="exp_date" name="exp_date" required autocomplete="off">
                                                   </div>
												</div>
											</div>
											<button class="btn btn-danger btn-block pay" name="pay" type="submit">
											<?php 
												if($_GET['pro_id'])
												{
													echo 'Pay '. $total_price .' Rs.';
												}
												else if($_GET['data'])
												{
													echo 'Pay '. $grand_total .'  Rs.';
												}
												else {
													echo 'Pay '. $s_amount . '  Rs.';
												}
											?>
											</button>
											</form>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- second col off -->
	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					  
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
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
	<script>
	/* ======================================== THIS SCRIPT IS FOR GETTING THE STATE AND CITY ================================== */
	  function load_data(type , cat_id)
	  {
          $.ajax({
			  url : "action.php",
			  method : "POST",
			  data : {type : type, s_id : cat_id},
			  success : function(data){
				  if(type == "cityData")
				  {
					$("#city").html(data);
				  }
				  else
				  {
					$("#state").append(data);
				  }  
			  }
		  });
	  }
	  load_data();
	  $("#state").on("change" , function(){
		var state = $("#state").val();
		load_data("cityData" , state);
	  });
	</script>
    <script>
	      $(document).ready(function(){
               $("#ship_form").on("submit", (e) =>{
				var add = $("#address").val();
				var pcode = $("#pin_code").val();
				var card_num = $("#Debit_number").val();
				var cvv = $("#CVV").val();
				var date = $("#exp_date").val();
				var cardno = /^(?:3[47][0-9]{13})$/;
				var today = new Date();
				var inpDate = new Date(date); 

				if(!(add.match(/^[a-zA_Z, ]{4,100}$/)) || !(pcode.match(/^[0-9]{6}$/)))
				{
					alert("Address is wrong");
					return false;
				}
				else if(!card_num.match(cardno))
				{
					alert("Card number is invalid");
					return false;
				}
				else if(!cvv.match(/^[0-9]{3,4}$/))
				{
					alert("cvv number is invalid");
					return false;
				}
				else if(inpDate <= today)
				{
					alert("Your card has been expired");
					return false;
				}
				else{
					return true;
				}
			   })
		  });
	</script>
      
	 
</body>
</html>
