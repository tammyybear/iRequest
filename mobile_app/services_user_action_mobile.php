<?php
session_start();
include "../database/config.php";
include "../controllers/database_functions.php";
include "../controllers/basic_functions.php";
include "../controllers/services_functions.php";
include "../controllers/users_functions.php";
include "../controllers/check_login.php";

if($_SESSION['role_type'] == "Admin"){
    $users_id = 0;
}else{
    $users_id = getUserDetailsByUsername($conn, $_SESSION['user'])[11];
}

$request_subject = $_POST['request_subject'];
$request_description = $_POST['request_description'];
$ticketId = get_TicketId($conn);

if(updateDatabase($conn, "INSERT into services_tb (users_id, request_subject, request_description, request_status, ticket_id) VALUES ('$users_id', '$request_subject', '$request_description', 'Open', '$ticketId')") == 1){
    if($_SESSION['role_type'] == "Admin"){
        redirectPageWithAlert("services_admin.php", "Request Successfully Added. Here is your Ticket ID: $ticketId");
    }else{
        redirectPageWithAlert("services_user_mobile.php", "Request Successfully Added. Here is your Ticket ID: $ticketId");
    }    
}else{
    if($_SESSION['role_type'] == "Admin"){
        redirectPageWithAlert("services_admin.php", "Error. Please Try Again");
    }else{
        redirectPageWithAlert("services_user_mobile.php", "Error. Please Try Again");
    }    
}
?>