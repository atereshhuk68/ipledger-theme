import './libs/virtual-select.min.js';
import './modules/ip-vs-init';

document.addEventListener('DOMContentLoaded', () => {
	// Search checked radio
	const changeRadio = (nodes) => Array.from(nodes).find((item) => item.checked);

	// Custom solution check radiobutton
	// Tabs
	const customSolutionRadio = document.querySelectorAll(
		'.country-selection__tabs input[name="custom-solution"]'
	);
	// Tab content
	const countrySelectionBlocks = document.querySelectorAll(
		'.country-selection__block'
	);
	const countryComplexRadio = document.querySelectorAll(
		'.country-selection__block input[name="card-complex"]'
	);
	// Checked first county block
	countryComplexRadio[0].setAttribute('checked', true);

	let userSolution = changeRadio(customSolutionRadio).value;
	let userCountrySelection = changeRadio(countryComplexRadio).value;
	// Change event for tabs
	customSolutionRadio.forEach((radio) => {
		radio.addEventListener('change', function () {
			customSolutionRadio.forEach((radio) => {
				radio.parentElement.classList.remove('is--checked');
			});
			this.parentElement.classList.add('is--checked');
			userSolution = this.value;
			// Show selected tab
			countrySelectionBlocks.forEach((block) => {
				if (block.dataset.customselection == userSolution) {
					block.classList.remove('is--hidden');
				} else {
					block.classList.add('is--hidden');
				}
			});
		});
	});
	// Change event for complex cards
	countryComplexRadio.forEach((radio) => {
		radio.addEventListener('change', function () {
			userCountrySelection = changeRadio(countryComplexRadio).value;
		});
	});

	// Modal with additional blocks
	const btnFormTrigger = document.querySelector(
		'button[data-openmodalform="trigger"]'
	);

	// Countries abbr obj
	const countryAbbr = {
		eu: 'European Union',
		madrid: 'Madrid system',
		usa: 'USA',
		uk: 'United Kingdom',
	};

	// List of selected items
	function createListOfItems(arr) {
		const list = document.createElement('ul');
		arr.forEach((item) => {
			list.insertAdjacentHTML('beforeend', `<li>${item}</li>`);
		});
		return list;
	}

	btnFormTrigger.addEventListener('click', function () {
		// Модальна форма
		const modalForm = document.getElementById('js-form');
		modalForm.querySelector('.modal-form__header').removeAttribute('hidden');

		// Hidden fields
		const hfClasses = modalForm.querySelector('input[name="selected-class"]');
		const hfCountries = modalForm.querySelector(
			'input[name="selected-countries"]'
		);
		const hfClaims = modalForm.querySelector(
			'input[name="selected-patents-numbers"]'
		);

		// Virtual select fields
		const classesSelect = document.getElementById('select-classes');
		const countriesSelect = document.getElementById('countries-list');
		const claimsList = document.getElementById('patent-numbers');

		let classesValues, countriesValue, claimsNumbers;
		let classesListHTML, countriesListHTML;

		// Обрати вибрані класи
		if (classesSelect) {
			classesValues = classesSelect.getDisplayValue();
			classesListHTML = createListOfItems(classesValues);
			hfClasses.value = classesValues.join(' ');
		}
		// Обрати вибрані міста
		if (countriesSelect) {
			countriesValue = countriesSelect.getDisplayValue();
			countriesListHTML = createListOfItems(countriesValue);
			hfCountries.value = countriesValue.join(' ');
		}
		// Обрати вибрані числа
		if (claimsList) {
			claimsNumbers = claimsList.getDisplayValue();
			hfClaims.value = claimsNumbers.join(' ');
		}

		// Блоки для класів, країн та числових значень патенту
		const classesBlock = modalForm.querySelector('#modal-header-classes');
		const countriesBlock = modalForm.querySelector('#modal-header-countries');

		// Add HTML to form
		const countryBlock = (countries) => {
			if (typeof countries === 'string') {
				countriesBlock.insertAdjacentHTML(
					'beforeend',
					`<p>${countryAbbr[countries]}</p>`
				);
				hfCountries.value = '';
				hfCountries.value = `${countryAbbr[countries]}`;
			} else {
				countriesBlock.insertAdjacentElement('beforeend', countries);
			}
		};

		MicroModal.show('modal-form', {
			onShow: (modal) => {
				modal.querySelector('.modal__title').textContent =
					this.dataset.formtitle;
				modal.querySelector('input[name="form-name"]').value =
					this.dataset.formtitle;

				// Add HTML list to modal form header
				if (classesSelect) {
					// Check count of classes
					if (classesValues.length != 0) {
						classesBlock.insertAdjacentElement('afterbegin', classesListHTML);
					} else {
						classesBlock.insertAdjacentHTML(
							'afterbegin',
							'<small><i>Please, select one or more classes</i></small>'
						);
					}
				}
				if (countriesSelect) {
					if (userSolution == 'complex') {
						countryBlock(userCountrySelection);
					} else if (userSolution == 'manually') {
						// Check count of countries
						if (countriesValue.length != 0) {
							countriesBlock.insertAdjacentElement(
								'afterbegin',
								countriesListHTML
							);
						} else {
							countriesBlock.insertAdjacentHTML(
								'afterbegin',
								'<small><i>Please, select one or more countries</i></small>'
							);
						}
					}
				}
			},
			onClose: (modal) => {
				if (classesBlock) {
					classesBlock.innerHTML = '';
					hfClasses.value = '';
				}
				if (countriesBlock) {
					countriesBlock.innerHTML = '';
					hfCountries.value = '';
				}
				modalForm
					.querySelector('.modal-form__header')
					.setAttribute('hidden', true);
			},
			disableScroll: true,
			disableFocus: true,
		});
	});
});
