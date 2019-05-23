<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$automobile_name = $_POST['automobile_name'];
$automobile_plate = $_POST['automobile_plate'];

if(countResult($conn, "SELECT * from inventory_items_tb where item_name = '$automobile_name'") == 1){
    redirectPageWithAlert("automobiles.php", "Error. Please Try Again");
}else{
    if(updateDatabase($conn, "INSERT into inventory_items_tb(item_name, item_description, inventory_cat_id) VALUES ('$automobile_name', '$automobile_plate','2')") == 1){
        redirectPageWithAlert("automobiles.php", "Automobile Successfully Added");
    }else{
        redirectPageWithAlert("automobiles.php", "Error. Please Try Again");
    }
}
?>