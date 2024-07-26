<?php 
	session_start();
	// Connection datatabase
	require_once '../bdd/connexion.php';

	if (isset($_POST['connect-cli'])) {

		$code=htmlspecialchars($_POST['code']);

		if (!empty($code)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM client WHERE code=?");
			$requiser->execute(array($code));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id']=$userinfo['id'];
				$_SESSION['code']=$userinfo['code'];
				header("Location: profile-client.php");		
			}
			else
			{
				$erreur="Mauvais code ou mauvais mot de passe! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}

	}