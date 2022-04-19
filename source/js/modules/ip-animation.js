import * as Lottie from 'lottie-web';
import SmoothScroll from 'smooth-scroll';
// import ScrollOut from "scroll-out";

document.addEventListener('DOMContentLoaded', () => {
	// Иконки на первом экране
	const serviceCards = document.querySelectorAll('.card');

	serviceCards.forEach((el) => {
		try {
			const iconAnimation = Lottie.loadAnimation({
				container: el.querySelector('.card__icon'),
				renderer: 'svg',
				loop: false,
				autoplay: false,
				path: el.querySelector('.card__icon').dataset.iconpath,
			});

			el.addEventListener('mouseenter', function () {
				el.classList.add('is--bigger');
				iconAnimation.goToAndPlay(0, true);
			});

			el.addEventListener('mouseleave', function () {
				el.classList.remove('is--bigger');
			});
		} catch (error) {}
	});

	// Анимация в секции Преимущества
	const animatedListItems = document.querySelectorAll('.advantage__text, .article-content li');

	animatedListItems.forEach((text) => {
		text.addEventListener('mouseenter', function () {
			this.classList.add('is--hovered');
		});

		text.addEventListener('webkitAnimationEnd', function () {
			this.classList.remove('is--hovered');
		});
	});

	// Липкое меню навигации на странице регистрация ТМ
	const stickyItems = document.querySelectorAll(
		'.sticky-nav-item > a[href*="#"]'
	);

	stickyItems.forEach((item) => {
		item.dataset.scroll = '';
		item.addEventListener('click', function () {
			stickyItems.forEach((item) => {
				item.parentElement.classList.remove('is--active');
			});
			this.parentElement.classList.add('is--active');
		});
	});

	new SmoothScroll('.sticky-nav-item > a[href*="#"]', {
		speed: 500,
		updateURL: false,
		offset: 30,
	});
});
