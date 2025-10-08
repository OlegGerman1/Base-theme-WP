<?php
$block = $args['block'] ? $args['block'] : null;
if ( isset( $block['path'] ) ) {
	$blockFolder = basename( $block['path'] );
}

 if ( isset( $block['data']['preview_image'] ) && $blockFolder ) {
	echo '<img src="' . get_template_directory_uri() . '/template-parts/acf-gutenberg/' . $blockFolder. '/' . $block['data']['preview_image'] . ' " style="width: 100%; height: auto;">';
	return;
}