<?php

// Fichier de configuration avec les login et mots de passe
include('config.php');

function connexion() {
	// Connexion à la base de données et force l'affichage des erreurs SQL
	$pdo = new PDO('mysql:host=' . SERVER . ';dbname=' . BDD . ';charset=utf8', USER, PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	return $pdo;
}

