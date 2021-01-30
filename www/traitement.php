<?php 
	include "DAO/Requete.php";
	$requete = new Requete();

	
	$requete->enregistrerMessage($_POST['message']); 
	
	
?>