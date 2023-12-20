<?php
namespace Controllers;
class JeuController{

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

    function GetJeu(int $JeuId){
        $jeu = $this->GetJeux('WHERE JEUID = '.$JeuId);
        return $jeu;
    }


    function LikeJeu(int $JeuId, int $like) {

    }

    function DislikeJeu(int $JeuId, int $dislike){
        
    }

    function CreateJeu(string $nom, string $description, string $lien_image){
        $db = \BDD\Database::getInstance();
        $statement = "INSERT INTO JEU (`NOM`, `DESCRIPTION`, `LIKEJEU`, `DISLIKEJEU`, `LIEN_IMAGE`) VALUES ('$nom', '$description', 0, 0, '$lien_image')";
        $db->Query($statement);
    }

    function UpdateJeu(int $JeuId, string $nomJeu, string $description, $lien_image){
        $db = \BDD\Database::getInstance();
        $statement = "UPDATE JEU SET NOM = '$nomJeu', DESCRIPTION = '$description', LIEN_IMAGE = '$lien_image' WHERE JEUID = $JeuId";
        $db->Query($statement);
    }
    function DeleteJeu(int $jeuId){
        $db = \BDD\Database::getInstance();
        $statement = "DELETE FROM JEU WHERE JEUID = $jeuId";
        $db->Query($statement);
    }







}
?>