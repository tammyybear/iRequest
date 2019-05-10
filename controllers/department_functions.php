<?php
if(!function_exists('getDepartmentData')){
    function getDepartmentData($conn){
        $query = mysqli_query($conn, "SELECT * from department_tb");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                   <td class="txt-oflo"><?php echo $row['department_name'] ?></td>
                   <td class="txt-oflo"><?php echo $row['department_description'] ?></td>
                   <td class="txt-oflo"><?php echo getDepartmentDetailsByDepartmentId($conn, $row['department_id'])[2] ?> </td>
                   <td class="txt-oflo"><a href="edit_department.php<?php echo '?id='.$row['department_id']; ?>">Edit</a></td>
                   <td class="txt-oflo"><a href="delete_department.php<?php echo '?id='.$row['department_id']; ?>">Delete</a></td>
               </tr>
               <?php
            }
        }else{
            echo "No Department Found";
        }
    }
}

if(!function_exists('getDepartmentDetailsForEdit')){
    function getDepartmentDetailsForEdit($conn, $department_id){
        include "database_functions.php";
        $query = mysqli_query($conn, "SELECT * from department_tb where department_id = '$department_id'");
        $row = mysqli_fetch_assoc($query);
        ?>
            <div class="form-group">
                <label class="col-md-12">Department Name</label>
                <div class="col-md-12">
                    <input type="text" value="<?php echo $row['department_name']; ?>" name="department_name" class="form-control form-control-line" required>
                </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="col-md-12">Department Description</label>
                <div class="col-md-12">
                    <input type="text" value="<?php echo $row['department_description']; ?>" class="form-control form-control-line" name="department_description" id="example-email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Update Department</button>
                </div>
            </div>
        <?php
    }
}


if(!function_exists('getDepartmentDetailsByDepartmentId')){
    function getDepartmentDetailsByDepartmentId($conn, $department_id){
        include "database_functions.php";
        $department_details = array();
        $users_count = countResult($conn, "SELECT * from users_tb where department_id = '$department_id'");
        $query = mysqli_query($conn, "SELECT * from department_tb where department_id = '$department_id'");
        while($row = mysqli_fetch_array($query)){
            array_push($department_details, $row['department_name'], $row['department_description'], $users_count);
        }

        return $department_details;
    }
}

if(!function_exists('getDepartmentDropDown')){
    function getDepartmentDropDown($conn){
        ?>
        <select name = "department_id" class="form-control form-control-line" required>
            <?php 
                $query = mysqli_query($conn, "SELECT * from department_tb");
                while($row = mysqli_fetch_array($query)){
                    ?>
                    <option value = "<?php echo $row['department_id'] ?>"><?php echo $row['department_name'] ?></option>
                    <?php
                }
            ?>
        </select>
        <?php
    }
}



?>