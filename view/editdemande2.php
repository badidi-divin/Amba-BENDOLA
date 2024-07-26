<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once 'securico.php';

	$id=$_GET['id'];
	$requser=$pdo->prepare("SELECT * FROM contact3 WHERE id=?");
	$requser->execute(array($id));
	$userinfo=$requser->fetch();
		
	if (isset($_POST['saves'])) {
		$message=htmlspecialchars($_POST['message']);
		$demande=htmlspecialchars($_POST['demande']);

	    $errors=array(); 
	     // ****************logo***************************
		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE contact3 SET message=?,demande=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($message,$demande,$id);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Rendez-vous modifié avec Succès!')
			</script>
			<script>
				window.open('liste_temoignage2.php','_self')
			</script>
			<?php

			exit();	

			}	
		}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		require_once('../Pages/header.php');
	?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	   <div class="container">
<!-- 	      <img src="../images/logos.png" width="90px" height="80Px" title="Heavens Entrepreneurs"> -->
	      <a class="navbar-brand" href="#"><span>CBCO</span> N'Djili</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	   <div class="collapse navbar-collapse" id="ftco-nav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item"><a href="../Pages/contact3.php" class="nav-link"> <p>Accueil</p></a></li>
	        <li class="nav-item"><a href="profile.php" class="nav-link"> <p>Tableau de Bord</p></a></li>
	        <li class="nav-item"><a href="logout.php" class="nav-link"><p>Déconnection</p></a></li>
	      </ul>
	   </div>
	  </div>
	</nav>
	<div class="hero-wrap js-fullheight" style="background-image: url('../images/3.jpg');">
	   <div class="overlay"></div>
		<div class="container">
		   <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
			   <div class="col-md-7 ftco-animate">
			      <span class="subheading">Il est le chemin, la vérité et la vie. (Jean 14:6)</span>
			   </div>
			</div>
		</div>
	</div>
	<section class="ftco-section ftco-no-pb ftco-no-pt" style="background-color:; ">
	   <div class="container">
	      <div class="row">
		       <div class="col-md-7"></div>
		       <div class="col-md-5 order-md-last">
		         <div class="login-wrap p-4 p-md-5">
		         	
		            <h3 class="mb-4">Edition du Rendez-vous</h3>
		            <form action="" method="post" class="signup-form" enctype="multipart/form-data">
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
		                  <label class="label" for="name">Message</label>
		                   <textarea type="text" name="message" class="form-control"><?= $userinfo['message']; ?></textarea>
		               </div>
		                <div class="form-group">
		                  <label class="label" for="name">demande</label>
		                  <textarea type="text" name="demande" class="form-control" placeholder="..."><?= $userinfo['demande']; ?></textarea>
		               </div>
		               
		               	<div class="form-group d-flex justify-content-end mt-4">
		                 <button type="submit" name="saves" class="btn btn-outline-primary">Edition<span class="fa fa-paper-plane"></span></button>
		             	</div>
		         </form>        
		     </div>
		 </div>
		</div>
		</div>
	</section>
	<?php
		require_once('../Pages/foot_js.php');
	?>
</body>
</html>
