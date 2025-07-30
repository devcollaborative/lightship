<?php

/**
 * Load theme functions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LightShip
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';
Timber\Timber::init();

// Timber functionality.
require get_template_directory() . '/inc/timber.php';

// Enqueue stylesheets and scripts.
require get_template_directory() . '/inc/assets.php';

// Block editor setup & custom blocks.
require get_template_directory() . '/inc/block-editor.php';

// Register nav menus.
require get_template_directory() . '/inc/nav-menus.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customize login page.
require get_template_directory() . '/inc/login-page.php';

// Register & remove support for theme features.
require get_template_directory() . '/inc/theme-setup.php';
