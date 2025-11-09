<?php

require_once 'vendor/autoload.php';
require_once 'src/config/config.php';

use Gazum\App\classes\Routeur;

$request = $_GET['url'];
$route = new Routeur($request);
$route->renderController();
