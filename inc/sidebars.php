<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

add_action( 'widgets_init', function(){
	register_sidebar(
		[
			'id'            => 'sidebar',
			'name'          => esc_html__( 'Sidebar', 'base' ),
			'description'   => esc_html__( 'Add widgets here.', 'base' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
} );