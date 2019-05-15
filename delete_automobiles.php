<?php
    require "controllers/sessions_functions.php";
    include "controllers/database_functions.php";
    include "controllers/basic_functions.php";
    include "database/config.php";

    $inventory_item_id=$_GET['id'];

    if(updateDatabase($conn, "DELETE FROM `inventory_items_tb` WHERE inventory_item_id='$inventory_item_id'") == 1){
        redirectPageWithAlert("automobiles.php", "Automobile Successfully Deleted");
    }else{
        //echo updateDatabase($conn, "INSERT into department_tb(department_name, department_description) VALUES ('$department_name', '$department_description')");
        redirectPageWithAlert("automobiles.php", "Error. Please Try Again");
    }

?>