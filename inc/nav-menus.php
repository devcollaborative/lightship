<?php
/**
 * Register navigation menus.
 *
 * @see https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
function wp_lightship_nav_menus() {
	/**
	 * Register theme menu locations.
	 */
	register_nav_menus( array(
		'primary-menu' => 'Primary',
		'footer-menu'  => 'Footer',
	) );
}
add_action( 'after_setup_theme', 'wp_lightship_nav_menus' );
