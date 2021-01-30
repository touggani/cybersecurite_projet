<?php $css = "connexion.css"; include "prive/entete.php"; 
    include "prive/menu-barre.php"; include "DAO/Requete.php"; ?>

    <div id="connexion">
        <div class='bold-line'></div>
            <div class='container'>
                <div class='window'>
                    <div class='overlay'></div>
                    <div class='content'>
                    <div class='welcome'>Bonjour !</div>
                    <div class='input-fields'>
                        <form action="prive/connexion_utilisateur.php" method="post">
                            <i style="color:red;"><?php if(array_key_exists('error-email-connexion',$_SESSION)){echo $_SESSION["error-email-connexion"];$_SESSION["error-email-connexion"]="";} ?><i>
                            <input type="text" placeholder='Email' class="input-line full-width" name="email"><br>
                            <i style="color:red;"><?php if(array_key_exists('error-mdp-connexion',$_SESSION)){echo $_SESSION["error-mdp-connexion"];$_SESSION["error-mdp-connexion"]="";} ?><i>
                            <input type="text"  placeholder='Password' class="input-line full-width" name="mot_de_passe">
                            <input class='ghost-round full-width' type="submit" value="Se connecter">
                        </form>
                    </div>
                    <i style="color:red;"><?php if(array_key_exists('error-connexion',$_SESSION)){echo $_SESSION["error-connexion"];$_SESSION["error-connexion"]="";} ?><i>
                    <div class='spacing' class="inscription"><span class='highlight'>Créer un compte </span></div>
                </div>
            </div>
        </div>
    </div>

    <div id="inscription">
        <div class='bold-line'></div>
            <div class='container'>
                <div class='window'>
                    <div class='overlay'></div>
                    <div class='content'>
                    <div class='welcome'>Bonjour !</div>
                    <div class='input-fields'>
                        <form action="prive/enregistrement_utilisateur.php" method="post">
                            <i style="color:red;"><?php if(array_key_exists('error-nom',$_SESSION)){echo $_SESSION["error-nom"];$_SESSION["error-nom"]="";} ?><i>
                            <input type="text" placeholder="Nom d'utilisateur" class="input-line full-width" name="nom_utilisateur"><br>
                            <i style="color:red;"><?php if(array_key_exists('error-email',$_SESSION)){echo $_SESSION["error-email"];$_SESSION["error-email"]="";} ?><i>
                            <input type="text" placeholder='Email' class="input-line full-width" name="email"><br>
                            <i style="color:red;"><?php if(array_key_exists('error-mdp',$_SESSION)){echo $_SESSION["error-mdp"];$_SESSION["error-mdp"]="";} ?><i>
                            <input type="text"  placeholder='Mot de passe' class="input-line full-width" name="mot_de_passe">
                            <input class='ghost-round full-width' type="submit" value="S'inscrire">
                        </form>
                        <i style="color:red;"><?php if(array_key_exists('error',$_SESSION)){echo $_SESSION["error"];$_SESSION["error"]="";} ?><i>
                    </div>
                    <div class='spacing' ><span class='highlight' class="connecter">Se connecter</span></div>
                </div>
            </div>
        </div>
    </div>
    <?php 

		$requete = new Requete();

	
        $util = $requete->getUtilisateurs(); 

        //print_r($util);
	?>

<script>
    $("#inscription").hide();

    $( ".highlight" ).click(function() {
        if( $("#inscription").is(":visible")){
            $("#connexion").show();
            $("#inscription").hide();
        }
        else{
            $("#connexion").hide();
            $("#inscription").show();
        }
    });
    
</script>

<?php include "prive/fin.php"; ?>