// Navigation.
// ----------------------------------------------------------------------------
// Handles toggling the navigation menu for small screens and enables tab
// support for dropdown menus.
// ----------------------------------------------------------------------------
(function() {
	var links, subMenus, i, len;
	const body = document.querySelector('body');
	const menuToggle = document.getElementById('menu-toggle');
	if ('undefined' === typeof menuToggle) {
		return;
	}

	const menu = document.querySelector('.site-header__navigation');

	// Hide menuToggle if menu is empty and return early.
	if ('undefined' === typeof menu) {
		menuToggle.style.display = 'none';
		return;
	}

	menu.setAttribute('aria-expanded', 'false');

	menuToggle.addEventListener('click', function() {
		if ( body.classList.contains('menu-open') ) {
			body.classList.remove('menu-open');
			menuToggle.setAttribute('aria-expanded', 'false');
			menu.setAttribute('aria-expanded', 'false');
		} else {
			body.classList.add('menu-open');
			menuToggle.setAttribute('aria-expanded', 'true');
			menu.setAttribute('aria-expanded', 'true');
		}
	});

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName('a');
	subMenus = menu.getElementsByTagName('ul');

	// Set menu items with submenus to aria-haspopup="true".
	for (i = 0, len = subMenus.length; i < len; i++) {
		subMenus[i].parentNode.setAttribute('aria-haspopup', 'true');
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for (i = 0, len = links.length; i < len; i++) {
		links[i].addEventListener('focus', toggleFocus, true);
		links[i].addEventListener('blur', toggleFocus, true);
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while (-1 === self.className.indexOf('nav-menu')) {

			// On li elements toggle the class .focus.
			if ('li' === self.tagName.toLowerCase()) {
				if (-1 !== self.className.indexOf('focus')) {
					self.className = self.className.replace(' focus', '');
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
})();
