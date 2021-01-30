<?php
require_once ('ConnexionBaseDeDonnees.php');

class Requete{
	private $baseDeDonnees = NULL;

	public function __construct(){
		$connexion = new ConnexionBaseDeDonnees();
		$this->baseDeDonnees = $connexion->getBaseDeDonnees();
	}

	/*public function enregistrerMessage($message){
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
	}*/
	public function getUtilisateurs(){
		$SQL_LISTE_UTILISATEURS = "SELECT * FROM utilisateurs";
		$resultatListeUtilisateurs = $this->baseDeDonnees->prepare($SQL_LISTE_UTILISATEURS);
		$resultatListeUtilisateurs->execute();
		$listeUtilisateurs = $resultatListeUtilisateurs->fetchAll (PDO::FETCH_ASSOC);		
		return $listeUtilisateurs;
	}

	public function getUtilisateurByUsername($email){
		$SQL_LISTE_UTILISATEURS = "SELECT id FROM utilisateurs where email = '".$email."'";
		$resultatListeUtilisateurs = $this->baseDeDonnees->prepare($SQL_LISTE_UTILISATEURS);
		$resultatListeUtilisateurs->execute();
		$listeUtilisateurs = $resultatListeUtilisateurs->fetchAll (PDO::FETCH_ASSOC);		
		return $listeUtilisateurs;
	}

	public function getMotDePasse($email){
		$SQL_LISTE_UTILISATEURS = "SELECT mot_de_passe FROM utilisateurs where email = '".$email."'";
		$resultatListeUtilisateurs = $this->baseDeDonnees->prepare($SQL_LISTE_UTILISATEURS);
		$resultatListeUtilisateurs->execute();
		$listeUtilisateurs = $resultatListeUtilisateurs->fetchAll (PDO::FETCH_ASSOC);		
		return $listeUtilisateurs;
	}

	public function getNomUtilisateur($id){
		$SQL_LISTE_UTILISATEURS = "SELECT nom_utilisateur FROM utilisateurs where id = '".$id."'";
		$resultatListeUtilisateurs = $this->baseDeDonnees->prepare($SQL_LISTE_UTILISATEURS);
		$resultatListeUtilisateurs->execute();
		$listeUtilisateurs = $resultatListeUtilisateurs->fetchAll (PDO::FETCH_ASSOC);		
		return $listeUtilisateurs;
	}

	public function getMessages(){
		$SQL_LISTE_UTILISATEURS = "SELECT * FROM message";
		$resultatListeUtilisateurs = $this->baseDeDonnees->prepare($SQL_LISTE_UTILISATEURS);
		$resultatListeUtilisateurs->execute();
		$listeUtilisateurs = $resultatListeUtilisateurs->fetchAll (PDO::FETCH_ASSOC);		
		return $listeUtilisateurs;
	}

	public function enregistrerMessage($id, $messages){
		try{
			$SQL_AJOUTER_MESSAGE = "INSERT INTO `message`(`id_exp`,`message`) VALUES (:id,:messages)";
			$requeteAjoutMessage = $this->baseDeDonnees->prepare($SQL_AJOUTER_MESSAGE);
			$requeteAjoutMessage->bindParam(':id', $id, PDO::PARAM_INT);
			$requeteAjoutMessage->bindParam(':messages', $messages, PDO::PARAM_STR);
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

	public function enregistrerUtilisateur($nom_utilisateur, $email, $mot_de_passe ){
		try{
			$SQL_AJOUTER_MESSAGE = "INSERT INTO `utilisateurs`(`nom_utilisateur`,`email`,`mot_de_passe`)
				VALUES (:nom_utilisateur,:email,:mot_de_passe)";
			$requeteAjoutMessage = $this->baseDeDonnees->prepare($SQL_AJOUTER_MESSAGE);
			$requeteAjoutMessage->bindParam(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR);
			$requeteAjoutMessage->bindParam(':email', $email, PDO::PARAM_STR);
			$requeteAjoutMessage->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
			$requeteAjoutMessage->execute();
		}
		catch(PDOException $e){
			die('<p>erreur d\'ajout du message' . $e->getMessage(). '</p>');
		}
	}
}