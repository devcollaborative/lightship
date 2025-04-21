<?php

use Timber\Timber;

/**
 * Register navigation menus.
 *
 * @see https://developer.wordpress.org/themes/functionality/navigation-menus/
 */
function lightship_nav_menus() {
	/**
	 * Register theme menu locations.
	 */
	register_nav_menus( array(
		'primary-menu' => 'Primary',
		'footer-menu'  => 'Footer',
	) );
}
add_action( 'after_setup_theme', 'lightship_nav_menus' );


/**
 * Add menus to Timber context, so they're accessible in templates.
 *
 * @param array $context Timber context
 */
function lightship_add_menus_to_context( $context ) {
	$context['primary_menu'] = Timber::get_menu('primary-menu');
	$context['footer_menu']  = Timber::get_menu('footer-menu');

	return $context;
}
add_filter( 'timber/context', 'lightship_add_menus_to_context' );