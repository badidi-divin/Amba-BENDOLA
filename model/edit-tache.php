<?php  
	require_once('securico.php');
	$id=$_GET['id'];
	$requser=$pdo->prepare("SELECT * FROM tache WHERE id=?");
	$requser->execute(array($id));
	$userinfo=$requser->fetch();

	if (isset($_POST['divin'])) {
		$designation=htmlspecialchars($_POST['designation']);
		$description=htmlspecialchars($_POST['description']);
		$errors=array();

		if (empty($errors)) {
		//Création de l'objet prepare et envoie de la requête
		$ps=$pdo->prepare("UPDATE tache SET designation=?,description=?,service=? WHERE id=?");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($designation,$description,$_SESSION['service'],$_GET['id']);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
	?>
			<script type="text/javascript">
				alert('Vos données ont été bien modifiées!')
			</script>
			<script>
				window.open('./tache.php','_self')
			</script>
			<?php

			exit();	
			}
	}
