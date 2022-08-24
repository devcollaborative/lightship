<?php
/**
 * DevCollab Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DevCollab_Starter
 */

// Enqueue stylesheets and scripts.
require get_template_directory() . '/inc/assets.php';

// Block editor setup & custom blocks.
require get_template_directory() . '/inc/block-editor.php';
require get_template_directory() . '/inc/blocks/testimonial/testimonial.php';

// Register nav menus.
require get_template_directory() . '/inc/nav-menus.php';

// Register sidebars.
require get_template_directory() . '/inc/sidebars.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Register & remove support for theme features.
require get_template_directory() . '/inc/theme-setup.php';
