/**
 * File navigation.js.
 *
 * Extends the Disclosure component functionality with additional features needed for a main navigation.
 * - Opens submenus on hover
 */
( function() {
	const disclosureMenu = document.querySelectorAll( '.disclosure-menu--horizontal .menu-item-has-children' );

  disclosureMenu.forEach( ( menuItem ) => {
    const button = menuItem.querySelector( '.disclosure-element__button');

    if ( button ) {
      menuItem.addEventListener('mouseover', () => {
        button.setAttribute('aria-expanded', 'true');
      });

      menuItem.addEventListener('mouseout', () => {
        button.setAttribute('aria-expanded', 'false');
      });
    }

    // If there's no link, make the cursor a pointer.
    if (menuItem.querySelector('span')) {
      menuItem.querySelector('span').style.cursor = 'default';
    }
  });
}() );
