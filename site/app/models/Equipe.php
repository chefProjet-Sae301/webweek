<?php
namespace Models;


class Equipe
{
    public int $numeroEquipe = 0;
    public int $score = 0;
    public bool $isTryHard;
    
    public $joueurs = [];

    function __construct(int $numeroEquipe, int $score = 0, bool $isTryHard)
    {
        $this->numeroEquipe = $numeroEquipe;
        $this->score = $score;
        $this->isTryHard = $isTryHard;
    }

}

?>