<?php require('../../../vendor/autoload.php');
use Controllers\EquipeController, Controllers\JoueurController;

session_start();
if (!(isset($_SESSION["login"]) && isset($_SESSION["mdp"]))) {
    header('Location: login.php');
    exit();
}
$equipeController = new EquipeController();
$equipes = $equipeController->GetEquipes();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteEquipe'])) {
    $numeroEquipe = $_POST['deleteEquipe'];

    $equipeController->DeleteEquipe($numeroEquipe);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['logout'])) {
    session_unset(); // Unset des variables de session
    session_destroy(); // Destruction de la session
    header('Location: login.php'); // Redirection vers la page de connexion
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
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="submit" name="logout" value="Déconnexion">
        </form>
        </span>
        <ul>
            <li class="active">
                <a href="#">Tournoi : Equipes</a>

            </li>
            <li>
                <a href="administrationParties.php">Tournoi : Parties</a>

            </li>
            <li>
                <a href="administrationJeux.php">Jeux</a>
            </li>
        </ul>
    </div>
    <div class="contenu">
        <h2>Equipes :</h2>
        <a onclick="open('popup_C_equipes.php', '_blank', 'width=800,height=600'); return False;">
            <input type="button" value="Ajouter">
        </a>
        <table id="equipe_table">
            <thead>
                <td>N° Equipe</td>
                <td>Score</td>
                <td>Joueur 1</td>
                <td>Joueur 2</td>
                <td style="border:none;"></td>
            </thead>
            <tbody>
                <?php foreach ($equipes as $equipe) { ?>
                    <tr>
                        <td>
                            <?php echo $equipe->numeroEquipe ?>
                        </td>
                        <td>
                            <?php echo $equipe->score ?>
                        </td>
                     
                            <?php
                            if (isset($equipe->joueurs[0])) {
                                echo "<td>";
                                echo "<b>" . strtoupper($equipe->joueurs[0]->nom) . " " . $equipe->joueurs[0]->prenom . "</b>";
                                echo "<ul class='joueur_ul'>";
                                echo "<li><b>Date de naissance : </b>" . $equipe->joueurs[0]->dateNaissance . "</li>";
                                echo "<li><b>N° Joueur : </b>" . $equipe->joueurs[0]->numeroJoueur . "</li>";
                                echo "<li><b>Mail : </b>" . $equipe->joueurs[0]->mailJoueur . "</li>";
                                $istryHard = $equipe->isTryHard == 1 ? "TryHard" : "Chill";
                                echo "<li><b>Catégorie : </b>" . $istryHard . "</li>";
                                echo "</ul>";
                                echo "</td>";
                            } else {
                                echo "<td></td>";
                            }
                            ?>
     
                        
                            <?php
                            if (isset($equipe->joueurs[1])) {
                                echo "<td>";
                                echo "<b>" . strtoupper($equipe->joueurs[1]->nom) . " " . $equipe->joueurs[1]->prenom . "</b>";
                                echo "<ul class='joueur_ul'>";
                                echo "<li><b>Date de naissance : </b>" . $equipe->joueurs[1]->dateNaissance . "</li>";
                                echo "<li><b>N° Joueur : </b>" . $equipe->joueurs[1]->numeroJoueur . "</li>";
                                echo "<li><b>Mail : </b>" . $equipe->joueurs[1]->mailJoueur . "</li>";
                                $istryHard = $equipe->isTryHard == 1 ? "TryHard" : "Chill";
                                echo "<li><b>Catégorie : </b>" . $istryHard . "</li>";
                                echo "</ul>";
                                echo "</td>";
                            } else {
                                echo "<td></td>";
                            }
                            ?>
                        

                        <td>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe?');">
                                <input type="hidden" name="deleteEquipe" value="<?php echo $equipe->numeroEquipe; ?>">
                                <input type="submit" value="Supprimer">
                            </form>
                            <?php if (isset($equipe->joueurs[0]) || isset($equipe->joueurs[1])) { ?>
                                <a
                                    onclick="open('popup_U_equipes.php?numeroequipe=<?php echo $equipe->numeroEquipe ?>&score=<?php echo $equipe->score ?>&joueur1id=<?php echo isset($equipe->joueurs[0]->personneId) ? $equipe->joueurs[0]->personneId : '' ?>&joueur1nom=<?php echo isset($equipe->joueurs[0]->nom) ? $equipe->joueurs[0]->nom : '' ?>&joueur1prenom=<?php echo isset($equipe->joueurs[0]->prenom) ? $equipe->joueurs[0]->prenom : '' ?>&joueur1datenaissance=<?php echo isset($equipe->joueurs[0]->dateNaissance) ? $equipe->joueurs[0]->dateNaissance : '' ?>&joueur1numerojoueur=<?php echo isset($equipe->joueurs[0]->numeroJoueur) ? $equipe->joueurs[0]->numeroJoueur : '' ?>&joueur1mailjoueur=<?php echo isset($equipe->joueurs[0]->mailJoueur) ? $equipe->joueurs[0]->mailJoueur : '' ?>&joueur2id=<?php echo isset($equipe->joueurs[1]->personneId) ? $equipe->joueurs[1]->personneId : '' ?>&joueur2nom=<?php echo isset($equipe->joueurs[1]->nom) ? $equipe->joueurs[1]->nom : '' ?>&joueur2prenom=<?php echo isset($equipe->joueurs[1]->prenom) ? $equipe->joueurs[1]->prenom : '' ?>&joueur2datenaissance=<?php echo isset($equipe->joueurs[1]->dateNaissance) ? $equipe->joueurs[1]->dateNaissance : '' ?>&joueur2numerojoueur=<?php echo isset($equipe->joueurs[1]->numeroJoueur) ? $equipe->joueurs[1]->numeroJoueur : '' ?>&joueur2mailjoueur=<?php echo isset($equipe->joueurs[1]->mailJoueur) ? $equipe->joueurs[1]->mailJoueur : '' ?>', '_blank', 'width=800,height=600'); return False;">
                                    <input type="button" value="Modifier"
                                        id="<?php echo "equipe" . $equipe->numeroEquipe; ?>-update">
                                </a>
                            <?php } ?>

                        </td>

                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>