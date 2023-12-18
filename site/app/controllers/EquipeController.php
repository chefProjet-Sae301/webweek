<?php
namespace Controllers;
class EquipeController{

    public function GetEquipes($condition = "") {
        $db = \BDD\Database::getInstance();
        $joueursController = new \Controllers\JoueurController();
        $statement = 'SELECT * FROM EQUIPE '.$condition;
        $results = $db->query($statement);
        $equipes = [];
        foreach ($results as $result) {
            $equipe = new \Models\Equipe(
                $result['NUMEROEQUIPE'],
                $result['SCORE'],
            );
            $joueurs = $joueursController->GetJoueurByEquipe($result['NUMEROEQUIPE']);
            foreach($joueurs as $joueur){
                $this->AjouterJoueur($equipe,$joueur);
            }
            $equipes[] = $equipe;
        }

        return $equipes;
    }

    function GetEquipe($numeroEquipe){
        $equipe = $this->GetEquipes('WHERE NUMEROEQUIPE = '.$numeroEquipe);
        return $equipe;
    }
    
    
    function AjouterJoueur($equipe,$joueur){
        if ($joueur instanceof \Models\Joueur) {
			array_push($equipe->joueurs, $joueur);
		}
        else{
            throw new \Exception('$joueur n\'est pas de type Joueur().');
        }
    }

}
?>