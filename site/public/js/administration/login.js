// Cette fonction est responsable de l'affichage ou du masquage du mot de passe
function montrerMotdePasse() {
	var input = document.getElementById("mdp");
	if (input.type === "password") { // Vérifie si le type de champ est "password"
		input.type = "text"; // Si oui, change le type en "text" pour afficher le mot de passe
	} else {
		input.type = "password"; // Sinon, change le type en "password" pour masquer le mot de passe
	}
}

// Cette fonction configure les écouteurs d'événements
function setupListeners() {
	var checkBoxAfficher = document.getElementById("checkbox");
	checkBoxAfficher.addEventListener('click', montrerMotdePasse); // Ajout d'un écouteur d'événements pour détecter le clic sur la case à cocher
}

window.addEventListener("load", setupListeners); // Appel de la fonction setupListeners une fois que la fenêtre est chargée