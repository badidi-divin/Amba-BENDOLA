<?php
	session_start();
	require_once('../bdd/connexion.php');
	if (isset($_GET['id']) AND $_GET['id'] > 0) {
		$getid=intval($_GET['id']);
		$requser=$pdo->prepare("SELECT * FROM blog WHERE id=?");
		$requser->execute(array($getid));
		$userinfo=$requser->fetch();
		
	// Uploader photo
	if (isset($_POST['saves'])) {

	$id_user=htmlspecialchars($_POST['id_user']);
	$description=htmlspecialchars($_POST['description']);
	$errors=array();
	$tmpName=$_FILES['photo']['tmp_name'];
	$name=$_FILES['photo']['name'];
	$size=$_FILES['photo']['size'];
	$error=$_FILES['photo']['error'];
	$type=$_FILES['photo']['type'];

	// Voir l'extension du fichiers
	$tabExtension=explode('.', $name);
	$extension=strtolower(end($tabExtension));
	// Extension Autorisé
	$extensionAutorise=['jpg','jpeg','gif','png'];
	$tailleMax=2097152;

	if (in_array($extension, $extensionAutorise)) {
		if ($size<=$tailleMax) {
				if ($error==0) {
					$uniqueNom=uniqid('',true);
					$fileName=$uniqueNom.'.'.$extension;
					move_uploaded_file($tmpName,'../photo_blog/'.$fileName);
						//Création de l'objet prepare et envoie de la requête
					    $ps=$pdo->prepare("INSERT INTO galery_blog(name,description,id_user)VALUES(?,?,?)");
					    //Pour bien recupere les données on crée un table de parametre
					    $params=array($fileName,$description,$id_user);
					    //Execution de la requête par leur paramètre en ordre 
					    $ps->execute($params);
						// Pour recuperer l'id du user
						?>
						<script type="text/javascript">
							alert('Enregistrement Effectué avec Succès votre photo a été publié!')
						</script>
					<?php
					header("location:galery_Vente.php?id=".$id_user);
						exit();
			}else{
				$errors='Une erreur se bloge lors de l\'importation de l\'image';
			}
		}else{
			$errors='Votre taille est trop importante(Taille Max: 2Mo)';
		}

	}else{
		$errors='Votre Extension est invalide(jpg,jpeg,gif,png)';
	}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heavens Entrepreneurs</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <style type="text/css">
    	body{
    		display: flex;
    		justify-content: center;
    		align-items: center;
    		flex-direction: column;
    		min-height: 100vh;
    	}
    	input{
    		font-size: 2rem;
    	}
    </style>
</head>
<body style="background-image: url('../images/1.jpg');">
	<h1>Ajout Photo</h1>
	 <a href="profil_parametre.php?id=<?= $_GET['id'];?>" class="btn btn-danger">Retour au Profile <?= $userinfo['nom'] ?></a>
	<form method="post" action="" enctype="multipart/form-data">
    <?php
				if (!empty($errors)):
			?>
			<div class="alert alert-danger">
				<p></p>
					<ul>
						<?php if (isset($errors)){
							echo $errors;
						} ?>
					</ul>
				</div>
				<?php endif; ?>
	<?php if (isset($_GET['error'])) {?>
		<p><?= $_GET['error'];  ?></p>
	<?php } ?>
		<div class="form-group">
			<input type="file"  name="photo" class="form-control">
		</div>
		<input type="text" hidden="hidden"  name="id_user" value="<?= $userinfo['id']; ?>">
		<div class="form-group">
		<label class="description">Description de l'image</label>
		<input type="text" class="form-control" placeholder="Ex:Mon sejour à Texas" name="description">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" name="saves" class="form-control" value="Upload">
		</div>
	</form>
	<a href="galery_Vente.php?id=<?= $_GET['id']?>" class="btn btn-outline-success">Voir My Gallery</a>
</body>
</html>
<?php
	}
?>