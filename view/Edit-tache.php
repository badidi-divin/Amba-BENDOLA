<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once('securico.php');
	require_once('../model/edit-tache.php');
	$id=1;
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
				padding-top: 80px;
			}
			.space{
				margin-top: 60px;
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
					<a class="nav-link" style="font-size: 23px" href="profile.php">Tableau de bord</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter</a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
	 <div class="contenair bad col-md-6 col-xd-12 col-md-offset-3" style="margin-top:68px;">
	<!-- panel default ce n'est que la couleur qui va changer -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 align="center">EDITION DE LA TACHE</h2>
		</div>
		<div class="panel-body">
			<form method="post" action="">
				<?php
						if (!empty($errors)):
					?>
					<div class="alert alert-danger">
						<p></p>
							<ul>
								<?php foreach($errors as $error):?>
									<li><?= $error; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
				<div class="form-group">
					<label class="control-label">Designation:</label>
				    <input type="text" class="form-control" placeholder="designation" name="designation" value="<?php echo $userinfo['designation']  ?>">
				</div>
				<div class="form-group">
					<label class="control-label">Description:</label>
				     <textarea type="text" class="form-control" placeholder="Description" name="description"><?php echo $userinfo['description'];?></textarea>
				 </div>
				<div class="form-group" align="center">
					<button type="submit" class="btn btn-danger" name="divin">Editer</button>
				</div>
			</form>
           		
		</div>
	</div>
	<!-- Circulation de la page -->
	</body>
</html>
