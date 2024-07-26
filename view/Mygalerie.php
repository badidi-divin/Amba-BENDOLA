<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once('securico.php');

	 //Pagination auteurbre d'element par page
	if (isset($_GET['id']) AND $_GET['id'] >  0) {
		$getid=intval($_GET['id']);
		$requser2=$pdo->prepare("SELECT * FROM galery_blog WHERE id_user=?");
		$requser2->execute(array($getid));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <title>Tableau de Bord</title>
   <link rel="stylesheet" href="../css/test.css">
   
   <style type="text/css">
      .margetop{
         margin-top:100px ;
      }
      .spacer{
         margin-top: 40px;
      }
      .space{
         margin-top: 120px;
      }
      .spac{
         margin-top: 80px;
      }
      .a{
         text-align:center;
         text-decoration: blink;
      }
   </style>
 </head>
	<body>
		<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
	<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
		<ul class="nav navbar-nav">
		<!-- Menu  -->
			<li>
				<a href="index.php">Tableau de bord</a>
			</li>
			<li>
				<a href="logoutn.php">Se déconnecter</a>
			</li>
			<?php
			require_once('../Pages/theme.php');
			?>
		</ul>
	</div>
			
			<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						LISTE DES IMAGES
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>DESCRIPTION</th><th>IMAGE</th><th>DATES</th>								
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$requser2->fetch()){?>
								<tr>
								<td><?php  echo($et['description'])?></td>
								<td><img src="../gallery/<?php echo($et['name']) ?>" width="100px" height="100"></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a class="btn btn-success" href="EditImage.php?id=<?php echo($et['id'])?>">Edit</a>
									<a class="btn btn-danger" onclick="return confirm('Etes-vous sûre...?');" href="SupprimeImage_blog.php?id=<?php echo($et['id'])?>">Supprimer</a>
								</td>
											</tr>	
									<?php } ?>	
							</tbody>
						</table>
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
</html>
<?php
}
?>