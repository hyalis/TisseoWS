<?php

function var_print($Var) {
        echo "<pre>" . print_r($Var, true) . "</pre>";
}
include "bdd.php";


//var_print($messagesList);


$resultats=$connection->query("SELECT numLigne FROM lignes");
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() ) // parcours de toutes les lignes de la bdd
{
	$numLigne = $resultat->numLigne;
	echo "Ligne $numLigne : ";
	$jsonObject = json_decode(file_get_contents("http://pt.data.tisseo.fr/linesDisruptedList?key=a03561f2fd10641d96fb8188d209414d8&contentFormat=html&format=json&lineShortName=$numLigne"));
	if (isset($jsonObject->{'lines'}[0]))
	{
		$content = $jsonObject->{'lines'}[0]->{'line'}->{'disturbMessage'}->{'content'}; // Le content contient des "rnt" et "rn" bizarres, donc on les enlève...
		$content = str_replace('rnt', '', $content); //
		$content = str_replace('rn', '', $content);
		echo $content . "<br>";
	} else
		echo "Pas de perturbations<br>"; // TODO à supprimer si necessaire 
}

// Affichage d'un exemple de ligne perturbée (car aucune de la bdd n'est perturbee !)...
echo "Affichage d'un exemple de ligne perturbee (car aucune de la bdd n'est perturbee !)<br>";
$jsonObject = json_decode(file_get_contents("http://pt.data.tisseo.fr/linesDisruptedList?key=a03561f2fd10641d96fb8188d209414d8&contentFormat=html&format=json&lineShortName=A"));
if (isset($jsonObject->{'lines'}[0]))
{
	$content = $jsonObject->{'lines'}[0]->{'line'}->{'disturbMessage'}->{'content'}; // Le content contient des "rnt" et "rn" bizarres, donc on les enlève...
	$content = str_replace('rnt', '', $content); //
	$content = str_replace('rn', '', $content);
	echo "Ligne A : " . $content . "<br>";
}else {
	echo "Pas de perturbations ligne $numLigne <br>";
}
/*
	//MESSAGES #useless
	
	$messagesList = json_decode(file_get_contents("http://pt.data.tisseo.fr/messagesList?key=a03561f2fd10641d96fb8188d209414d8&contentFormat=html&format=json&displayImportantOnly"));
	
	
	for($i = 0; $i < count($messagesList->{'messages'}); $i++)
	{
		if(isset($messagesList->{'messages'}[$i]->{'lines'}))
		{
			if($messagesList->{'messages'}[$i]->{'lines'}[0]->{'shortName'} == $numLigne)
			{
				$title = $messagesList->{'messages'}[$i]->{'message'}->{'title'};
				echo "<h1> $title : </h1> <br>";
				echo $messagesList->{'messages'}[$i]->{'message'}->{'content'}. "<br>";
			}
		} else {
			
				echo "pas de lines pour i=$i<br>";
		}
	}	
		
		
		
		

 */

?> 