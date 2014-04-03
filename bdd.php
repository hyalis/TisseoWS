<?php
	// Connection au serveur
	$dns = 'mysql:host=127.0.0.1;dbname=tisseows';
	$utilisateur = 'root';
	$motDePasse = 'onlyforme';
	$connection = new PDO( $dns, $utilisateur, $motDePasse );
?>