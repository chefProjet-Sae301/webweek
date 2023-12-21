<?php

require('../../../vendor/autoload.php');
use Controllers\AdministrateurController;

// Démarre une session et efface les variables de session existantes
session_start();
session_unset();


$adminCrontroller = new AdministrateurController();

// Vérifie si le formulaire a été soumis avec les champs 'login' et 'mdp' remplis
if ((isset($_POST["login"]) && isset($_POST["mdp"]))) {
    // Vérifie les informations de connexion en utilisant la méthode VerifConnect du contrôleur Administrateur
    $result = $adminCrontroller->VerifConnect($_POST["login"], hash('sha256', $_POST["mdp"]));
    if ($result) {
        // Si les informations sont valides, stocke les données de connexion dans la session et redirige vers 'administration.php'
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["mdp"] = $_POST["mdp"];
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
    <link rel="icon" href="../../img/favicon.ico" />
    <link type="text/css" media="all" rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/administration/login.js"></script>
    <title>Administration</title>
</head>

<body>
    <header>
        <nav>
            <!-- Barre de navigation -->
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

    <footer>
        <article>
            <a href="https://www.facebook.com/LeTempsDesChimeres/"><img src="../commun/facebook.png" height="20px" alt="Réseau social Facebook de l'association"></a>
            <a href="https://www.instagram.com/letempsdeschimeres43/"><img src="../commun/instagram.png" height="20px" alt="Réseau social Instagram de l'association"></a>
            <a href="https://discord.gg/yQqnfw9A4X"><img src="../commun/discord.png" height="20px" alt="Réseau social Discord de l'association"></a>
            <div class="videlarge"></div>
            <a href="index.php">Plan du site</a>
            <a href="index.php">Mentions Légales</a>
        </article>
    </footer>
</body>

</html>
