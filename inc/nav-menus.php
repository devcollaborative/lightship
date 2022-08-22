<?php
/**
 * Register navigation menu locations for a theme.
 *
 * @see https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
function devcollab_nav_menus() {
	/**
	 * Register theme menu locations.
	 */
	register_nav_menus( array(
		'primary-menu' => 'Primary',
		'footer-menu'  => 'Footer',
	) );
}
add_action( 'after_setup_theme', 'devcollab_nav_menus' );
