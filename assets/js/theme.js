jQuery(document).ready(function($) {
  /**
   * Initialize main menu & menu toggle.
   */
    new DisclosureNav({
      menuSelector: '#site-navigation > ul',
      menuItemSelector: 'li.menu-item-has-children',
    });

    new MenuToggle({
      menuContainerSelector: '#site-navigation',
    });
});
