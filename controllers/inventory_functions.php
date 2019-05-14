<?php
if(!function_exists('getInventoryData')){
    function getInventoryData($conn){
        $query = mysqli_query($conn, "SELECT * from inventory_items_tb where inventory_cat_id = '1'");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                   <td class="txt-oflo"><?php echo $row['item_name'] ?></td>
                   <td class="txt-oflo"><?php echo $row['item_description'] ?></td>
                   <td class="txt-oflo"><a href="edit_facilities.php<?php echo '?id='.$row['inventory_item_id']; ?>">Edit</a></td>
                   <td class="txt-oflo"><a href="delete_facilities.php<?php echo '?id='.$row['inventory_item_id']; ?>">Delete</a></td>
               </tr>
               <?php
            }
        }else{
            echo "No Facility Found";
        }
    }
}

// if(!function_exists('getDepartmentDetailsByDepartmentId')){
//     function getDepartmentDetailsByDepartmentId($conn, $department_id){
//         include "database_functions.php";
//         $department_details = array();
//         $users_count = countResult($conn, "SELECT * from users_tb where department_id = '$department_id'");
//         $query = mysqli_query($conn, "SELECT * from department_tb where department_id = '$department_id'");
//         while($row = mysqli_fetch_array($query)){
//             array_push($department_details, $row['department_name'], $row['department_description'], $users_count);
//         }

//         return $department_details;
//     }
// }

if(!function_exists('getInventoryDropDown')){
    function getDepartmentDropDown($conn){
        ?>
        <select name = "inventory_cat_id" class="form-control form-control-line" required>
            <?php 
                $query = mysqli_query($conn, "SELECT * from inventory_category_tb");
                while($row = mysqli_fetch_array($query)){
                    ?>
                    <option value = "<?php echo $row['inventory_cat_id'] ?>"><?php echo $row['category'] ?></option>
                    <?php
                }
            ?>
        </select>
        <?php
    }
}



?>