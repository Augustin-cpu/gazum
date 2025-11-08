<?php

namespace Gazum\App\Entite;

class Users{
    private $nom;
    private $password;
    private $prenom;
    private $mail;
    private $fonction_id;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set'. ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    // getter
    public function getNom(){ return $this->nom; }
    public function getPassword(){ return $this->password;}
    public function getPrenom(){ return $this->prenom;}
    public function getMail(){ return $this->mail;}
    public function getFonction_id(){ return $this->fonction_id;}

    // setter
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPostnom($password){
        $this->password = $password;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setFonction_id($fonction_id){
        $this->fonction_id = $fonction_id;
    }

}