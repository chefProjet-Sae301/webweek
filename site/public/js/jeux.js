function load() {
    const menus = document.querySelectorAll('.menu');
    const contenus = document.querySelectorAll('.contenu');

    // Ajout des écouteurs d'événements sur chaque élément de menu
    menus.forEach((menu, index) => {
        // Ajout d'un écouteur d'événements au clic pour chaque élément de menu
        menu.addEventListener('click', () => {
            contenus[index].classList.toggle('visible');
            menu.classList.toggle('visible');
        });
    });

}

window.addEventListener('load', load);