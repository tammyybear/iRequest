<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$facility_name = $_POST['facility_name'];
$facility_description = $_POST['facility_description'];

if(countResult($conn, "SELECT * from inventory_items_tb where item_name = '$facility_name'") == 1){
    redirectPageWithAlert("facilities.php", "Error. Please Try Again");
}else{
    if(updateDatabase($conn, "INSERT into inventory_items_tb(item_name, item_description, inventory_cat_id) VALUES ('$facility_name', '$facility_description','1')") == 1){
        redirectPageWithAlert("facilities.php", "Facility Successfully Added");
    }else{
        redirectPageWithAlert("facilities.php", "Error. Please Try Again");
    }
}
?>