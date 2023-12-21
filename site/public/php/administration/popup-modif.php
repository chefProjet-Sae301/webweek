<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
</head>

<body>
    <h1>Modifier</h1>

    <form id="formulaire-modifetadd" action="popup_U_equipes.php" method="GET">
        <h2>Equipe <?php echo $_GET["numeroequipe"] ?></h2>
        <input type="text" name="numeroequipe" value="<?php echo $_GET["numeroequipe"] ?>" style="display:none;">
        Score : <input type="number" value="<?php echo $_GET["score"] ?? ''; ?>" name="score"><br>

        <?php for ($i = 1; $i <= 2; $i++) { ?>
            <h2>Joueur <?php echo $i; ?></h2>
            <input type="text" name="joueur<?php echo $i; ?>id" value="<?php echo $_GET["joueur${i}id"] ?? ''; ?>" style="display:none;">

            <label for="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>">Nom : </label>
            <input type="text" id="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}nom"] ?? ''; ?>" name="joueur<?php echo $i; ?>nom"><br>

            <label for="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>">Prenom : </label>
            <input type="text" id="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}prenom"] ?? ''; ?>" name="joueur<?php echo $i; ?>prenom"><br>

            <label for="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>">Date de naissance : </label>
            <input type="date" id="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}datenaissance"] ?? ''; ?>" name="joueur<?php echo $i; ?>datenaissance"><br>

            <label for="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>">Numéro : </label>
            <input type="number" id="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}numerojoueur"] ?? ''; ?>" name="joueur<?php echo $i; ?>numerojoueur"><br>

            <label for="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>">Mail : </label>
            <input type="email" id="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>" value="<?php echo $_GET["joueur${i}mailjoueur"] ?? ''; ?>" name="joueur<?php echo $i; ?>mailjoueur"><br>
        <?php } ?>

        <div id="submit-div"><input type="submit" name="submit" value="Enregistrer"></div>
    </form>
</body>
</html>