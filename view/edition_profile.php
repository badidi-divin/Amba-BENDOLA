<?php
	session_start();
	require_once('../bdd/connexion.php');

	if (isset($_SESSION['id_admin'])) {

	$requser=$pdo->prepare("SELECT * FROM admin WHERE id_admin=?");
	$requser->execute(array($_SESSION['id_admin']));
	$user=$requser->fetch();
	if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] !=$user['Pseudo_admin']) {
		$newpseudo=htmlspecialchars($_POST['newpseudo']);
		$insertpseudo=$pdo->prepare('UPDATE admin SET Pseudo_admin=? WHERE id_admin=?');
		$insertpseudo->execute(array($newpseudo,$_SESSION['id_admin']));
		header("Location: profile.php?id_admin=".$_SESSION['id_admin']);
	}
	if (isset($_POST['Mdp_admin']) AND !empty($_POST['Mdp_admin']) AND $_POST['Mdp_admin'] !=$user['Mdp_admin']) {
		$Mdp_admin=md5($_POST['Mdp_admin']);
		$insertMdp_admin=$pdo->prepare('UPDATE admin SET Mdp_admin=? WHERE id_admin=?');
		$insertMdp_admin->execute(array($Mdp_admin,$_SESSION['id_admin']));
		header("Location: profile.php?id_admin=".$_SESSION['id_admin']);
	}
				
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta
	 charset="utf-8">
	<title>ISPT-KIN-Edition</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style type="text/css">
		.form-div{
				margin-top: 50px;
				border:1px solid #e0e0e0;
				padding-top: 5px;
			}
	</style>
</head>
<body>
		<?php
			require_once('../Pages/theme.php');
		?>
		<div class="container">
		<div class="row">
			<div class="col-4 offset-md-4 form-div">
				<form action="" method="post" enctype="multipart/form-data">
					<h3 class="text-center">Edition du Profile</h3>
					<div class="form-group">
			            <label class="label" for="name">Pseudo:</label>
			            <input type="text" class="form-control"  name="newpseudo" value="<?php echo $user['Pseudo_admin']; ?>"/>
			        </div>
			        <div class="form-group">
			            <label class="label" for="password">Password</label>
			          <input  type="password" class="form-control" name="Mdp_admin" value="<?php echo $user['Mdp_admin']; ?>">
			         </div>
<!-- 			         <div class="form-group">
			           <label class="label" for="password">Photo_admin</label>
			          <input type="file" class="form-control" name="Photo_admin">
			          </div> -->
			      
			     	<div class="form-group">
						<button type="submit" name="save-user" class="btn btn-primary btn-block">Mettre à Jour</button>
					</div>
				</form>	
				<?php
					if (isset($erreur)) {
						echo '<font color="red">'.$erreur."</font>";	
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
