<?php
	//Récuperation du paramètre URL appelé code

	require_once('../bdd/connexion.php');

	$ps=$pdo->prepare("TRUNCATE TABLE contact");

	$params=array($id);

	$ps->execute($params);
	
	header("location:liste_contact.php");

?>