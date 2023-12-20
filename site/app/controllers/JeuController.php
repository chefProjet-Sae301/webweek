<?php
namespace Controllers;
class JeuController{

    public function GetJeux($condition = "") {
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

    function GetJeu($JeuId){
        $jeu = $this->GetJeux('WHERE JEUID = '.$JeuId);
        return $jeu;
    }


    function LikeJeu($JeuId){

    }

    function DislikeJeu($JeuId){
        
    }

}
?>