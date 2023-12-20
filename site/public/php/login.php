<?php
require('../../vendor/autoload.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>

	<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

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