import { wpmdcMobileAdminBarFix } from './modules/admin-bar';
import { wpmdcTopAppBars } from './modules/top-app-bar';
import { wpmdcTemporaryDrawers } from './modules/drawer';
import { wpmdcTextFields } from './modules/text-field';
import { wpmdcSelects } from './modules/select';
import { wpmdcRipples } from './modules/ripple';
import { wpmdcCheckboxes } from './modules/checkbox';

document.addEventListener('DOMContentLoaded', () => {
	wpmdcMobileAdminBarFix();
	wpmdcTopAppBars();
	wpmdcTemporaryDrawers();
	wpmdcTextFields();
	wpmdcSelects();
	wpmdcCheckboxes();
	wpmdcRipples();
});
