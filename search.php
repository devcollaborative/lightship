<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

use Timber\Timber;

$context               = Timber::context();
$context['posts']      = Timber::get_posts();
$context['pagination'] = Timber::get_pagination( [ 'mid_size' => 3, 'end_size' => 2 ] );

$context['search_query'] = get_search_query();

Timber::render('search.twig', $context);
