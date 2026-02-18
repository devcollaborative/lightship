<?php
/**
 * Block editor setup.
 *
 * @package LightShip
 */

 /**
 * Enqueue Block Editor assets.
 */
function lightship_block_styles() {
	add_editor_style(get_template_directory_uri() . '/assets/css/block-editor.css');

	wp_enqueue_script(
		'lightship/block-editor-js',
		get_template_directory_uri() . '/assets/js/block-editor.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		filemtime( get_template_directory() . '/assets/js/block-editor.js' ),
		false
	);
}
add_action( 'enqueue_block_editor_assets', 'lightship_block_styles' );

/**
 * Define block editor support & features.
 */
function lightship_block_editor_setup() {
	add_theme_support( 'responsive-embeds' );

	// Enable editor styles compatibility.
	add_theme_support( 'editor-styles' );

	// Enable block-based template parts which are parts/*.html files
	add_theme_support( 'block-template-parts' );

	// Disable block editor for widgets.
	remove_theme_support( 'widgets-block-editor' );

	// Disable WordPress block patterns.
	remove_theme_support( 'core-block-patterns' );

	// Disable pattern directory.
	add_filter( 'should_load_remote_block_patterns', '__return_false' );

	// Load inline styles only on pages used.
	add_filter( 'should_load_block_assets_on_demand', '__return_true' );
}
add_action( 'after_setup_theme', 'lightship_block_editor_setup' );

/**
 * Only allow specified blocks in the editor.
 *
 * - Any patterns using disabled blocks will be removed from the editor
 * - Embed variations are disabled in assets/js/block-editor.js
 */
function lightship_allowed_block_types() {
	return array(
		'core/audio',
		'core/accordion',
		'core/accordion-panel',
		'core/accordion-item',
		'core/buttons',
		'core/button',
		'core/column',
		'core/columns',
		'core/cover',
		'core/details',
		'core/embed',
		'core/file',
		'core/group',
		'core/gallery',
		'core/heading',
		'core/html',
		'core/image',
		'core/list',
		'core/list-item',
		'core/media-text',
		'core/more',
		'core/paragraph',
		'core/quote',
		'core/pullquote',
		'core/separator',
		'core/shortcode',
		'core/spacer',
		'core/video',
		'core/search',

		//Query Loop component blocks
		'core/post-author',
		'core/post-author-name',
		'core/post-date',
		'core/post-excerpt',
		'core/post-featured-image',
		'core/post-template',
		'core/post-terms',
		'core/post-title',
		'core/query',
		'core/query-no-results',
		'core/query-pagination-next',
		'core/query-pagination-numbers',
		'core/query-pagination-previous',
		'core/query-pagination',
		'core/query-total',
		'core/block', // patterns

		// Custom blocks
		'acf/sample-block',
	);
}
add_filter( 'allowed_block_types_all', 'lightship_allowed_block_types' );

/**
 * Register custom blocks.
 */
function lightship_register_blocks() {
	register_block_type( dirname(__DIR__) . '/blocks/sample-block' );
}
add_action( 'init', 'lightship_register_blocks' );