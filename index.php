<?php
// Pour les utilisateurs de MAMP (Mac) : force l'affichage des erreurs PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Lancement du moteur Twig avec les données
echo $twig->render('base.twig', [
]);
