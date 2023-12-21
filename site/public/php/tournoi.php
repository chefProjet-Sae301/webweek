<?php
require('../../vendor/autoload.php');
use Controllers\EquipeController;

$equipeController = new EquipeController();

$equipes = $equipeController->Classement();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
	<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />


	<link type="text/css" media="all" rel="stylesheet" href="../css/styles.css">

	<title>Tournois</title>
</head>

<body>
	<?php
	include("commun/header.php")
		?>

	<section class="debut-tournoi">
		<h1>Tournoi</h1>

		<p class="tournoi-text">A l’approche de Noël, un petit tournoi des 1000 sabords, il n’y a rien de mieux pour
			s’amuser en famille.</p>
		<p class="tournoi-text">Inscrivez-vous avec votre mère, votre père, votre frère, votre soeur et tentez ensemble
			d’être premier au classement.</p>
	</section>



	<!-- Card list tournoi -->
	<div class="container">

		<section id="partieMembres">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6 d-flex mb-3 justify-content-center">
					<div class="card" style="width: 20rem;">
						<img src="../img/tournoi/chill.webp" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Tournoi chill</h5>
							<p class="card-text">Venez décrocher le trésor en famille ou entre amis au cours de se
								tournoie ou la bonne ambiance sera de mise. Qui de vos amis ou de votre famille dominera
								le classement ?</p>
							<a href="formulaire.php" class="btn btn-primary">Inscrivez-vous</a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 mb-3 justify-content-center d-none d-sm-flex">
					<div class="card" style="width: 20rem;">
						<img src="../img/tournoi/tryhard.webp" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Tournoi tryhard</h5>
							<p class="card-text">Le trésor se gagne aux dés, venez défiez d’autre pirate au cours de ce
								tournoi sérieux. Choisissez votre équipier de guerre et venez ! Oserez-vous miser le
								risque, ou jouerez vous la sécurité ?</p>
							<a href="formulaire.php" class="btn btn-primary">Inscris-toi</a>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
	<!-- Card list tournoi -->


	<section class="img-texte explication-jeu">
		<img src="../img/tournoi/mille sabord.webp">
		<article>
			<h2>1000 Sabords</h2>
			<p>Mille Sabords est un jeu de société d’ambiance édité par Gigamic. Le but du jeu est de gagner le trésor
				en lançant des dés et en réalisant les meilleures combinaisons de dés. Les joueurs doivent également
				faire attention aux cartes Pirate qui peuvent influencer leur tirage. Les têtes de mort sont à éviter
				car elles peuvent faire perdre tous les points accumulés. Le jeu est recommandé pour les enfants de 8
				ans et plus et dure environ 15 à 30 minutes. Les joueurs peuvent s’attendre à des retournements de
				situation tout au long de la partie. À l’abordage !</p>
		</article>
	</section>

	<!-- Section classement -->
	<section id="classement_equipes">
		<span class="form1">
			<svg viewBox="0 0 286 274" fill="none" xmlns="http://www.w3.org/2000/svg">
<path  d="M281.5 273.704C317 65.2042 75.5 -43.2958 0 16.2042V273.704H281.5Z" fill="#233560"/>
</svg>
		</span>
		<span class="form2">
		<svg viewBox="0 0 212 204" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.63201 -3.04474e-06C-23.7714 155.401 155.846 236.27 212 191.923L212 1.52588e-05L2.63201 -3.04474e-06Z" fill="#233560"/>
</svg>

		</span>
	
		<div class="">
			<h2>Classement</h2>
			<span class="tables">
				<span>
					<h3>Chill</h3>
					<table class="classementTables tableChill">
					<?php for ($i = 0; $i < count($equipes['Chill']); $i++) { ?>
						<tr>
							<td class="<?php echo "num".$i + 1. ?> numEquipe">
								<?= $i + 1 ?>
							</td>
							<td >
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
							<td class="<?php echo "num".$i + 1. ?> numEquipe">
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
			</span>

		</div>
	</section>

	<section class="debut-tournoi">
		<h1>Le Lieu</h1>
		<p class="tournoi-text">Rendez-vous le 14-15 Décembre 2024 au Saint-Pierre Cardinal</p>
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1676.199485832484!2d3.8863638745178877!3d45.04481037015716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5fa544610943b%3A0xba823cb3246ef30a!2sCentre%20Pierre%20Cardinal!5e0!3m2!1sfr!2sfr!4v1703146850092!5m2!1sfr!2sfr"
			width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"></iframe>
	</section>


	<?php
	include("commun/footer.php")
		?>
</body>

</html>