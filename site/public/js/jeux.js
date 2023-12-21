function load() {
    const menus = document.querySelectorAll('.menu');
    const contenus = document.querySelectorAll('.contenu');

    // Ajout des écouteurs d'événements sur chaque élément de menu
    menus.forEach((menu, index) => {
        // Ajout d'un écouteur d'événements au clic pour chaque élément de menu
        menu.addEventListener('click', () => {
            contenus.forEach(contenu => contenu.classList.remove('visible'));
            menus.forEach(menu => menu.classList.remove('visible'));
            contenus[index].classList.add('visible');
            menu.classList.add('visible');
        });
    });

}

window.addEventListener('load', load);