<?php require('vendor/autoload.php'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

	<link type="text/css" media="all" rel="stylesheet" href="public/css/styles.css">

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
		<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

			<span class="navbar-toggler-icon ">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4 18L20 18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
					<path d="M4 12L20 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
					<path d="M4 6L20 6" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
				</svg>
			</span>

		</button>
		<div class="collapse navbar-collapse text-center" id="navbarNav">
			<ul class="navbar-nav d-lg-none">
				<li class="nav-item"><a href="#" class="nav-link text-white" aria-current="page" style="color:#c61c1c;">Accueil</a></li>
				<li class="nav-item"><a href="public/php/association.php" class="nav-link text-white" style="color:#c61c1c;">Association</a></li>
				<li class="nav-item"><a href="public/php/tournoi.php" class="nav-link text-white" style="color:#c61c1c;">Tournoi</a></li>
				<li class="nav-item"><a href="public/php/jeux.php" class="nav-link text-white" style="color:#c61c1c;">Jeux</a></li>
				<li class="nav-item"><a href="public/php/formulaire.php" class="nav-link text-white" style="color:#c61c1c;">Inscription</a></li>
			</ul>
		</div>

	</header>


	<footer>
		<article>
			<a href="https://www.facebook.com/LeTempsDesChimeres/"><img src="public/php/commun/facebook.png" height="20px" alt="réseau social Facebook de l'association"></a>
			<a href="https://www.instagram.com/letempsdeschimeres43/"><img src="public/php/commun/instagram.png" height="20px" alt="réseau social Instagram de l'association"></a>
			<a href="https://discord.gg/yQqnfw9A4X"><img src="public/php/commun/discord.png" height="20px" alt="réseau social Discord de l'association"></a>
			<div class="videlarge"></div>
			<a href="index.php">Plan du site</a>
			<a href="index.php">Mentions Légales</a>
		</article>
	</footer>

</body>

</html>