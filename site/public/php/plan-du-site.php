<?php
require('../../vendor/autoload.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" media="all" rel="stylesheet" href="../css/styles.css">

	<title>Les jeux</title>
</head>

<body>
	<?php
	include("commun/header.php")
	?>

    <section id="liste">
        <h1>Liste des pages</h1>
        <ul>
            <li><a href="../../index.php">Accueil</a></li>
            <li><a href="association.php">L'association</a></li>
            <li><a href="tournoi.php">Explication des tournois</a></li>
            <li><a href="jeux.php">Les Jeux</a></li>
            <li><a href="formulaire.php">Page d'inscription</a></li>
            <li><a href="mentions.php">Mentions Légales</a></li>
            <li><a href="#">Plan du site</a></li>
        </ul>
    </section>

    <footer id="test">
        <article>
            <a href="https://www.facebook.com/LeTempsDesChimeres/"><img src="commun/facebook.png" height="20px" alt="réseau social Facebook de l'association"></a>
            <a href="https://www.instagram.com/letempsdeschimeres43/"><img src="commun/instagram.png" height="20px" alt="réseau social Instagram de l'association"></a>
            <a href="https://discord.gg/yQqnfw9A4X"><img src="commun/discord.png" height="20px" alt="réseau social Discord de l'association"></a>
            <div class="videlarge"></div>
            <a href="plan-du-site.php">Plan du site</a>
            <a href="mentions.php">Mentions Légales</a>
        </article>
    </footer>
</body>

</html>