<?php 
     $to_mail = "nitin.sinha9178@gmail.com";
     $subject = "VERIFICATION MAIL";
     $body = "Hiii , this is for test";
     $header = "From : nitinofficial231@gmail.com";
     
     if(mail($to_mail , $subject , $body , $header))
     {
       echo "msg sent";
     }
     else{
      echo "msg not sent";
     }
?>