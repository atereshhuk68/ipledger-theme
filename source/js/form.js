import MicroModal from 'micromodal';
import './libs/just-validate.min';

document.addEventListener('DOMContentLoaded', function () {
	// Модальное окно с формой
	MicroModal.init();

	const triggerModalForm = document.querySelectorAll(
		"button[data-openmodalform='simple']"
	);

	const modalForms = document.querySelectorAll('div.modal.consultation');
	// Додати назву сторінки, з якої відправили форму
	const pageName = document.body.dataset.pagename;
	modalForms.forEach((form) => {
		form.querySelector('input[name="page-name"]').value = pageName;
	});

	triggerModalForm.forEach((button) => {
		button.addEventListener('click', function () {
			MicroModal.show('modal-form', {
				onShow: (modal) => {
					modal.querySelector('.modal__title').textContent =
						this.dataset.formtitle;
					modal.querySelector('input[name="form-name"]').value =
						this.dataset.formtitle;
				},
				disableScroll: true,
				disableFocus: true,
			});
		});
	});
	// Submit text after success
	function changeSubmitBtnText(submitBtn) {
		submitBtn.classList.remove('button--success');
		submitBtn.innerText = 'Submit';
	}

	// Валідація та відправка форми
	new window.JustValidate('.js-form', {
		colorWrong: 'tomato',
		rules: {
			name: {
				required: true,
				minLength: 1,
			},
			email: {
				required: true,
				email: true,
			},
		},
		messages: {
			name: {
				required: 'Please enter your name',
				minLength: 'Name is too short. Minimun 2 symbols',
			},
			email: {
				required: 'Please enter your email',
				email: 'Please, type valid email',
			},
		},
		submitHandler: (form, values) => {
			const publicKey = form.dataset.publickey;
			grecaptcha.ready(function () {
				grecaptcha
					.execute(publicKey, {
						action: 'submit',
					})
					.then(function (token) {
						document.getElementById('token').value = token;

						let formData = new FormData(form);
						let submitBtn = form.querySelector('.modal-form__submit');
						submitBtn.innerHTML = `<div class="loader">Loading...</div>`;

						fetch("/wp-admin/admin-ajax.php?action=ipledgerform", {
							method: 'post',
							body: formData,
						})
							.then((response) => {
								return response.json();
							})
							.then((result) => {
								if (result.res) {
									submitBtn.classList.add('button--success');
									submitBtn.innerText = "Mail send successfully!";

									setTimeout(() => {
										changeSubmitBtnText(submitBtn);
										MicroModal.close('modal-form');
									}, 1500);
								}
							});
					});
			});
		},
	});
});
