<?php
	session_start();
	require_once '../bdd/connexion.php';
	require_once('securico.php');
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
         margin-top: 10px;
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
	<!--************************ Header ***********************************-->
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
	<!-- Affichage des inscris -->
	<?php
	$nom=isset($_GET['nom'])?$_GET['nom']:"";
	
	$size=isset($_GET['size'])? $_GET['size']:3;
	$page=isset($_GET['page'])? $_GET['page']:1; 
	$offset=($page-1)*$size;

	$requete="SELECT * FROM blog WHERE nom LIKE '%$nom%' LIMIT $size offset $offset";	
	$requeteCount="SELECT COUNT(*) countF FROM blog WHERE nom LIKE '%$nom%'";
	
	$resultat=$pdo->query($requete);
	$resultatCount=$pdo->query($requeteCount);
	$tabCount=$resultatCount->fetch();
	$nbreFiliere=$tabCount['countF'];
	$reste=$nbreFiliere % $size;

	if($reste===0)
		$nbrePage=$nbreFiliere/$size;
	else
		$nbrePage=floor($nbreFiliere/$size)+1;	
?>
	<div class="container col-12">
			<div class="panel panel-primary margetop">
				<div class="panel-heading">
					Rechercher...
				</div>
				<div class="panel-body">
					<form method="get" action="" class="form-inline">
						<div class="form-group">
							<label for="nom">Nom:</label>
							<input type="text" name="nom" class="form-control" placeholder="Mettez le nom de l'article" value="<?php echo $nom ?>">
						</div>
						<button type="submit" class="btn btn-success">
						<span class="glyphicon glyphicon-search"></span></button>
						&nbsp;&nbsp;
						<a onclick="return confirm('Etes-vous sûre...?les données seront perdues!');" href="vid_blog.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash">Vider</span></a>
					</form>
				</div>
			</div>
				<!--un div encadrer ayant plusierus categorie dont n a utiliser info  -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						Liste des articles publiés(<?= $nbreFiliere ?> Enregistrements)
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th><th>TITRE</th><th>DESCRIPTION</th><th>IMAGE</th><th>DATES</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['id'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo substr(($et['description']),0,10)?>...</td>
								<td><img src="./photo_blog/<?php  echo($et['image'])?>" width="100" height="80"></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td>
								<a  href="Editarticle.php?id=<?php echo($et['id'])?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
								<a  onclick="return confirm('Etes-vous sûre...?');" class="btn btn-danger" href="Supprimeblog.php?id=<?php echo($et['id'])?>"><span class="glyphicon glyphicon-trash"></span></a>
								<a  href="comment.php?id=<?php echo($et['id'])?>" class="btn btn-success"><span class="glyphicon glyphicon-comment"></span></a>
								<a  href="galery.php?id=<?php echo($et['id'])?>" class="btn btn-success"><span class="glyphicon glyphicon-picture"></span></a>
								</td>
											</tr>	
									<?php } ?>	
							</tbody>
						</table>
						<div>
							<ul class="pagination pagination-md">
								<?php for($i=1;$i<=$nbrePage;$i++) {?>
									<li class="<?php if($i==$page) echo 'active';?>"> 
										<a href="commentaire.php?page=<?php echo $i; ?>"> 
											Page<?php echo $i ?>	
										</a>
									</li>
								 <?php } ?>
							</ul>
						</div>	
					</div>
				</div>	

			</div>
			
	<!-- Circulation de la page -->
	
	<!-- Affichage inscris end -->

	<!-- **********************Code Javascript*********************-->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>