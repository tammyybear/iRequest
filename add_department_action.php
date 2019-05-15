<?php

include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$department_name = $_POST['department_name'];
$department_description = $_POST['department_description'];

if(countResult($conn, "SELECT * from department_tb where department_name = '$department_name'") == 1){
    redirectPageWithAlert("department.php", "Error. Please Try Again");
}else{
    if(updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')") == 1){
        redirectPageWithAlert("department.php", "User Successfully Added");
    }else{
        redirectPageWithAlert("department.php", "Error. Please Try Again");
    }
}
?>