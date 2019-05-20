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

if(!function_exists('getDepartmentDropDownByUsername')){
    function getDepartmentDropDownByUsername($conn, $username){
        ?>
        <select name = "department_id" class="form-control form-control-line" required>
            <?php
                include "users_functions.php";
                $department_id = getUserDetailsByUsername($conn, $username)[8];
                $query = mysqli_query($conn, "SELECT * from department_tb where department_id = '$department_id'");
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