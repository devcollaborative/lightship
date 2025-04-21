<?php

/**
 * The template for rendering the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Timber\Timber;

$context         = Timber::context();
$context['post'] = Timber::get_post();

$context['sidebar'] = Timber::get_sidebar('sidebar.php', [ 'title' => 'Front Page Sidebar' ] );

Timber::render('front-page.twig', $context);
