<?php
    include "controllers/database_functions.php";
    include "controllers/basic_functions.php";
    include "database/config.php";

    $get_id=$_GET['id'];

    if(updateDatabase($conn, "UPDATE users_tb set user_status = 'Inactive' where user_id='$get_id'") == 1){
        redirectPageWithAlert("user_management.php", "User Status Successfully Updated");
    }else{
        //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
        redirectPageWithAlert("user_management.php", "Error. Please Try Again");
    }

?>