<?php
require('../../vendor/autoload.php');
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
		<tr>
			<td class="menu">
				<div></div>
			</td>
			<td class="jeu">
				<div>
				<span class="jeuTitle">
						<h2>UNO</h2>
						<span>
							<input type="radio" name="like_dislike" class="like">
							<label for="like" class="like_label"> 👍 101</label>
							<input type="radio" name="like_dislike" class="dislike">
							<label for="dislike" class="dislike_label">👎 12</label>
						</span>
					</span>
					<div class="contenu">
						<img src="" alt="" srcset="">
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio quisquam ducimus molestias
							aut, illum ab, magni, in neque consequuntur voluptatum quidem. Ducimus itaque cumque atque
							dolorem quia iusto, aliquam voluptatem?</p>
					</div>

				</div>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<div></div>
			</td>
			<td class="jeu">
				<div>
					<span class="jeuTitle">
						<h2>UNO</h2>
						<span>
							<input type="radio" name="like_dislike" class="like">
							<label for="like" class="like_label"> 👍 101</label>
							<input type="radio" name="like_dislike" class="dislike">
							<label for="dislike" class="dislike_label">👎 12</label>
						</span>
					</span>

					<div class="contenu">
						<img src="" alt="" srcset="">
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio quisquam ducimus molestias
							aut, illum ab, magni, in neque consequuntur voluptatum quidem. Ducimus itaque cumque atque
							dolorem quia iusto, aliquam voluptatem?</p>
					</div>

				</div>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<div></div>
			</td>
			<td class="jeu">
				<div>
				<span class="jeuTitle">
						<h2>UNO</h2>
						<span>
							<input type="radio" name="like_dislike" class="like">
							<label for="like" class="like_label"> 👍 101</label>
							<input type="radio" name="like_dislike" class="dislike">
							<label for="dislike" class="dislike_label">👎 12</label>
						</span>
					</span>
					<div class="contenu">
						<img src="" alt="" srcset="">
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio quisquam ducimus molestias
							aut, illum ab, magni, in neque consequuntur voluptatum quidem. Ducimus itaque cumque atque
							dolorem quia iusto, aliquam voluptatem?</p>
					</div>

				</div>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<div></div>
			</td>
			<td class="jeu">
				<div>
					<span class="jeuTitle">
						<h2>UNO</h2>
						<span>
							<input type="radio" name="like_dislike" class="like">
							<label for="like" class="like_label"> 👍 101</label>
							<input type="radio" name="like_dislike" class="dislike">
							<label for="dislike" class="dislike_label">👎 12</label>
						</span>
					</span>

					<div class="contenu">
						<img src="" alt="" srcset="">
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio quisquam ducimus molestias
							aut, illum ab, magni, in neque consequuntur voluptatum quidem. Ducimus itaque cumque atque
							dolorem quia iusto, aliquam voluptatem?</p>
					</div>

				</div>
			</td>
		</tr>
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