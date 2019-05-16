<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$inventory_item_id=$_GET['id'];

if(updateDatabase($conn, "DELETE FROM `inventory_items_tb` WHERE inventory_item_id='$inventory_item_id'") == 1){
    redirectPageWithAlert("facilities.php", "Facility Successfully Deleted");
}else{
    redirectPageWithAlert("department.php", "Error. Please Try Again");
}
?>