import {
	countriesOptions,
	classListOptions,
	patentNumbersListOptions,
} from './vs-data';

// Обрати класи
VirtualSelect.init({
	ele: '#select-classes',
	options: classListOptions,
	multiple: true,
	search: true,
	hasOptionDescription: true,
	placeholder: 'Select one or more class',
	showValueAsTags: true,
});
// Список міст
VirtualSelect.init({
	ele: '#countries-list',
	options: countriesOptions,
	multiple: true,
	search: true,
	hasOptionDescription: true,
	placeholder: 'Select one or more countries',
	showValueAsTags: true,
});
// Числа
VirtualSelect.init({
	ele: '#patent-numbers',
	options: patentNumbersListOptions,
	multiple: true,
	search: false,
	hasOptionDescription: true,
	placeholder: 'Select number of independent claims',
	showValueAsTags: true,
	showSelectedOptionsFirst: true,
	allowNewOption: true,
});
