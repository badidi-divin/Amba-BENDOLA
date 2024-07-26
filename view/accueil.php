<?php 
	require_once('../model/bdd/connexion.php');
	require_once('../model/inscription.php');

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SNEL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/magnific-popup.css">

    <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./css/jquery.timepicker.css">

    <link rel="stylesheet" href="./css/flaticon.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
		<div class="wrap">
	    <div class="container">
				<div class="row justify-content-between">
					<div class="col-3 d-flex align-items-center">
						<a class="navbar-brand d-flex" href="#"><div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-roof-2"></span></div>SNEL</a>
					</div>
				</div>
			</div>
		</div>
		
		<section class="menu-wrap flex-md-column-reverse d-md-flex">
			<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		    <div class="container">
		    
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="fa fa-bars"></span> Menu
		      </button>
		    </div>
		  </nav>
	    <!-- END nav -->
	    <div class="hero-wrap js-fullheight">
		    <div class="home-slider js-fullheight owl-carousel">
		      <div class="slider-item js-fullheight" style="background-image:url(images/.jpg);">
		      	<div class="overlay"></div>
		        <div class="container">
		          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			          <div class="col-md-10 text-center ftco-animate">
			          	<div class="text w-100">
			          		<h2>Nous sommes unique et particulier dans notre formation</h2>
				            <h1 class="mb-4">Soyez le Bienvenue!</h1>
				            <p><a href="#service" class="btn btn-primary">S'inscrire</a></p>
			            </div>
			          </div>
			        </div>
		        </div>
		      </div>

		      <div class="slider-item js-fullheight" style="background-image:url(images/2-2.jpg);">
		      	<div class="overlay"></div>
		        <div class="container">
		          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			          <div class="col-md-8 text-center ftco-animate">
			          	<div class="text w-100">
			          		<h2>Inscrivez-vous en un clic dans cette plateforme</h2>
				            <h1 class="mb-4">Une formation de qualité à un prix abordable</h1>
				            <p><a href="#service" class="btn btn-primary">S'inscrire</a></p>
			            </div>
			          </div>
			        </div>
		        </div>

		      </div>
		    </div>
		  </div>
		</section>
   	
    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light ftco-appointment">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-7">
    				<div class="row justify-content-start py-5 pr-md-4">
		          <div class="col-md-12 heading-section ftco-animate py-md-4">
		            <h2 class="mb-4">Qui Sommes Nous?</h2>
		            <p>Notre Pays a besoin d'une école digne de son nom afin de former des intellectuels qui deviendront des futurs cadres de demain..</p>
		            
		          </div>
		        </div>
	        </div>
	        <div class="col-lg-5 d-flex align-items-stretch" id="service">
	        	<div class="bg-white">
		        	<div class="w-100 heading-title bg-primary text-center">
		        		<h2 class="mb-0">INSCRIPTION EN COURS...</h2>

		        	</div>
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
	    				<form method="post" action="" class="appointment bg-white p-4 p-md-5">
			    					
	    					<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Nom:</label>
				              <input type="text" class="form-control" placeholder="Votre Nom" name="nom" value="<?php if(isset($nom)){ echo $nom; } ?>">
				            </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Post-Nom:</label>
				              <input type="text" class="form-control" placeholder="Votre Post-Nom" name="postnom" value="<?php if(isset($postnom)){ echo $postnom; } ?>">
				            </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Prenom:</label>
				              <input type="text" class="form-control" placeholder="Votre Prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; } ?>" >
				            </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Sexe:</label>
				              <select name="sexe" class="form-control" autocomplete="off" required="required">
                    <option value="Masculin">
                    	Masculin
                    </option>
                    <option value="Féminin">
                     	Féminin
                    </option>
                  </select>
				            </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">E-mail:</label>
				              <input type="email" class="form-control" placeholder="Adresse E-mail" name="email" value="<?php if(isset($email)){ echo $email; } ?>">
				            </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
				    					<div class="input-wrap">
				            		<div class="icon"><span class="fa fa-calendar"></span></div>
				            		<label class="control-label">Télephone:</label>
				            		<input type="number" class="form-control" placeholder="Numéro Télephone" name="numero" value="<?php if(isset($numero)){ echo $numero; } ?>">
			            		</div>
				    				</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Adresse Complète:</label>
				              <textarea  id="" cols="30" rows="7" class="form-control" placeholder="Adrese Complète..." name="adresse"><?php if(isset($adresse)){ echo $adresse; }?></textarea>
				            </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Classe:</label>
				              <select name="classe" class="form-control" autocomplete="off" required="required">
                    <option value="1ère">
                    	1ère
                    </option>
                    <option value="2ème">
                     	2ème
                    </option>
                     <option value="3ème">
                    	3ème
                    </option>
                    <option value="4ème">
                     	4ème
                    </option>
                    <option value="5ème">
                     	5ème
                    </option>
                    <option value="6ème">
                     	6ème
                    </option>
                  </select>
				            </div>
									</div>
									<h3>SYSTEME CAPTCHA</h3>
									<div class="form-group">
										<label for="code">Entrer le code suivant:</label>
									</div>
									<!-- L'image sera générai par le CAPTCHA -->
									<div class="form-group">
										<img src="captcha.php" width="80px" height="60px" alt="CAPTCHA"/><br/>
									</div>
									<div class="form-group">
										<input type="text" id="code" class="form-control" name="code" required="required" /><br><br>
									</div>
									<div class="col-md-12">
										<div class="form-group">
				              <input type="submit" value="S'inscrire" class="btn btn-primary py-3 px-4" name="divin">
				            </div>
									</div>
	    					</div>
		          </form>
		         
		        </div>
    			</div>
        </div>
    	</div>
    </section>

    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>