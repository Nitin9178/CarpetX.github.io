<?php
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

    <title>My Account</title>

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
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
                    <li><a href="#">Home</a></li>
                    <li class='active'>Special_order</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="fetch_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-2 my-2">
                    <table class="table table-bordered table-striped rounded" id="order_table">
                        <thead>
                            <tr>
                                <th>Pro Num</th>
                                <th>Image</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Yarn</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                         if($_SESSION["login"])
                         {
                            $fetch_detail = $con->prepare("SELECT * FROM special_order WHERE user_id = ?");
                            $fetch_detail->bind_param('i', $_SESSION['login']);
                            $fetch_detail->execute();
                            $r = $fetch_detail->get_result();
                            $num = 1;
                            while($row = $r->fetch_assoc())
                            {
                                ?>
                            <tr class="text-center text-uppercase">
                                <td> <h4><?= htmlentities($num); ?></h4> </td>
                                <td>
                                  <img src="admin/productimages/s_order/<?= $row['product_img'] ?>" alt="image" width="100" height="100">
                                </td>
                                <td><h4><?= htmlentities($row['width']) ?> * <?= htmlentities($row['height']) ?> ft</h4></td>
                                <td><h4><?= htmlentities($row['qty']) ?></h4></td>
                                <td><h4><?= htmlentities($row['yarn']) ?></h4></td>
                                <td><h4><?= htmlentities($row['description']) ?></h4></td>
                                <td>
                                    <?php 
                                       if($row['order_status'] == 0)
                                       {
                                           ?>
                                           <button class="btn btn-secondary p-2 disabled"><i class="fa fa-2x fa-trash"></i></button>
                                           <?php
                                       }
                                       else
                                       {
                                           ?>
                                           <a href="action.php?cancel_or=<?=htmlentities($row['s_id'])?>" class="btn btn-danger p-2"><i class="fa fa-2x fa-trash"></i></a>
                                           <?php
                                       }
                                    ?>
                                </td>
                            </tr>

                            <?php
                            $num++;
                            }
                         }
                      ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
    </script>

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
      $(document).ready( function () {
    $('#order_table').DataTable();
} );
    </script>

</body>

</html>