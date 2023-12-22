// carousel de owl carousel avec du jquery

jQuery(document).ready(function () {
	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		dots: true, // pour avoir des points d'indication
		nav: true,
		responsiveClass: true,
		responsive: { // cela permet de rendre responsif le carousel -> n'avoir qu'une image lors du téléphone
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 5,
				nav: true,
				loop: false
			}
		}
	});
});