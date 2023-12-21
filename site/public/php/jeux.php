<?php
require('../../vendor/autoload.php');
use \Controllers\JeuController;

$jeuController = new JeuController();
$jeux = $jeuController->GetJeux();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['like'])) {
        $jeuId = $_POST['jeuId'];
        $jeuController->LikeJeu($jeuId, 1);
		header("Location: $_SERVER[PHP_SELF]");
        exit;
    }

    if (isset($_POST['dislike'])) {
        $jeuId = $_POST['jeuId'];
        $jeuController->DislikeJeu($jeuId, 1);
		header("Location: $_SERVER[PHP_SELF]");
        exit;
	}
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" media="all" rel="stylesheet" href="../css/styles.css">

	<title>Les jeux</title>
</head>

<body>
	<?php
	include("commun/header.php")
		?>

	<table id="tableJeux">
		<?php foreach($jeux as $jeu){ ?>
		<tr>
			<td class="menu">
				<div></div>
			</td>
			<td class="jeu">
				<div>
					<span class="jeuTitle">
						<h2><?php echo $jeu->nom ?></h2>
						<form action="" method="post">
							<input type="hidden" name="jeuId" value="<?php echo $jeu->jeuId ?>">
							<input type="submit" name="like" class="like" value="👍 <?php echo $jeu->likeJeu ?>">
							<input type="submit" name="dislike" class="dislike" value="👎 <?php echo $jeu->dislikeJeu ?>">
						</form>
					</span>
					<div class="contenu">
						<img src="<?php echo $jeu->lien_image ?>" alt="" srcset="">
						<p><?php echo $jeu->description ?></p>
					</div>

				</div>
			</td>
		</tr>
		<?php } ?>
	</table>

	<?php
	include("commun/footer.php")
		?>
</body>

</html>

<script>
	const menus = document.querySelectorAll('.menu');
	const contenus = document.querySelectorAll('.contenu');

	menus.forEach((menu, index) => {
		menu.addEventListener('click', () => {
			contenus.forEach(contenu => contenu.classList.remove('visible'));
			menus.forEach(menu => menu.classList.remove('visible'));
			contenus[index].classList.add('visible');
			menu.classList.add('visible');
		});
	});
</script>