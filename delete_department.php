<?php
require "controllers/sessions_functions.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$department_id=$_GET['id'];

if(updateDatabase($conn, "DELETE FROM `department_tb` WHERE department_id='$department_id'") == 1){
    redirectPageWithAlert("department.php", "Department Successfully Deleted");
}else{
    //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
    redirectPageWithAlert("department.php", "Error. Please Try Again");
}

?>