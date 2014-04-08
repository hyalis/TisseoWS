<?php
	$jsonObject = json_decode(file_get_contents("https://api.jcdecaux.com/vls/v1/stations?apiKey=ee0bec5c1e5cc3271b71708608244e5047472ca7&contract=Toulouse"));
	foreach ($jsonObject as $stationVelo) {
		if($stationVelo->position->lng >= 1.451889 && $stationVelo->position->lng <= 1.488968 && $stationVelo->position->lat >= 43.557804 && $stationVelo->position->lat <= 43.567849 && $stationVelo->status == "OPEN"){
			if($stationVelo->available_bikes > 0)
				echo "<span class='badge' style = 'width: 100%; text-align: left; background-color:rgb(101, 179, 250)'>" . $stationVelo->name . "</span><br><span class='badge' style = 'width: 100%; text-align: left; background-color:rgb(121, 212, 121)'>" . $stationVelo->available_bikes . "/" . $stationVelo->bike_stands . "</span><br><br>";
			else
				echo "<span class='badge' style = 'width: 100%; text-align: left; background-color:rgb(101, 179, 250)'>" . $stationVelo->name . "</span><br><span class='badge' style = 'width: 100%; text-align: left; background-color:rgb(238, 93, 93)'>" . $stationVelo->available_bikes . "/" . $stationVelo->bike_stands . "</span><br><br>";
		}
	}

?> 




