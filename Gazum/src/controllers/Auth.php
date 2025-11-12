<?php

namespace Gazum\App\Controllers;

use Gazum\App\classes\View;
use Gazum\App\Model\Database;

class Auth{
    public function showLogin($params){
        $bdd = new Database();
        $myView = new View('login');
         // Redirection si l'utilisateur est déjà connecté
         if($bdd->toggle()){
            $myView->redirect('?url=home');
         }
         if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $password = $_POST['password'];
            $email = $_POST['email'];
            $password = sha1($password);
            // var_dump($email,$password);exit;
            $users = $bdd->getUser($email);
            $bdd->connect($users);

            // var_dump($password);exit;
            if ($bdd->toggle()) {
                 // Connexion de l'utilisateur
                // var_dump($bdd->toggle());exit;

                $myView->redirect('?url=home');
            }
        }
        $myView->render();

    }
    public function register($params){

        $bdd = new Database();
        $myView = new View('register');
         // Redirection si l'utilisateur est déjà connecté
       
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
           if($bdd->toggle()){
              $myView->redirect('?url=home'); 
           }
        }
        $fonction = $bdd->getFonction();
        $myView->assign(['fonction' => $fonction]);
        $myView->render();
    }
    public function disconnect($params){
        $bdd = new Database();
        $bdd->disconnect();
        $myView = new View('login');
        $myView->redirect('?url=login');
    }   
}