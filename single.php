<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

use Timber\Timber;

$context         = Timber::context();
$post            = Timber::get_post();
$context['post'] = $post;

Timber::render(array('single-' . $post->post_type . '.twig', 'single.twig'), $context);
