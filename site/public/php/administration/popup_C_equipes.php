<?php
require('../../../vendor/autoload.php');

use \Controllers\EquipeController, \Controllers\JoueurController;

// Gestion des actions GET

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['submit'])) {
	traiterFormulaire($_GET);
}


function traiterFormulaire($donnees)
{
	$equipeController = new EquipeController();
	$numEquipe = $equipeController->CreateEquipe();
	$joueur1 = [
		'NUMEROEQUIPE' => $numEquipe,
		'NOM' => $_GET['joueur1nom'],
		'PRENOM' => $_GET['joueur1prenom'],
		'DATENAISSANCE' => $_GET['joueur1datenaissance'],
		'NUMEROJOUEUR' => $_GET['joueur1numerojoueur'],
		'MAILJOUEUR' => $_GET['joueur1mailjoueur'],
	];
	$joueurController = new JoueurController();
	$joueurController->CreateJoueur($joueur1);
	echo "<script>window.opener.location.reload();window.close();</script>";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<link type="text/css" media="all" rel="stylesheet" href="../../css/styles.css">

	<link rel="icon" href="../../img/favicon.ico" />

	<title>Ajouter</title>
</head>

<body>
	<h1>Ajouter</h1>

	<form id="formulaire-modifetadd" action="popup_C_equipes.php" method="GET">
		<h2>Equipe</h2>
		Score : <input type="number" value="0" name="score" disabled><br>

		<?php for ($i = 1; $i <= 2; $i++) { ?>
			<h2>Joueur <?php echo $i; ?></h2>
			<input type="text" name="joueur<?php echo $i; ?>id" value="" style="display:none;">

			<label for="joueur<?php echo $i; ?>nom">Nom : </label>
			<input type="text" id="joueur<?php echo $i; ?>nom" value="" name="joueur<?php echo $i; ?>nom"><br>

			<label for="joueur<?php echo $i; ?>prenom">Prenom : </label>
			<input type="text" id="joueur<?php echo $i; ?>prenom" value="" name="joueur<?php echo $i; ?>prenom"><br>

			<label for="joueur<?php echo $i; ?>datenaissance">Date de naissance : </label>
			<input type="date" id="joueur<?php echo $i; ?>datenaissance" value="" name="joueur<?php echo $i; ?>datenaissance"><br>

			<label for="joueur<?php echo $i; ?>numerojoueur">Numéro : </label>
			<input type="number" id="joueur<?php echo $i; ?>numerojoueur" value="" name="joueur<?php echo $i; ?>numerojoueur"><br>

			<label for="joueur<?php echo $i; ?>mailjoueur">Mail : </label>
			<input type="email" id="joueur<?php echo $i; ?>mailjoueur" value="" name="joueur<?php echo $i; ?>mailjoueur"><br>
		<?php } ?>

		<div id="submit-div"><input type="submit" name="submit" value="Enregistrer"></div>

	</form>
</body>

</html>