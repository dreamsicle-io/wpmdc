import { MDCTemporaryDrawer } from '@material/drawer/dist/mdc.drawer';

export function wpmdcDrawerHeaderImagesInterval(element) {
	let intervalInst = null;
	// start the interval on slide 2 (index 1), 
	// slide 1 (index 0) is already active on initialization.
	let i = 1;

	return {
		start: () => {
			if (element) {
				const slider = element.querySelector('.wpmdc-drawer__header-slider');
				if (slider) {
					const slides = slider.querySelectorAll('.wpmdc-drawer__header-slide');
					if (slides && (slides.length > 0)) {
						intervalInst = setInterval(() => {
							// when the slider hits the end of the slides, start over.
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
						}, 5000);
					}
				}
			}
		}, 
		stop: () => {
			clearInterval(intervalInst);
		}
	};
}

export function wpmdcDrawerHeaderImages(element) {
	if (element) {
		const imagesAttr = element.getAttribute('data-wpmdc-header-images');
		if (imagesAttr) {
			const images = JSON.parse(imagesAttr);
			const slider = document.createElement('DIV');
			slider.classList.add('wpmdc-drawer__header-slider');
			images.forEach((image, i) => {
				let slide = document.createElement('DIV');
				slide.classList.add('wpmdc-drawer__header-slide');
				slide.style.backgroundImage = `url("${image.url}")`;
				// activate the first slide on init.
				if (i === 0) {
					slide.classList.add('wpmdc-drawer__header-slide--active');
				}
				slider.appendChild(slide);
			});
			element.appendChild(slider);
		}
	}
}

export function wpmdcTemporaryDrawer(element) {
	if (element) {
		const toggles = element.id ? document.querySelectorAll(`*[for="${element.id}"]`) : [];
		const header = element.querySelector('.mdc-drawer__header');
		const MDCTemporaryDrawerInst = new MDCTemporaryDrawer(element);
		if (toggles) {
			toggles.forEach((toggle, i) => {
				toggle.addEventListener('click', (e) => {
					e.preventDefault();
					MDCTemporaryDrawerInst.open = ! MDCTemporaryDrawerInst.open;
				});
			});
		}
		if (header) {
			wpmdcDrawerHeaderImages(header);
			const intervalInst = wpmdcDrawerHeaderImagesInterval(header);
			MDCTemporaryDrawerInst.listen('MDCTemporaryDrawer:open', (e) => {
				intervalInst.start();
			});
			MDCTemporaryDrawerInst.listen('MDCTemporaryDrawer:close', (e) => {
				intervalInst.stop();
			});
		}
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
