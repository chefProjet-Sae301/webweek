<?php
namespace Controllers;

class EquipeController
{

    public function GetEquipes($condition = "")
    {
        $db = \BDD\Database::getInstance();
        $joueursController = new \Controllers\JoueurController();
        $statement = 'SELECT * FROM EQUIPE ' . $condition;
        $results = $db->GetQuery($statement);
        $equipes = [];
        foreach ($results as $result) {
            $equipe = new \Models\Equipe(
                $result['NUMEROEQUIPE'],
                $result['SCORE'],
                $result['ISTRYHARD'],
            );
            $joueurs = $joueursController->GetJoueurByEquipe($result['NUMEROEQUIPE']);
            foreach ($joueurs as $joueur) {
                $this->AjouterJoueur($equipe, $joueur);
            }
            $equipes[] = $equipe;
        }

        return $equipes;
    }

    function GetEquipe($numeroEquipe)
    {
        $equipe = $this->GetEquipes('WHERE NUMEROEQUIPE = ' . $numeroEquipe);
        return $equipe;
    }


    function AjouterJoueur($equipe, $joueur)
    {
        if ($joueur instanceof \Models\Joueur) {
            array_push($equipe->joueurs, $joueur);
        } else {
            throw new \Exception('$joueur n\'est pas de type Joueur().');
        }
    }

    function CreateEquipe(){
        $db = \BDD\Database::getInstance();
        $statement = "INSERT INTO EQUIPE VALUES ()";
        $db->Query($statement);
        $equipes = $this->GetEquipes();
        return $equipes[count($equipes)-1]->numeroEquipe;
        
    }

    function UpdateEquipe($numeroEquipe, $score)
    {
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE EQUIPE SET SCORE= $score WHERE NUMEROEQUIPE = $numeroEquipe";
        $db->Query($statement);
    }

    function DeleteEquipe($numeroEquipe)
    {
        $db = \BDD\Database::getInstance();
        $equipe = $this->GetEquipe($numeroEquipe)[0];
        $joueurController = new \Controllers\JoueurController();
        if (isset($equipe->joueurs[0])) {
            $joueurController->deleteJoueur($equipe->joueurs[0]->personneId);
        };
        if (isset($equipe->joueurs[1])) {
            $joueurController->deleteJoueur($equipe->joueurs[1]->personneId);
        };
        $statement = "DELETE FROM EQUIPE WHERE NUMEROEQUIPE = $numeroEquipe";
        $db->Query($statement);
    }

    function ComparaisonScore($a, $b) {
        return $a['score'] - $b['score'];
    }


    function Classement(){
        $equipes = $this->GetEquipes();
        $tryHard = [];
        $chill = [];
        foreach ($equipes as $equipe) {
            if ($equipe->isTryHard == 1)
                array_push($tryHard, $equipe);
            else 
                array_push($chill, $equipe);
        }
        usort($tryHard, 'comparaisonScore');
        usort($chill,'comparaisonScore');
        $classement = [
            "TryHard"=> $tryHard,
            "Chill"=> $chill
        ];

        return $classement;
    }
}
?>