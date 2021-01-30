<?php 
    session_start();
	include "../DAO/Requete.php";
	$requete = new Requete();

    $requete->enregistrerMessage($_SESSION["user_id"], $_POST['message']); 
	
	
?>