<?php
/**
 * Register sidebars.
 *
 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lightship_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets here.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lightship_widgets_init' );