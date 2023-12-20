<?php
namespace Controllers;
class Partie_TournoiController{

    public function GetParties_Tournois($condition = "") {
        $db = \BDD\Database::getInstance();
        $equipeController = new \Controllers\EquipeController();
        $statement = 'SELECT * FROM PARTIE_TOURNOI '.$condition;
        $results = $db->query($statement);
        $parties_tournois = [];
        foreach ($results as $result) {
            $partie_tournoi = new \Models\Partie_Tournoi(
                $result['TOURNOIID'],
                $result['DATETOURNOI'],
                $result['ISTRYHARD']
            );
            $equipe1 = $equipeController->GetEquipe($result['NUMEROEQUIPE']);
            $equipe2 = $equipeController->GetEquipe($result['NUMEROEQUIPE2']);
            $this->AjouterEquipe($partie_tournoi, $equipe1[0], $equipe2[0]);
            $parties_tournois[] = $partie_tournoi;
        }

        return $parties_tournois;
    }

    public function AjouterEquipe($partie_tournoi, $equipe1, $equipe2){
        if (($equipe1 instanceof \Models\Equipe) && ($equipe2 instanceof \Models\Equipe)) {
            $partie_tournoi->equipe1 =  $equipe1;
            $partie_tournoi->equipe2 = $equipe2;
		}
        else{
            throw new \Exception('$equipe1 ou $equipe2 ne sont pas de type Equipe().');
        }
    }
}
?>