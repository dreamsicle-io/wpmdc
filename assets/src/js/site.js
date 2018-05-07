import { wpmdcMobileAdminBarFix } from './modules/admin-bar';
import { wpmdcTopAppBars } from './modules/top-app-bar';
import { wpmdcTemporaryDrawers } from './modules/drawer';
import { wpmdcTextFields } from './modules/text-field';
import { wpmdcSelects } from './modules/select';
import { wpmdcRipples } from './modules/ripple';

document.addEventListener('DOMContentLoaded', () => {
	wpmdcMobileAdminBarFix();
	wpmdcTopAppBars();
	wpmdcTemporaryDrawers();
	wpmdcTextFields();
	wpmdcSelects();
	wpmdcRipples();
});
