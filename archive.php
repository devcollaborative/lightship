<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

use Timber\Timber;

$context                        = Timber::context();
$context['posts']               = Timber::get_posts();
$context['pagination']          = Timber::get_pagination();
$context['archive_title']       = get_the_archive_title();
$context['archive_description'] = get_the_archive_description();

Timber::render(array('archive-' . get_post_type() . '.twig', 'archive.twig', 'index.twig'), $context);
