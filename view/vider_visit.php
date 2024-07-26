<?php
	//Récuperation du paramètre URL appelé code

	require_once('../bdd/connexion.php');

	$ps=$pdo->prepare("TRUNCATE TABLE visite");

	$ps->execute($params);
	
	header("location:visit.php");

?>