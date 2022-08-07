<?php

function initBDD(){
$serveur = 'localhost';
	$login = 'root';
	$mot_de_passe = 'root';
	$base_de_donnees = 'bdd-jpov1-av-ll';
	$charset = 'utf8';
	$port = 3306;
		try{

			$pdo = new PDO('mysql:host='.$serveur.';dbname='.$base_de_donnees.';charset='.$charset.';port='.$port, $login, $mot_de_passe);
		}

		catch(PDOException $error){

			echo $error->getCode().' '.$error->getMessage();

		}
		return $pdo;
		
}

?>