<?php    
require "controllers/sessions_functions.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$get_id=$_GET['id'];
$facility_name = $_POST['facility_name'];
$facility_description = $_POST['facility_description'];

if(updateDatabase($conn, "UPDATE inventory_items_tb set item_name = '$facility_name', item_description = '$facility_description' where inventory_item_id ='$get_id'") == 1){
    redirectPageWithAlert("facilities.php", "Facility Successfully Updated");
}else{
    //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
    redirectPageWithAlert("facilities.php", "Error. Please Try Again");
}

?>