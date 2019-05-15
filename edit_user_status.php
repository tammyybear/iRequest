<?php
    include "controllers/database_functions.php";
    include "controllers/basic_functions.php";
    include "controllers/users_functions.php";
    include "database/config.php";

    $get_id=$_GET['id'];

    if(getUserDetailsById($conn, $get_id)[10] == "Active") {
        if(updateDatabase($conn, "UPDATE users_tb set user_status = 'Inactive' where user_id='$get_id'") == 1){
            redirectPageWithAlert("user_management.php", "User Status Successfully Updated");
        }else{        
            redirectPageWithAlert("user_management.php", "Error. Please Try Again");
        }
    }else{
        if(updateDatabase($conn, "UPDATE users_tb set user_status = 'Active' where user_id='$get_id'") == 1){
            redirectPageWithAlert("user_management.php", "User Status Successfully Updated");
        }else{        
            redirectPageWithAlert("user_management.php", "Error. Please Try Again");
        }
    }

    

?>