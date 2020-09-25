<?php
session_start();
include("includes/config.php");

date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );

/////////////// FIRST FETCH THE LAST COLUMN OF THE USER LOGS

$select_data = $con->prepare("SELECT * FROM userlog ORDER BY id DESC LIMIT 1");

$select_data->execute();
$result = $select_data->get_result();

$num = $result->num_rows;
if($num>0)
{
    $row = $result->fetch_assoc();
    $otp = $row['otp'];

    //////////////////////  update logout 

    $update = $con->prepare("UPDATE userlog SET status = 'inactive', logout = ? WHERE otp = ?");
    $update->bind_param('si', $ldate , $otp);
    $update->execute();

    if($update->execute())
    {
        session_destroy();
        $_SESSION['errmsg']="You have successfully logout";
        echo "you are logged out";
    }
}
?>
<script>
    location.href="index.php";
</script>

