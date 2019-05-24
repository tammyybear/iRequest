<?php
header('Content-Type: application/json');
include "../database/config.php";


$months = array();
$number_of_requests = array();

for($i = 1; $i < 13; $i++){
	if(strlen($i) == 1){
		$i = 0 . $i;
	}
	$query = mysqli_query($conn,"SELECT Count(booking_id) as requests from bookings_tb where DATE_FORMAT(date_from_requested, '%m') = '$i'");
		if(mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				array_push($number_of_requests,$row['requests']);
			}
		}else{
			array_push($number_of_requests, 0);
		}
}

mysqli_close($conn);

echo json_encode($number_of_requests);
?>