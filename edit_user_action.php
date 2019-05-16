<?php
session_start();
include "controllers/database_functions.php";
include "controllers/basic_functions.php";
include "controllers/users_functions.php";
include "database/config.php";
include "controllers/check_login.php";

$username = $_SESSION['user'];
$oldpassword = $_POST['old_password'];
$newpassword = $_POST['new_password'];
$retypenewpassword = $_POST['retype_new_password'];

if(!isset($_POST['Update_Account'])){
    redirectPage("edit_user.php");
}else{
    if($newpassword != $retypenewpassword){
        redirectPageWithAlert("edit_user.php", "Error. New Password Does Not Match");
    }else {
        if(countResult($conn, "SELECT * from admin_tb where admin_username = '$username' and admin_password = '$oldpassword'") == 1){
            if(updateDatabase($conn, "UPDATE admin_tb set admin_password = '$retypenewpassword'") == 1){
                redirectPageWithAlert("edit_user.php", "Account Successfully Updated");
            }else{
                redirectPageWithAlert("edit_user.php", "Error. Please Try Again");
            }
        }elseif(countResult($conn, "SELECT * from users_tb where username = '$username' and password = '$oldpassword'") == 1){
            $get_id = $_GET['id'];
            if(updateDatabase($conn, "UPDATE users_tb set password = '$retypenewpassword' where user_id = '$get_id'") == 1){
                redirectPageWithAlert("edit_user.php?id=$get_id", "Account Successfully Updated");
            }else{
                redirectPageWithAlert("edit_user.php?id=$get_id", "Error. Please Try Again");
            }
        }else{
            if($_SESSION['role_type'] == "Admin"){
                redirectPageWithAlert("edit_user.php", "Error. Old Password Does Not Match");
            }else{
                redirectPageWithAlert("edit_user.php?id=$get_id", "Error. Old Password Does Not Match");
            }            
        }
    }
}

?>