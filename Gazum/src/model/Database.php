<?php

namespace Gazum\App\Model;

use PDO;
use PDOException;

class Database{

    private $bdd;

    public function __construct()
    {
        try{
            $this->bdd = new PDO(PDO_DSN,PDO_USERNAME,PDO_PASSWORD);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Message :".$e->getMessage());
        }

    }

    public function addUsers(array $params){
        $query = $this->bdd->prepare('INSERT INTO users (nom,prenom,email,password,fonction_id) VALUES(:nom,:prenom,:email,:password,:fonction_id)');

        $query->execute(array(
            'nom'         => $params['nom'],
            'prenom'      => $params['prenom'],
            'email'       => $params['email'],
            'password'    => $params['password'],
            'fonction_id' => $params['fonction_id']
        ));
    }
    public function getAll(){
        $query = $this->bdd->query(
            "SELECT users.users_id,users.nom,users.prenom,users.email,fonction.nom_fonction
                FROM users
            INNER JOIN fonction 
                ON users.fonction_id = fonction.fonction_id");
        while($donnes = $query->fetch())
            $users [] = $donnes;
        
        return $users;
    }
    public function getFonction(){
        $query = $this->bdd->query('SELECT fonction_id, nom_fonction FROM fonction');
        while($donnees = $query->fetch())
            $fonction [] = $donnees;

        return $fonction;
    }
    public function Update(){}
    public function Delete(){}
}