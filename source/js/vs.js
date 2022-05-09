import './libs/virtual-select.min.js';
import './modules/ip-vs-init';

document.addEventListener('DOMContentLoaded', () => {
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

	function addListItem(text) {
		return `<li>${text}</li>`;
	}

	btnFormTrigger.addEventListener('click', function () {
		const classesListElement = document.createElement('ul');
		const countriesListElement = document.createElement('ul');

		const modalOrderACostEstimate = document.getElementById(
			'modal-order-a-cost-estimate'
		);

		// Hidden fields
		const hiddenInputClasses = modalOrderACostEstimate.querySelector(
			'input[name="selected-class"]'
		);
		const hiddenInputCountries = modalOrderACostEstimate.querySelector(
			'input[name="selected-countries"]'
		);
		const hiddenInputNumbers = modalOrderACostEstimate.querySelector(
			'input[name="selected-patents-numbers"]'
		);

		const classesSelect = document.getElementById('select-classes');
		const countriesSelect = document.getElementById('countries-list');
		const claimsList = document.getElementById('patent-numbers');

		let classesValues, countriesValue, claimsNumbers;

		// Обрати вибрані класи
		if (classesSelect) {
			classesValues = classesSelect.getSelectedOptions();
			classesValues.forEach((element) => {
				classesListElement.insertAdjacentHTML(
					'beforeend',
					addListItem(element.label)
				);
			});
		}
		// Обрати вибрані міста
		if (countriesSelect) {
			countriesValue = countriesSelect.getSelectedOptions();
			countriesValue.forEach((element) => {
				countriesListElement.insertAdjacentHTML(
					'beforeend',
					addListItem(element.label)
				);

				hiddenInputCountries.value += `${element.label} , `;
			});
		}
		// Обрати вибрані числа
		if (claimsList) {
			claimsNumbers = claimsList.getSelectedOptions();
			claimsNumbers.forEach((element) => {
				hiddenInputNumbers.value += `${element.label} , `;
			});
		}

		const userClassesContainer = modalOrderACostEstimate.querySelector(
			'.consultation__user-classes'
		);
		const userCountriesContainer = modalOrderACostEstimate.querySelector(
			'.consultation__user-countries'
		);

		// Add HTML to form
		const countryBlock = (abbr) => {
			userCountriesContainer.insertAdjacentHTML(
				'afterbegin',
				'<strong>You have chosen countries:</strong>'
			);
			if (typeof abbr === 'string') {
				userCountriesContainer.insertAdjacentHTML(
					'beforeend',
					`<p>${countryAbbr[abbr]}</p>`
				);
				hiddenInputCountries.value = '';
				hiddenInputCountries.value = `${countryAbbr[abbr]}`;
			} else {
				userCountriesContainer.insertAdjacentElement('beforeend', abbr);
			}
		};

		MicroModal.show('modal-order-a-cost-estimate', {
			onShow: (modal) => {
				modal.querySelector('.modal__title').textContent =
					this.dataset.formtitle;
				modal.querySelector('input[name="form-name"]').value =
					this.dataset.formtitle;

				// Додати заголовок для списку класів
				if (classesSelect) {
					userClassesContainer.insertAdjacentHTML(
						'afterbegin',
						'<strong>You have chosen these classes:</strong>'
					);
					if (classesValues.length) {
						userClassesContainer.insertAdjacentElement(
							'beforeend',
							classesListElement
						);
						classesValues.forEach((item) => {
							hiddenInputClasses.value += `${item.label} , `;
						});
					} else {
						userClassesContainer.insertAdjacentHTML(
							'beforeend',
							'<strong>-</strong>'
						);
					}
				}

				if (countriesSelect) {
					if (userSolution == 'complex') {
						countryBlock(userCountrySelection);
					} else if (userSolution == 'manually') {
						countryBlock(countriesListElement);
					}
				}
			},
			onClose: (modal) => {
				userClassesContainer.innerHTML = '';
				userCountriesContainer.innerHTML = '';
				hiddenInputClasses.value = '';
				hiddenInputCountries.value = '';
				hiddenInputNumbers.value = '';
			},
			disableScroll: true,
			disableFocus: true,
		});
	});
});
