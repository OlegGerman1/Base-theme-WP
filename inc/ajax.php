<?php
add_action( 'wp_ajax_get_ajax_example', 'get_ajax_example' );
add_action( 'wp_ajax_nopriv_get_ajax_example', 'get_ajax_example' );

function get_ajax_example() {
    if ( !wp_verify_nonce( $_REQUEST['nonce'], 'get_ajax_example_nonce' ) ) {
        exit( 'No naughty business please' );
    }

    die();
}
