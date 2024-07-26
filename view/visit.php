<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="../css/test.css">
</head>
	<style type="text/css">
		/** Pour creer un decallage **/
			.spacer{
				margin-top: 10px;
			}
			.space{
				margin-top: 70px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
	<body>
		<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="../Pages/accueil.php">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile_session.php">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter</a>
				</li>
				<?php
					require_once('../Pages/theme.php');
				?>
			</ul>
		</div>
	<!-- navigation end -->
	<?php 
	    require_once("../bdd/connexion.php");
		$req="SELECT * FROM visite";
		$ps=$pdo->prepare($req);
		$ps->execute();
		
	?>
		<div class="col-md-12 col-xd-12 space">
			<div class="form-group">
				<a onclick="return confirm('Etes-vous sûre vider la table?')" href="vider_visit.php" class="btn btn-primary">Vider la table</a>
			</div>
		</div>
			<div class="col-md-12 col-xs-12 space">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						VISUALISATION DES VISITES USERS PAR PAGES
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>PAGE</th><th>NOMBRE DE VISITE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$ps->fetch()){?>
								<tr>
								<td><?php  echo($et['Nom_page'])?></td>
								<td><?php  echo($et['Nombre_visite'])?></td>
								<!--liens -->
								
											</tr>	
									<?php } ?>	
							</tbody>
						</table>
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
	</body>
</html>				