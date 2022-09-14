<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://timber.github.io/docs/guides/sidebars/#method-1-php-file
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LightShip
 */

use Timber\Timber;

$context = [];

$context['title']   = 'My sidebar';
$context['widgets'] = Timber::get_widgets('sidebar-1');

Timber::render( 'partials/sidebar.twig', $context );
