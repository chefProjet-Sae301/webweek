<?php
namespace Models;
class Partie_Tournoi{
    public $tournoiId = 0;
    public $equipe1;
    public $equipe2;
    public $dateTournoi = "";
    public $isTryHard = false;

    function __construct($tournoiId, $dateTournoi, $isTryHard) {
        $this->tournoiId = $tournoiId;
        $this->dateTournoi = $dateTournoi;
        $this->isTryHard = $isTryHard;
        $this->equipe1 = new Equipe();
        $this->equipe2 = new Equipe();
    }


}
?>