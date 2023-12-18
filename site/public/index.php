<?php 
require('../vendor/autoload.php');
use Controllers\JeuController, Controllers\EquipeController, Controllers\JoueurController;

/*$jc = new JeuController();
$jeux = $jc->GetJeu(1);
var_dump($jeux);

echo "<br><br><br>";

$joueurc = new JoueurController();
$joueurs = $joueurc->GetJoueurs(); 
var_dump($joueurs);

echo "<br><br><br>";*/

$ec = new EquipeController();
$equipe = $ec->GetEquipe(3);
var_dump($equipe);

?>


