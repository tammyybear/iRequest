<?php
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$facility_name = $_POST['facility_name'];
$facility_description = $_POST['facility_description'];

if(updateDatabase($conn, "INSERT into inventory_items_tb(item_name, item_description, inventory_cat_id) VALUES ('$facility_name', '$facility_description','1')") == 1){
    redirectPageWithAlert("facilities.php", "Facility Successfully Added");
}else{
    redirectPageWithAlert("facilities.php", "Error. Please Try Again");
}
?>