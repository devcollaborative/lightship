<?php

/**
 * Register testimonial block. Demo. 
 * 
 * @todo add 'acf/testimonial' to inc/block-editor.php  lightship_allowed_block_types()
 * to allow WP GUI access to this block. 
 * @todo create fields for this block in ACF Pro
 * @todo remove hardcoded image
 */
function lightship_init_testimonial() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    acf_register_block_type(array(
        'name'              => 'testimonial',
        'title'             => 'Testimonial',
        'description'       => 'DevCollab custom testimonial block.',
        'render_callback'   => 'lightship_render_testimonial',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'testimonial', 'quote' ),
        'supports'          => array( 'anchor' => true ),
    ));
}
add_action('acf/init', 'lightship_init_testimonial');

/**
 *  Render the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function lightship_render_testimonial($block, $content = '', $is_preview = false) {
    $context = Timber::context();

    // Set anchor value if present.
    if ( ! empty( $block['anchor'] ) ) {
        $context['id'] = $block['anchor'];
    }

    // Set custom "className".
    if ( ! empty( $block['className'] ) ) {
        $context['classes'] = $block['className'];
    }

    // Set align value.
    if ( ! empty( $block['align'] ) ) {
        $context['align'] = 'align' . $block['align'];
    }

    // Store field values.
    $context['text']   = get_field('testimonial') ?: 'Your testimonial here...';
    $context['author'] = get_field('author') ?: 'Author name';
    $context['role']   = get_field('role') ?: 'Author role';
    $context['image']  = get_field('image') ?: 295;

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render( 'testimonial/testimonial.twig', $context );
}
