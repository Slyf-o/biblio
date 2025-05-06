<?php
// Point d'entrée unique du site
define('ROOT_PATH', __DIR__ . '/../');

// Inclusions avec le chemin ROOT_PATH
require_once ROOT_PATH . 'include/twig.php';
require_once ROOT_PATH . 'src/database/connexion.php';

// Initialiser Twig
$twig = init_twig();


// Récupérer la route demandée depuis l'URL
$route = $_GET['page'] ?? 'home';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Router - Diriger vers le bon contrôleur
switch ($route) {
    case 'home':
        include_once ROOT_PATH . 'src/controller/HomeController.php';
        $controller = new HomeController($twig);
        $controller->index();
        break;
}