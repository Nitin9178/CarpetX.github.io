<?php
session_start();
error_reporting(0);
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

	    <title>Shopping Portal | Forgot Password</title>

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
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forgot Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Forgot password</h4>
	<p id="response"></p>
	<form class="forgot-form outer-top-xs" id="forgot_form" >
	<span style="color:red;" ></span>
		<div class="form-group">
		    <label>Email Address <span>*</span></label>
		    <input type="email" id="rec_email" class="form-control unicase-form-control text-input" autocomplete="off" required>
			<small></small>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" id="change">Change</button>
	</form>					
</div>
<!-- Sign-in -->


<!-- create a new account -->			</div><!-- /.row -->
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
    <script>
	   $(document).ready(function () {
    const form = document.getElementById("forgot_form");
    const mail = document.getElementById("rec_email");
    

    form.addEventListener("click", (e) => {
        e.preventDefault();
        rec_val();
    });

    const rec_val = () => {
        const r_mail = rec_email.value.trim();

        if (r_mail === '') {
            error(rec_email, 'Email required');
        }
        else if (!r_mail.match(/^[A-Za-z0-9._]+@[a-zA-Z0-9._]+\.[A-Za-z]{2,3}$/)) {
            error(rec_email, 'Email required');
        }
        else {
            success(rec_email, '');
        }
        proceed(r_mail);
    }


    function error(input , errorMsg)
    {
        const fg = input.parentElement;
        const small = fg.querySelector("small");
        fg.className = "form-group error";
        small.innerText = errorMsg; 
    }
    function success(input , successMsg)
    {
        const fg = input.parentElement;
        const small = fg.querySelector("small");
        fg.className = "form-group success";
        small.innerText = successMsg; 
    }

    const proceed = (r_mail) =>{
       let fg = document.getElementsByClassName("form-group");
       var count = fg.length - 1;
       for(var i=0; i<fg.length ; i++)
       {
           if(fg[i].className === "form-group success")
           {
               sRate = 0+i;
               sendData(r_mail , count , sRate);
           }
           else
           {
               return false;
           }
       }
    }

    const sendData = (r_mail , count , sRate) =>{
        if(sRate === count)
        {
            $.ajax({
              url : "action.php",
              method : "POST",
              data : { data : r_mail},
              success : function(response)
              {
				 $("#response").html(response);
				 $("#forgot-form").trigger("reset");
              },
              error : function(response)
              {
                $("#response").html(response);
              }
            });
        }
    }
});
	</script>
	

</body>
</html>