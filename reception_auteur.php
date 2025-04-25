<?php

include('include/connexion.php');
include('include/insert.php');

// Nettoyage et validation des données
if (isset($_POST['nom_auteur'])) $nom_auteur = strip_tags($_POST['nom_auteur']);
else $nom_auteur = '';

if (isset($_POST['prenom_auteur'])) $prenom_auteur = strip_tags($_POST['prenom_auteur']);
else $prenom_auteur = '';

// Vérification si le formulaire est vide
if (empty($nom_auteur) || empty($prenom_auteur)) {
  // Redirection sur la liste d'auteurs
  header('Location: liste_auteurs.php');
  exit;
}

// Connexion à la base de donnée
$pdo = connexion();

//Variable qui s'intègrre dans la fonction
$auteur = [
  'auid' => null,
  'prenom' => $prenom_auteur,
  'nom' => $nom_auteur
];

insert_auteur($pdo, $auteur);

// Redirection après l'insertion
header('Location: liste_auteurs.php');
exit;