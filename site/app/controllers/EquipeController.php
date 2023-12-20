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

    function UpdateEquipe($numeroEquipe, $score)
    {
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE EQUIPE SET SCORE= $score WHERE NUMEROEQUIPE = $numeroEquipe";
        $db->Query($statement);
    }

    function DeleteEquipe($numeroEquipe)
    {
        $db = \BDD\Database::getInstance();
        $equipe = $this->GetEquipe($numeroEquipe);
        $joueurController = new \Controllers\JoueurController();
        if (isset($equipe->joueurs[0])) {
            $joueurController->deleteJoueur($equipe->joueurs[0]->personneId);
        }
        ;
        if (isset($equipe->joueurs[1])) {
            $joueurController->deleteJoueur($equipe->joueurs[1]->personneId);
        }
        ;
        $statement = "DELETE FROM EQUIPE WHERE NUMEROEQUIPE = $numeroEquipe";
        $db->Query($statement);
    }

}
?>