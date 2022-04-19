import './libs/virtual-select.min.js';
import { countriesOptions, classListOptions, patentNumbersListOptions } from './modules/vs-data';

document.addEventListener('DOMContentLoaded', () => {
	VirtualSelect.init({
		ele: '#select-classes',
		options: classListOptions,
		multiple: true,
		search: true,
		hasOptionDescription: true,
		placeholder: 'Select class(es)',
		showValueAsTags: true,
	});

	VirtualSelect.init({
		ele: '#countries-list',
		options: countriesOptions,
		multiple: true,
		search: true,
		hasOptionDescription: true,
		placeholder: 'Select one or more countries',
		showValueAsTags: true,
	});

	VirtualSelect.init({
		ele: '#patent-numbers',
		options: patentNumbersListOptions,
		multiple: true,
		search: false,
		hasOptionDescription: true,
		placeholder: 'Select one or more countries',
		showValueAsTags: true,
		showSelectedOptionsFirst: true,
		allowNewOption: true,
	});

	const changeRadio = (nodes) => Array.from(nodes).find((item) => item.checked);

	// Custom solution check radiobutton
	// Tabs
	const customSolutionRadio = document.querySelectorAll('.country-selection__tabs input[name="custom-solution"]');
	// Tab content
	const countrySelectionBlocks = document.querySelectorAll('.country-selection__block');
	const countryComplexRadio = document.querySelectorAll('.country-selection__block input[name="card-complex"]');

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

	const classesSelect = document.getElementById('select-classes');
	const countriesSelect = document.getElementById('countries-list');

	const btnFormTrigger = document.querySelector('button[data-openmodalform="trigger"]');

	// Countries obj
	const countryAbbr = {
		eu: 'European Union',
		madrid: 'Madrid system',
		usa: 'USA',
		uk: 'United Kingdom',
	};

	btnFormTrigger.addEventListener('click', function () {
		const classesListElement = document.createElement('ul');
		const countriesListElement = document.createElement('ul');

		function addListItem(text) {
			return `<li>${text}</li>`;
		}

		let classesValues, countriesValue;

		if (classesSelect) {
			classesValues = classesSelect.getSelectedOptions();

			classesValues.forEach((element) => {
				classesListElement.insertAdjacentHTML(
					'beforeend',
					addListItem(element.label)
				);
			});
		}

		if (countriesSelect) {
			countriesValue = countriesSelect.getSelectedOptions();

			countriesValue.forEach((element) => {
				countriesListElement.insertAdjacentHTML(
					'beforeend',
					addListItem(element.label)
				);
			});
		}

		const userClassesContainer = document.querySelector('.consultation__user-classes');
		const userCountriesContainer = document.querySelector('.consultation__user-countries');

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
			} else {
				userCountriesContainer.insertAdjacentElement('beforeend', abbr);
			}
		};

		MicroModal.show('modal-consultation', {
			onShow: (modal) => {
				document.querySelector('.consultation__user-classes').classList.remove('is--hidden');
				document.querySelector('.consultation__user-countries').classList.remove('is--hidden');
				modal.querySelector('.modal__title').textContent = this.dataset.formtitle;
				modal.querySelector('.hidden-field').value = this.dataset.formtitle;

				if (classesSelect) {
					userClassesContainer.insertAdjacentHTML(
						'afterbegin',
						'<strong>You have chosen these classes:</strong>'
					);
					userClassesContainer.insertAdjacentElement(
						'beforeend',
						classesListElement
					);
				}

				if (userSolution == 'complex') {
					switch (userCountrySelection) {
						case 'eu':
							countryBlock(userCountrySelection);
							break;
						case 'madrid':
							countryBlock(userCountrySelection);
							break;
						default:
							countryBlock(userCountrySelection);
							break;
					}
				} else if (userSolution == 'manually') {
					countryBlock(countriesListElement);
				}
			},
			onClose: (modal) => {
				userClassesContainer.innerHTML = '';
				userCountriesContainer.innerHTML = '';
			},
			disableScroll: true,
		});
	});
});
