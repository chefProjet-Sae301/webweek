<?php
require('vendor/autoload.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" media="all" rel="stylesheet" href="../css/styles.css">

	<title>Noël des Chimères</title>
</head>

<body>
	<?php
	include("commun/header.php")
	?>
		<section id="formulaire">
		<form>
			<h1>Formulaire</h1>

			<div class="groupe-input ligne-demi">
				<div class="half-width">
					<label for="nom">Nom *</label>
					<input type="text" name="nom" id="nom" required />
				</div>
				<div class="half-width">
					<label for="prenom">Prénom *</label>
					<input type="text" name="prenom" id="prenom" required />
				</div>
			</div>

			
			<div class="groupe-input ligne-entiere">
				<label for="email">Adresse E-mail *</label>
				<input type="email" name="email" id="email" required />
			</div>

			<div class="groupe-input ligne-entiere">
				<label for="choix">Voulez-vous vendre ou voulez-vous participer au tournoi ?</label>
				<select name="choix" id="choix">
					<option value="tournoi">Je souhaite participer au tournoi</option>
					<option value="vente">Je souhaite vendre durant l'évènement</option>
				</select>
			</div>

			<div class="groupe-input ligne-entiere">
				<label for="equipe">Si vous souhaitez participer au tournoi, dîtes-nous avec qui si vous avez déjà une équipe ? (* si vous participez au tournoi)</label>
				<textarea id="equipe"></textarea>
			</div>

			<p>Après avoir reçu votre demande d’inscription, nous vous renverrons un mail pour vous demander plus de détails ou valider votre inscription.</p>

			<div id="submit-div"><input type="submit" value="Envoyer" /></div>
		</form>
	</section>
	

	<?php
	include("commun/footer.php")
	?>
</body>

</html>