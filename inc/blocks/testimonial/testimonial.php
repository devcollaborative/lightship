<?php
/**
 * Register testimonial block.
 */
function wp_lightship_init_testimonial() {
    if ( function_exists( 'acf_register_block_type' ) ) {
        acf_register_block_type( array(
            'name'              => 'testimonial',
            'title'             => 'Testimonial',
            'description'       => 'A custom testimonial block.',
            'render_template'   => 'inc/blocks/testimonial/template.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}
add_action('acf/init', 'wp_lightship_init_testimonial');
