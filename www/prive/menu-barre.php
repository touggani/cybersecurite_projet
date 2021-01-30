<?php include "entete.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
    <div id="menu-barre">
        <a href="index.php" class="btn">Menu</a>
        <?php if(array_key_exists('connecter',$_SESSION) && $_SESSION["connecter"]==true){ ?>
            <a href="chat.php" class="btn">Chat</a>
            <a href="compte.php" class="btn">Compte</a>
            <a href="prive/deconnexion.php" class="btn">Deconnexion</a>
        <?php } else { ?>
            <a href="connexion.php" class="btn">Connexion</a>
        <?php } ?>
        <a href="qsn.php" class="btn">Qui sommes-nous ?</a>
    </div>
<? include "fin.php";?>

