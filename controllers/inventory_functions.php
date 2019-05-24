<?php
if(!function_exists('getFacilityData')){
    function getFacilityData($conn){
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

if(!function_exists('getAutomobileData')){
    function getAutomobileData($conn){
        $query = mysqli_query($conn, "SELECT * from inventory_items_tb where inventory_cat_id = '2'");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                   <td class="txt-oflo"><?php echo $row['item_name'] ?></td>
                   <td class="txt-oflo"><?php echo $row['item_description'] ?></td>
                   <td class="txt-oflo"><a href="edit_automobiles.php<?php echo '?id='.$row['inventory_item_id']; ?>">Edit</a></td>
                   <td class="txt-oflo"><a href="delete_automobiles.php<?php echo '?id='.$row['inventory_item_id']; ?>">Delete</a></td>
               </tr>
               <?php
            }
        }else{
            echo "No Automobile Found";
        }
    }
}

if(!function_exists('getInventoryDetailsById')){
    function getInventoryDetailsById($conn, $inventory_item_id){
        include "database_functions.php";
        $inventory_details = array();
        $items_count = countResult($conn, "SELECT * from inventory_items_tb where inventory_item_id = '$inventory_item_id'");
        $query = mysqli_query($conn, "SELECT * from inventory_items_tb where inventory_item_id = '$inventory_item_id'");
        while($row = mysqli_fetch_array($query)){
            array_push($inventory_details, $row['item_name'], $row['item_description'], $items_count, $row['inventory_cat_id']);
        }

        return $inventory_details;
    }
}

if(!function_exists('getInventoryDropDown')){
    function getInventoryDropDown($conn){
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

if(!function_exists('getInventoryCatType')){
    function getInventoryCatType($conn, $inventory_cat_id){
        $category = "";
        $query = mysqli_query($conn, "SELECT * from inventory_category where inventory_cat_id = '$inventory_cat_id'");
        while($row = mysqli_fetch_array($query)){
            $category = $row['category'];
        }

        return $category;
    }
}
?>