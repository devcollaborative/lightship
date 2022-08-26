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
		filemtime( get_template_directory_uri() . '/assets/js/block-editor.js' ),
		false
	);

	/**
   * Version param must be set to null to load multiple font families.
   * @see https://core.trac.wordpress.org/ticket/49742
   */
  wp_enqueue_style( 'lightship/fonts','https://fonts.googleapis.com/css2?family=Fredoka+One&family=Work+Sans:wght@300&display=swap', array(), null );
}
add_action( 'enqueue_block_editor_assets', 'lightship_block_styles' );

/**
 * Define block editor support & features.
 */
function lightship_block_editor_setup() {
	// Enable editor styles compatibility.
	add_theme_support( 'editor-styles' );

	// Add support for wide & full width blocks.
	add_theme_support ( 'align-wide' );

	// Disable Full Site Editing.
	remove_theme_support( 'block-templates' );

	// Disable block editor for widgets.
	remove_theme_support( 'widgets-block-editor' );

	// Disable WordPress block patterns.
	remove_theme_support( 'core-block-patterns' );

	// Disable pattern directory.
	add_filter( 'should_load_remote_block_patterns', '__return_false' );
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
		'core/buttons',
		'core/button',
		'core/embed',
		'core/file',
		'core/freeform',
		'core/gallery',
		'core/heading',
		'core/html',
		'core/image',
		'core/list',
		'core/list-item',
		'core/more',
		'core/paragraph',
		'core/quote',
		'core/shortcode',
		'core/video',
	);
}
add_filter( 'allowed_block_types_all', 'lightship_allowed_block_types' );
