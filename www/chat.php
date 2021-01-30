<?php $css = "chat.css"; include "prive/entete.php"; 
    include "prive/menu-barre.php"; include "DAO/Requete.php"; 
?>

<div id="messagerie">
    <div id="affichage-messages" class="scroll"></div>
    <form method="POST" action="traitement.php" id="formulaire">
        <textarea name="message" id="message"></textarea>
        <a href=""><i id="envoi" class="material-icons">send</i></a>
    </form>
</div>


<script>
	autosize(document.querySelectorAll('textarea'));

	$('#envoi').click(function(e){
	    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
	    var message = encodeURIComponent( $('#message').val() );
	    $("#message").val('');
	    if(message != ""){ // on vérifie que les variables ne sont pas vides
	        $.ajax({
	            url : "prive/traitement.php", // on donne l'URL du fichier de traitement
	            type : "POST", // la requête est de type POST
	            data : "message=" + message // et on envoie nos données
            });
	        //$('#affichage-messages').append("<p>dit : " + message + "</p>");
	    }
	});

	function updateScroll(){
    	var element = document.getElementById("affichage-messages");
    	element.scrollTop = element.scrollHeight;
	}

	var messageTableau = [];

	function receptionMessage(){

  		$.post("prive/charger.php",{},
	  		function(data, status){
                  data = JSON.parse(data);
	  			if(data.length != messageTableau.length){
			  		//$('#affichage-messages').prepend(data);
			  		
			    	console.log(data);
			    		$("#affichage-messages").empty();
				    	for (i in data){
                            if(data[i]["id_exp"] == 9){
                                $('#affichage-messages').append("<p id='m' class='util-moi'>"+ data[i].message + "</p>");
                            }
                            else{
                                $('#affichage-messages').append("<p id='m' class='util-autre'>"+ data[i].message + "</p>");
                            }
				    	}
				    messageTableau = data;
				    updateScroll();
				}
			}
		);
		setTimeout(receptionMessage, 1000);
		//setInterval(updateScroll,100);
	}

	receptionMessage();
	

	


</script>