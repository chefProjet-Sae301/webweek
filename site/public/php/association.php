<?php
require('../../vendor/autoload.php');
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

	<title>Les jeux</title>
</head>

<body>
	<?php
	include("commun/header.php")
	?>

    <section class="association-partie">
        <img src="../../../../download.jpg">
        <article>
            <h1>Nom du président</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Malesuada pellentesque elit eget gravida cum sociis. Ullamcorper a lacus vestibulum sed arcu non odio euismod. Mi eget mauris pharetra et ultrices. Quis ipsum suspendisse ultrices gravida dictum fusce. Diam phasellus vestibulum lorem sed risus ultricies. Ut consequat semper viverra nam libero justo laoreet sit amet. Amet venenatis urna cursus eget. Metus dictum at tempor commodo ullamcorper a lacus. Est ultricies integer quis auctor elit. </p>
        </article>
    </section>

    <section id="association-membres">
        <div class="ligne-membres">
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
        </div>
        <div class="ligne-membres">
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
            <div class="expo-membres">
                <img class="img-membres" src="../../../../download.jpg">
                <p>Nom</p>
            </div>
        </div>
    </section>

    <section class="association-citation">
        <article>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Malesuada pellentesque elit eget gravida cum sociis. Ullamcorper a lacus vestibulum sed arcu non odio euismod. Mi eget mauris pharetra et ultrices. Quis ipsum suspendisse ultrices gravida dictum fusce.</p>
        </article>
        <img src="../../../../download.jpg">
    </section>

    <section id="association-galerie">
        <h2>Galerie</h2>
        <div class="photoGalerie">
            <img class="photoGalerie" src="../../../../download.jpg" alt="">
            <img class="photoGalerie" src="../../../../download.jpg" alt="">
            <img  class="photoGalerie"src="../../../../download.jpg" alt="">
        </div>
    </section>

    <section class="association-citation">
        <img src="../../../../download.jpg">
        <article>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus. Malesuada pellentesque elit eget gravida cum sociis. Ullamcorper a lacus vestibulum sed arcu non odio euismod. Mi eget mauris pharetra et ultrices. Quis ipsum suspendisse ultrices gravida dictum fusce.</p>
        </article>
    </section>

	<?php
	include("commun/footer.php")
	?>
</body>

</html>