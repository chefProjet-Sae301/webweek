<?php
require('../../vendor/autoload.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" media="all" rel="stylesheet" href="../css/styles.css">

	<title>Administration</title>
</head>

<body>
	<?php
	include("commun/header.php")
	?>

	<section id="formulaire-administration">
		<form>
			<h1>Administration</h1>
			
			<div class="groupe-input ligne-entiere">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" required />
            </div>

			<div class="groupe-input ligne-entiere">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required />
            </div>

            <input type="checkbox" onclick="montrerMotdePasse()">Montrer le mot de passe

            <div id="submit-div"><input type="submit" value="Connexion" /></div>
		</form>
	</section>
	

	<?php
	include("commun/footer.php")
	?>

    <script>
        function montrerMotdePasse() {
            var x = document.getElementById("mdp");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>