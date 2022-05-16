document.addEventListener("DOMContentLoaded", () => {
	new Swiper("#ntfslider", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		slideToClickedSlide: true,
		coverflowEffect: {
			rotate: 0,
			stretch: 20,
			depth: 300,
			modifier: 1.4,
			slideShadows: false,
		},
		autoplay: {
			delay: 1500,
			pauseOnMouseEnter: true,
		},
		speed: 1000,
		initialSlide: 4,
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true
		},
		breakpoints: {
			// when window width is >= 320px
			1199: {
				coverflowEffect: {
					rotate: 0,
					stretch: 0,
					depth: 300,
					modifier: 1.2,
					slideShadows: false,
				},
			},
		},
	});

	new Swiper('#trademarkslider', {
		slidesPerView: 1,
		centeredSlides: true,
		spaceBetween: 30,
		initialSlide: 1,
		autoHeight: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true
		},
		breakpoints: {
			1199: {
				slidesPerView: 3,
				initialSlide: false,
			},
			1399: {
				slidesPerView: 3,
				initialSlide: false,
			}
		},
	})
});
