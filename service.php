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

    <title>Shopping Portal | Special_order </title>

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
    <link rel="stylesheet" href="assets/css/service.css">

    <!-- Custome style sheet -->
    <link rel="stylesheet" href="css/signin.css">


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
                    <li><a href="index.php">Home</a></li>
                    <li class='active'>Service</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="user_pro">
        <div class="container">
            <div id="show_msg"></div>
            <div class="user_choice">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                          if($_SESSION['login'])
                          {
                            ?>
                        <h2 class="text-capitalize text-center text-info">Please '<?= $_SESSION['username'] ?>' Provide
                            product information to get your desired carpet</h2>
                            <table class="table table-bordered table-stripped">
                                <thead>
                                    <th>Please Fill the form</th>
                                </thead>
                                <tbody>
                                    <tr class=" text-uppercase">
                                        <td>
                                        <form role="form" id="service_form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Upload Image</label>
                                                        <input type="file" id="pro_img" name="pro_img" class="form-control" required
                                                            accept="image/*">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Image Width</label>
                                                        <input type="number" id="pro_w" name="pro_w" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Image Height</label>
                                                        <input type="number" id="pro_h" name="pro_h" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input type="number" id="qty" name="qty" class="form-control" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>select yarn</label>
                                                        <select required id="yarn" name="yarn" class="form-control">
                                                            <option value="">-- Select Yarn --</option>
                                                            <?php
                                                        ////// FETCHING THE AVAILABLE YARNS FOR THE CARPETS
                                                        $fetch_yarn = $con->prepare("SELECT * FROM available_yarn");
                                                        $fetch_yarn->bind_param();
                                                        $fetch_yarn->execute();
                                                        $r = $fetch_yarn->get_result();
                                                        while($row = $r->fetch_assoc())
                                                        {
                                                            ?>
                                                            <option value="<?= $row['yarn_id'] ?>">
                                                                <?= $row["yarn_name"] ?></option>
                                                            <?php
                                                        }
                                                     ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea name="description" id="description" cols="30"
                                                            class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="text-align:center;">
                                                <button class="btn btn-danger text-uppercase upload">Upload</button>
                                            </div>
                                             </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                          }
                          else
                          {
                            ?>
                        <h2 class="text-capitalize text-center text-info">Please login first</h2>
                        <script>
                        location.href = "login.php";
                        </script>
                        <?php
                          }
                      ?>
                    </div>
                </div>
            </div>
            <hr>
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
    $("#pro_img").on("change" , function(){
        const form = document.getElementById("service_form");

       form.addEventListener("submit", (e) => {
           e.preventDefault();
           var formData = new FormData(form);
           data_val(formData);
       });
  
      const data_val = (formData) =>{
          var img  = $("#pro_img").val();
          var img_name = img.name;
          var img_size = img.size;
          var width = $("#pro_w").val();
          var height = $("#pro_h").val();
          var qty = $("#qty").val();
          var yarn = $("#yarn").val();
          var description = $("#description").val();
          formData.append("pro_img" , img);
          

          var img_reg = /\.(gif|jpe?g|tiff?|png|webp|bmp)$/i;


          if(!img.match(img_reg))
          {
              alert('Invalid file');
              return false;
          }
          else if(img_size > 50000)
          {
           alert('Imge size must be lower than 50000 kb');
              return false;
          }
          else if((width<2 && height<2)||(width<1 || height<1))
          {
            alert('Imge size must be lower than 50000 kb');
              return false;
          }
          else if(!description.match(/^[a-z,. ]{5,500}$/i))
          {
            alert('Please give proper description');
              return false;
          }
          else
          {
              upload(formData);
              return true;
          }
      }

      const upload = (formData) =>{
          $.ajax({
              url : "action.php",
              method : "POST",
              data : formData,
              contentType : false,
              processData : false,
              success : function(response)
              {
                  $("#show_msg").html(response);
                  $("#service_form").trigger("reset")
              },
              error : function(response)
              {
                  console.log(response);
              }
          });
      }
    });
    </script>

</body>

</html>