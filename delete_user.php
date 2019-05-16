<?php
session_start();
require "controllers/sessions_functions.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$get_id=$_GET['id'];

if(updateDatabase($conn, "DELETE FROM `users_tb` WHERE user_id='$get_id'") == 1){
    redirectPageWithAlert("user_management.php", "User Account Successfully Deleted");
}else{
    redirectPageWithAlert("user_management.php", "Error. Please Try Again");
}
?>