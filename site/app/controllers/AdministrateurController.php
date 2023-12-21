<?php
namespace Controllers;

class AdministrateurController
{

    /**
     * Récupère les administrateurs depuis la base de données.
     *
     * @param string $condition La condition SQL facultative.
     * @return array Tableau d'objets Administrateur.
     */    
    public function GetAdmins($condition = "")
    {
        $db = \BDD\Database::getInstance(); 
        $statement = 'SELECT * FROM ADMINISTRATEUR ' . $condition;
        $results = $db->GetQuery($statement);
        $admins = [];
        foreach ($results as $result) {
            $admin = new \Models\Administrateur(
                $result['LOGIN'],
                $result['MDP']
            );
            $admins[] = $admin;
        }

        return $admins;
    }

      /**
     * Vérifie les informations de connexion d'un administrateur.
     *
     * @param string $login Le login de l'administrateur.
     * @param string $mdp Le mot de passe de l'administrateur.
     * @return bool Renvoie true si les identifiants sont valides, sinon false.
     */
    public function VerifConnect($login, $mdp){
        $admins = $this->GetAdmins();
        foreach ($admins as $admin) {
            if ($admin->login == $login && $admin->mdp == $mdp) {
                return true;
            }
        }
        return false;

    }
}
?>