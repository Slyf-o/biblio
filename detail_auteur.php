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

// Connexion et recherche d'un auteur
$pdo = connexion();
$auteur_unique = select_ligne($pdo, $id,'SELECT * FROM auteurs WHERE id=:id');

// Recherche des différents livre d'un auteur
$auteur_livres = select_table_id($pdo, $id,'SELECT livres.isbn, livres.titre FROM
livres JOIN livres_auteurs ON livres.isbn = livres_auteurs.livre_isbn
WHERE livres_auteurs.auteur_id = :id');


// Lancement du moteur Twig avec les données
echo $twig->render('detail_auteur.twig', [
	'auteur' => $auteur_unique,
	'auteur_livres' => $auteur_livres
]);
