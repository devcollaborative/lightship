<?php

/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Timber\Timber;

$context               = Timber::context();
$context['posts']      = Timber::get_posts();

Timber::render('index.twig', $context);
