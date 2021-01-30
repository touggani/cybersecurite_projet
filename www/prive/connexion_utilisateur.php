<?php
    include "../DAO/Requete.php";

    session_start();
    if (!empty($_POST['email']) && !empty($_POST['mot_de_passe'])){
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error-email-connexion"] = "Format d'email invalide";
        }
        if(empty($_POST['mot_de_passe'])){
            $_SESSION["error-mdp-connexion"] = "Le champs est vide";
        }
        if(!empty($_SESSION["error-email-connexion"]) || !empty($_SESSION["error-mdp-connexion"])){
            header('Location: ../connexion.php');
            exit();
        }

        $requete = new Requete();
        $util = $requete->getMotDePasse($_POST['email']);

        if(sha1($_POST['mot_de_passe']) != $util[0]["mot_de_passe"]){
            $_SESSION["error-connexion"] = "Identifiant ou mot de passe incorrecte";
            header('Location: ../connexion.php');
            exit();
        }
        
        $util = $requete->getUtilisateurByUsername($_POST['email']);
        
        $_SESSION["connecter"] = true;
        $_SESSION["user_id"] = $util[0]["id"];
        header('Location: ../index.php');
        exit();
    }
    else{
        
        $_SESSION["error-connexion"] = "Un ou plusieurs champs ne sont pas remplies";
        header('Location: ../connexion.php');
        exit();
    }
?>