<?php
    include "controllers/database_functions.php";
    include "controllers/basic_functions.php";
    include "database/config.php";

    $department_id=$_GET['department_id'];

    if(updateDatabase($conn, "DELETE FROM `department_tb` WHERE department_id='$department_id'") == 1){
        redirectPageWithAlert("user_management.php", "User Account Successfully Deleted");
    }else{
        //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
        redirectPageWithAlert("user_management.php", "Error. Please Try Again");
    }

?>