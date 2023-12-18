<?php 
require('vendor/autoload.php');
use \Controllers\Partie_TournoiController;

$ptc = new Partie_TournoiController();
$datas = $ptc->GetParties_Tournois();

var_dump($datas);
?>



