<?php
namespace Models;
class Personne{
    public $personneId = 0;
    public $nom = "";
    public $prenom = "";
    public $dateNaissance = "";

    function __construct($personneId, $nom, $prenom, $dateNaissance){
        $this->personneId = $personneId;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }
}
?>