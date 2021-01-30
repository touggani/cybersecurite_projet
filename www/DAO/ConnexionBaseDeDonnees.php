<?php

class ConnexionBaseDeDonnees{
	private $baseDeDonnees = NULL;

	//pour en développement local
	/*public function __construct(){
		try{
			$this->baseDeDonnees = new PDO('mysql:host=localhost;dbname=vente_achat_photo','root','');
			$this->baseDeDonnees->query('SET NAMES utf8');
			$this->baseDeDonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
		catch(PDOException $e){
			die('<p>erreur connection'. $e->getMessage(). '</p>');
		}
	}*/

	//pour le site web
	public function __construct(){
		try{
			$this->baseDeDonnees = new PDO('mysql:host=database:3306;dbname=docker','docker','docker');
			$this->baseDeDonnees->query('SET NAMES utf8');
			$this->baseDeDonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
		catch(PDOException $e){
			die('<p>erreur connection'. $e->getMessage(). '</p>');
		}
	}
	
	
	public function getBaseDeDonnees(){
		return $this->baseDeDonnees;
	}

}



?>