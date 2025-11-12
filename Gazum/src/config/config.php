<?php

define('ROOT_PATH', dirname(__DIR__));
define('VIEW',ROOT_PATH.'/view/');
define('AUTH',VIEW.'/auth/');
// 1. Déterminer le protocole (HTTP ou HTTPS)
$protocole = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";

// 2. Récupérer l'hôte (nom de domaine + port, si applicable)
$host = $_SERVER['HTTP_HOST'];

// 3. Définir le chemin de base (BASE_URL)
// BASE_URL sera : http://localhost/ ou https://votre-site.com/
define('BASE_URL', $protocole . $host . '/');

// --- Exemples de Constantes pour les Ressources ---

// 4. Définir la constante pour les fichiers CSS
define('CSS_PATH', BASE_URL . 'css/');

// 5. Définir la constante pour les fichiers JavaScript
define('JS_PATH', BASE_URL . 'js/');

// 6. Définir la constante pour les images
define('IMG_PATH', BASE_URL . 'img/');

// Initialisation de la base de donne
define('PDO_SERVER','localhost');
define('PDO_USERNAME','root');
define('PDO_PASSWORD','root');
define('PDO_DATABASE','gazum');
define('PDO_DSN','mysql:host='.PDO_SERVER.';dbname='.PDO_DATABASE);

// Port HTTP du serveur (peut être omis si le port par défaut 80 est utilisé)
define('HTTP_SERVER_PORT', '8888');

/* Nom du répertoire virtuel dans lequel le site s'exécute, par exemple :
'/tshirtshop/' si le site s'exécute à http://www.example.com/tshirtshop/
'/' si le site s'exécute à http://www.example.com/ */
define('VIRTUAL_LOCATION', '/Gazum/');
