<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once 'securico.php';

	$id=$_GET['id'];
	$requser=$pdo->prepare("SELECT * FROM blog WHERE id=?");
	$requser->execute(array($id));
	$userinfo=$requser->fetch();
		
	if (isset($_POST['saves'])) {
		$nom=htmlspecialchars($_POST['nom']);
		$description=htmlspecialchars($_POST['description']);
		$name=$_FILES['image']['name'];
	    $errors=array(); 
	     // ****************logo***************************
	    if ($name=="") {

		if (empty($errors)) {

		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE blog SET nom=?,description=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom,$description,$id);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Article modifié avec Succès!')
			</script>
			<script>
				window.open('commentaires.php','_self')
			</script>
			<?php

			exit();	

			}	
			
			}
			else
			{
	    $tmpName=$_FILES['image']['tmp_name'];
		$size=$_FILES['image']['size'];
		$erreur=$_FILES['image']['error'];
		$type=$_FILES['image']['type'];
		// Voir l'extension du fichiers
		$tabExtension=explode('.', $name);
		$extension=strtolower(end($tabExtension));
		// Extension Autorisé
		$extensionAutorise=['jpg','jpeg','gif','png'];
		$tailleMax=2097152;

		if (in_array($extension, $extensionAutorise)) {

		if ($size<=$tailleMax) {

					if ($erreur==0) {
						$uniqueNom=uniqid('',true);
						$fileName=$uniqueNom.'.'.$extension;
						move_uploaded_file($tmpName,'photo_blog/'.$fileName);

		if (empty($errors)) {
				
		    //Création de l'objet prepare et envoie de la requête
		    $ps=$pdo->prepare("UPDATE blog SET nom=?,description=?,image=? WHERE id=?");
		    //Pour bien recupere les données on crée un table de parametre
		    $params=array($nom,$description,$fileName,$id);
		    //Execution de la requête par leur paramètre en ordre 
		    $ps->execute($params);
			// Pour recuperer l'id du user
			?>
			<script type="text/javascript">
				alert('Article modifié avec Succès!')
			</script>
			<script>
				window.open('commentaires.php','_self')
			</script>
			<?php

			exit();	

			}
		}
		else
		{
			$errors['photo']= "erreur nous ne pouvons pas uploader cette image!";
		}

			
			}
			else
			{
				$errors['photo']= "taille trop importante";
			}
				
			}
			else
			{

			$errors['photo']= "Mauvaise Extension";

			} 
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
	        <li class="nav-item"><a href="../Pages/blog.php" class="nav-link"> <p>Accueil</p></a></li>
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
		         	
		            <h3 class="mb-4">Edition</h3>
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
		                  <label class="label" for="name">Titre de l'evenement</label>
		                  <input type="text" name="nom" class="form-control" value="<?= $userinfo['nom'] ?>">
		               </div>
		                <div class="form-group">
		                  <label class="label" for="name">description:</label>
		                  <textarea type="text" name="description" class="form-control" placeholder="..."><?= $userinfo['description']; ?></textarea>
		               </div>
		               
		               <div class="form-group">
		               		<label class="label" for="Users">Image Illustrant l'evenement :</label>
		                   <input type="file" class="form-control" name="image">
		                   <img src="./photo_blog/<?= $userinfo['image'] ?>" width="100" height="80">
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
