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
                    <li class='active'>Verification</li>
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
                        <p class="text-uppercase">Hello, Please Enter OTP to verify yourself</p>

                        <form class="outer-top-xs" id="verify_form">
                            <p id="response"></p>
                            <div class="form-group">
                                <label class="info-title" for="OTP">Verify OTP<span>*</span></label>
                                <input type="number" maxlength="5" class="form-control unicase-form-control text-input"
                                    id="otp" autocomplete="off" required>
                                <small></small>
                                <br>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button"
                                    id="G_OTP" class="mt-2">Verify OTP</button>
                            </div>
                        </form>
                    </div>
                    <!-- Verify-in -->
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
    <script>
      $(document).ready(function(){
    const form = document.getElementById("verify_form");
    const u_otp = document.getElementById("otp");
 
    form.addEventListener("submit" , (e) =>{
        e.preventDefault();
        otp_val();
    });
 
    const go_ahead = (verify) =>{
        let fg = document.getElementsByClassName("form-group");
        var count = fg.length - 1;
        for(var i=0; i<fg.length ; i++)
        {
            if(fg[i].className === "form-group success")
            {
                sRate = 0 + i;
                ok(verify , sRate , count);
            }
            else
            {
                return false;
            }
        }
    }

    const ok = (verify , sRate , count) =>{
         if(sRate === count)
         {
             $.ajax({
                url : "action.php",
                method : "post",
                data : { otp : verify},
                success : function(response)
                {
                   $("#response").html(response);
                  
                    
                },
                error : function(response)
                {
                    $("#response").html(response);  
                }
             });
         }
    }
    const otp_val = () =>{
        const verify = otp.value.trim();
        
        if(verify === '')
        {
           error_func(otp , 'This field is required')
        }
        else if(!verify.match(/^[0-9]{5}$/))
        {
            error_func(otp , '5 digits otp required'); 
        }
        else
        {
            ok_func(otp , '');
        }
        go_ahead(verify);
    }

    function error_func(input , errormsg)
    {
        const fg = input.parentElement;
        const small = fg.querySelector("small");
        fg.className = "form-group error";
        small.innerText = errormsg;
    }

    function ok_func(input , msg)
    {
        const fg = input.parentElement;
        const small = fg.querySelector("small");
        fg.className = "form-group success";
        small.innerText = msg;
    }
});
    </script>

</body>

</html>