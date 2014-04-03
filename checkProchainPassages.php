<?php

// TODO rajouter isset
$idLigne = $_GET['idLigne'];
$idStation = $_GET['idStation'];

$jsonObject = json_decode(file_get_contents("http://pt.data.tisseo.fr/departureBoard?key=a03561f2fd10641d96fb8188d209414d8&stopPointId=$idStation&lineId=$idLigne&format=json"));


echo $jsonObject->{'departures'}->{'departure'}[0]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[0]->{'destination'}[0]->{'name'} . "<br>";
echo $jsonObject->{'departures'}->{'departure'}[1]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[1]->{'destination'}[0]->{'name'} . "<br>";
echo $jsonObject->{'departures'}->{'departure'}[2]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[2]->{'destination'}[0]->{'name'} . "<br>";
echo $jsonObject->{'departures'}->{'departure'}[3]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[3]->{'destination'}[0]->{'name'} . "<br>";

//var_print($jsonObject);
?> 