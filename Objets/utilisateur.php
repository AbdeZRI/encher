<?php

class Utilisateur
{

    protected $prenom;
    protected $nom;
    protected $email;


    public function __construct($prenom, $nom, $email)
    {

        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }
}
