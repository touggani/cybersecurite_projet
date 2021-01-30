<?php 
    include "../DAO/Requete.php";
    $requete = new Requete();

    
    $message = $requete->getDerniersMessages(); 
    echo json_encode($message);
?>