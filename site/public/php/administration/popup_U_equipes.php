<?php
require('../../../vendor/autoload.php');

use \Controllers\EquipeController, \Controllers\JoueurController;

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['submit'])) {
	traiterFormulaire($_GET);
}


function traiterFormulaire($donnees)
{
	$equipeController = new EquipeController();
	$equipeController->UpdateEquipe($donnees["numeroequipe"], $donnees["score"]);
	$joueurController = new JoueurController();
	if (!($donnees["joueur1id"] == null || $donnees["joueur1id"] == "")) {
		$joueurController->UpdateJoueur($donnees["joueur1id"], strtoupper($donnees["joueur1nom"]), $donnees["joueur1prenom"], $donnees["joueur1datenaissance"], $donnees["joueur1numerojoueur"], $donnees["joueur1mailjoueur"]);
	};
	if (!($donnees["joueur2id"] == null || $donnees["joueur2id"] == "")) {
		$joueurController->UpdateJoueur($donnees["joueur2id"], strtoupper($donnees["joueur2nom"]), $donnees["joueur2prenom"], $donnees["joueur2datenaissance"], $donnees["joueur2numerojoueur"], $donnees["joueur2mailjoueur"]);
	};

	echo "<script>window.opener.location.reload();window.close();</script>";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<link type="text/css" media="all" rel="stylesheet" href="../../css/styles.css">

	<link rel="icon" href="../../img/favicon.ico" />

	<title>Modifier</title>
</head>

<body>
	<h1>Modifier</h1>

	<form id="formulaire-modifetadd" action="popup_U_equipes.php" method="GET">
		<h2>Equipe <?php echo $_GET["numeroequipe"] ?></h2>
		<input type="text" name="numeroequipe" value="<?php echo $_GET["numeroequipe"] ?>" style="display:none;">
		Score : <input type="number" value="<?php echo $_GET["score"] ?? ''; ?>" name="score"><br>

		<?php for ($i = 1; $i <= 2; $i++) { ?>
			<h2>Joueur <?php echo $i; ?></h2>
			<input type="text" name="joueur<?php echo $i; ?>id" value="<?php echo $_GET["joueur${i}id"] ?? ''; ?>" style="display:none;">

			<label for="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>">Nom : </label>
			<input type="text" id="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>" name="joueur<?php echo $i; ?>nom"><br>

			<label for="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>">Prenom : </label>
			<input type="text" id="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>" name="joueur<?php echo $i; ?>prenom"><br>

			<label for="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>">Date de naissance : </label>
			<input type="date" id="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>" name="joueur<?php echo $i; ?>datenaissance"><br>

			<label for="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>">Numéro : </label>
			<input type="number" id="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>" name="joueur<?php echo $i; ?>numerojoueur"><br>

			<label for="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>">Mail : </label>
			<input type="email" id="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>" name="joueur<?php echo $i; ?>mailjoueur"><br>
		<?php } ?>

		<div id="submit-div"><input type="submit" name="submit" value="Enregistrer"></div>
	</form>
</body>

</html>