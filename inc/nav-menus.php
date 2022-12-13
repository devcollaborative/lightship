<?php

use Timber;

/**
 * Register navigation menus.
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


/**
 * Add menus to Timber context, so they're accessible in templates.
 *
 * @param array $context Timber context
 */
function devcollab_add_menus_to_context( $context ) {
	$context['primary_menu'] = new Timber\Menu('primary-menu');
	$context['footer_menu']  = new Timber\Menu('footer-menu');

	return $context;
}
add_filter( 'timber/context', 'devcollab_add_menus_to_context' );