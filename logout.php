<?php
include('customer/fn.php');
session_start();
if(isset($_SESSION["unique_idD"])){
    
msg("Logout Succesfully");
sendto("admin/Admin_login.html");
session_destroy();
}else{
session_destroy();

sendto('customer/cindexfa_Copy.php');
}?>