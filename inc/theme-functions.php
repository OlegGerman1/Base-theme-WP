<?php

add_filter( 'wpcf7_autop_or_not', '__return_false' );

// Add SVG support
add_filter( 'mime_types', function ( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;
} );

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter( 'jpeg_quality', function( $arg ){ return 100; } );
add_filter( 'wp_editor_set_quality', function( $arg ){ return 100; } );

// Disable default pages.
function theme_disable_default_pages() {
    /* Conditional checks examples:
        is_category()
        is_tag()
        is_date()
        is_author()
        is_tax()
        is_search() ... */

    // Return a 404 for selected pages.
    if (
        is_archive() ||
        is_category() ||
        is_tag() ||
        is_date() ||
        is_author() ||
        is_tax()
    ) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}
//add_action( 'template_redirect', 'theme_disable_default_pages' );