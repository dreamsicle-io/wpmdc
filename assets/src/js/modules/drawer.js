import { MDCTemporaryDrawer } from '@material/drawer/dist/mdc.drawer';

export function wpmdcHandleDrawerHeaderImagesInterval(element, interval = 7000) {
	if (element) {
		const slider = element.querySelector('.wpmdc-drawer__header-slider');
		if (slider) {
			const slides = slider.querySelectorAll('.wpmdc-drawer__header-slide');
			if (slides && (slides.length > 0)) {
				// make the first slide active on initialization.
				slides[0].classList.add('wpmdc-drawer__header-slide--active');
				// start the interval on slide 2 (index 1), 
				// slide 1 (index 0) is already active on initialization.
				let i = 1;
				setInterval(() => {
					if (i >= slides.length) {
						i = 0;
					}
					slides.forEach((oldSlide) => {
						if (oldSlide.classList.contains('wpmdc-drawer__header-slide--active')) {
							oldSlide.classList.remove('wpmdc-drawer__header-slide--active');
						}
					});
					slides[i].classList.add('wpmdc-drawer__header-slide--active');
					i++;
				}, interval);
			}
		}
	}
}

export function wpmdcDrawerHeaderImages(element) {
	if (element) {
		const header = element.querySelector('.mdc-drawer__header');
		if (header) {
			const imagesAttr = header.getAttribute('data-wpmdc-header-images');
			if (imagesAttr) {
				const images = JSON.parse(imagesAttr);
				const slider = document.createElement('DIV');
				slider.classList.add('wpmdc-drawer__header-slider');
				for (var imageId in images) {
					const image = images[imageId];
					let slide = document.createElement('DIV');
					slide.classList.add('wpmdc-drawer__header-slide');
					slide.style.backgroundImage = `url("${image.url}")`;
					slider.appendChild(slide);
				}
				header.appendChild(slider);
				wpmdcHandleDrawerHeaderImagesInterval(element);
			}
		}
	}
}

export function wpmdcTemporaryDrawer(element) {
	if (element) {
		const toggles = element.id ? document.querySelectorAll(`*[for="${element.id}"]`) : [];
		const MDCTemporaryDrawerInst = new MDCTemporaryDrawer(element);
		if (toggles) {
			toggles.forEach((toggle, i) => {
				toggle.addEventListener('click', (e) => {
					e.preventDefault();
					MDCTemporaryDrawerInst.open = ! MDCTemporaryDrawerInst.open;
				});
			});
		}
		wpmdcDrawerHeaderImages(element);
	}
}

export function wpmdcTemporaryDrawers(container = null) {
	container = container || document;
	const elements = container.querySelectorAll('.mdc-drawer--temporary');
	if (elements) {
		elements.forEach((element, i) => {
			wpmdcTemporaryDrawer(element);
		});
	}
}
