<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$name_extension = $_POST['name_extension'];
$mobile_number = $_POST['mobile_number'];
$address = $_POST['address'];
$username = $first_name.$last_name;
$password = "iRequest_12345";
$department_id = $_POST['department_id'];
$role_type = $_POST['role_type'];
$status = "";

if($role_type == "Department Head"){
    $status = "Active";
}else{
    $status = "Inactive";
}

if(countResult($conn, "SELECT * from users_tb where first_name = '$first_name' and last_name = '$last_name'") == 1){
    redirectPageWithAlert("add_user.php", "Error. Please Try Again");
}else{
    if(updateDatabase($conn, "INSERT into users_tb(first_name, middle_name, last_name, name_extension, mobile_number, address, username, password, department_id, role_type, user_status) VALUES ('$first_name', '$middle_name', '$last_name', '$name_extension', '$mobile_number', '$address', '$username', '$password', '$department_id', '$role_type', '$status')") == 1){
        redirectPageWithAlert("user_management.php", "User Successfully Added");
    }else{
        redirectPageWithAlert("add_user.php", "Error. Please Try Again");
    }
}
?>