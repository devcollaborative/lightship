<?php

use Timber;

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {
	add_action(
		'admin_notices',
		function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function ( $template ) {
			return get_stylesheet_directory() . '/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'inc/blocks' );

/**
 * This is where you add some context.
 *
 * @param string $context context['my_var'] can be accessed in twig with: {{ this }}.
 */
function lightship_add_to_context( $context ) {
	/**
	 * Set up a new Timber Site.
	 *
	 * @link https://timber.github.io/docs/reference/timber-site/
	 */
	$context['site']  = new Timber\Site();

	/**
	 * Values added by ACF options pages.
	 *
	 * @link https://www.advancedcustomfields.com/resources/options-page/
	 */
	if ( function_exists( 'get_fields' ) ) {
		$context['options'] = get_fields('option');
	}

	return $context;
}
add_filter( 'timber/context', 'lightship_add_to_context' );


/**
 * This is where you can add your own functions or filters to twig.
 *
 * @link https://timber.github.io/docs/guides/extending-timber/#adding-functionality-to-twig
 *
 * @param object $twig get extension.
 */
function lightship_add_to_twig( $twig ) {
	// Add a function.
	$twig->addFunction( new Timber\Twig_Function( 'edit_post_link', 'edit_post_link' ) );

	// Add functions as filters.
	$twig->addFilter(new Timber\Twig_Filter( 'slugify', function ( $title ) {
		return sanitize_title($title);
	}));

	return $twig;
}
// add_filter( 'timber/twig', 'lightship_add_to_twig' );
