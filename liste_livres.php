<?php
// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET placées sur l'URL : l'identifiant de la catégorie choisie
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;
$id = intval($id);

// Importe la fonction de connexion et les fonctions pour les requêtes
include('include/connexion.php');
include('include/select.php');

// Connexion et recherche de la liste des livres
$pdo = connexion();
$tableau_livres = select_table($pdo,'SELECT isbn, titre FROM livres');

// Lancement du moteur Twig avec les données
echo $twig->render('liste_livres.twig', [
	'tableau_livres' => $tableau_livres
]);
