<?php
require('../../../vendor/autoload.php');
use \Controllers\EquipeController, \Controllers\JoueurController;
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['submit'])) {
        traiterFormulaire($_GET);
    }


    function traiterFormulaire($donnees) {
        $equipeController = new EquipeController();
        $equipeController->UpdateEquipe($donnees["numeroequipe"], $donnees["score"]);
        $joueurController = new JoueurController();
        if (!($donnees["joueur1id"] == null || $donnees["joueur1id"] == "")) {
            $joueurController->UpdateJoueur($donnees["joueur1id"], strtoupper($donnees["joueur1nom"]), $donnees["joueur1prenom"], $donnees["joueur1datenaissance"], $donnees["joueur1numerojoueur"], $donnees["joueur1mailjoueur"]);
        };
        if (!($donnees["joueur2id"] == null || $donnees["joueur2id"] == "")) {
            $joueurController->UpdateJoueur($donnees["joueur2id"], strtoupper($donnees["joueur2nom"]), $donnees["joueur2prenom"], $donnees["joueur2datenaissance"], $donnees["joueur2numerojoueur"], $donnees["joueur2mailjoueur"]);
        };

        echo "<script>window.opener.location.reload();window.close();</script>";
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
</head>

<body>
    <h1>Modifier</h1>

    <form action="popup_U_equipes.php" method="GET">
        <h2>Equipe <?php echo $_GET["numeroequipe"] ?></h2>
        <input type="text" name="numeroequipe" value="<?php echo $_GET["numeroequipe"] ?>" style="display:none;">
        Score : <input type="number" value="<?php echo $_GET["score"] ?? ''; ?>" name="score"><br>

        <?php for ($i = 1; $i <= 2; $i++) { ?>
            <h2>Joueur <?php echo $i; ?></h2>
            <input type="text" name="joueur<?php echo $i; ?>id" value="<?php echo $_GET["joueur${i}id"] ?? ''; ?>" style="display:none;">
            Nom : <input type="text" value="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>" name="joueur<?php echo $i; ?>nom"><br>
            Prenom : <input type="text" value="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>" name="joueur<?php echo $i; ?>prenom"><br>
            Date de naissance : <input type="date" value="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>" name="joueur<?php echo $i; ?>datenaissance"><br>
            Numéro : <input type="number" value="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>" name="joueur<?php echo $i; ?>numerojoueur"><br>
            Mail : <input type="mail" value="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>" name="joueur<?php echo $i; ?>mailjoueur"><br>
        <?php } ?>

        <input type="submit" name="submit" value="Enregistrer">
    </form>
</body>
</html>