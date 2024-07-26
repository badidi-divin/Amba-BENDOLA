<?php
	//Récuperation du paramètre URL appelé code

	require_once('../bdd/connexion.php');

	$ps=$pdo->prepare("TRUNCATE TABLE utilisateurs");

	$params=array($id);

	$ps->execute($params);
	
	header("location:users_heaven.php");

?>