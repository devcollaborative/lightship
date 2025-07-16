<?php
/**
 *  Sample block.
 *
 * @param   array   $block      The block settings and attributes.
 * @param   string  $content    The block inner HTML (empty).
 * @param   bool    $is_preview True during backend preview render.
 * @param   array   $context    The context provided to the block by the post or its parent block.
 *
 */

$context = Timber::context();

// Set anchor value.
if ( ! empty( $block['anchor'] ) ) {
    $context['id'] = $block['anchor'];
}

// Set custom class.
if ( ! empty( $block['className'] ) ) {
    $context['classes'] = $block['className'];
}

// Set block width.
if ( ! empty( $block['align'] ) ) {
    $context['align'] = 'align' . $block['align'];
}

// Store $is_preview value.
$context['is_preview'] = $is_preview;

// Store custom field values.
$context['text']   = get_field('testimonial') ?: 'Your testimonial here...';
$context['author'] = get_field('author') ?: 'Author name';
$context['role']   = get_field('role') ?: 'Author role';
$context['image']  = get_field('image') ?: 295;

Timber\Timber::render( 'sample-block/sample-block.twig', $context );
