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

$context['post_navigation'] = get_the_post_navigation( array(
  'prev_text' => '<span aria-hidden="true"><</span> %title',
  'next_text' => '%title <span aria-hidden="true">></span>',
) );

Timber::render(array('single-' . $post->post_type . '.twig', 'single.twig'), $context);
