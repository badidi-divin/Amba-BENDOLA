<?php
	session_start();
	require_once '../bdd/connexion.php';
	require_once('securico.php');
	$serv=$_SESSION['service'];
	$requete="SELECT * FROM tache WHERE service='$serv'";
	$resultat=$pdo->query($requete);

	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tableau de Bord</title>
	<link rel="stylesheet" href="../css/test.css">
	<style type="text/css">
		@page
		{
			size:A4;
			margin:0; 

		}
		#print-btn{
			display: none;
			visibility: none;
		}
		.margetop{
			margin-top: 60px;
		}
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
</head>
<body>
	<!--************************ Header ***********************************-->
	<!-- Navigation -->

			<div class="container headings text-center margetop" >
				<h2 class=" pt-1" style="font-weight: bold;">CVS/Kingabwa</h2>
				<img src="../img/5.PNG" width="80px" height="90px">
			</div>
		<div class="container col-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
						Liste des Taches du service <?php echo $_SESSION['service'];?>  
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>DESIGNATION</th><th>DESCRIPTION</th><th>SERVICE</th><th>DATE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['designation'])?></td>
								<td><?php  echo($et['description'])?></td>
								<td><?php  echo($et['service'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
											</tr>	
									<?php } ?>	
							</tbody>
						</table>
						<div class="text-center">
							<button onclick="window.print();" class="btn btn-primary">Print</button>
						</div>	
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
	
	
	<!-- Affichage inscris end -->
		
	




<!-- ***********footer Ends******************** -->
<!-- **********************Code Javascript*********************-->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
