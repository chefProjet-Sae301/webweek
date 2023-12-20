<?php
namespace Controllers;
class JoueurController{

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
    
    function GetJoueur($numeroJoueur){
        $joueur = $this->GetJoueurs("WHERE JOUEURID = ".$numeroJoueur);
        return $joueur;
    }

    function GetJoueurByEquipe($numeroEquipe){
        $joueurs = $this->GetJoueurs("WHERE NUMEROEQUIPE = ".$numeroEquipe);
        return $joueurs;
    }

    function CreateJoueur($data){
        $db = \BDD\Database::getInstance();
        $statement = "INSERT INTO JOUEUR (NUMEROEQUIPE, NOM, PRENOM, DATENAISSANCE, NUMEROJOUEUR, MAILJOUEUR) VALUES ({$data['NUMEROEQUIPE']}, '{$data['NOM']}', '{$data['PRENOM']}', '{$data['DATENAISSANCE']}', {$data['NUMEROJOUEUR']}, '{$data['MAILJOUEUR']}' )";
        $db->Query($statement);
    }


    function UpdateJoueur($joueurId, $nom, $prenom, $dateNaissance, $numeroJoueur, $mailJoueur){
        $db = \BDD\Database::getInstance();
        $nom = strtoupper($nom);
        $statement = "UPDATE JOUEUR SET NOM= '$nom', PRENOM = '$prenom', DATENAISSANCE = '$dateNaissance', NUMEROJOUEUR = $numeroJoueur, MAILJOUEUR = '$mailJoueur' WHERE JOUEURID = $joueurId";
        $db->Query($statement);

    }

    function deleteJoueur($id){
        $db = \BDD\Database::getInstance();
        $statement = "DELETE FROM JOUEUR WHERE JOUEURID = $id";
        $db->Query($statement);
    }

}
?>