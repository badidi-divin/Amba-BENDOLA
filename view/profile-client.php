<?php
	session_start();
	require_once '../bdd/connexion.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once('header2.php'); ?>
</head>
<body>
	
<!--************************ Menu Principal ***********************************-->
<!-- Navigation -->
	<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile.php">Tableau de bord</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter(<?php
						echo $_SESSION['nom_user']."-".$_SESSION['service'];
					?>) </a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
<!--************************End Menu Principal ***********************************-->
		<div align="center" style="	padding-top: 150px;">
		<img src="../img/5.PNG" width="80px" height="90px">
			<h1 style="font-size: 45px;">
				Bienvenue  <?php echo $_SESSION['nom_user']."-".$_SESSION['role']."-".$_SESSION['service']; ?>

			</h1>
		</div>
	<div class="container-fluid">
		<div class="row welcome text-center">
			<div class="col-12">				
				<a href="tache.php" class="btn btn-danger">Gestion de Tâche:<?php
									$nbuse=$pdo->prepare("SELECT * FROM tache WHERE service='$serv'");
									$nbuse->execute();
									$nbuse=$nbuse->fetchAll();
									echo count($nbuse);
								?>
				
		</div>
	</div>
</div>
</body>
</html>




