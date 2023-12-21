<?php
namespace Controllers;
class Partie_TournoiController{

        /**
     * Récupère les parties de tournoi depuis la base de données en fonction d'une condition.
     *
     * @param string $condition La condition SQL facultative.
     * @return array Tableau d'objets Partie_Tournoi.
     */
    public function GetParties_Tournois($condition = "") {
        $db = \BDD\Database::getInstance();
        $equipeController = new \Controllers\EquipeController();
        $statement = 'SELECT * FROM PARTIE_TOURNOI '.$condition;
        $results = $db->GetQuery($statement);
        $parties_tournois = [];
        foreach ($results as $result) {
            $partie_tournoi = new \Models\Partie_Tournoi(
                $result['TOURNOIID'],
                $result['DATETOURNOI']
            );
            $equipe1 = $equipeController->GetEquipe($result['NUMEROEQUIPE']);
            $equipe2 = $equipeController->GetEquipe($result['NUMEROEQUIPE2']);
            $this->AjouterEquipe($partie_tournoi, $equipe1[0], $equipe2[0]);
            $parties_tournois[] = $partie_tournoi;
        }

        return $parties_tournois;
    }

        /**
     * Ajoute les équipes à une partie de tournoi spécifique.
     *
     * @param object $partie_tournoi L'objet Partie_Tournoi auquel ajouter les équipes.
     * @param object $equipe1 La première équipe.
     * @param object $equipe2 La deuxième équipe.
     * @throws \Exception Si $equipe1 ou $equipe2 ne sont pas du type Equipe().
     */
    public function AjouterEquipe($partie_tournoi, $equipe1, $equipe2){
        if (($equipe1 instanceof \Models\Equipe) && ($equipe2 instanceof \Models\Equipe)) {
            $partie_tournoi->equipe1 =  $equipe1;
            $partie_tournoi->equipe2 = $equipe2;
		}
        else{
            throw new \Exception('$equipe1 ou $equipe2 ne sont pas de type Equipe().');
        }
    }

    /**
     * Supprime une partie de tournoi spécifique de la base de données.
     *
     * @param int $tournoiId L'identifiant de la partie de tournoi à supprimer.
     */
    function DeletePartie(int $tournoiId) {
        $db = \BDD\Database::getInstance();
        $statement = "DELETE FROM PARTIE_TOURNOI WHERE TOURNOIID = $tournoiId";
        $db->Query($statement);
    }


}
?>