<html>
    <head>
		<title>Messagerie</title>
		<link rel="stylesheet" type="text/css" href="tchat.css">
		<script src='jquery/autosize/dist/autosize.js'></script>
		<script src="jquery/jquery-3.5.0.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
	
    <body>
    	<div id="messagerie">
	        <div id="affichage-messages" class="scroll"></div>

			<form method="POST" action="traitement.php" id="formulaire">
			    <textarea name="message" id="message"></textarea>
			    <a href=""><i id="envoi" class="material-icons">send</i></a>
			</form>
		</div>

		
	</body>

<script>
	console.log("EHEHEHHEHEHE");

	autosize(document.querySelectorAll('textarea'));

	$('#envoi').click(function(e){
	    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
	    var message = encodeURIComponent( $('#message').val() );
	    $("#message").val('');
	    if(message != ""){ // on vérifie que les variables ne sont pas vides
	        $.ajax({
	            url : "traitement.php", // on donne l'URL du fichier de traitement
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

  		$.post("charger.php",{},
	  		function(data, status){
	  			data = JSON.parse(data);
	  			if(data.length != messageTableau.length){
			  		//$('#affichage-messages').prepend(data);
			  		
			    	console.log(data);
			    		$("#affichage-messages").empty();
				    	for (i in data){
				    		$('#affichage-messages').append("<p id='m'>"+ data[i].message + "</p>");
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