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
	items: 3,
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
	$('.owl-carousel').owlCarousel({
		// items: 2,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 2,
				nav: false
			},
			1000: {
				items: 3,
				nav: true,
				loop: false
			}
		}
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