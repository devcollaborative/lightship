<?php

/**
 * The template for displaying all pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Timber\Timber;

$context         = Timber::context();
$context['post'] = Timber::get_post();

Timber::render( array( 'page-' . $context['post']->post_name . '.twig', 'page.twig' ), $context );
