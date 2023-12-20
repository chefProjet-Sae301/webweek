<?php require('../../../vendor/autoload.php');
use Controllers\JeuController;

session_start();
if ((isset($_POST["login"]) && isset($_POST["mdp"]))) {
    header('Location: formulaire.php');
    exit();
} else {
    //$_SESSION["login"]=$_POST["login"];
    //$_SESSION["mdp"]=$_POST["mdp"];
}
$jeuController = new JeuController();
$jeux = $jeuController->GetJeux();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <script src="../js/popup.js"></script>
    <title>Noël des Chimères - Administration</title>
</head>

<body>
    <div class="menuAdmin">
        <span class>
            <h1>Admin</h1>
        </span>
        <ul>
            <li>
                <a href="administration.php">Tournoi : Equipes</a>

            </li>
            <li>
                <a href="administrationParties.php">Tournoi : Parties</a>

            </li>
            <li class="active">
                <a href="#">Jeux</a>
            </li>
        </ul>
    </div>
    <div class="contenu">
        <h2>Jeux :</h2>
        <div>
            <form action="" method="post">
                <select name="jeuId">
                    <option value="">--selectionne un jeu --</option>
                    <?php foreach ($jeux as $jeu) { ?>
                        <option value="<?php echo $jeu->jeuId?>"><?php echo $jeu->nom?></option>
                    <?php } ?>
                    <div>
                        <input type="radio" name="UorD"> modifier
                        <input type="radio" name="UorD"> supprimer
                    </div>
                </select>
            </form>
        </div>

    </div>