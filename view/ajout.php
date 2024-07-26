<?php
	require_once('../bdd/connexion.php');

	if (isset($_POST['save-user'])) {
			$Pseudo_admin=htmlspecialchars($_POST['Pseudo_admin']);
			$mdp=md5($_POST['password']);
			$mdp2=md5($_POST['password_confirm']);

		if (!empty($_POST['Pseudo_admin']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){

			$Pseudo_adminlength=strlen($Pseudo_admin);

			if ($Pseudo_adminlength <= 15) 
			{
				$reqPseudo_admin=$pdo->prepare("SELECT * FROM admin WHERE Pseudo_admin=?");
				$reqPseudo_admin->execute(array($Pseudo_admin));
				$Pseudo_adminexist=$reqPseudo_admin->rowCount();

				if (isset($_FILES['Photo_admin']) AND !empty($_FILES['Photo_admin']['name'])) {
				$tailleMax=2097152;
				$extensionsValides=array('jpg','jpeg','gif','png');
				if ($_FILES['Photo_admin']['size']<=$tailleMax) {
					$extensionUpload=strtolower(substr(strrchr($_FILES['Photo_admin']['name'],'.'), 1));
					if (in_array($extensionUpload, $extensionsValides)) {
						$chemin="avatar/".$_SESSION['id_admin'].'.'.$extensionUpload;
						$resultat=move_uploaded_file($_FILES['Photo_admin']['tmp_name'], $chemin);
						if ($resultat) {
							if ($mailexist==0) {
				
							$insert=$pdo->prepare("INSERT INTO users(username,email,password)VAlUES(?,?,?)");
							$insert->execute(array($username,$mail,$mdp));
							$erreur="Votre compte a bien été créé! <a href=connexion.php>Me Connecter</a>";
							));
						header("Location: profile.php?id_admin=".$_SESSION['id_admin']);
						}
						else
						{
							$erreur="Erreur durant l'importance du photo de profile";
						}
					}
		
		}else{
			$erreur="Votre photo de profile ne doit pas dépasser 2Mo";
		}
	}
		
				else
				{
					$erreur="Pseudo_admin déjà utilisé!";
				}
					
			}
			else
			{
				$erreur="Votre Pseudo_admin ne doit pas depasser 15 caractères";
			}
		}
		else
		{
			$erreur="Tous les champs doivent être completés!";
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta
	 charset="utf-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-4 offset-md-4 form-div">
				<form action="" method="post" enctype="multipart/form-data">
					<h3 class="text-center">Create Profile</h3>
					<div class="form-group">
			            <label class="label" for="name">Pseudo_admin:</label>
			            <input type="text" class="form-control"  name="Pseudo_admin" value="<?php if(isset($Pseudo_admin)){ echo $Pseudo_admin; } ?>"/>
			        </div>
			          <div class="form-group">
			             <label class="label" for="password">Password</label>
			          <input  type="password" class="form-control" name="password">
			          </div>

			          <div class="form-group">
			             <label class="label" for="password">Confirmer Password</label>
			          <input type="password" class="form-control" name="password_confirm">
			          </div>
			          <div class="form-group">
			             <label class="label" for="password">Avatar</label>
			          <input type="file" class="form-control" name="Avatar">
			          </div>
			      
			     	<div class="form-group">
						<button type="submit" name="save-user" class="btn btn-primary btn-block">Save User</button>
					</div>
				</form>	
				<?php
					if (isset($erreur)) {
						echo '<font color="red">'.$erreur."</font>";	
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>