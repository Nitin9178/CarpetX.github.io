<?php 
session_start();
   include 'include/config.php';
?>

<?php 
	if(isset($_POST['action']) && isset($_POST['action']) == 'checkuser')
	{
		$username = mysqli_real_escape_string($con , $_POST['username']);
		$key = md5(mysqli_real_escape_string($con , $_POST['password']));
		$total_count = 0;

		$search_user = $con->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
		$search_user->bind_param('ss' , $username , $key);
		$search_user->execute();
		$result = $search_user->get_result();
		$row = $result->num_rows;
		if($row > 0)
		{
			$num = $result->fetch_assoc();

            $_SESSION['alogin']=$_POST['username'];
			$_SESSION['id']=$num['id'];
			?>
              <script>
				 alert("You are logged in");
				 location.href="change-password.php";
			  </script>
			<?php
		}
		else
		{
			?>
            <script>
			  alert("Username or password is incorrect");
			</script>
			<?php
			close();
		}	
	}
?>
<?php 
     if(isset($_POST['act']) && isset($_POST['act']) == 'changepass')
	 {
		if($_SESSION['id'])
		{
			$old_pass = md5(mysqli_real_escape_string($con, $_POST['password']));
		$new_pass = md5(mysqli_real_escape_string($con , $_POST['newpassword']));
		$con_pass = mysqli_real_escape_string($con , $_POST['confirmpassword']);

		$search_pass = $con->prepare("SELECT * FROM admin WHERE password = ? AND id = ?");
		$search_pass->bind_param("si", $old_pass , $_SESSION['id']);
		$search_pass->execute();
		$res = $search_pass->get_result();
		$num = $res->num_rows;

		if($num > 0)
		{
			$update_pass = $con->prepare("UPDATE admin SET password = ? WHERE id = ?");
			$update_pass->bind_param("si" , $new_pass , $_SESSION['id']);
			$update_pass->execute();
			echo "Password has been updated";
			exit();
		}
		else
		{
			echo "You have given wrong password";
			exit();
		}
		}
		else
		{
			echo "Please login first";
			?>
               <script>
			      location.href = "index.php";
			   </script>
			<?php
		}
	 }
?>

<?php 
	if(isset($_POST['order_id']) && isset($_POST['email']) && isset($_POST['answer']) && isset($_POST['price']) && isset($_POST['shipping']))
     {
		 if($_SESSION['id'])
		 {
			$o_id = mysqli_real_escape_string($con , $_POST['order_id']);
			$u_email = mysqli_real_escape_string($con , $_POST['email']);
			$p_price = mysqli_real_escape_string($con , $_POST['price']);
			$s_charge = mysqli_real_escape_string($con , $_POST['shipping']);
			$reply = mysqli_real_escape_string($con , $_POST['answer']);

			$total_amount = $p_price + $s_charge;

			  
			$fetch_name = $con->prepare("SELECT * FROM users where email = ?");
			$fetch_name->bind_param("s", $u_email);
			$fetch_name->execute();

			$r = $fetch_name->get_result();

			$row = $r->fetch_assoc();
			$name = $row['name'];
			$id = $row['id'];
			
			$subject = "VERIFICATION MAIL";
			if($total_amount == 0)
			{
				$body = "Hiii $name , $reply";
			}
			else {
				$body = "Hiii $name , Please click on this link to pay http://localhost/shopping/payment-method.php?order=$o_id";	
			}
			$header = "From : Nitinofficial231@gmail.com";

			if(mail($u_email , $subject, $body , $header))
			{
				echo "Mail has been sent";
				$update_table = $con->prepare("UPDATE special_order SET Amount = ? WHERE user_id = ?");
				$update_table->bind_param("ii", $total_amount , $id);
				$update_table->execute();
			}
			else
            {
				echo "Check Internet connection";

			}
		 }
		 else
		 {
			 echo "You are not logged in. Please login";
			 ?>
			    <script>
				     location.href = "index.php";
				</script>
			 <?php
		 }
	 }
?>