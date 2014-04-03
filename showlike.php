<?php
	include "bdd.php";
	$idLigne = $_GET['idLigne'];
	$getNb = "SELECT nbLikes, nbDislikes FROM lignes WHERE idLigne = $idLigne";
	
	$resultats=$connection->query($getNb);
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	$result = $resultats->fetch();

	echo $result->nbLikes . "/" . $result->nbDislikes;
	$resultats->closeCursor();
?>