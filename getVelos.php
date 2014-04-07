<?php
	$jsonObject = json_decode(file_get_contents("https://api.jcdecaux.com/vls/v1/stations?apiKey=ee0bec5c1e5cc3271b71708608244e5047472ca7&contract=Toulouse"));
	foreach ($jsonObject as $stationVelo) {
		if($stationVelo->position->lng >= 1.451889 && $stationVelo->position->lng <= 1.488968 && $stationVelo->position->lat >= 43.557804 && $stationVelo->position->lat <= 43.567849 && $stationVelo->status == "OPEN"){
			echo $stationVelo->name . "***" . $stationVelo->position->lat . "***" . $stationVelo->position->lng . "***". $stationVelo->available_bikes . "***" . $stationVelo->bike_stands . "<br>";
		}
	}
?>