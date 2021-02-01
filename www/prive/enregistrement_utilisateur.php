<?php
    include "../DAO/Requete.php";

    
    session_start();
    if (!empty($_POST['email']) && !empty($_POST['mot_de_passe']) && !empty($_POST['nom_utilisateur'])){
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error-email"] = "Format d'email invalide";
        }
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{4,31}$/' , $_POST['nom_utilisateur'])) {
            $_SESSION["error-nom"] = "Nom d'utilisateur invalide";
        }
        if(empty($_POST['mot_de_passe'])){
            $_SESSION["error-mdp"] = "Le champs est vide";
        }
        if(!empty($_SESSION["error-nom"]) || !empty($_SESSION["error-email"])){
            header('Location: ../connexion.php');
            exit();
        }
        $requete = new Requete();
        $requete->enregistrerUtilisateur($_POST['nom_utilisateur'], $_POST['email'], sha1($_POST['mot_de_passe'])); 
        header('Location: ../connexion.php');
        exit();
    }
    else{
        
        $_SESSION["error"] = "Un ou plusieurs champs ne sont pas remplies";
        header('Location: ../connexion.php');
        exit();
    }

?>