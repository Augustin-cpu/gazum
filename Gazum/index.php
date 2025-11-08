<?php

require_once 'vendor/autoload.php';
require_once 'src/config/config.php';

use Gazum\App\classes\Routeur;

$request = isset($_GET['url']) ? '/' . trim($_GET['url'], '/') : '/';;
$route = new Routeur($request);
$route->renderController();
