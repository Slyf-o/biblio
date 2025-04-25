<?php

include('include/connexion.php');
include('include/insert.php');

// Nettoyage et validation des données
if (isset($_POST['nom_editeur'])) $nom_editeur = strip_tags($_POST['nom_editeur']);
else $nom_editeur = '';

if (isset($_POST['adresse_editeur'])) $adresse_editeur = strip_tags($_POST['adresse_editeur']);
else $adresse_editeur = '';

// Vérification si le formulaire est vide
if (empty($nom_editeur) || empty($adresse_editeur)) {
  // Redirection sur la liste d'editeurs
  header('Location: liste_editeurs.php');
  exit;
}

// Connexion à la base de donnée
$pdo = connexion();

//Variable qui s'intègrre dans la fonction
$editeur = [
  'auid' => null,
  'adresse' => $adresse_editeur,
  'nom' => $nom_editeur
];

insert_editeur($pdo, $editeur);

// Redirection après l'insertion
header('Location: liste_editeurs.php');
exit;