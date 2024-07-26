 <?php
 	function nbr_visite(){
	 	require('../bdd/connexion.php');

	 	$page=basename($_SERVER['SCRIPT_NAME']);
	 	$ps=$pdo->prepare("INSERT INTO visite(Nom_page,Nombre_visite)VALUES(?,?) ON DUPLICATE KEY UPDATE Nombre_visite=Nombre_visite+1");
		 //Pour bien recupere les données on crée un table de parametre
		$params=array($page,1);
	    //Execution de la requête par leur paramètre en ordre 
	    $ps->execute($params);
	 }
?>