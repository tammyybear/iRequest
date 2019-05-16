<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$department_id=$_GET['id'];

if(updateDatabase($conn, "DELETE FROM `department_tb` WHERE department_id='$department_id'") == 1){
    redirectPageWithAlert("department.php", "Department Successfully Deleted");
}else{
    redirectPageWithAlert("department.php", "Error. Please Try Again");
}
?>