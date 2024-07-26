<?php
	require_once('../model/connexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width-device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/test.css">
	<style type="text/css">
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

<div class="contenair col-md-6 col-xd-12 col-md-offset-3">
	<!-- panel default ce n'est que la couleur qui va changer -->
	<div align="center" style="margin-bottom:20px;">
		<h2 style="font-weight:bold;">
			GESTION DES DISTRIBUTIONS DES TACHES DANS LA CVS/KINGABWA
		</h2><br>
		<img src="../img/5.PNG" width="60px" height="70px"><br>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="a">CONNEXION BACK-OFFICE</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="">
				<div class="form-group">
					<label class="control-label">
						Pseudo:
					</label>
					<input type="text" name="Pseudo_admin" required="required" class="form-control">
				</div>
			  <div class="form-group">
					<label class="control-label">
						Password:
					</label>
					<input type="password" name="Mdp_admin" required="required" class="form-control">
			  </div>
				<div class="control-label a">
					<button type="submit" class="btn btn-primary" name="formconnect">Se connecter</button>
				</div>

			</form>
			<a href="connexion-client.php">Connexion Front-Office</a>
			<?php
			if (isset($erreur)) {
				echo "<font color='red'>".$erreur."</font>";
			}
		?>
		</div>
	</div>
</div>
</body>
</html>
