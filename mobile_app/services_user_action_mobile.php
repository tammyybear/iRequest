<?php
session_start();
include "../controllers/database_functions.php";
include "../controllers/basic_functions.php";
include "../database/config.php";
include "../controllers/check_login.php";

$ticketId = get_TicketId();
$request_subject = $_POST['request_subject'];
$request_description = $_POST['request_description'];
$users_id = getUserDetailsByUsername($conn, $_SESSION['user']);


if(countResult($conn, "SELECT * from services_tb where request_subject = '$request_subject' and request_description = '$request_description'") == 1){
        redirectPageWithAlert("services_user_mobile.php", "Error. Please Try Again");
}else{
    if(updateDatabase($conn, "INSERT into services_tb(users_id, request_subject, request_description, ticket_id) VALUES ('$users_id', '$request_subject', '$request_description', '$ticketId')") == 1){
        redirectPageWithAlert("services_user_mobile.php", "Request Successfully Added");
    }else{
        redirectPageWithAlert("services_user_mobile.php", "Error. Please Try Again");
    }
}
?>