<?php
	//Récuperation du paramètre URL appelé code

	require_once('../bdd/connexion.php');

	$ps=$pdo->prepare("TRUNCATE TABLE contact2");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);

?>