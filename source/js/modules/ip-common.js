document.addEventListener('DOMContentLoaded', function () {
	// Мобільне меню
	const btnMobileMenu = document.querySelector('button[data-openmobilemenu]');
	const elCloseMobileMenu = document.querySelectorAll('[data-closemobilemenu]');
	const mobileMenu = btnMobileMenu.nextElementSibling;

	btnMobileMenu.addEventListener('click', function () {
		document.body.classList.add('is--noscroll');
		mobileMenu.classList.add('is--active');
	});

	elCloseMobileMenu.forEach((el) => {
		el.addEventListener('click', () => {
			document.body.classList.remove('is--noscroll');
			mobileMenu.classList.remove('is--active');
		});
	});
});
