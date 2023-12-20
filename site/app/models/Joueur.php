<?php
namespace Models;
class Joueur extends Personne{
    public $numeroJoueur = 0;
    public $mailJoueur = "";

    function __construct($joueurId = null, $nom = null, $prenom = null, $dateNaissance = null, $numeroJoueur = null, $mailJoueur = null){
        parent::__construct($joueurId, $nom, $prenom, $dateNaissance);
        $this->numeroJoueur = $numeroJoueur;
        $this->mailJoueur = $mailJoueur;
    }

    
}
?>