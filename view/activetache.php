<?php
require_once('../bdd/connexion.php');
	$idUser=isset($_GET['id'])?$_GET['id']:0;
	$etat=isset($_GET['etat'])?$_GET['etat']:0;

	
	if($etat==1)
		$newEtat=0;
	else
		$newEtat=1;
	
	$requete="UPDATE tache SET etat=? WHERE id=?";
	$params=array($newEtat,$idUser);

	$resultat=$pdo->prepare($requete);
	$resultat->execute($params);

	header("location:tache.php");