<?php
require_once ('ConnexionBaseDeDonnees.php');

class Requete{
	private $baseDeDonnees = NULL;

	public function __construct(){
		$connexion = new ConnexionBaseDeDonnees();
		$this->baseDeDonnees = $connexion->getBaseDeDonnees();
	}

	public function enregistrerMessage($message){
		try{
			$SQL_AJOUTER_MESSAGE = "INSERT INTO `message`(`message`)
				VALUES (:message)";
			$requeteAjoutMessage = $this->baseDeDonnees->prepare($SQL_AJOUTER_MESSAGE);
			$requeteAjoutMessage->bindParam(':message', $message, PDO::PARAM_STR);
			$requeteAjoutMessage->execute();
		}
		catch(PDOException $e){
			die('<p>erreur d\'ajout du message' . $e->getMessage(). '</p>');
		}
	}
	public function getDerniersMessages(){
		$SQL_LISTE_MESSAGE = "SELECT * FROM message";
		$resultatListeMessage = $this->baseDeDonnees->prepare($SQL_LISTE_MESSAGE);
		$resultatListeMessage->execute();
		$listeMessage = $resultatListeMessage->fetchAll (PDO::FETCH_ASSOC);		
		return $listeMessage;
	}

}