<?php
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "database/config.php";

$automobile_name = $_POST['automobile_name'];
$automobile_plate = $_POST['automobile_plate'];

if(updateDatabase($conn, "INSERT into inventory_items_tb(item_name, item_description, inventory_cat_id) VALUES ('$automobile_name', '$automobile_plate','2')") == 1){
    redirectPageWithAlert("auotmobiles.php", "Automobile Successfully Added");
}else{
    //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
    redirectPageWithAlert("auotmobiles.php", "Error. Please Try Again");
}
?>