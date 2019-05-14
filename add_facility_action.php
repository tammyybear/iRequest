<?php
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$facility_name = $_POST['facility_name'];
$facility_description = $_POST['facility_description'];

if(updateDatabase($conn, "INSERT into inventory_items_tb(item_name, item_description) VALUES ('$facility_name', '$facility_description')") == 1){
    redirectPageWithAlert("facilities.php", "Facility Successfully Added");
}else{
    //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
    redirectPageWithAlert("facilities.php", "Error. Please Try Again");
}
?>