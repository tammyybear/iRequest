<?php
if(!function_exists('getUserDetailsByUsername')){
    function getUserDetailsByUsername($conn, $username){
        $users_details = array();
        $query = mysqli_query($conn, "SELECT * from users_tb where username = '$username'");
        while($row = mysqli_fetch_array($query)){
            array_push($users_details, $row['first_name'], $row['middle_name'], $row['last_name'], $row['name_extension'], $row['mobile_number'], $row['address'], $row['username'], $row['password'], $row['department_id'], $row['role_type'], $row['user_status'], $row['user_id']);
        }
        
        return $users_details;
    }
}

if(!function_exists('getUserDetailsById')){
    function getUserDetailsById($conn, $id){
        $users_details = array();
        if(countResult($conn, "SELECT * from admin_tb where admin_id = '$id'") == 1){
            $query = mysqli_query($conn, "SELECT * from admin_tb where admin_id = '$id'");
            while($row = mysqli_fetch_array($query)){
                array_push($users_details, $row['admin_username'], $row['admin_password'],$row['admin_id']);
            }
        }else{
            $query = mysqli_query($conn, "SELECT * from users_tb where user_id = '$id'");
            while($row = mysqli_fetch_array($query)){
                array_push($users_details, $row['first_name'], $row['middle_name'], $row['last_name'], $row['name_extension'], $row['mobile_number'], $row['address'], $row['username'], $row['password'], $row['department_id'], $row['role_type'], $row['user_status']);
            }
        }                
        
        return $users_details;
    }
}

if(!function_exists('getUsersData')){
    function getUsersData($conn){
        include "department_functions.php";
        if($_SESSION['role_type'] == "Admin"){
            $query = mysqli_query($conn, "SELECT * from users_tb ORDER BY department_id");
        }else{
            $departmentid = getUserDetailsByUsername($conn, $_SESSION['user'])[8];
            $query = mysqli_query($conn, "SELECT * from users_tb where department_id = '$departmentid' ORDER BY user_id");
        }        
        if(! $query){
            echo mysqli_error($conn);
        }else{
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){
                    ?>
                     <tr>
                        <td class="txt-oflo"><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['middle_name'] ?></td>
                        <td class="txt-oflo"><?php echo $row['last_name'] ?></td>
                        <td class="txt-oflo"><?php echo $row['name_extension'] ?></td>
                        <td class="txt-oflo"><?php echo $row['mobile_number'] ?></td>
                        <td class="txt-oflo"><?php echo $row['address'] ?></td>
                        <td class="txt-oflo"><?php echo getDepartmentDetailsByDepartmentId($conn, $row['department_id'])[0]; ?></td>
                        <td class="txt-oflo"><?php echo $row['role_type'] ?></td>
                        <td class="txt-oflo"><a href = "edit_user_status.php<?php echo '?id='.$row['user_id']; ?>"><?php echo $row['user_status'] ?></a></td>
                        <td class="txt-oflo"><a href = "delete_user.php<?php echo '?id='.$row['user_id']; ?>">Delete</a></td>                        
                    </tr>
                    <?php
                }
            }else{
                echo "No Users Found";
            }
        }
    }
}

if(!function_exists('getAddUserForm')){
    function getAddUserForm($conn){
        include "department_functions.php";
        ?>
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <form class="form-horizontal form-material" method="post" action="add_user_action.php">
                            <div class="form-group">
                                <label class="col-md-12">First Name *</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="First Name" name="first_name" class="form-control form-control-line" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Middle Name (Optional)</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Middle Name" name="middle_name" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Last Name *</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Last Name" name="last_name" class="form-control form-control-line" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Name Extension (Optional)</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Name Extension" name="name_extension" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Mobile Number *</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Mobile Number" name="mobile_number" class="form-control form-control-line" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address *</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Address" name="address" class="form-control form-control-line" required>
                                </div>
                            </div>
                            <?php if($_SESSION['role_type'] == "Admin"){ ?>
                                <div class="form-group">
                                    <label class="col-md-12">Department</label>
                                    <div class="col-md-12">
                                        <?php getDepartmentDropDown($conn); ?>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="form-group">
                                    <label class="col-md-12">Department</label>
                                    <div class="col-md-12">
                                        <?php getDepartmentDropDownByUsername($conn, $_SESSION['user']); ?>
                                    </div>
                                </div>
                            <?php } ?>                            
                            <?php if($_SESSION['role_type'] == "Admin"){ ?>
                                <div class="form-group">
                                    <label class="col-md-12">Role Type</label>
                                    <div class="col-md-12">
                                        <?php getRoleTypes(); ?> 
                                    </div>    
                                </div>
                            <?php }else{ ?>
                                <div class="form-group">
                                    <label class="col-md-12">Role Type</label>
                                    <div class="col-md-12">
                                        <option value = "Department Member">Department Member</option>
                                    </div>    
                                </div>
                            <?php } ?>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
    }
}

if(!function_exists('getEditUserForm')){
    function getEditUserForm($conn){
        ?>
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                    <?php
                        if($_SESSION['role_type'] == "Admin"){
                    ?>
                        <form class="form-horizontal form-material" method="post" action="edit_user_action.php">
                    <?php
                        }else{
                        $get_id = $_GET['id'];
                    ?>
                        <form class="form-horizontal form-material" method="post" action="edit_user_action.php<?php echo '?id='.$get_id; ?>">
                    <?php
                        }
                    ?>
                            <div class="form-group">
                                <label class="col-md-12"></label>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-12">Old Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Old Password" name="old_password" class="form-control form-control-line"required>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-12">New Password </label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="New Password" name="new_password" class="form-control form-control-line" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Re-type New Password</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="Re-type New Password" name="retype_new_password" class="form-control form-control-line"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" name="Update_Account">Update Account</button>
                                </div>
                            </div>
                        </form>                                        
                    </div>
                </div>
            </div>
        <?php
    }
}

if(!function_exists('getRoleTypes')){
    function getRoleTypes(){
        ?>
           <select name = "role_type" class="form-control form-control-line" required>
                <option value = "Department Head">Department Head</option>
                <option value = "Department Member">Department Member</option>
            </select>
        <?php
    }
}
?>