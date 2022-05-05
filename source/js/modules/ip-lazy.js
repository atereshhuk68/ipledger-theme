import LazyLoad from 'vanilla-lazyload';

let lazyLoadInstance = new LazyLoad();

window.onload = () => {
	lazyLoadInstance.update();
}
