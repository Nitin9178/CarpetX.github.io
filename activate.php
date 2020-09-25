<?php 
   session_start();
   include 'includes/config.php';

  if(isset($_GET['token']))
  {
    $token  = $_GET['token'];
    $update = "UPDATE users SET u_status = 'active' WHERE token  = '$token'";

    $query = mysqli_query($con , $update);

    if($query)
    {
      if(isset($_SESSION['msg']))
      {
        $_SESSION['msg'] = "account activted successfully";
       ?>
          <script>
            location.href = "login.php";
          </script>
       <?php
      }
      else
      {
        $_SESSION['msg'] = "You are log out";
        ?>
          <script>
            location.href = "login.php";
          </script>
        <?php
      }
    }
    else
    {
      $_SESSION['msg'] = "You have not activted your account";
      ?>
       <script>
         location.href = "login.php";
       </script>
     <?php
    }
  }
?>