<?php

namespace Gazum\App\Controllers;

use Gazum\App\classes\View;
use Gazum\App\Model\Database;

class Application{

    public function showHome($params){
        $bdd = new Database();
        $myView = new View('home');
            // Redirection si l'utilisateur n'est pas connecté
        if(!$bdd->toggle()){
           $myView->redirect('?url=login');
        }
       
        // Ajout des donnes
        if(isset($_POST) && !empty($_POST)){
            extract($_POST);
            $password = sha1($password);
            $datas = [
                'nom'         => $nom,
                'prenom'      => $prenom,
                'password'    => $password,
                'email'       => $email,
                'fonction_id' => $fonction_id
            ];
            $bdd->addUsers($datas);
            $myView->redirect('?url=home');


        }
        // Affichage des donnnees
        $params = $bdd->getAll();
        $fonction = $bdd->getFonction();
        $myView->assign(['users' => $params, 'fonction' => $fonction]);
        $myView->render();
    }
    public function store($params){
        $bdd = new Database();
        
    }
}