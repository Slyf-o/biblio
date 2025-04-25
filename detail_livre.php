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

// Connexion et recherche d'un livre
$pdo = connexion();
$livre_unique = select_ligne($pdo, $id,'SELECT livres.*, editeurs.nom AS editeur
FROM livres LEFT JOIN editeurs ON livres.id_editeur = editeurs.id
WHERE isbn=:id');

// Recherche des différents livre d'un auteur
$auteur_livres = select_table_id($pdo, $id, 'SELECT auteurs.nom AS auteur_nom, auteurs.prenom AS auteur_prenom, livres_auteurs.livre_isbn 
FROM auteurs
JOIN livres_auteurs ON livres_auteurs.auteur_id = auteurs.id
WHERE livres_auteurs.livre_isbn = :id');

// Lancement du moteur Twig avec les données
echo $twig->render('detail_livre.twig', [
	'livre' => $livre_unique,
	'auteur_livres' => $auteur_livres
]);
