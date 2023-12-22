// pour changer les différents tab

function openTab(evt, tabName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none"; // pour cacher les autres tab qui ne sont pas ouvertes
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tabName).style.display = "flex";
	evt.currentTarget.className += " active";
}

// Sélectionnez un onglet par défaut
window.onload = function () {
	document.getElementById("defaultOpen").click();
};
