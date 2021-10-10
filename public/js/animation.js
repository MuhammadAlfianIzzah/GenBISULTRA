// const body = document.querySelector('body')
// $(window).scroll(function () {
// 	if ($(window).scrollTop() > 50) {
// 		$(".navbar").addClass("dark");
// 	} else {
// 		$(".navbar").removeClass("dark");
// 	}
// });

$('.devisi-carousel').owlCarousel({
	margin: 10,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		800: {
			items: 2
		},
		1000: {
			items: 4
		}
	}
})

$('.testimoni-carousel').owlCarousel({
	margin: 10,
	nav: true,
	responsive: {
		0: {
			items: 1
		},
		800: {
			items: 1
		},
		1000: {
			items: 1
		}
	}
})
$(document).ready(function () {
	$("#news-slider").owlCarousel({
		items: 3,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [980, 2],
		itemsMobile: [600, 1],
		navigation: true,
		navigationText: ["", ""],
		pagination: true,
		autoPlay: true
	});
});
$(document).ready(function () {
	$("#devisi-seeder").owlCarousel({
		items: 3,
		itemsDesktop: [1199, 3],
		itemsDesktopSmall: [980, 2],
		itemsMobile: [600, 1],
		navigation: true,
		navigationText: ["", ""],
		pagination: true,
		autoPlay: true
	});
});
$('.blog-carousel').owlCarousel({
	margin: 10,
	nav: true,
	responsive: {
		0: {
			items: 2
		},
		800: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
})