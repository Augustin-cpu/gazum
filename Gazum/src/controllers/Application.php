<?php

namespace Gazum\App\Controllers;

use Gazum\App\classes\View;
use Gazum\App\Entite\Users;
use Gazum\App\Model\Database;

class Application{

    public function showHome($params){
        $bdd = new Database();
        $params = $bdd->getAll();
        $myView = new View('home');
        $myView->render(['users' => $params]);
    }
}