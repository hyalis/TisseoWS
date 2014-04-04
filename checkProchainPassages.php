<?php

// TODO rajouter isset
$idLigne = $_GET['idLigne'];
$idStation = $_GET['idStation'];

$jsonObject = json_decode(file_get_contents("http://pt.data.tisseo.fr/departureBoard?key=a03561f2fd10641d96fb8188d209414d8&stopPointId=$idStation&lineId=$idLigne&format=json"));

if (!isset($jsonObject->{'departures'}->{'departure'}[0]->{'dateTime'}))
{
	echo "Pas de departs disponibles pour cette ligne";
} else {
	for ($i = 0; $i < 4; $i++) // on affiche les 4 prochains horaires
	{
		if (isset($jsonObject->{'departures'}->{'departure'}[$i])) // On verifie que l'horaire existe
		{
			$time = $jsonObject->{'departures'}->{'departure'}[$i]->{'dateTime'};
			$heure = explode(" ", $time); // On récupère que l'heure (time[1])
			echo "Vers " .$jsonObject->{'departures'}->{'departure'}[$i]->{'destination'}[0]->{'name'} . " à " . $heure[1] .  "<br>";
			
		} else 
			echo " - <br>";
	}
}
?> 