<?php
namespace Controllers;
class JoueurController{

    /**
     * Récupère les joueurs depuis la base de données en fonction d'une condition.
     *
     * @param string $condition La condition SQL facultative.
     * @return array Tableau d'objets Joueur.
     */
    public function GetJoueurs($condition = "") {
        $db = \BDD\Database::getInstance();
        $statement = 'SELECT * FROM JOUEUR '.$condition;
        $results = $db->GetQuery($statement);
        $joueurs = [];
        foreach ($results as $result) {
            $joueur = new \Models\Joueur(
                $result['JOUEURID'],
                $result['NOM'],
                $result['PRENOM'],
                $result['DATENAISSANCE'],
                $result['NUMEROJOUEUR'],
                $result['MAILJOUEUR'],
            );
            $joueurs[] = $joueur;
        }

        return $joueurs;
    }

     /**
     * Récupère un joueur spécifique en fonction de son identifiant.
     *
     * @param int $numeroJoueur L'identifiant du joueur à récupérer.
     * @return array Tableau d'objets Joueur.
     */
    function GetJoueur($numeroJoueur){
        $joueur = $this->GetJoueurs("WHERE JOUEURID = ".$numeroJoueur);
        return $joueur;
    }

    /**
     * Récupère les joueurs d'une équipe spécifique.
     *
     * @param int $numeroEquipe L'identifiant de l'équipe pour laquelle récupérer les joueurs.
     * @return array Tableau d'objets Joueur.
     */
    function GetJoueurByEquipe($numeroEquipe){
        $joueurs = $this->GetJoueurs("WHERE NUMEROEQUIPE = ".$numeroEquipe);
        return $joueurs;
    }

    /**
     * Crée un nouveau joueur dans la base de données.
     *
     * @param array $data Les données du joueur à insérer.
     */
    function CreateJoueur($data){
        $db = \BDD\Database::getInstance();
        $statement = "INSERT INTO JOUEUR (NUMEROEQUIPE, NOM, PRENOM, DATENAISSANCE, NUMEROJOUEUR, MAILJOUEUR) VALUES ({$data['NUMEROEQUIPE']}, '{$data['NOM']}', '{$data['PRENOM']}', '{$data['DATENAISSANCE']}', {$data['NUMEROJOUEUR']}, '{$data['MAILJOUEUR']}' )";
        $db->Query($statement);
    }

    /**
     * Met à jour les informations d'un joueur spécifique dans la base de données.
     *
     * @param int $joueurId L'identifiant du joueur à mettre à jour.
     * @param string $nom Le nouveau nom du joueur.
     * @param string $prenom Le nouveau prénom du joueur.
     * @param string $dateNaissance La nouvelle date de naissance du joueur.
     * @param int $numeroJoueur Le nouveau numéro du joueur.
     * @param string $mailJoueur Le nouveau mail du joueur.
     */
    function UpdateJoueur($joueurId, $nom, $prenom, $dateNaissance, $numeroJoueur, $mailJoueur){
        $db = \BDD\Database::getInstance();
        $nom = strtoupper($nom);
        $statement = "UPDATE JOUEUR SET NOM= '$nom', PRENOM = '$prenom', DATENAISSANCE = '$dateNaissance', NUMEROJOUEUR = $numeroJoueur, MAILJOUEUR = '$mailJoueur' WHERE JOUEURID = $joueurId";
        $db->Query($statement);

    }

       /**
     * Supprime un joueur spécifique de la base de données.
     *
     * @param int $id L'identifiant du joueur à supprimer.
     */
    function deleteJoueur($id){
        $db = \BDD\Database::getInstance();
        $statement = "DELETE FROM JOUEUR WHERE JOUEURID = $id";
        $db->Query($statement);
    }

}
?>