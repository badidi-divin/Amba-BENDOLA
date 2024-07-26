<?php 
	session_start();
	header("Location: profile.php?id_admin=".$_SESSION['id_admin']);
?>