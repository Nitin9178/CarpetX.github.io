<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Order_reply</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>

</head>

<body>
    <?php include('include/header.php');?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php');?>
                <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Reply for orders</h3>
                            </div>
                            <div class="module-body">


                                <br />
                                <form class="form-horizontal row-fluid" id="order_reply">
                                    <?php 
                                    if(isset($_GET['order_id']))
                                    {
                                        if(isset($_SESSION['alogin']))
                                        {
                                            $order_id = mysqli_real_escape_string($con,  $_GET['order_id']);
                                            $query = $con->prepare("SELECT * FROM special_order s, users u WHERE s.s_id = ? AND s.user_id = u.id");
                                            $query->bind_param("i", $order_id);
                                            $query->execute();
                                            $r = $query->get_result();
                                            while($row = $r->fetch_array())
                                            {
                                                ?>
                                    <p style="font-family:cursive;font-size:13px;color:red;text-align:center;" id="msg">
                                    </p>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Order Id</label>
                                        <div class="controls">
                                            <input type="number" value="<?= htmlentities($order_id) ?>" id="order_id" name="order_id" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">User Mail</label>
                                        <div class="controls">
                                            <input type="email" value="<?= htmlentities($row['email']) ?>" id="user_email" name="user_email" class="span8 tip" disabled>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Price</label>
                                        <div class="controls">
                                            <input type="number" id="order_price" name="order_price" class="span8 tip">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Shipping charge</label>
                                        <div class="controls">
                                            <input type="number" id="s_c" name="s_c" class="span8 tip">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Reply</label>
                                        <div class="controls">
                                            <textarea class="span8 tip" name="answer" id="answer" cols="30"
                                                rows="7" required></textarea>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Submit</button>
                                        </div>
                                    </div>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                              <script>
                                                  alert("You are not logged in");
                                                  location.href = "index.php";
                                              </script>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                          <h1 class="text-center text-danger font-weight-bold" style="font-family:cursive;">No order updation query found</h1>
                                        <?php
                                    }
                                ?>
                                </form>
                            </div>
                        </div>



                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include('include/footer.php');?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="./scripts/validate.js"></script>

</body>
<?php } ?>