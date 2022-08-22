<?php
/**
 * Enqueue stylesheets and scripts.
 *
 * filemtime() is used for cache busting when scripts/styles are updated.
 */
function devcollab_assets() {
	/**
	 * Styles
	 */
	wp_enqueue_style(
		'devcollab-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		filemtime( get_template_directory_uri() . '/assets/css/style.css' )
	);

	/**
	 * Version string must be set to null to load multiple font families.
	 * @see https://core.trac.wordpress.org/ticket/49742
	 */
	wp_enqueue_style( 'devcollab-fonts','https://fonts.googleapis.com/css2?family=Fredoka+One&&family=Work+Sans:wght@300&display=swap', array(), null );

	/**
	 * Scripts
	 */
	wp_enqueue_script(
		'devcollab-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		filemtime( get_template_directory_uri() . '/assets/js/navigation.js' ),
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devcollab_assets' );

/**
 * Add Google Fonts preconnect tags. Remove as needed.
 */
function devcollab_font_extras() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'devcollab_font_extras', 7 );