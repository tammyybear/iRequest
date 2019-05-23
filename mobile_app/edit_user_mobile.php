<?php
include "../controllers/basic_functions.php";
session_start();

if($_SESSION['role_type'] == "Department Head"){
    redirectPagewithAlert("dashboard_department_head_mobile.php", "Please login in the browser to change password");
}else{
    redirectPagewithAlert("dashboard_department_member.php", "Please login in the browser to change password");
}


?>