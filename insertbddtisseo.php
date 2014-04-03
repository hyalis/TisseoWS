<?php

 
function var_print($Var) {
        echo "<pre>" . print_r($Var, true) . "</pre>";
}

// Consommation du WS
//stopAreasList?format=jsonbbox=1.4338121%2C43.5944292%2C1.4538121%2C43.6144292 43.567849, 1.451889
//$jsonObject = json_decode(file_get_contents("http://pt.data.tisseo.fr/linesList?key=a03561f2fd10641d96fb8188d209414d8&format=json&lineId=11821949021891694"));


include "bdd.php";
$jsonObject = json_decode(file_get_contents("http://pt.data.tisseo.fr/stopAreasList?key=a03561f2fd10641d96fb8188d209414d8&format=json&bbox=1.451889%2C43.567849%2C1.488968%2C43.557804&displayLines=1"));


//var_print($jsonObject);

// parcours sur les "StopArea"
for($i = 0; $i < count($jsonObject->{'stopAreas'}->{'stopArea'}); $i++)
{
	$idStation = $jsonObject->{'stopAreas'}->{'stopArea'}[$i]->{'id'};
	$nomStation = $jsonObject->{'stopAreas'}->{'stopArea'}[$i]->{'name'};
	
	// Parcours sur les "line" de chaque StopArea
	for($y = 0; $y < count($jsonObject->{'stopAreas'}->{'stopArea'}[$i]->{'line'}); $y++)
	{
		$idLigne = $jsonObject->{'stopAreas'}->{'stopArea'}[$i]->{'line'}[$y]->{'id'};
		$nomLigne = $jsonObject->{'stopAreas'}->{'stopArea'}[$i]->{'line'}[$y]->{'name'};
		$numLigne = $jsonObject->{'stopAreas'}->{'stopArea'}[$i]->{'line'}[$y]->{'shortName'};
		//echo $idLigne . " " . $nomLigne . " " . $numLigne . "<br>";
		// requete insertion ligne
		$strInsert = "INSERT INTO lignes (idligne, numLigne, nomLigne) VALUES ('$idLigne','$numLigne', '$nomLigne')";
		$connection->query($strInsert);
		
		// requete d'insert de station
		$strInsert = "INSERT INTO stations (idStation, idligne, nomStation) VALUES ('$idStation', '$idLigne', '$nomStation')";
		$connection->query($strInsert);
		echo "Insertion Station : $idStation $nomStation  pour la Ligne :$idLigne $numLigne $nomLigne<br>";
	}
}

?>