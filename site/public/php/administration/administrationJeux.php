<?php require('../../../vendor/autoload.php');
use Controllers\JeuController;

session_start();
if (!(isset($_SESSION["login"]) && isset($_SESSION["mdp"]))) {
    header('Location: login.php');
    exit();
}
;
$jeuController = new JeuController();
$jeux = $jeuController->GetJeux();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['modifierSupprimer'])) {
    $jeu = $_POST['jeuId'];
    $jeuId = explode(';', $jeu)[0];
    $UorD = $_POST['UorD'];
    $nomJeu = $_POST['nomJeu'];
    $description = $_POST['description'];

    $tmpNameImg = $_FILES['imgJeu']['tmp_name'];
    $nameImg = $_FILES['imgJeu']['name'];
    $sizeImg = $_FILES['imgJeu']['size'];
    $errorImg = $_FILES['imgJeu']['error'];
    $typeImg = $_FILES['imgJeu']['type'];
    move_uploaded_file($tmpNameImg, '../../img/' . $nameImg);

    if ($UorD == "supprimer") {
        $jeuController->DeleteJeu($jeuId);
        header("Location: $_SERVER[PHP_SELF]");
        exit;
    } else if ($UorD == "modifier") {
        $jeuController->UpdateJeu($jeuId, $nomJeu, $description, '../../img/' . $nameImg);
        /*         header("Location: $_SERVER[PHP_SELF]");
                exit; */
    }


}

// Traitement du deuxième formulaire "Créer"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['creer'])) {
    $C_nomJeu = $_POST['C_nomJeu'];
    $C_description = $_POST['C_description'];

    $C_tmpNameImg = $_FILES['C_imgJeu']['tmp_name'];
    $C_nameImg = $_FILES['C_imgJeu']['name'];
    $C_sizeImg = $_FILES['C_imgJeu']['size'];
    $C_errorImg = $_FILES['C_imgJeu']['error'];
    $C_typeImg = $_FILES['C_imgJeu']['type'];
    move_uploaded_file($C_tmpNameImg, '../../img/' . $C_nameImg);

    $jeuController->CreateJeu($C_nomJeu, $C_description, '../../img/' . $C_nameImg);
    header("Location: $_SERVER[PHP_SELF]");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <li>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="deconnexion_form">
                    <input type="submit" name="logout" value="Déconnexion">
                </form>
            </li>
        </ul>
    </div>
    <div class="contenu">
        <h2>Jeux :</h2>
        <div class="DivFormJeux">

            <form action="administrationJeux.php" method="post" enctype='multipart/form-data'>
                <h3>Modifier / Supprimer</h3>
                <select name="jeuId">
                    <option value="">-- Sélectionne un jeu --</option>
                    <?php foreach ($jeux as $jeu) { ?>
                        <option value="<?php echo "{$jeu->jeuId};{$jeu->nom};{$jeu->lien_image};{$jeu->description}" ?>">
                            <?php echo $jeu->nom ?>
                        </option>
                    <?php } ?>
                </select>
                <div id="modifierSupprimer">
                    <input type="radio" name="UorD" value="modifier"> Modifier
                    <input type="radio" name="UorD" value="supprimer"> Supprimer
                </div>
                <div id="champsJeu">
                    <span class="premiereLigne">
                        <span>
                            <label for="nomJeu">Nom</label>
                            <input type="text" name="nomJeu" id="nomJeu" value="">
                        </span>
                        <span>
                            <label for="imgJeu">Image</label><br>
                            <input type="file" id="imgJeu" name="imgJeu" accept="image/png, image/jpeg" /><br>
                        </span>
                    </span>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>

                <input type="submit" value="Envoyer" id="submitJeu" name="modifierSupprimer">
            </form>

            <form action="" method="post" enctype='multipart/form-data'>
                <h3>Créer</h3>
                <span class="premiereLigne">
                    <span>
                        <label for="C_nomJeu">Nom</label>
                        <input type="text" name="C_nomJeu" id="C_nomJeu" value="">
                    </span>
                    <span>
                        <label for="imgJeu">Image</label><br>
                        <input type="file" id="C_imgJeu" name="C_imgJeu" accept="image/png, image/jpeg" /><br>
                    </span>
                </span>
                <label for="C_description">Description</label>
                <textarea name="C_description" id="C_description" cols="30" rows="10"></textarea>

                <input type="submit" value="Créer" id="submitJeu" name="creer">
            </form>
        </div>
    </div>

</body>

<script>
    document.getElementById('modifierSupprimer').style.display = 'none';
    document.getElementById('champsJeu').style.display = 'none';
    document.querySelector('[name="jeuId"]').addEventListener('change', function (event) {
        var selectedOptionValue = event.target.value;
        var values = selectedOptionValue.split(';');

        document.getElementById('nomJeu').value = values[1] != null ? values[1] : "";
        document.getElementById('description').value = values[3] != null ? values[3] : "";

        if (selectedOptionValue === "") {
            document.getElementById('modifierSupprimer').style.display = 'none';
            document.getElementById('champsJeu').style.display = 'none';
            document.getElementById('submitJeu').style.display = 'none';
        } else {
            document.getElementById('modifierSupprimer').style.display = 'block';
            document.getElementById('submitJeu').style.display = 'block';
        }
    });

    document.querySelectorAll('[name="UorD"]').forEach(function (radio) {
        radio.addEventListener('change', function (event) {
            var supprimerChecked = document.querySelector('[name="UorD"]:checked').value === "supprimer";
            if (supprimerChecked) {
                document.getElementById('champsJeu').style.display = 'none';
            } else {
                document.getElementById('champsJeu').style.display = 'block';
            }
        });
    });
</script>