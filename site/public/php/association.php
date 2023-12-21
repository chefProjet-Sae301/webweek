<?php
require('../../vendor/autoload.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


	<link type="text/css" media="all" rel="stylesheet" href="../css/styles.css">
	<script src="../js/caroussel.js"></script>

	<title>Les jeux</title>
</head>

<body>
	<?php
	include("commun/header.php")
	?>

	<section id="association-partie">
		<img src="../img/association/noe.webp">
		<article>
			<h1>Noé</h1>

			<p>Notre président Noé soutient l’association depuis sa création il y a plus de 10 ans, de ces balbutiements jusqu’aux grands projets actuels. Personne ne nous représente mieux que lui en mêlant passions, jeux, travail. </p>
		</article>
	</section>

	<section id="association-membres">
		<div class="ligne-membres">
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/thomas.webp">
				<p>Thomas</p>
			</div>
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/paul.webp">
				<p>Paul</p>
			</div>
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/clara.webp">
				<p>Clara</p>
			</div>
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/clelie.webp">
				<p>Clélie</p>
			</div>
		</div>
		<div class="ligne-membres">
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/augustin.webp">
				<p>Augustin</p>
			</div>
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/camille.webp">
				<p>Camille</p>
			</div>
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/thomass.webp">
				<p>Thomas</p>
			</div>
			<div class="expo-membres">
				<img class="img-membres" alt="membre de l'association" src="../img/association/titouan.webp">
				<p>Titouan</p>
			</div>
		</div>
	</section>

	<section class="img-texte citations">
		<article>
			<p>L’édition 2019 de notre salon du jeu, celle qui passait un cap en termes de taille, d’activité et de publics.</p>
		</article>
		<img src="../img/association/asso2019.webp">
	</section>

	<section id="association-galerie">
		<h2>Galerie</h2>

		<div class="owl-carousel owl-theme">
			<div class="item"><img src="../img/galerie/1.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/2.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/3.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/4.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/5.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/6.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/7.webp" alt=""></div>
			<div class="item"><img src="../img/galerie/8.webp" alt=""></div>
		</div>
	</section>

	<section class="img-texte citations">
		<img src="../img/association/asso2023.webp">
		<article>
			<p>Notre dernière édition, ou vous étiez plus de 1500 sans compter les entré en passe week-end ! Merci à vous, aux bénévoles et tous ceux qui ont rendu cela possible.</p>
		</article>
	</section>

	<?php
	include("commun/footer.php")
	?>

</body>

</html>