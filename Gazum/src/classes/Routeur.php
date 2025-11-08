<?php
namespace Gazum\App\classes;

class Routeur{
    private $request;
    private $routes = [
        '/' => ['controller' => 'Application', 'method' => 'showHome']
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    private function getRoute(){
        return $this->request;
    }

    private function getParams(){
        $element = explode('/', $this->request);
        unset($element[0]);
        for($i = 1; $i < count($element); $i++){
            $params[$element[$i]] = $element[$i+1];
            $i++;
        }
        if(!isset($params)) $params = null;
        foreach($_POST as $key => $value){
            $params[$key] = $value;
        }
        return $params;
    }

    public function renderController(){
       $route = $this->getRoute();
        $params = $this->getParams();

        // ERREUR CRITIQUE CORRIGÉE : Vous vérifiiez si la route existait dans $this->request (une chaîne de caractères),
        // alors que vous deviez vérifier si elle existait dans $this->routes (le tableau des routes).
        if(array_key_exists($route, $this->routes)){
            
            $controllerName = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];
            
            // Reconstitution du chemin complet de la classe (nécessite l'autoloader)
           $controllerClass = 'Gazum\App\Controllers\\' . $controllerName;
            
            // Instanciation du contrôleur (Assurez-vous que la classe existe et est incluse/autoloadée)
            // Convention : On ajoute 'Controller' à la fin du nom pour identifier la classe (ex: ApplicationController)
            if (!class_exists($controllerClass)) {
                 die("Erreur 404: Contrôleur $controllerClass introuvable.");
            }
            
            $currentController = new $controllerClass();
            
            // Appel de la méthode
            if (method_exists($currentController, $method)) {
                // $params peut être null, on passe le tableau des paramètres
                $currentController->$method($params);
            } else {
                 die("Erreur 404: Méthode $method non définie dans $controllerClass.");
            }
            
        } else {
            // Pas de route correspondante
            http_response_code(404);
            echo 'Erreur 404: Route introuvable pour ' . $route;
        }
    }
}