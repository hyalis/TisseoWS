<?php
	include "bdd.php";
	$like = $_GET['like'];
	$idLigne = $_GET['idLigne'];
	if($like=="true"){
		$reqUp = "UPDATE lignes SET nbLikes = nbLikes + 1 WHERE idLigne = $idLigne";
		$getNb = "SELECT nbLikes as nb FROM lignes WHERE idLigne = $idLigne";
	} else {
		$reqUp = "UPDATE lignes SET nbDislikes = nbDislikes + 1 WHERE idLigne = $idLigne";
		$getNb = "SELECT nbDislikes as nb FROM lignes WHERE idLigne = $idLigne";
	}
	$resultats=$connection->query($reqUp);
	
	$resultats=$connection->query($getNb);
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	$result = $resultats->fetch();
	echo $result->nb;
	
	$resultats->closeCursor();

?>