<?php
namespace Controllers;

class EquipeController
{

    /**
     * Récupère les équipes depuis la base de données en fonction d'une condition.
     *
     * @param string $condition La condition SQL facultative.
     * @return array Tableau d'objets Equipe.
     */
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

    /**
     * Récupère une équipe spécifique en fonction de son numéro.
     *
     * @param int $numeroEquipe Le numéro de l'équipe à récupérer.
     * @return array Tableau d'objets Equipe.
     */
    function GetEquipe($numeroEquipe)
    {
        $equipe = $this->GetEquipes('WHERE NUMEROEQUIPE = ' . $numeroEquipe);
        return $equipe;
    }


    /**
     * Ajoute un joueur à une équipe spécifique.
     *
     * @param object $equipe L'objet Equipe à modifier.
     * @param object $joueur L'objet Joueur à ajouter.
     * @throws \Exception Si le joueur n'est pas de type Joueur().
     */
    function AjouterJoueur($equipe, $joueur)
    {
        if ($joueur instanceof \Models\Joueur) {
            array_push($equipe->joueurs, $joueur);
        } else {
            throw new \Exception('$joueur n\'est pas de type Joueur().');
        }
    }

    /**
     * Crée une nouvelle équipe dans la base de données.
     *
     * @return int Le numéro de l'équipe créée.
     */
    function CreateEquipe()
    {
        $db = \BDD\Database::getInstance();
        $statement = "INSERT INTO EQUIPE VALUES ()";
        $db->Query($statement);
        $equipes = $this->GetEquipes();
        return $equipes[count($equipes) - 1]->numeroEquipe;

    }

    /**
     * Met à jour le score d'une équipe spécifique dans la base de données.
     *
     * @param int $numeroEquipe Le numéro de l'équipe à mettre à jour.
     * @param int $score Le nouveau score de l'équipe.
     */
    function UpdateEquipe($numeroEquipe, $score)
    {
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE EQUIPE SET SCORE= $score WHERE NUMEROEQUIPE = $numeroEquipe";
        $db->Query($statement);
    }

    /**
     * Supprime une équipe spécifique de la base de données.
     *
     * @param int $numeroEquipe Le numéro de l'équipe à supprimer.
     */
    function DeleteEquipe($numeroEquipe)
    {
        $db = \BDD\Database::getInstance();
        $equipe = $this->GetEquipe($numeroEquipe)[0];
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


    /**
     * Génère un classement des équipes.
     *
     * @return array Tableau contenant les équipes classées par type (TryHard ou Chill) et triées par score (descroissant).
     */
    function Classement()
    {
        $tryHard = $this->GetEquipes("WHERE ISTRYHARD = 1 ORDER BY (SCORE) desc");
        $chill = $this->GetEquipes("WHERE ISTRYHARD = 0 ORDER BY (SCORE) desc");
        $classement = [
            "TryHard" => $tryHard,
            "Chill" => $chill
        ];
        return $classement;
    }
}
?>