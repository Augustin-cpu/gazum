<?php
namespace Gazum\App\classes;

class Routeur{
    private $request;
    private $routes = [
        'home' => ['controller' => 'Application', 'method' => 'showHome']
    ];

    public function __construct($request)
    {
        $this->request = $request;

    }

    private function getRoute(){
        $element = explode('/', $this->request);
        return $element[0];
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
        if(key_exists($route, $this->routes)){
            
            $controllerName = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];
            
            // Reconstitution du chemin complet de la classe (nécessite l'autoloader)
           $controllerClass = 'Gazum\App\Controllers\\' . $controllerName;
            $currentController = new $controllerClass();
            $currentController->$method($params);
        }
    }
}