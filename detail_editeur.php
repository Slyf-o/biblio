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

// Connexion et recherche d'un editeur
$pdo = connexion();
$editeur_unique = select_ligne($pdo, $id,'SELECT * FROM editeurs WHERE id=:id');

// Recherche des différents livre d'un éditeur
$editeur_livres = select_table_id($pdo, $id,'SELECT * FROM livres WHERE id_editeur=:id');

// Lancement du moteur Twig avec les données
echo $twig->render('detail_editeur.twig', [
	'editeur' => $editeur_unique,
	'editeur_livres' => $editeur_livres
]);
