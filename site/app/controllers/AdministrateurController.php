<?php
namespace Controllers;

class AdministrateurController
{

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