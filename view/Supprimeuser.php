<?php
	//Récuperation du paramètre URL appelé code

	$id=$_GET['id'];

	require_once('../bdd/connexion.php');

	$ps=$pdo->prepare("DELETE FROM contact WHERE id=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:liste_contact.php");
?>