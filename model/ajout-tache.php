<?php

	if (isset($_POST['divin'])) {
		$designation=htmlspecialchars($_POST['designation']);
		$description=htmlspecialchars($_POST['description']);
		$errors=array();

		if (empty($errors)) {
		//Création de l'objet prepare et envoie de la requête
		$ps=$pdo->prepare("INSERT tache SET designation=?,description=?,service=?");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($designation,$description,$_SESSION['service']);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
	?>
			<script type="text/javascript">
				alert('Vos données ont été bien enregistré!')
			</script>
			<script>
				window.open('./tache.php','_self')
			</script>
			<?php

			exit();	
			}
	}
