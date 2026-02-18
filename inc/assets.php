<?php
/**
 * Enqueue stylesheets and scripts.
 *
 * filemtime() is used for cache busting when scripts/styles are updated.
 */
function lightship_assets() {
	/**
	 * Styles
	 */
	wp_enqueue_style(
		'lightship/style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/style.css' )
	);

	/**
	 * Scripts
	 */
	wp_enqueue_script(
		'lightship/disclosure',
		get_template_directory_uri() . '/components/disclosure/disclosure-element.js',
		array(),
		filemtime( get_template_directory() . '/components/disclosure/disclosure-element.js' ),
		[ 'strategy' => 'defer' ]
	);

	wp_enqueue_script(
		'lightship/navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		filemtime( get_template_directory() . '/assets/js/navigation.js' ),
			[ 'strategy' => 'defer' ]
	);

	// Load comment reply only when needed.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Remove emoji styles.
	wp_deregister_style( 'wp-emoji-styles' );
}
add_action( 'wp_enqueue_scripts', 'lightship_assets' );

/**
 * Load separate block styles.
 */
function lightship_enqueue_custom_block_styles() {
	$styled_blocks = [
		'accordion',
		'columns',
		'cover',
		'details',
		'group',
		'media-text',
		'pagination',
		'paragraph',
		'query-loop',
		'quote',
		'separator'
	];

	foreach ( $styled_blocks as $block_name ) {
		if (file_exists( get_theme_file_path( "assets/css/blocks/$block_name.css" ) )) {
			$args = array(
				'handle' => "lightship-$block_name",
				'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
				'path'   => get_theme_file_path( "assets/css/blocks/$block_name.css" ),
			);
			wp_enqueue_block_style( "core/$block_name", $args );
		}
	}
}
add_action('init', 'lightship_enqueue_custom_block_styles');

/**
 * Add extra tags to the head for performance and font loading.
 */
function lightship_extras() {
	// Preload critical fonts -- ones used above the fold. This is the regular body font and bold heading font.
	echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/libre-franklin-v20-latin-regular.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
	echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/lora-v37-latin-600.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'lightship_extras', 4 );