<?php
	session_start();
	require_once '../bdd/connexion.php';
	require_once('securico.php');
	$t=1;
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
         margin-top: 80px;
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
				<a href="profile.php">Tableau de bord</a>
			</li>
			<li>
				<a href="logout.php">Se déconnecter(<?php
						echo $_SESSION['nom_user']."-".$_SESSION['service'];
					?>)</a>
			</li>

		</ul>
	</div>
	<!-- Affichage des inscris -->
	<?php
		require_once('../model/tache.php');
		?>
	<div class="contenair col-lg-12 col-md-6 spacer">
		<div class="panel panel-primary ">
				<div class="panel-heading">
					Rechercher
				</div>
				<div class="panel-body">
					<form method="get" action="" class="form-inline">
						<div class="form-group">
							<label for="propri">Designation:</label>
							<input type="text" name="mot1" class="form-control" placeholder="Mettez la Designation de la tache" value="<?php echo $mot1 ?>">
						</div>
						<label for="option">Etat:</label>
						<select name="mot2" class="form-control" onchange="this.form.submit()" id="option">
							<option value="all"  <?php if($mot2==="all") echo "selected" ?>>Tous</option>
							<option value="1" <?php if($mot2==="Traiter") echo "selected" ?>>Traiter</option>
							<option value="0" <?php if($mot2==="Non Traiter") echo "selected" ?>>Non Traiter</option>
						</select>
						<button type="submit" class="btn btn-success">
						<span class="glyphicon glyphicon-search"></span></button>
						&nbsp;&nbsp;
						<?php if ($_SESSION['role']=='admin') {
							?>
							<a href="ajout-tache.php" class="btn btn-primary" title="Ajouter"><span class="glyphicon glyphicon-plus"></span></a>
							<?php
						} ?>
						&nbsp;&nbsp;
						<a href="imprimer.php" class="btn btn-primary" title="Imprimer toutes les tâhche"><span class="glyphicon glyphicon-print"></span></a>
					</form>
				</div>
			</div>
				<!--un div encadrer ayant plusierus categorie dont n a utiliser info  -->

			<div class="col-md-12 col-xs-12 ">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						Liste des Taches du service <?php echo $_SESSION['service'];?>  (<?= $nbreFiliere ?> Enregistrements)
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th><th>DESIGNATION</th><th>DESCRIPTION</th><th>SERVICE</th><th>DATE</th>
								</tr>
							</thead>
							<tbody style="background-color: white;">
								<?php while ($et=$resultat->fetch()){?>
								<tr class="<?php echo ($et['etat']==1? 'success':'danger');?>">
									<td><?php  echo($et['id'])?></td>
								<td><?php  echo($et['designation'])?></td>
								<td><?php  echo($et['description'])?></td>
								<td><?php  echo($et['service'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td>
									<?php if ($_SESSION['role']=='admin') {
										?>
												<a class="btn btn-primary" href="Edit-tache.php?id=<?php echo($et['id'])?>"><span class="glyphicon glyphicon-edit"></span></a>
										<a  onclick="return confirm('Etes-vous sûre...?');" class="btn btn-danger" href="../model/Supprimetache.php?id=<?php echo($et['id'])?>"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="activetache.php?id=<?php echo($et['id'])?>&etat=<?= $et['etat']; ?>" class="btn btn-success">

										<?php
											if($et['etat']!=1)
												echo '<span class="glyphicon glyphicon-ok" title="Valider?"></span>';

											else
												echo '<span class="glyphicon glyphicon-remove" title="Rejetter?"></span>';
										?>
											
										</a>	
										<?php
									} ?>
										</td>
											</tr>	
									<?php 
									$t++;} ?>	
							</tbody>
						</table>
						<div>
							<ul class="pagination pagination-md">
								<?php for($i=1;$i<=$nbrePage;$i++) {?>
									<li class="<?php if($i==$page) echo 'active';?>"> 
										<a href="tache.php?page=<?php echo $i; ?>"> 
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
