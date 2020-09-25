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
    <title>Admin| Special Orders</title>
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
                                <h3>Special Orders</h3>
                            </div>
                            <div class="module-body table">
                                <?php if(isset($_GET['del']))
{?>
                                <script>
                                alert("Order Deleted...!!!");
                                </script>
                                <?php } ?>

                                <br />


                                <table cellpadding="0" cellspacing="0"
                                    class="datatable-1 table table-bordered table-striped display table-responsive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> UserName</th>
                                            <th width="50">Email</th>
                                            <th>Contact</th>
                                            <th>Image</th>
                                            <th>Size</th>
                                            <th>Qty </th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
 $status = '1';
$query= $con->prepare("SELECT * FROM special_order so, users u WHERE so.user_id = u.id AND so.order_status = ?");
$query->bind_param("s", $status);
$query->execute();
$r = $query->get_result();

$cnt=1;
while($row=$r->fetch_array())
{
?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>

                                            <td><?php echo htmlentities($row['name']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['contactno']);?></td>
                                            <td><img src="productimages/s_order/<?= $row['product_img'] ?>" alt=""></td>
                                            <td><?php echo htmlentities($row['width']);?>*<?= htmlentities($row['height']) ?>
                                                ft</td>
                                            <td><?php echo htmlentities($row['qty']);?></td>
                                            <td><?php echo htmlentities($row['request_date']);?></td>
                                            <td><a href="order_reply.php?order_id=<?php echo htmlentities($row['s_id']);?>"
                                                    title="Reply" target="_blank"><i class="icon-edit"></i></a></td>
                                        </tr>

                                        <?php $cnt=$cnt+1; } ?>
                                    </tbody>
                                </table>
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
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
    </script>
</body>
<?php } ?>