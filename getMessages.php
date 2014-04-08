<?php

function var_print($Var) {
        echo "<pre>" . print_r($Var, true) . "</pre>";
}
include "bdd.php";

$resultats=$connection->query("SELECT numLigne FROM lignes");
$resultats->setFetchMode(PDO::FETCH_OBJ);
$listeLignesBdd = $resultats->fetchAll() ;

$reseauPerturbe = false;

function ligneExisteDansBdd($listeLignesBdd, $numLigne)
{
	foreach ($listeLignesBdd as $ligne) {
		if($ligne->numLigne == $numLigne)
		{
			return true;
		}
	}
	return false;
}


$messagesList = json_decode(file_get_contents("http://pt.data.tisseo.fr/linesDisruptedList?key=a03561f2fd10641d96fb8188d209414d8&contentFormat=html&format=json"));
foreach ($messagesList->{'lines'} as $ligne) {
	$maLigne = $ligne->{'line'};
	if(ligneExisteDansBdd($listeLignesBdd, $maLigne->{'shortname'})) // la ligne courante est contenue dans la bdd
	{
		$reseauPerturbe = true;
		echo "<div class='alert alert-warning'>";
		$nligne = $maLigne->{'shortname'};
		echo "Perturbations sur la ligne $nligne :";
		
		$content = $maLigne->{'disturbMessage'}->{'content'};
		$content = str_replace('h2', 'h3', $content); // On retreci un peu le titre du content..
		$content = str_replace('rntt', '', $content); // On enlève ces rntt/rnt/rn bizarres
		$content = str_replace('rnt', '', $content); 
		$content = str_replace('rn', '', $content);
		echo "<br>" . $content ."</div>";
	} // else ne rien faire 
}

if(!$reseauPerturbe)
{
	echo "<div class='alert alert-success'>Pas de perturbations sur aucune ligne desservant Paul Sabatier :-)</div>";
}
?> 