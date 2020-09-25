
   function preback()
   {
       window.history.forward();
   }
   setTimeout("preback()" , 0);
   window.onunload = function(){null};

   $_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}