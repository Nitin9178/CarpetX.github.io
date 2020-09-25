/* ========================================= INDEX.PHP PAGE VALIDATION ========================================== */

$(document).ready(function(){
    $("#user_form").on("submit" , (e) =>{
		e.preventDefault();
		var user = $("#inputuser").val();
		var pass = $("#inputPassword").val();

		
		 if(!user.match(/^[A-Za-z]{3,20}$/))
		{
			alert("Username is invalid");
			return false;
		}
		else if(!pass.match(/^[A-Za-z0-9@!*#._]{4,40}$/))
		{
			alert("Password is invalid");
			return false;
		}
		else
		{
			$.ajax({
				url : "action.php",
				method : "POST",
				data : $("#user_form").serialize() +'&action=checkuser',
				success : function(response)
				{
					$("#response").html(response);
				}
			});
		}
	})
});

/* ========================================= CHANGE-PASSWORD.PHP PAGE VALIDATION ========================================== */

$(document).ready(function(){
	$("#chngpwd").on("submit" , (e) =>{
		e.preventDefault();

		var old_pass = $("#password").val();
		var new_pass = $("#newpassword").val();
		var con_pass = $("#confirmpassword").val();

		if(!old_pass.match(/^[A-Za-z0-9@!*#._]{4,40}$/))
		{
			alert("old password did not match with specified requirement");
			return false;
		}
		else if(!new_pass.match(/^[A-Za-z0-9@!*#._]{4,40}$/))
		{
			alert("New password did not match with specified requirement");
			return false;
		}
		else if(!con_pass.match(/^[A-Za-z0-9@!*#._]{4,40}$/))
		{
			alert("confirm password did not match with specified requirement");
			return false;
		}
		else if(con_pass != new_pass)
		{
			alert("confirm password did not match with new password");
			return false;
		}
		else
		{
            $.ajax({
				 url : "action.php",
				 method : "POST",
				 data : $("#chngpwd").serialize() + "&act=changepass",
				 success : function(response)
				 {
					 $("#msg").html(response);
					 $("#chngpwd").trigger("reset");
				 }
			});
		}	
	})
});

$(document).ready(function(){
   $("#order_reply").on("submit" , (e) =>{
	   e.preventDefault();
	   
	   var order_id = $("#order_id").val();
	   var mail = $("#user_email").val();
	   var price = $("#order_price").val();
	   var shipping = $("#s_c").val()

	   var check_price = Math.sign(price);

	   var reply = $("#answer").val();

	   if(!reply.match(/^[A-Za-z ]{5,100}$/))
	   {
		   $("#msg").append("Given Description is invalid");
		   return false;
	   }
	   else if(!price.match(/^[0-9]{1,100}$/))
	   {
		   $("#msg").append("Please enter valid price");
		   return false;
	   }
	   else if(Math.sign(shipping) != 1)
	   {
		$("#msg").append("Negative number is not allowed");
		return false;
	   }
	  
	   else
	   {
		   $.ajax({
			   url : "action.php",
			   method : "POST",
			   data : {order_id : order_id, email : mail, price:price, shipping:shipping, answer:reply},
			   success : function(response)
			   {
				   $("#msg").html(response);
				   $("#order_reply").trigger("reset");
			   },
			   error : function(response)
			   {
				   $("#msg").html(response);
			   }
		   });
		   return true;
	   }
   })
});