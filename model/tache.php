<?php  
	$mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	$mot2=isset($_GET['mot2'])?$_GET['mot2']:"all";
	
	$size=isset($_GET['size'])? $_GET['size']:5;
	$page=isset($_GET['page'])? $_GET['page']:1; 
	$offset=($page-1)*$size;
	$serv=$_SESSION['service'];

	if ($mot2=="all") {
		$requete="SELECT * FROM tache WHERE designation LIKE '%$mot1%' AND service='$serv' ORDER BY id DESC LIMIT $size offset $offset";	
		$requeteCount="SELECT COUNT(*) countF FROM tache WHERE designation LIKE '%$mot1%' AND service='$serv'";
	}else{
		$requete="SELECT * FROM tache WHERE designation LIKE '%$mot1%' AND service='$serv' AND etat='$mot2' ORDER BY id DESC LIMIT $size offset $offset ";	
		$requeteCount="SELECT COUNT(*) countF FROM tache WHERE designation LIKE '%$mot1%' AND etat='$mot2' AND service='$serv'";
	}
	
	$resultat=$pdo->query($requete);
	$resultatCount=$pdo->query($requeteCount);
	$tabCount=$resultatCount->fetch();
	$nbreFiliere=$tabCount['countF'];
	$reste=$nbreFiliere % $size;

	if($reste===0)
		$nbrePage=$nbreFiliere/$size;
	else
		$nbrePage=floor($nbreFiliere/$size)+1;	