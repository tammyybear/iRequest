<?php 
if(!function_exists('countResult')){
    function countResult($conn, $query){
        $query = mysqli_query($conn, $query);
        $result = mysqli_num_rows($query);
        return $result;
    }
}

if(!function_exists('updateDatabase')){
    function updateDatabase($conn, $query){
        $result = "";
        $query = mysqli_query($conn, $query);
        if(!$query){
            $result = mysqli_error($conn);
        }else{
            $result = 1;
        }

        return $result;
    }
}
?>