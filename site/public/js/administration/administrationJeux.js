function load() {
	// Cache initialement les éléments avec les identifiants 'modifierSupprimer' et 'champsJeu'
	document.getElementById('modifierSupprimer').style.display = 'none';
	document.getElementById('champsJeu').style.display = 'none';

	// Ajoute un écouteur d'événement sur le changement de la sélection du jeu
	document.querySelector('[name="jeuId"]').addEventListener('change', function (event) {
		var selectedOptionValue = event.target.value;
		var values = selectedOptionValue.split(';');

		// Remplit les champs 'nomJeu' et 'description' avec les valeurs de l'option sélectionnée
		document.getElementById('nomJeu').value = values[1] != null ? values[1] : "";
		document.getElementById('description').value = values[3] != null ? values[3] : "";

		if (selectedOptionValue === "") {
			// Cache les éléments si aucune option n'est sélectionnée
			document.getElementById('modifierSupprimer').style.display = 'none';
			document.getElementById('champsJeu').style.display = 'none';
			document.getElementById('submitJeu').style.display = 'none';
		} else {
			// Affiche les éléments si une option est sélectionnée
			document.getElementById('modifierSupprimer').style.display = 'block';
			document.getElementById('submitJeu').style.display = 'block';
		}
	});

	// Ajoute des écouteurs d'événement à tous les boutons radio avec le nom 'UorD'
	document.querySelectorAll('[name="UorD"]').forEach(function (radio) {
		radio.addEventListener('change', function (event) {
			var supprimerChecked = document.querySelector('[name="UorD"]:checked').value === "supprimer";
			if (supprimerChecked) {
				// Cache les champs du jeu si l'option 'supprimer' est sélectionnée
				document.getElementById('champsJeu').style.display = 'none';
			} else {
				// Affiche les champs du jeu si l'option 'modifier' est sélectionnée
				document.getElementById('champsJeu').style.display = 'block';
			}
		});
	});
}

window.addEventListener("load", load);