<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'src/config/config.php';

use Gazum\App\classes\Routeur;
use Gazum\App\classes\UrlManager;

// $url = new UrlManager('http://localhost:8888/site/Gazum/index.php?url=home/');
// var_dump($url->toAbsolute('?url=home/nom=<?= $user["nom_fonction"]'));
// exit;
$request = $_GET['url'];
$route = new Routeur($request);
$route->renderController();

