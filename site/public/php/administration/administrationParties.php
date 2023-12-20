<?php require('../../../vendor/autoload.php');
use Controllers\Partie_TournoiController;

session_start();
if ((isset($_POST["login"]) && isset($_POST["mdp"]))) {
    header('Location: formulaire.php');
    exit();
} else {
    //$_SESSION["login"]=$_POST["login"];
    //$_SESSION["mdp"]=$_POST["mdp"];
}
$partiesController = new Partie_TournoiController();
$parties = $partiesController->GetParties_Tournois();

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
            <li >
                <a href="administration.php">Tournoi : Equipes</a>
                
            </li>
            <li class="active">
            <a href="#">Tournoi : Parties</a>
                
            </li>
            <li>
                Jeux
            </li>
        </ul>
    </div>
    <div class="contenu">
        <h2>Equipes :</h2>
        <table id="parties_table">
            <thead>
                <td>ID</td>
                <td>Date</td>
                <td>Équipe 1</td>
                <td>Équipe 2</td>
                <td>Catégorie</td>
                <td style="border:none;"></td>
            </thead>
            <tbody>
                <?php foreach ($parties as $partie) { ?>
                    <tr>
                        <td><?php echo $partie->tournoiId; ?></td>
                        <td><?php echo $partie->dateTournoi; ?></td>
                        <td><?php echo $partie->equipe1->numeroEquipe; ?></td>
                        <td><?php echo $partie->equipe2->numeroEquipe; ?></td>
                        <td><?php echo $partie->isTryHard == true ? "Try Hard" : "Chill"; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>