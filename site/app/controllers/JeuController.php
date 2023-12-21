<?php
namespace Controllers;
class JeuController{

        /**
     * Récupère les jeux depuis la base de données en fonction d'une condition.
     *
     * @param string $condition La condition SQL facultative.
     * @return array Tableau d'objets Jeu.
     */
    public function GetJeux(string $condition = "") {
        $db = \BDD\Database::getInstance();
        $statement = 'SELECT * FROM JEU '.$condition;
        $results = $db->GetQuery($statement);
        $jeux = [];
        foreach ($results as $result) {
            $jeu = new \Models\Jeu(
                $result['JEUID'],
                $result['NOM'],
                $result['DESCRIPTION'],
                $result['LIKEJEU'],
                $result['DISLIKEJEU'],
                $result['LIEN_IMAGE']
            );
            $jeux[] = $jeu;
        }

        return $jeux;
    }

    /**
     * Récupère un jeu spécifique en fonction de son identifiant.
     *
     * @param int $JeuId L'identifiant du jeu à récupérer.
     * @return array Tableau d'objets Jeu.
     */
    function GetJeu(int $JeuId){
        $jeu = $this->GetJeux('WHERE JEUID = '.$JeuId);
        return $jeu;
    }

    /**
     * Incrémente le nombre de likes pour un jeu spécifique dans la base de données.
     *
     * @param int $JeuId L'identifiant du jeu à liker.
     * @param int $like Le nombre de likes à ajouter.
     */
    function LikeJeu(int $JeuId, int $like) {
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE JEU SET LIKEJEU = LIKEJEU + $like WHERE JEUID = $JeuId";
        $db->Query($statement);
    }

    /**
     * Incrémente le nombre de dislikes pour un jeu spécifique dans la base de données.
     *
     * @param int $JeuId L'identifiant du jeu à disliker.
     * @param int $dislike Le nombre de dislikes à ajouter.
     */
    function DislikeJeu(int $JeuId, int $dislike){
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE JEU SET DISLIKEJEU = DISLIKEJEU + $dislike WHERE JEUID = $JeuId";
        $db->Query($statement);
    }

    /**
     * Crée un nouveau jeu dans la base de données.
     *
     * @param string $nom Le nom du jeu.
     * @param string $description La description du jeu.
     * @param string $lien_image Le lien de l'image associée au jeu.
     */
    function CreateJeu(string $nom, string $description, string $lien_image){
        $db = \BDD\Database::getInstance();
        $statement = "INSERT INTO JEU (`NOM`, `DESCRIPTION`, `LIKEJEU`, `DISLIKEJEU`, `LIEN_IMAGE`) VALUES ('$nom', '$description', 0, 0, '$lien_image')";
        $db->Query($statement);
    }

    /**
     * Met à jour les informations d'un jeu spécifique dans la base de données.
     *
     * @param int $JeuId L'identifiant du jeu à mettre à jour.
     * @param string $nomJeu Le nouveau nom du jeu.
     * @param string $description La nouvelle description du jeu.
     * @param string $lien_image Le nouveau lien de l'image associée au jeu.
     */
    function UpdateJeu(int $JeuId, string $nomJeu, string $description, $lien_image){
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE JEU SET NOM = '$nomJeu', DESCRIPTION = '$description', LIEN_IMAGE = '$lien_image' WHERE JEUID = $JeuId";
        $db->Query($statement);
    }
    /**
     * Supprime un jeu spécifique de la base de données.
     *
     * @param int $jeuId L'identifiant du jeu à supprimer.
     */
    function DeleteJeu(int $jeuId){
        $db = \BDD\Database::getInstance();
        $statement = "DELETE FROM JEU WHERE JEUID = $jeuId";
        $db->Query($statement);
    }
}
?>