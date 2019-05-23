<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";
include "controllers/services_functions.php";
include "controllers/users_functions.php";

$ticketId = get_TicketId();
$request_subject = $_POST['request_subject'];
$request_description = $_POST['request_description'];
if($_SESSION['role_type'] == "Admin"){
    $users_id = 0;
}else{
    $users_id = getUserDetailsByUsername($conn, $_SESSION['user']);
}

if(countResult($conn, "SELECT * from services_tb where request_subject = '$request_subject' and request_description = '$request_description'") == 1){
    if($_SESSION['role_type'] == "Admin"){
        redirectPageWithAlert("services_admin.php", "Error. Please Try Again");
    }else{
        redirectPageWithAlert("services_user.php", "Error. Please Try Again");
    }
}else{
    if(updateDatabase($conn, "INSERT into services_tb(users_id, request_subject, request_description, ticket_id) VALUES ('$users_id', '$request_subject', '$request_description', '$ticketId')") == 1){
        if($_SESSION['role_type'] == "Admin"){
            redirectPageWithAlert("services_admin.php", "Request Successfully Added");
        }else{
            redirectPageWithAlert("services_user.php", "Request Successfully Added");
        }
    }else{
        if($_SESSION['role_type'] == "Admin"){
            redirectPageWithAlert("services_admin.php", "Error. Please Try Again");
        }else{
            redirectPageWithAlert("services_user.php", "Error. Please Try Again");
        }
    }
}
?>