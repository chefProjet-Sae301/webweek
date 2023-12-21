<?php
require('vendor/autoload.php');
use Controllers\EquipeController;

$equipeController = new EquipeController();

$equipes = $equipeController->Classement();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="public/img/favicon.ico" />

    <link type="text/css" media="all" rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="public/js/script-accueil.js"></script>
    <script src="public/js/carousel.js"></script>

    <title>Noël des Chimères</title>
</head>

<body>

    <header class="d-flex flex-wrap justify-content-between py-3">
        <!-- Nav > lg -->
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span>
                <img src="public/php/commun/logo.png" alt="Logo Noël des Chimères" height="60px">
            </span>
        </a>
        <ul class="nav nav-pills d-none d-lg-flex align-items-center custom-nav">
            <li class="nav-item"><a href="#" class="nav-link text-white" aria-current="page">Accueil</a></li>
            <li class="nav-item"><a href="public/php/association.php" class="nav-link text-white">Association</a></li>
            <li class="nav-item"><a href="public/php/tournoi.php" class="nav-link text-white">Tournoi</a></li>
            <li class="nav-item"><a href="public/php/jeux.php" class="nav-link text-white">Jeux</a></li>
            <li class="nav-item"><a href="public/php/formulaire.php" class="nav-link text-white">Inscription</a></li>
        </ul>
        <!-- Burger Menu en md -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon ">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 18L20 18" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" />
                    <path d="M4 12L20 12" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" />
                    <path d="M4 6L20 6" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" />
                </svg>
            </span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarNav">
            <ul class="navbar-nav d-lg-none">
                <li class="nav-item"><a href="#" class="nav-link text-white" aria-current="page"
                        style="color:#c61c1c;">Accueil</a></li>
                <li class="nav-item"><a href="public/php/association.php" class="nav-link text-white"
                        style="color:#c61c1c;">Association</a></li>
                <li class="nav-item"><a href="public/php/tournoi.php" class="nav-link text-white"
                        style="color:#c61c1c;">Tournoi</a></li>
                <li class="nav-item"><a href="public/php/jeux.php" class="nav-link text-white"
                        style="color:#c61c1c;">Jeux</a></li>
                <li class="nav-item"><a href="public/php/formulaire.php" class="nav-link text-white"
                        style="color:#c61c1c;">Inscription</a></li>
            </ul>
        </div>
    </header>

    <main>
        <!-- Ajout de la vidéo chnager la vidéo  -->
        <div id="video-container">
            <video src="public/img/vidéowebweek.mp4" controls></video>
        </div>
        <div class="container-tab">
            <div class="tab-container">
                <!-- Ajout de la tabulation -->
                <div class="table-acceuil">
                    <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'BourseAuxJeux')">Bourse aux
                        jeux</button>
                    <button class="tablinks" onclick="openTab(event, 'Tournoi')">Tournoi</button>
                    <button class="tablinks" onclick="openTab(event, 'Association')">Association</button>
                </div>

                <div id="BourseAuxJeux" class="tabcontent">
                    <p>La bourse des jeux aura lieu le samedi 14 et le dimanche 15 Décembre au Centre Pierre Cardinal.
                        Si vous avez des jeux à vendre, n’hésitez pas à venir, c’est un moment convivial, pour faire
                        découvrir à d’autres personnes de nouveaux moyens de s’amuser.</p>
                </div>

                <div id="Tournoi" class="tabcontent">
                    <p>Un tournoi de mille sabords sera également présent. Deux catégories seront disponibles, une pour
                        jouer sérieusement et l’autre pour se défier en famille. Alors n’hésitez plus, après tout le
                        trésor se gagne aux dés.</p>
                </div>

                <div id="Association" class="tabcontent">
                    <p>Le Temps des Chimères est une association qui organise chaque année un salon du jeu (accueillant
                        1000 personnes). Nous proposons également d’autres événements autour du jeu à notre initiative
                        ou en partenariat avec d’autres structures.</p>
                </div>
            </div>
            <div class="image-container-tab">
                <img src="public/img/stand.webp" alt="Image d'une conférence de l'association">
            </div>
        </div>
        <div class="flex-container">
            <div class="image-container-bj">
                <img src="public/img/association/asso2019.webp" alt="Présentation de l'association en 2019">
            </div>
            <div class="text-container-bj">
                <h2>Bourse au jeux</h2>
                <p>La bourse des jeux aura lieu le samedi 14 et le dimanche 15 Décembre. Si vous avez des jeux à vendre,
                    n’hésitez pas à venir, c’est un moment convivial, pour faire découvrir à d’autres personnes de
                    nouveaux moyens de s’amuser.
                    <br><br>Si vous avez pris du retard sur vos cadeaux de Noël, il est l’heure de vous rattraper et
                    d’acheter vos derniers cadeaux !
                    <br><br> Le temps des chimères va vous aider pour ce Noël.
                </p>
                <a href="public/php/jeux.php"><button class="boutton-LJ">Découvrez la liste des jeux</button></a>
            </div>
        </div>
        <div class="flex-container-tournoi">
            <div class="text-container-tournoi">
                <h2>Tournoi des 1000 sabords</h2>
                <p>A l’approche de Noël, un petit tournoi de 1000 sabords, il n’y a rien de mieux pour s’amuser en
                    famille.<br><br>

                    Inscrivez-vous avec votre mère, votre père, votre frère, votre sœur et tentez ensemble d’être
                    premier au classement.</p>
                <a href="public/php/tournoi.php"><button class="boutton-tournoi">Découvrez le tournoi</button></a>
            </div>
            <div class="image-container-tournoi">
                <img src="public/img/tournoi/mille_sabord.webp" alt="Boîte du jeu des 1000 sabords">
            </div>
        </div>
        <section id="association-galerie">
            <h2>Galerie</h2>
            <div class="owl-carousel owl-theme">
                <div class="item"><img src="public/img/1.webp"
                        alt="Image de galerie : affiche 2024 d'un évènement de l'association"></div>
                <div class="item"><img src="public/img/2.webp"
                        alt="Image de galerie : affiche 2023 d'un évènement de l'association"></div>
                <div class="item"><img src="public/img/3.webp"
                        alt="Image de galerie : prise lors d'un évènement costumé"></div>
                <div class="item"><img src="public/img/4.webp" alt="Image de galerie : prise lors d'un évènement"></div>
                <div class="item"><img src="public/img/5.webp" alt="Image de galerie : prise lors d'un évènement"></div>
                <div class="item"><img src="public/img/6.webp" alt="Image de galerie : prise lors d'un évènement"></div>
                <div class="item"><img src="public/img/7.webp" alt="Image de galerie : prise lors d'une conférence">
                </div>
                <div class="item"><img src="public/img/8.webp" alt="Image de galerie : prise lors d'un évènement"></div>
            </div>
        </section>
        <section id="classement_index">
            <div class="title">
                <h2>Classement</h2>
            </div>
            <div class="tables">
                <span>
                    <h3>Chill</h3>
                    <table class="classementTables tableChill">
                        <?php for ($i = 0; $i < count($equipes['Chill']); $i++) { ?>
                            <tr>
                                <td class="<?php echo "num" . $i + 1. ?> numEquipe">
                                    <?= $i + 1 ?>
                                </td>
                                <td>
                                    <?php echo "Équipe n° " . $equipes['Chill'][$i]->numeroEquipe ?>
                                </td>
                                <td>
                                    <?php echo $equipes['Chill'][$i]->score ?> points
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </span>
                <span>
                    <h3>Try Hard</h3>
                    <table class="classementTables tableTryHard">
                        <?php for ($i = 0; $i < count($equipes['TryHard']); $i++) { ?>
                            <tr>
                                <td class="<?php echo "num" . $i + 1. ?> numEquipe">
                                    <?php echo $i + 1 ?>
                                </td>
                                <td>
                                    <?php echo "Équipe n° " . $equipes['TryHard'][$i]->numeroEquipe ?>
                                </td>
                                <td>
                                    <?php echo $equipes['TryHard'][$i]->score ?> points
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <span>
            </div>
        </section>


        <a href="public/php/tournoi.php"><button class="boutton-tournoi2">Découvrez le tournoi</button></a>
    </main>
    <footer>
        <article>
            <a href="https://www.facebook.com/LeTempsDesChimeres/"><img src="public/php/commun/facebook.png"
                    height="20px" alt="réseau social Facebook de l'association"></a>
            <a href="https://www.instagram.com/letempsdeschimeres43/"><img src="public/php/commun/instagram.png"
                    height="20px" alt="réseau social Instagram de l'association"></a>
            <a href="https://discord.gg/yQqnfw9A4X"><img src="public/php/commun/discord.png" height="20px"
                    alt="réseau social Discord de l'association"></a>
            <div class="videlarge"></div>
            <a href="public/php/plan-du-site.php">Plan du site</a>
            <a href="public/php/mentions.php">Mentions Légales</a>
        </article>
    </footer>

</body>

</html>