<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

use Timber\Timber;

$context               = Timber::context();
$context['posts']      = Timber::get_posts();

$context['search_query'] = get_search_query();

Timber::render('search.twig', $context);
