<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$get_id=$_GET['id'];
$get_checker=$_GET['checker'];
$get_item = $_GET['item'];


if($get_checker == "1"){
    if(updateDatabase($conn, "UPDATE bookings_tb set status = 'Approved' where booking_id ='$get_id'") == 1){
        redirectPageWithAlert("reservations_admin.php", "Reservation is now Approved");
    }else{  
        redirectPageWithAlert("reservations_admin.php", "Error. Please Try Again");
    }
}else {
    if(updateDatabase($conn, "UPDATE bookings_tb set status = 'Disapproved' where booking_id ='$get_id'") == 1){
        redirectPageWithAlert("reservations_admin.php", "Reservation is now Approved");
    }else{  
        redirectPageWithAlert("reservations_admin.php", "Error. Please Try Again");
    }
}


if($get_checker == "1"){
    if(countResult($conn, "SELECT * from bookings_tb where (date_from_requested = '' ) and inventory_item_id = '$get_item'"))  {}
}

?>

