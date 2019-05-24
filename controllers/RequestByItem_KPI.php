<?php
header('Content-Type: application/json');
include "../database/config.php";

$number_of_requests = array();

	$query = mysqli_query($conn,"SELECT Count(booking_id) as requests from bookings_tb GROUP BY category");
	echo mysqli_error($conn);
		if(mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				array_push($number_of_requests,$row['requests']);
			}
		}else{
			array_push($number_of_requests, 0);
		}

mysqli_close($conn);

echo json_encode($number_of_requests);
?>