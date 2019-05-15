<?php    
require "controllers/sessions_functions.php";
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$get_id=$_GET['id'];
$automobile_name = $_POST['automobile_name'];
$automobile_plate = $_POST['automobile_plate'];

if(updateDatabase($conn, "UPDATE inventory_items_tb set item_name = '$automobile_name', item_description = '$automobile_plate' where inventory_item_id ='$get_id'") == 1){
    redirectPageWithAlert("automobiles.php", "Automobile Successfully Updated");
}else{
    //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
    redirectPageWithAlert("automobiles.php", "Error. Please Try Again");
}

?>