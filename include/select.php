<?php

// Sélectionne toutes les lignes d'une table
function select_table($pdo, $sql) {
	// préparation et exécution de la requête
	$query = $pdo->prepare($sql);
	$query->execute();
	// récupération des données et envoi
	return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Sélectionne une ligne unique correspondant à une clé primaire
function select_ligne($pdo, $id, $sql) {
	// préparation et exécution de la requête
	$query = $pdo->prepare($sql);
	$query->bindValue(':id', $id, PDO::PARAM_INT);
	$query->execute();
	return $query->fetch(PDO::FETCH_ASSOC);
}

// Sélectionne toutes les lignes correspondant à une clé étrangère
function select_table_id($pdo, $id, $sql) {
	// préparation et exécution de la requête
	$query = $pdo->prepare($sql);
	$query->bindValue(':id', $id, PDO::PARAM_INT);
	$query->execute();
	// récupération des données et envoi
	return $query->fetchAll(PDO::FETCH_ASSOC);
}
