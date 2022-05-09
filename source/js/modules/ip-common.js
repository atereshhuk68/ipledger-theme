import MicroModal from 'micromodal';

document.addEventListener('DOMContentLoaded', function () {
	// Мобильное меню
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

	// Модальное окно с формой
	MicroModal.init();

	const triggerModalForm = document.querySelectorAll(
		"button[data-openmodalform='simple']"
	);

	const modalForms = document.querySelectorAll('div.modal.consultation');
	const pageName = document.body.dataset.pagename;

	modalForms.forEach( form => {
		form.querySelector('input[name="page-name"]').value = pageName;
	});

	triggerModalForm.forEach((button) => {
		button.addEventListener('click', function () {
			MicroModal.show('modal-consultation', {
				onShow: (modal) => {
					modal.querySelector('.modal__title').textContent =
						this.dataset.formtitle;
					modal.querySelector('input[name="form-name"]').value =
						this.dataset.formtitle;
				},
				disableScroll: true,
				disableFocus: true
			});
		});
	});

	document.addEventListener(
		'wpcf7submit',
		function (event) {
			var inputs = event.detail;
			console.info(inputs);
		},
		false
	);
});
