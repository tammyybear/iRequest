<?php    
    include "controllers/database_functions.php";
    include "controllers/basic_functions.php";
    include "database/config.php";

    $get_id=$_GET['id'];
    $department_name = $_POST['department_name'];
    $department_description = $_POST['department_description'];

    if(updateDatabase($conn, "UPDATE department_tb set department_name = '$department_name', department_description = '$department_description' where department_id ='$get_id'") == 1){
        redirectPageWithAlert("department.php", "Department Successfully Updated");
    }else{
        //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
        redirectPageWithAlert("department.php", "Error. Please Try Again");
    }

?>