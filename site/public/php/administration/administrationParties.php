<?php require('../../../vendor/autoload.php');
use Controllers\Partie_TournoiController;

session_start();
if (!(isset($_SESSION["login"]) && isset($_SESSION["mdp"]))) {
    header('Location: login.php');
    exit();
};
$partiesController = new Partie_TournoiController();
$parties = $partiesController->GetParties_Tournois();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deletePartie'])) {
    $tournoiId = $_POST['deletePartie'];
    $partiesController->DeletePartie($tournoiId);
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

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
            <a href="administrationJeux.php">Jeux</a>
            </li>
        </ul>
    </div>
    <div class="contenu">
        <h2>Parties :</h2>
        <table id="parties_table">
            <thead>
                <td>ID</td>
                <td>Date</td>
                <td>Équipe 1</td>
                <td>Équipe 2</td>
                <td style="border:none;"></td>
            </thead>
            <tbody>
                <?php foreach ($parties as $partie) { ?>
                    <tr>
                        <td><?php echo $partie->tournoiId; ?></td>
                        <td><?php echo $partie->dateTournoi; ?></td>
                        <td><?php echo $partie->equipe1->numeroEquipe; ?></td>
                        <td><?php echo $partie->equipe2->numeroEquipe; ?></td>
                        <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette partie ?');">
                                <input type="hidden" name="deletePartie" value="<?php echo $partie->tournoiId; ?>">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>