<?php
require('../../../vendor/autoload.php');
use Controllers\AdministrateurController;
session_start();
session_unset();
$adminCrontroller = new AdministrateurController();
if ((isset($_POST["login"]) && isset($_POST["mdp"]))) {
    $result = $adminCrontroller->VerifConnect($_POST["login"], hash('sha256',$_POST["mdp"]));
    if ($result) {
        $_SESSION["login"]=$_POST["login"];
        $_SESSION["mdp"]=$_POST["mdp"];
        header('Location: administration.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" media="all" rel="stylesheet" href="../../css/styles.css">

	<title>Administration</title>
</head>

<body>
<header>

<nav>
    <!-- barre de navigation -->
    <a href="../../../index.php"><img src="../commun/logo.png" alt="Logo Noël des Chimères" height="60px"></a>
    <div class="videlarge"></div>
    <a href="../../../index.php">Accueil</a>
    <a href="../../../index.php">Tournoi</a>
    <a href="../jeux.php">Jeux</a>
    <a href="../formulaire.php">Inscription</a>

</nav>

</header>

	<section id="formulaire-administration">
		<form action="#" method="post">
			<h1>Administration</h1>
			
			<div class="groupe-input ligne-entiere">
                <label for="login">Login</label>
                <input type="text" value="login" name="login" id="login" required />
            </div>

			<div class="groupe-input ligne-entiere">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required />
            </div>

            <input type="checkbox" onclick="montrerMotdePasse()">Montrer le mot de passe

            <div id="submit-div"><input type="submit" value="Connexion" /></div>
		</form>
	</section>

    <footer>
	<article>
		<a href="https://www.facebook.com/LeTempsDesChimeres/"><img src="../commun/facebook.png" height="20px" alt="réseau social Facebook de l'association"></a>
		<a href="https://www.instagram.com/letempsdeschimeres43/"><img src="../commun/instagram.png" height="20px" alt="réseau social Instagram de l'association"></a>
		<a href="https://discord.gg/yQqnfw9A4X"><img src="../commun/discord.png" height="20px" alt="réseau social Discord de l'association"></a>
		<div class="videlarge"></div>
		<a href="index.php">Plan du site</a>
		<a href="index.php">Mentions Légales</a>
	</article>
</footer>

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