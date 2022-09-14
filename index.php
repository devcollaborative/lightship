<?php

/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Timber\Timber;

$context               = Timber::get_context();
$context['posts']      = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();

Timber::render('index.twig', $context);
