<?php 
	session_start();
	// Connection datatabase
	require_once '../bdd/connexion.php';

	if (isset($_POST['formconnect'])) {

		$Pseudo=htmlspecialchars($_POST['Pseudo_admin']);

		$mdp=md5($_POST['Mdp_admin']);

		if (!empty($Pseudo) AND !empty($mdp)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM user WHERE nom_user=? AND password_user=?");
			$requiser->execute(array($Pseudo,$mdp));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['num_user']=$userinfo['num_user'];
				$_SESSION['nom_user']=$userinfo['nom_user'];
				$_SESSION['password_user']=$userinfo['password_user'];
				$_SESSION['service']=$userinfo['service'];
				$_SESSION['role']=$userinfo['role'];
				header("Location: profile.php");		
			}
			else
			{
				$erreur="Mauvais Pseudo ou mauvais mot de passe! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}

	}