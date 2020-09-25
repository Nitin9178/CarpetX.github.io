<!-- ====================================== PHP SCRIPT FOR GETTING SUBSCRIBERS STARTS =============================================================-->
<?php 
include 'includes/config.php'; ?>
<?php 
error_reporting(0);
   if(isset($_POST['subs']))
   {
       $mail = $_POST['subs'];
       $search = "SELECT * FROM subscriber WHERE s_user = '$mail'";
       $execute = mysqli_query($con , $search);

       $duplicate = mysqli_num_rows($execute);

       if($duplicate > 0)
       {
          ?>
<script>
alert("You have already subscribed...");
location.href = "index.php";
</script>
<?php
       }
       else
       {
           $insert = "INSERT INTO subscriber(s_user) VALUES('$mail')";
           $execute = mysqli_query($con , $insert);

           if($execute)
           {
            ?>
<script>
alert("You are subscriber now...");
location.href = "index.php";
</script>
<?php
           }
       }
   }
?>
<!-- ====================================== PHP SCRIPT FOR GETTING SUBSCRIBERS ENDS =============================================================-->

<!-- ====================================== LOGIN FORM DATA PROCESSING STARTS ============================================================== -->
<?php
error_reporting(0);
session_start();
   
   if(isset($_POST['user']) && isset($_POST['key']))
   {
       $email = mysqli_real_escape_string($con , $_POST['user']);
       $pass = mysqli_real_escape_string($con , $_POST['key']);

       date_default_timezone_set("Asia/kolkata");
       
       $search_user = $con->prepare("SELECT * FROM users WHERE email = ? AND u_status = 'active'");
       $search_user->bind_param("s", $email);
       $search_user->execute();
       $result = $search_user->get_result();
       

       $otp = rand(10000 , 99999);
      
       $duplicate = $result->num_rows;

       if($duplicate > 0)
      {
        $row = $result->fetch_assoc();
       
        $db_pass = $row['password'];
        $pass_match = password_verify($pass,$db_pass);

        if($pass_match)
        {
          $subject = "VERIFICATION MAIL";
          $body = "Hiii $name , please do not share this otp for security purpose $otp";
          $header = "From : Nitinofficial231@gmail.com";
          
          if(mail($email , $subject , $body , $header))
          {
            ?>
              <script>
                alert("An otp has been sent to your rgistered number");
               </script>
            <?php
            $insert = "INSERT INTO userlog(userEmail , otp , otp_date , is_expire , status) VALUES('$email' , '$otp' , '".date("Y-m-d H:i:s")."' , '0' , '0')";
            $insert_query = mysqli_query($con , $insert);
            ?>
               <script>
                  location.href = "verify.php";
               </script>
            <?php
          }
          else
          {
            ?>             
          <script>
               alert("email could not send. Please check internet connection");
          </script>
<?php
          }
        }
        else
        {
/* ====================================== BRUTE FORCE ATTACK/LOGIN FORM ATTEMPT PREVENTION STARTS ============================================================== */
        $try = time();
        $total_count++;
        $remain = 3 - $total_count;
        $insert_attempt = "INSERT INTO log_attempt(usermail , try_time)VALUES('$email' , '$try')";
        $attempt_res = mysqli_query($con , $insert_attempt);
          $Warning_msg =  "Please Enter valid details. $remain attempts remaining";
          echo $Warning_msg;


        $try_time = time() - 30;
        $search_attempt  = "SELECT * FROM log_attempt WHERE usermail = '$email' AND try_time>'$try_time'";
        $execute = mysqli_query($con , $search_attempt);

        $num = mysqli_num_rows($execute);
        
        if($num == 3)
        {
         ?>
             <script>
               alert("You have completed your attempts. Please login after 30 seconds");
               location.href = "index.php";
             </script>
         <?php
        }
/* ====================================== BRUTE FORCE ATTACK/LOGIN FORM ATTEMPT PREVENTION ENDS ============================================================== */
       }
      }
     else
       {
        ?>
<script>
alert("Email is not found");
</script>
<?php
       }
   }
?>

<!-- ====================================== LOGIN FORM DATA PROCESSING ENDS ============================================================== -->






<!--  ======================= REGISTRATION FORM DATA PROCESSING AND CRUD OPERATION STARTS ============================  -->
<?php 
error_reporting(0);
    if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['phone']) && isset($_POST['u_pass']) && isset($_POST['c_pass']))
    {
      $name = mysqli_real_escape_string($con , $_POST['name']);
      $mail = mysqli_real_escape_string($con , $_POST['mail']);
      $phone = mysqli_real_escape_string($con , $_POST['phone']);
      $pass = mysqli_real_escape_string($con , $_POST['u_pass']);
      $con_pass = mysqli_real_escape_string($con , $_POST['c_pass']);

      $enc_pass = password_hash($pass , PASSWORD_BCRYPT);

      $search = $con->prepare("SELECT * FROM users WHERE email = ?");
      $search->bind_param("s",  $mail);
      $search->execute();
      $result = $search->get_result();
      $duplicate = $result->num_rows;
      
      if($duplicate > 0)
      {
       ?>
          <script>
             alert("You are already registered.");
             location.href="login.php";
          </script>
       <?php
      }
      else
      {
        if($pass === $con_pass)
        {
          $row = $result->fetch_assoc();
        
          if($phone === $row['contactno'])
          {
           ?>
               <script>
                 alert("This number is already registered...");
                 location.href = "login.php"; 
              </script>
           <?php
          }
          $token = bin2hex(random_bytes(15));
          $subject = "VERIFICATION MAIL";
          $body = "Hiii $name , please click on this link to verify yourself http://localhost/shopping/activate.php?token=$token";
          $header = "From : Nitinofficial231@gmail.com";
          $_SESSION['msg'] ="Your account is not activated now";

          if(mail($mail ,$subject ,$body , $header))
          {
            ?>
            <script>
            alert("A mail has been sent to you registeres email. Please verify yourselft.");
            </script>
         <?php
            $insert = $con->prepare("INSERT INTO users(name , email , contactno , password , token , u_status)VALUES(?,?,?,?,?,?)");
            $insert->bind_param("ssisss", $name, $mail , $phone ,$enc_pass , $token , 'inactive');
            $insert->execute();
           
            if( $insert->execute())
            {
              ?>
<script>
alert("Data has been inserted successfully");
location.href = "login.php";
</script>
<?php
            }
            else
            {
              ?>
<script>
alert("There is an issue while inserting the data");
</script>
<?php
            }
          }
          else
          {
           ?>
              <script>
              alert("Mail can't send. Please check Internet Connections...")
              </script>
           <?php
          }
        }
        ?>
        <script>
        alert("Password Did not match...")
        </script>
     <?php
      }
    }
?>

<!--  ======================= REGISTRATION FORM DATA PROCESSING AND CRUD OPERATION ENDS ============================  -->


<!-- ===================================================== LOFIN VERIFICATION BY OTP =============================================================== -->
<?php 
error_reporting(0);
session_start();
   if(isset($_POST['otp']))
   {
     $otp = $_POST['otp'];
     $search_otp = "SELECT * FROM userlog WHERE otp = '$otp' AND is_expire != 1";
     $res = mysqli_query($con , $search_otp);
     $row = mysqli_num_rows($res);
     $r = mysqli_fetch_assoc($res);
     
     if($row > 0)
     {
       $update_query = "UPDATE userlog SET is_expire = 1 , status = 'active' WHERE otp = '$otp'";
       $result = mysqli_query($con , $update_query);

       if($result)
       {
         ///////////////// FETCH THE DATA FOR SESSION CREATION /////////////////////////////
         $email = $r['userEmail'];
         $search_mail = $con->prepare("SELECT * FROM users WHERE email = ?");
         $search_mail->bind_param('s', $email);
         $search_mail->execute();
         $res = $search_mail->get_result();
         $num = $res->num_rows;

         if($num>0)
         {
           $info = $res->fetch_assoc();
           $_SESSION['login'] = $info['id'];
           $_SESSION['username'] = $info['name'];
         }
         ?>
<script>
alert("You are logged in successfully");
location.href = "index.php";
</script>
<?php
       }
       else
       {
        ?>
<script>
alert("Operation could not performed");
</script>
<?php
       }
     }
     else
     {
      ?>
<script>
alert("Invalid otp");
location.href = "login.php";
</script>
<?php
       $lastid = $con->prepare("SELECT * FROM userlog ORDER BY id DESC");
       $lastid->bind_param();
       $lastid->execute();

       $res = $lastid-get_result();
       $r = $res->fetch_assoc();

       $del_id = $r['id'];

       $delete_otp = $con->prepare("DELETE FROM userlog WHERE id = '$del_id'");
       $delete_otp->bind_param("i", $del_id);
       $delete_otp->execute();

       $res = $delete_otp->get_result();
       $_SESSION['errmsg']="You have successfully logout";
       if($res)
       {
        destroy_session();
         ?>
             <script>
                 alert("Wrong OTP");
                 location.href = "login.php";
             </script>
         <?php
       }

     }
         
    }
?>

<!-- ================================================== PASSWORD RECOVERY BY SENDING OTP ================================================= -->
<?php 
   if(isset($_POST['data']))
   {
     $user = $_POST['data'];
     $search_user = "SELECT * FROM users WHERE email = '$user'";
     $result = mysqli_query($con , $search_user);
     $rec_otp = rand(10000 , 99999);
     $count = mysqli_num_rows($result);

     if($count > 0)
     {
       $row = mysqli_fetch_assoc($result);
       $name = $row['name'];

       $to_mail = $user;
       $subject = "PASSWORD UPDATION MAIL";
       $body = "Hiii $name , please do not share this otp for the security purpose $rec_otp";
       $header = "From : Nitinofficial231@gmail.com";
       $_SESSION['msg'] ="Please enter correct otp. It is valid for one time.";

       if(mail($to_mail , $subject , $body , $header))
       {
           $get_otp = "INSERT INTO userlog(userEmail , otp)VALUES('$user' , '$rec_otp')";
           mysqli_query($con , $get_otp);

           if(mysqli_query($con , $get_otp))
           {
             ?>
               <script>
                   alert("An OTP has been sent on your registered email account");
                   location.href = "reset.php";
               </script>
             <?php
           }
       }
       else
       {
        ?>
        <script>
            alert("Email can't send. Please check your internet connection");
        </script>
      <?php
       }
     }
     else
     {
      ?>
      <script>
          alert("No such mail found");
      </script>
    <?php
     }
   }
?>

<!-- ============================================== OTP VERIFICATION AND PASSWORD CHANGINGING CODES =========================================================== -->
<?php
     if(isset($_POST['otp']) && isset($_POST['pass']) && isset($_POST['c_pass']))
     {
        $g_otp = mysqli_real_escape_string($con ,$_POST['otp']);
        $new_pass = mysqli_real_escape_string($con ,$_POST['pass']);
        $con_new_pass = mysqli_real_escape_string($con ,$_POST['c_pass']);
        $secure_pass = PASSWORD_HASH($new_pass , PASSWORD_BCRYPT);

        $last_id = mysqli_insert_id($con);

        $verify_otp = "SELECT * FROM userlog WHERE otp = '$g_otp'";
        $true = mysqli_query($con , $verify_otp);
        $num_row = mysqli_num_rows($true);
        $row = mysqli_fetch_assoc($true);
        if($num_row > 0)
        {
          $email = $row['userEmail'];
          $update_pass = "UPDATE users SET password = '$secure_pass' WHERE email = '$email'";
          $execute  = mysqli_query($con , $update_pass);

          if($execute)
          {
            ?>
               <script>
                    alert("Your password has been updated");
                    location.href= "login.php";
               </script>
            <?php
          }
          else
          {
            ?>
            <script>
                 alert("Password could not update");
            </script>
         <?php
          }
        }
        else
        {
          $get_id = "SELECT * FROM userlog ORDER BY id DESC LIMIT 1";
           $result = mysqli_query($con , $get_id);
           $num_row = mysqli_fetch_assoc($result);
           $id = $num_row['id'];
          

          $delete_data = "DELETE FROM userlog WHERE id = '$id'";
          mysqli_query($con , $delete_data);

          if(mysqli_query($con , $delete_data))
          {
            ?>
            <script>
               alert("You have entered wrong otp");
               location.href = "forgot-password.php";
            </script>
            <?php
          }
        }
     }
?>

<!-- ================================================= CART CRUD FUNCTION ================================================================ -->

<?php 
     if(isset($_POST['pid']))
    {
      if(strlen($_SESSION["login"]) != 0)
      {
        $pid = mysqli_real_escape_string($con , intval($_POST['pid']));
        $u_id = mysqli_real_escape_string($con , $_SESSION["login"]);
        $qty = 1;
        
        $stmt = $con->prepare("SELECT * FROM cart WHERE pro_id = ? AND user_id = ?");
        $stmt->bind_param('ss', $pid , $u_id);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['pro_id'];
        $user = $r['user_id'];

        if(!$code && !$user)
        {
         $insert_data = $con->prepare("INSERT INTO cart(user_id , pro_id , qty) VALUES(?,?,?)");
         $insert_data->bind_param("iii" , $u_id  , $pid , $qty);
         $insert_data->execute();
          ?>
             <script>
                alert("Product has been inserted successfully");
             </script>
          <?php
        }
        else
        {
          ?>
             <script>
                alert("Product has been already inserted successfully");
             </script>
          <?php
        }
        }
        else
        {
          ?>
             <script>
               alert("Please login first");
               location.href = "login.php";
             </script>
          <?php
        }
    }
?>

<!-- ===================================================== CLEAR THE CART ============================================================= -->
<?php
session_start();
error_reporting(0);
    if(isset($_GET["clean"]) || isset($_GET["clean"]) == "all")
    {
      if(isset($_SESSION["login"]))
      {
         $clear = $con->prepare("DELETE FROM cart WHERE user_id = '".$_SESSION["login"]."'");
         $clear->bind_param("i", $_SESSION["login"]);
         $clear->execute();

         ?>
           <script>
             alert("Your cart is clear now");
             location.href="index.php";
           </script>
         <?php
      }
      else
      {
        ?>
        <script>
          alert("Please login to enjoy our deals");
          location.href="login.php";
        </script>
      <?php
      }
    }
?>

<!-- ================================================== PRODUCT NUMBER UPDATION ========================================================= -->
<?php 
  session_start();
  error_reporting(0);
  
  if(isset($_POST["qty"]))
  {
    if(isset($_SESSION["login"]))
    {
      $user = mysqli_real_escape_string($con , $_SESSION["login"]);
      $price = mysqli_real_escape_string($con , $_POST["price"]);
      $qty = mysqli_real_escape_string($con , $_POST["qty"]);
      $pid = mysqli_real_escape_string($con , $_POST["pro_id"]);

      $total = $qty * $price;

      $update = $con->prepare("UPDATE cart SET qty = ? WHERE pro_id = ? AND user_id = ?");
      $update->bind_param("iii", $qty , $pid , $user);
      $update->execute();
    }
  }
?>

<!--  ==================================================== DELETE A SINGLE PRODUCT ======================================================= -->
<?php 
    if(isset($_GET["pid"]))
    {
      if(isset($_SESSION["login"]))
      {
        $product_num = mysqli_real_escape_string($con , $_GET["pid"]);
        $user_num = mysqli_real_escape_string($con , $_SESSION["login"]);

        $del_pro = $con->prepare("DELETE FROM cart WHERE pro_id = ? AND user_id = ?");
        $del_pro->bind_param("ii", $product_num , $user_num);
        $del_pro->execute();
        ?>
             <script>
             location.href = "my-cart.php"; 
            </script>
        <?php
      }
      else
      {
        ?>
        <script>
          location.href = "login.php";
        </script>
        <?php
      }
    }
?>

<!-- ==================== All WISHLIST CRUD OPERATION ================== -->

<!--  ============== ADD TO WISHLIST ===============   -->
<?php
if(isset($_POST["p_id"]))
{
  if(isset($_SESSION["login"]))
  {
    $u_id = mysqli_real_escape_string($con , $_SESSION["login"]);
    $pro_id = mysqli_real_escape_string($con , $_POST['p_id']);

    $search_pro = $con->prepare("SELECT * FROM wishlist WHERE userId = ? AND productId = ?");
    $search_pro->bind_param("ii" , $u_id , $pro_id);
    $search_pro->execute();
    $r = $search_pro->get_result();
    $row = $r->fetch_assoc();

    $user = $row["userId"];
    $code = $row["productId"];
    if(!$user && !$code)
    {
      $insert_wish = $con->prepare("INSERT INTO wishlist(userId , productId)VALUES(? , ?)");
      $insert_wish->bind_param("ii", $u_id , $pro_id);
      $insert_wish->execute();
        ?>
           <script>
              alert("Product has been added successfully");
           </script>
       <?php
    }
    else
    {
      ?>
      <script>
         alert("Product is already in your wishlist");
      </script>
  <?php
    }
  }
}
?>

<!--  ============== DELETE FROM WISHLIST ===============   -->
<?php 
     error_reporting(0);
     if(isset($_GET["del"]))
     {
        if(isset($_SESSION["login"]))
        {
          $del_pro = mysqli_real_escape_string($con , $_GET["del"]);
          $user = mysqli_real_escape_string($con , $_SESSION["login"]);
          $delete = $con->prepare("DELETE FROM wishlist WHERE productId = ? AND userId = ?");
          $delete->bind_param("ii", $del_pro , $user);
          $delete->execute();

          ?>
            <script>
              alert("product removed from wishlist");
              location.href = "my-wishlist.php";
            </script>
          <?php
        }
        else
        {
          ?>
            <script>
              location.href="login.php";
            </script>
          <?php
        }
     }
?>

<!--  ============== ADD TO CART FROM WISHLIST ===============   -->
<?php 
   error_reporting(0);
   if(isset($_POST["pid"]))
   {
     if(isset($_SESSION["login"]))
     {
       $product = mysqli_real_escape_string($con , $_POST["pid"]);
       $user = mysqli_real_escape_string($con , $_SESSION["login"]);

       // FIRST CHECK THE CART AND THEN INSERT THE ITEM

       $search_cart = $con->prepare("SELECT * FROM cart WHERE pro_id = ? AND user_id = ?");
       $search_cart->bind_param("ii", $product, $user);
       $search_cart->execute();
       $r = $search_cart->get_result();
       $res = $r->fetch_assoc();
       $pro_id = $res["pro_id"];
       $user_id = $res["user_id"];
       $qty = 1;                        // IN THAT CASE IF USER AND PRODUCT DON'T EXIST IN CART

       if(!($pro_id && $user_id))
       {
         $insert_cart = $con->prepare("INSERT INTO cart(user_id , pro_id , qty)VALUES(?,?,?)");
         $insert_cart->bind_param("iii", $user , $product , $qty);
         $insert_cart->execute();
         ?>
             <script>
                alert("data added into cart");
             </script>
         <?php

         $delete_wish = $con->prepare("DELETE FROM wishlist WHERE userId = ? AND productId = ?");
         $delete_wish->bind_param("ii" , $user , $product);
         $delete_wish->execute();
       }
       else
       {
        ?>
        <script>
           alert("Data is already in the cart");
        </script>
    <?php
     $delete_pro = $con->prepare("DELETE FROM wishlist WHERE userId = ? AND productId = ?");
     $delete_pro->bind_param("ii" , $user , $product);
     $delete_pro->execute();
       }
     }
   }
?>

<!-- ============================== CRUD OPERATION FOR THE STATE AND CITY ===============================================-->

<?php 
error_reporting(0);
 if(isset($_SESSION["login"]))
 {
    if($_POST['type'] == "")
    {
      $sql = mysqli_query($con , "SELECT * FROM state");
      $str = "";
      while($row = mysqli_fetch_assoc($sql))
      {
        $str .= "<option value='{$row['state_id']}'>{$row['state_name']}</option>";
      }
    }
    else if($_POST['type'] == "cityData")
    {
      $sql = mysqli_query($con , "SELECT * FROM city WHERE state_id = {$_POST["s_id"]}");
      $str = "";
      while($row = mysqli_fetch_assoc($sql))
      {
        $str .= "<option value='{$row['city_id']}'>{$row['city_name']}</option>";
      }
    }
  echo $str;
 }
?>

<!-- ================================================= SPECIAL PRODUCT ORDER SUBMISSION REQUREST ======================================= -->
<?php 
if(($_FILES["pro_img"]["name"] != '') && ($_POST["pro_w"] != '') && ($_POST["pro_h"] != '') && ($_POST["qty"] != '') && ($_POST["yarn"] != '') && ($_POST["description"] != ''))
{
  if(isset($_SESSION['login']))
  {
    $u_id = mysqli_real_escape_string($con , $_SESSION['login']);
    $file = mysqli_real_escape_string($con , $_FILES["pro_img"]["name"]);
    $width =  mysqli_real_escape_string($con , $_POST["pro_w"]);
    $height =  mysqli_real_escape_string($con , $_POST["pro_h"]);
    $qty =  mysqli_real_escape_string($con , $_POST["qty"]);
    $yarn =  mysqli_real_escape_string($con , $_POST["yarn"]);
    $info =  mysqli_real_escape_string($con , $_POST["description"]);

    $status = 1;
    $extension = pathinfo($file , PATHINFO_EXTENSION);

    $new_name = rand(1000,9999) . "." .$extension;
    $path = "admin/productimages/s_order/" . $new_name;

    if(move_uploaded_file($_FILES["pro_img"]["tmp_name"] , $path))
    {
      $upload_request = $con->prepare("INSERT IGNORE INTO special_order(user_id , product_img , width , height , qty ,  yarn , description,  order_status)VALUES(?,?,?,?,?,?,?,?)");
      $upload_request->bind_param("isiiiiss", $u_id,$new_name,$width ,$height,$qty,$yarn,$info,$status);
      $upload_request->execute();
      ?>
        <script>
           alert("We have accepted your order. Please wait for confirmation.")
           location.href = "special.php";
        </script>
      <?php
    }
  } 
}
 
?>

<!-- ======================================================= CANCEL THE ORDER IF USER DOES NOT WANT ===================================================== -->
<?php
     if($_GET['cancel_or'])
     {
       if(isset($_SESSION['login']))
       {
            date_default_timezone_set('Asia/Kolkata');
            $cust_id = mysqli_real_escape_string($con , $_SESSION['login']);
            $cancel_id = mysqli_real_escape_string($con , $_GET['cancel_or']);

            //////// FIRST FETCH THE TIME AND CHECK FOR WHETHER IT CAN BE CANCELLED OR NOT
            $select_data = $con->prepare("SELECT * FROM special_order WHERE user_id = ? AND s_id = ?");
            $select_data->bind_param("ii", $cust_id, $cancel_id);
            $select_data->execute();
            $r = $select_data->get_result();
            $row = $r->fetch_assoc();
            $order_time = strtotime($row['request_date']);   ////// DATABASE TIME
            $current_time = strtotime(date("h:i:s" , time())); ////// CURRENT TIME

             $get_time = $current_time - $order_time;
             $get_minutes = floor($get_time/60);
            if($get_minutes > 15)
            {
                ?>
                   <script>
                      alert("Order can not be cancelled");
                      location.href = "special_order.php";
                   </script>
                <?php
            }
            else
            {
                 $update_order = $con->prepare("UPDATE special_order SET order_status='0' WHERE user_id = ? AND s_id = ?");
                 $update_order->bind_param("ii", $cust_id , $cancel_id);
                 $update_order->execute();
                 ?>
                    <script>
                       alert("Your order has been cancelled");
                       location.href = "special_order.php";
                    </script>
                 <?php
            }
       }
       else
       {
         ?>
            <script>
                alert("Please login first");
                location.href="login.php";
            </script>
         <?php
       }
     }
?>

<!--   ================================================ CANCEL THE ORDER ============================================================ -->

<?php 
  if(isset($_GET['cancel_order']))
  {
    if(isset($_SESSION['login']))
    {
     //////////// FIRST LET'S FETCH THE ORDER TIME AND DATE
     $current_date =  date_default_timezone_set('Asia/Kolkata');
       $fetch_order = $con->prepare("SELECT * FROM orders WhERE userId = ? AND o_id = ?");
       $fetch_order->bind_param("ii", $_SESSION['login'] , $_GET['cancel_order']);
       $fetch_order->execute();
       $res = $fetch_order->get_result();
       $r = $res->fetch_assoc();
       $order_date = strtotime($r['orderDate']);
       $current_date = strtotime(date("Y:m:d H:i:s", time()));

       $order_min = floor($order_date/60);
       $current_min = floor($current_date/60);

       $difference = ($current_min - $order_min);
    
        if($difference > 15)
        {
          ?>
            <script>
               alert("Order can not cancel now");
               location.href = "order-history.php";
            </script>
          <?php
        }
        else
        {
          $update_order = $con->prepare("UPDATE orders SET orderStatus = 0 WHERE userId=? AND o_id = ?");
          $update_order->bind_param("ii", $_SESSION['login'] , $_GET['cancel_order']);
          $update_order->execute();
          ?>
          <script>
             alert("Order can  cancel now");
          </script>
        <?php
        }
    }
  }
?>
