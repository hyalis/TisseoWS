<?php
	include "bdd.php";
	$idLigne = $_GET['idLigne'];
	$resultats=$connection->query("SELECT idStation, nomStation FROM stations WHERE idLigne = $idLigne ORDER BY nomStation");

	$resultats->setFetchMode(PDO::FETCH_OBJ);
	while( $resultat = $resultats->fetch() )
	{
			echo '<option value= ' . $resultat->idStation .' >' . $resultat->nomStation . '</option>';
	}
	$resultats->closeCursor();
?>