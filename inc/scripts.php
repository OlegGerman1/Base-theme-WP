<?php
/**
 * Enqueue scripts and styles.
 */

function base_scripts() {
	$in_footer = true;

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], false, $in_footer );
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_style(
		'base/style',
		get_stylesheet_uri(),
		[],
		filemtime( get_stylesheet_directory() . '/style.css' )
	);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'base/script',
		get_template_directory_uri() . '/js/main.js',
		['jquery'],
		filemtime( get_stylesheet_directory() . '/js/main.js' ),
		$in_footer
	);
}
add_action( 'wp_enqueue_scripts', 'base_scripts' );