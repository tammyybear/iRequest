<?php
require "controllers/sessions_functions.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$department_name = $_POST['department_name'];
$department_description = $_POST['department_description'];

if(updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')") == 1){
    redirectPageWithAlert("department.php", "Department Successfully Added");
}else{
    //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
    redirectPageWithAlert("department.php", "Error. Please Try Again");
}
?>