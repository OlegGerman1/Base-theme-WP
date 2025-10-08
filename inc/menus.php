<?php
/**
 * WordPress Nav Menus.
 *
 */

add_action( 'after_setup_theme', function() {
	register_nav_menus(
		array(
			'menu_in_header' => esc_html__( 'Menu in header', 'base' ),
		)
	);
} );