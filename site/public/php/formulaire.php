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

			<span>
				<div>
					<label for="nom">Nom *</label>
					<input type="text" name="nom" id="nom" required />
				</div>

				<div>
					<label for="prenom">Prénom *</label>
					<input type="text" name="prenom" id="prenom" required />
				</div>	
			</span>

			
			<div>
				<label for="email">Adresse E-mail *</label>
				<input type="email" name="email" id="email" required />
			</div>
			
			<div>
				<label for="choix">Voulez-vous vendre ou voulez-vous participer au tournoi ?</label>
				<select name="choix" id="choix">
					<option value="tournoi">Je souhaite participer au tournoi</option>
					<option value="vente">Je souhaite vendre durant l'évènement</option>
				</select>
			</div>

			<div>
				<label for="nom">Si vous souhaitez participer au tournoi, dîtes-nous avec qui si vous avez déjà une équipe ? (* si vous participez au tournoi)</label>
				<textarea></textarea>
			</div>
			

			<p>Après avoir reçu votre demande d’inscription, nous vous renverrons un mail pour vous demandez plus de détail ou validez votre inscription</p>

			<input type="submit" value="Envoyer" />

		</form>
	</section>
	

	<?php
	include("commun/footer.php")
	?>
</body>

</html>