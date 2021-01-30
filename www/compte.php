<?php $css = "compte.css"; include "prive/entete.php"; 
    include "prive/menu-barre.php"; include "DAO/Requete.php"; 
    
    $requete = new Requete();
    $res = $requete->getNomUtilisateur($_SESSION["user_id"]);
?>


<h1 style="margin-top:20%;font-size:50px;">Bienvenue @<?php echo $res[0]["nom_utilisateur"]; ?></h1>