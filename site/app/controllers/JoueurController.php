<?php
namespace Controllers;
class JoueurController{

    public function GetJoueurs($condition = "") {
        $db = \BDD\Database::getInstance();
        $statement = 'SELECT * FROM JOUEUR '.$condition;
        $results = $db->query($statement);
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
    
    function GetJoueur($numeroJoueur){
        $joueur = $this->GetJoueurs("WHERE JOUEURID = ".$numeroJoueur);
        return $joueur;
    }

    function GetJoueurByEquipe($numeroEquipe){
        $joueurs = $this->GetJoueurs("WHERE NUMEROEQUIPE = ".$numeroEquipe);
        return $joueurs;
    }

    

}
?>