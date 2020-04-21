<?php
session_start();
include "../controllers/database_functions.php";
include "../controllers/basic_functions.php";
include "../database/config.php";
include "../controllers/check_login.php";
include "../controllers/users_functions.php";

$user_id = getUserDetailsByUsername($conn, $_SESSION['user'])[11];
$inventory_item_id = $_POST['inventory_item'];
$date_from_requested = $_POST['date_from_requested'];
$date_to_requested = $_POST['date_to_requested'];
$status = "Pending";
$category = $_POST['category'];

if(checkDatesValidity($date_from_requested, $date_to_requested) == 1){
    if(countResult($conn, "SELECT * from bookings_tb where users_id = '$user_id' and inventory_item_id = '$inventory_item_id' and date_from_requested = '$date_from_requested' and date_to_requested = '$date_to_requested'") == 1){
        redirectPageWithAlert("reserve_first_step.php", "You have already made a reservation for this.");
    }else{
        if(countResult($conn, "SELECT * from booking_tb where inventory_item_id = '$inventory_item_id' and (date_from_requested BETWEEN '$date_from_requested' and '$date_to_requested' or date_to_requested BETWEEN '$date_from_requested' and '$date_to_requested')") == 1){
            redirectPageWithAlert("reserve_first_step.php", "There is already reservation for this");
        }else{

            if(updateDatabase($conn, "INSERT into bookings_tb(users_id,inventory_item_id, date_from_requested, date_to_requested, status, category) VALUES('$user_id', '$inventory_item_id', '$date_from_requested', '$date_to_requested', '$status', '$category')") == 1){
                redirectPageWithAlert("reserve_first_step.php", "Reservation Request Sent. Please make sure the letter was sent to the Admin for approval.");
            }else{
                redirectPageWithAlert("reserve_first_step.php", "Error. Please Try Again");
            }

        }
    }
}else{
    redirectPageWithAlert("reserve_first_step.php", checkDatesValidity($date_from_requested, $date_to_requested));
}
?>