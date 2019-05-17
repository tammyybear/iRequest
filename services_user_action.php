<?php
session_start();
include "database/config.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "controllers/services_functions.php";
include "controllers/check_login.php";

$user_id = $_SESSION['users_id'];
$request_subject = $_POST['request_subject'];
$request_description = $_POST['request_description'];
$ticketId = get_TicketId($conn);



// if(countResult($conn, "SELECT * from inventory_items_tb where item_name = '$automobile_name'") == 1){
//     redirectPageWithAlert("faciautomobileslities.php", "Error. Please Try Again");
// }else{
//     if(updateDatabase($conn, "INSERT into inventory_items_tb(item_name, item_description, inventory_cat_id) VALUES ('$automobile_name', '$automobile_plate','2')") == 1){
//         redirectPageWithAlert("automobiles.php", "User Successfully Added");
//     }else{
//         redirectPageWithAlert("automobiles.php", "Error. Please Try Again");
//     }
// }
?>