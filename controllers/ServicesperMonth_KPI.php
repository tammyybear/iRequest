<?php
header('Content-Type: application/json');
include "../database/config.php";

$months = array();
$number_of_services = array();

for($i = 1; $i < 13; $i++){
	if(strlen($i) == 1){
		$i = 0 . $i;
	}
	$query = mysqli_query($conn,"SELECT Count(services_id) as services from services_tb where DATE_FORMAT(date_created, '%m') = '$i'");
	echo mysqli_error($conn);
		if(mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
				array_push($number_of_services,$row['services']);
			}
		}else{
			array_push($number_of_services, 0);
		}
}

mysqli_close($conn);

echo json_encode($number_of_services);
?>