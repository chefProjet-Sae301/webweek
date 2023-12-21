<?php
namespace Models;
class Partie_Tournoi{
    public int $tournoiId;
    public \Models\Equipe $equipe1;
    public \Models\Equipe $equipe2;
    public string $dateTournoi;

    function __construct(int $tournoiId, string $dateTournoi) {
        $this->tournoiId = $tournoiId;
        $this->dateTournoi = $dateTournoi;
    }


}
?>