/**
 * File navigation.js.
 *
 * Extends the Disclosure component functionality with additional features needed for a main navigation.
 * - Opens submenus on hover
 */
( function() {
	const disclosureMenu = document.querySelectorAll( '.disclosure-menu--horizontal .menu-item-has-children' );

  disclosureMenu.forEach( ( menuItem ) => {
    menuItem.addEventListener('mouseover', () => {
      toggleMenu(menuItem)
    });

    menuItem.addEventListener('mouseout', () => {
      toggleMenu(menuItem)
    });
  });

  function toggleMenu(menuItem) {
    const button = menuItem.querySelector( '.disclosure-element__button');

    if ( button ) {
      button.setAttribute('aria-expanded', button.getAttribute('aria-expanded') === 'true' ? 'false' : 'true');
    }
  }
}() );
