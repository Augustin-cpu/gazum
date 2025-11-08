<?php

namespace Gazum\App\Model;

use Gazum\App\Entite\Users;
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

    public function addUsers(){}
    public function getAll(){
        $query = $this->bdd->query(
            "SELECT users.users_id,users.nom,users.prenom, users.email,fonction.nom_fonction
                FROM users
            INNER JOIN fonction 
                ON users.users_id = fonction.fonction_id");
        $users = [];
        while($donnes = $query->fetch()){
            $datas = [
                'id' => $donnes['users_id'],
                'nom' => $donnes['nom'],
                'prenom' => $donnes['prenom'],
                'email' => $donnes['email'],
                'fonction' => $donnes['nom_fonction']
            ];
            $users [] = $datas;
        }
        return $users;
    }

    public function Update(){}
    public function Delete(){}
}