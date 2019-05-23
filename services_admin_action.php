<?php
session_start();
include "database/config.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "controllers/check_login.php";

$get_id = $_GET['id'];
$request_subject = $_POST['request_subject'];
$request_description = $_POST['request_description'];


if(updateDatabase($conn, "UPDATE services_tb set request_status = 'Closed' where services_id = '$get_id'") == 1){
    redirectPageWithAlert("services_admin.php", "Request Successfully Closed");  
}else{
    redirectPageWithAlert("services_admin.php", "Error. Please Try Again");
}

?>