<?php
// TODO TODO TODO TODO

$jsonObject = json_decode(file_get_contents("https://api.jcdecaux.com/vls/v1/stations?apiKey=ee0bec5c1e5cc3271b71708608244e5047472ca7&contract=Toulouse"));



/*
if(!isset($jsonObject->{'departures'}->{'departure'}[0]->{'dateTime'}))
{
	echo "Pas de departs disponibles pour cette ligne";
} else {

	echo $jsonObject->{'departures'}->{'departure'}[0]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[0]->{'destination'}[0]->{'name'} . "<br>";
	echo $jsonObject->{'departures'}->{'departure'}[1]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[1]->{'destination'}[0]->{'name'} . "<br>";
	echo $jsonObject->{'departures'}->{'departure'}[2]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[2]->{'destination'}[0]->{'name'} . "<br>";
	echo $jsonObject->{'departures'}->{'departure'}[3]->{'dateTime'}. " Vers " .$jsonObject->{'departures'}->{'departure'}[3]->{'destination'}[0]->{'name'} . "<br>";
}
*/


?> 