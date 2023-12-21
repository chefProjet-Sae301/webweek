<?php
namespace Models;


class Administrateur 
{
    public string $login;
    public string $mdp;

    function __construct(string $login, string $mdp)
    {
        $this->login = $login;
        $this->mdp = $mdp;
    }

}

?>