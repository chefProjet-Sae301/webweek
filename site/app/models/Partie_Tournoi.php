<?php
namespace Models;
class Partie_Tournoi{
    public int $tournoiId;
    public \Models\Equipe $equipe1;
    public \Models\Equipe $equipe2;
    public string $dateTournoi;
    public bool $isTryHard;

    function __construct(int $tournoiId, string $dateTournoi, bool $isTryHard) {
        $this->tournoiId = $tournoiId;
        $this->dateTournoi = $dateTournoi;
        $this->isTryHard = $isTryHard;
    }


}
?>