<?php

namespace Gazum\App\Model;

use PDO;

class Database{

    private $bdd;

    private function getHandle()
    {
            $this->bdd = new PDO(PDO_DSN,PDO_USERNAME,PDO_PASSWORD);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $this->bdd;
    }

    public function toggle(){
        return isset($_SESSION['user']);
    }
    public function connect($user): void{
        $_SESSION['user'] = $user;
    }
    public function disconnect(): void{
        session_destroy();
    }
    public function getUser($email){
        $bdd = $this->getHandle();
        $query = $bdd->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array(
            'email' => $email
        ));
        $user = $query->fetch(PDO::FETCH_NUM);
        return $user[4];
    }
    public function addUsers(array $datas){
        $bdd = $this->getHandle();
        $query = $bdd->prepare('INSERT INTO users (nom,prenom,email,password,fonction_id) VALUES(:nom,:prenom,:email,:password,:fonction_id)');

        $query->execute([
            'nom'         => $datas['nom'],
            'prenom'      => $datas['prenom'],
            'email'       => $datas['email'],
            'password'    => $datas['password'],
            'fonction_id' => $datas['fonction_id']
        ]);
    }
    public function getAll(){
        $bdd = $this->getHandle();
        $query = $bdd->query(
            "SELECT users.users_id,users.nom,users.prenom,users.email,fonction.nom_fonction
                FROM users
            INNER JOIN fonction 
                ON users.fonction_id = fonction.fonction_id");
        while($donnes = $query->fetch())
            $users [] = $donnes;
        
        return $users;
    }
    public function getFonction(){
        $bdd = $this->getHandle();
        $query = $bdd->query('SELECT fonction_id, nom_fonction FROM fonction');
        while($donnees = $query->fetch())
            $fonction [] = $donnees;

        return $fonction;
    }
    public function Update(){}
    public function Delete(){}
}