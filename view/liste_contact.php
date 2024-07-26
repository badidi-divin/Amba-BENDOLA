<?php
	session_start();
	require_once('securico.php');
?>
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
				margin-top: 20px;
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
					<a class="nav-link" style="font-size: 23px" href="index.php">Tableau de bord</a>
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
		 $mc="";
		    //Pagination nombre d'element par page
		   $size=10;
		   if(isset($_GET['page'])){
		   	$page=$_GET['page'];
		   }
		   else
		   {
		   	$page=0;
		   }

		   $offset=$size*$page;
	  
			if(isset($_GET['motcle'])){
				$mc=$_GET['motcle'];
				$req="SELECT * FROM contact WHERE nom LIKE '%$mc%' LIMIT $size OFFSET $offset";
			}
			else
			{
				$req="SELECT * FROM contact LIMIT $size OFFSET $offset";
			}
			$ps=$pdo->prepare($req);
			$ps->execute();
			//Cette requete me permet de connaitre le nbre de page contenant mes enregistrements
			if (isset($_GET['motcle'])){
				$ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET FROM contact WHERE nom LIKE '%$mc%'");
			}
			else
			{
				$ps2=$pdo->prepare("SELECT COUNT(*) AS NB_ET FROM contact");
			}
				$ps2->execute();
				$ligne=$ps2->fetch(PDO::FETCH_ASSOC);
				$NBE=$ligne['NB_ET'];
			//Nbre de page
			if(($NBE % $size)==0){
				$NbPage=floor( $NBE/$size);
			} 
			else 
			{
				$NbPage=floor($NBE/$size)+1;
			}
	?>
		<div class="col-md-12 col-xd-12 space">
			<form method="get" action="liste_contact.php">
				<div class="form-group">
					<label for="motcle" class="control-label">
						<p>Mot Clé:</p>
					</label>
				<div class="form-group">
					<input type="text" class="form-control" name="motcle" value="<?php echo ($mc) ?>" placeholder="Entrer le Nom à chercher...">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
				</div>

				<div class="form-group">
					<a href="imprimer_contact.php" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></a>
						&nbsp;&nbsp;
						<a onclick="return confirm('Etes-vous sûre...?les données seront perdues!');" href="vider_contact.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash">Vider</span></a>
				</div>
					
				</div>
			</form>
		</div>
			<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						LISTE DES UTILISATEURS QUI NOUS ONT CONTACTES
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>CODE</th><th>NOM</th><th>EMAIL</th><th>NUMERO_WHATSAPP</th><th>MESSAGE</th><th>TIME</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$ps->fetch()){?>
								<tr>
								<td><?php  echo($et['id'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['email'])?></td>
								<td><?php  echo($et['numero'])?></td>
								<td><?php  echo($et['message'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a onclick="return confirm('Etes-vous sûre...?');" href="Supprimeuser.php?id=<?php echo($et['id'])?>">Supprimer</a></td>
											</tr>	
									<?php } ?>	
							</tbody>
						</table>
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
		<div class="col-md-12 col-xs-12 ">
			<ul class="nav nav-pills">
				<?php for($i=0; $i<$NbPage; $i++){?>
					<li class="<?php echo (($i==$page)?'active':'');?>">  
						<a href="liste_contact.php?page=<?php echo($i)?>$motcle=<?php echo($mc)?>">Page<?php echo($i)?></a>
					</li>
					<?php }?>
			</ul>
		</div>
	</body>
</html>