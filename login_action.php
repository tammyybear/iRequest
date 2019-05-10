<?php
session_start();
include "database/config.php";
include "controllers/basic_functions.php";
include "controllers/database_functions.php";
include "controllers/users_functions.php";

$username = $_POST['username'];
$password = $_POST['password'];

if(countResult($conn, "SELECT * from admin_tb where admin_username = '$username' and admin_password = '$password'") == 1){
    $_SESSION['user'] = $username;
    $_SESSION['role_type'] = "Admin";
    redirectPagewithAlert("dashboard_dashboard.php", "Welcome Admin");
}elseif(countResult($conn, "SELECT * from users_tb where username = '$username' and password = '$password'") == 1){
    $_SESSION['user'] = $username;
    $role_type = getUserDetailsByUsername($conn, $username)[9];
    if($role_type = "Department Head"){
        $_SESSION['role_type'] = $role_type;
        redirectPagewithAlert("dashboard_department_head.php", "Welcome Department Head");
    }else{
        $_SESSION['role_type'] = "Department Member";
        redirectPagewithAlert("dashboard_department_member.php", "Welcome Department Member");
    }
}else{
    redirectPagewithAlert("index.php", "Invalid Username/Password");
}

?>