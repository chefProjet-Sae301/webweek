
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

    <form>
        <label for="nom">Nom *</label>
        <input type="text" name="nom" id="nom" required />

        <label for="prenom">Prénom *</label>
        <input type="text" name="prenom" id="prenom" required />

        <label for="email">Adresse E-mail *</label>
        <input type="email" name="email" id="email" required />

        <label for="nom">Nom *</label>
        <input type="text" name="nom" id="nom" required />

    </form>

	<?php
	include("commun/footer.php")
	?>
</body>

</html>