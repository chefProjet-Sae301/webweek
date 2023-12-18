<?php
namespace Models;
use Exception;
class Equipe{
    public $numeroEquipe = 0;
    public $score = 0;
    public $joueurs = [];

    function __construct($numeroEquipe, $score = 0) {
        $this->numeroEquipe = $numeroEquipe;
        $this->score = $score;
    }

}

?>