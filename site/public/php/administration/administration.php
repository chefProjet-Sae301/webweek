<?php require('../../../vendor/autoload.php');
use Controllers\EquipeController, Controllers\JoueurController;

session_start();
if ((isset($_POST["login"]) && isset($_POST["mdp"]))) {
    header('Location: formulaire.php');
    exit();
} else {
    //$_SESSION["login"]=$_POST["login"];
    //$_SESSION["mdp"]=$_POST["mdp"];
}
$equipeController = new EquipeController();
$equipes = $equipeController->GetEquipes();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteEquipe'])) {
    $numeroEquipe = $_POST['deleteEquipe'];

    $equipeController->DeleteEquipe($numeroEquipe);

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
            <li class="active">
                <a href="#">Tournoi : Equipes</a>
                
            </li>
            <li>
            <a href="administrationParties.php">Tournoi : Parties</a>
                
            </li>
            <li>
                Jeux
            </li>
        </ul>
    </div>
    <div class="contenu">
        <h2>Equipes :</h2>
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
                        <?php if (isset($equipe->joueurs[0]->personneId) && isset($equipe->joueurs[1]->personneId)) { ?>
                            <td>
                                <?php echo "<b>" . strtoupper($equipe->joueurs[0]->nom) . " " . $equipe->joueurs[0]->prenom . "</b>" ?>
                                <ul class="joueur_ul">

                                    <li>
                                        <?php echo "<b>Date de naissance : </b>" . $equipe->joueurs[0]->dateNaissance ?>
                                    </li>
                                    <li>
                                        <?php echo "<b>N° Joueur : </b>" . $equipe->joueurs[0]->numeroJoueur ?>
                                    </li>
                                    <li>
                                        <?php echo "<b>Mail : </b>" . $equipe->joueurs[0]->mailJoueur ?>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <?php echo "<b>" . strtoupper($equipe->joueurs[1]->nom) . " " . $equipe->joueurs[1]->prenom . "</b>" ?>
                                <ul class="joueur_ul">
                                    <li>
                                        <?php echo "<b>Date de naissance : </b>" . $equipe->joueurs[1]->dateNaissance ?>
                                    </li>
                                    <li>
                                        <?php echo "<b>N° Joueur : </b>" . $equipe->joueurs[1]->numeroJoueur ?>
                                    </li>
                                    <li>
                                        <?php echo "<b>Mail : </b>" . $equipe->joueurs[1]->mailJoueur ?>
                                    </li>
                                </ul>
                            </td>
                        <?php } else { ?>
                            <td></td>
                            <td></td>
                        <?php } ?>
                        <td>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette équipe?');">
                                <input type="hidden" name="deleteEquipe" value="<?php echo $equipe->numeroEquipe; ?>">
                                <input type="submit" value="delete">
                            </form>
                            <?php if (isset($equipe->joueurs[0]->personneId) && isset($equipe->joueurs[1]->personneId)) { ?>
                                <a
                                    onclick="open('popup_U_equipes.php?numeroequipe=<?php echo $equipe->numeroEquipe ?>&score=<?php echo $equipe->score ?>&joueur1id=<?php echo $equipe->joueurs[0]->personneId ?>&joueur1nom=<?php echo $equipe->joueurs[0]->nom ?>&joueur1prenom=<?php echo $equipe->joueurs[0]->prenom ?>&joueur1datenaissance=<?php echo $equipe->joueurs[0]->dateNaissance ?>&joueur1numerojoueur=<?php echo $equipe->joueurs[0]->numeroJoueur ?>&joueur1mailjoueur=<?php echo $equipe->joueurs[0]->mailJoueur ?>&joueur2id=<?php echo $equipe->joueurs[1]->personneId ?>&joueur2nom=<?php echo $equipe->joueurs[1]->nom ?>&joueur2prenom=<?php echo $equipe->joueurs[1]->prenom ?>&joueur2datenaissance=<?php echo $equipe->joueurs[1]->dateNaissance ?>&joueur2numerojoueur=<?php echo $equipe->joueurs[1]->numeroJoueur ?>&joueur2mailjoueur=<?php echo $equipe->joueurs[1]->mailJoueur ?>', '_blank', 'width=800,height=600'); return False;">
                                    <input type="button" value="modify"
                                        id="<?php echo "equipe" . $equipe->numeroEquipe; ?>-update"></a>
                            <?php } else { ?>
                                <a
                                    onclick="open('popup_U_equipes.php?numeroequipe=<?php echo $equipe->numeroEquipe ?>&score=<?php echo $equipe->score ?>&joueur1id=&joueur1nom=&joueur1prenom=&joueur1datenaissance=&joueur1numerojoueur=&joueur1mailjoueur=&joueur2id=&joueur2nom=&joueur2prenom=&joueur2datenaissance=&joueur2numerojoueur=&joueur2mailjoueur=', '_blank', 'width=800,height=600'); return False;">
                                    <input type="button" value="modify"
                                        id="<?php echo "equipe" . $equipe->numeroEquipe; ?>-update"></a>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>