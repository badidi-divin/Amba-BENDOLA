<?php
	session_start();
	require_once '../bdd/connexion.php';
	require_once('securico.php');

	$requete="SELECT * FROM contact2";
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
				<h2 class=" pt-1" style="font-weight: bold;">Communauté Saint Baptiste du Congo</h2>
				<h5 class=" pt-1" style="font-weight: bold;">CBCO N'djili</h5>
			</div>
		<div class="container col-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					LISTE DE MEMBRES QUI VEULENT RENCONTRER LE PASTEUR
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>CODE</th><th>NOM</th><th>MESSAGE</th><th>TIME</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['id'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['message'])?></td>
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
