<?php

function clean_phone( string $phone ): string {
	return preg_replace( '/[^0-9]/', '', $phone );
}

add_shortcode( 'email', 'email_link_shortcode' );
function email_link_shortcode( $atts, $email ) {
	return '<a href="mailto:' . antispambot( $email ) . '">' . antispambot( $email ) . '</a>';
}

add_shortcode( 'date', 'date_shortcode' );
function date_shortcode(){
	return date( 'Y' );
}

function estimate_reading_time( $text, $wpm = 200 ) {
    $totalWords = str_word_count( strip_tags( $text ) );
    $minutes    = ceil( $totalWords / $wpm );
    return $minutes;
}

function get_field_without_wpautop( $field_name ) {
	remove_filter( 'acf_the_content', 'wpautop' );
	$field = get_field( $field_name );
	add_filter( 'acf_the_content', 'wpautop' );
	return $field;
}

function get_sub_field_without_wpautop( $field_name ) {
	remove_filter( 'acf_the_content', 'wpautop' );
	$field = get_sub_field( $field_name );
	add_filter( 'acf_the_content', 'wpautop' );
	return $field;
}

function get_field_without_wpautop_option( $field_name ) {
	remove_filter( 'acf_the_content', 'wpautop' );
	$field = get_field( $field_name, 'option' );
	add_filter( 'acf_the_content', 'wpautop' );
	return $field;
}

function get_sub_field_without_wpautop_option( $field_name ) {
	remove_filter( 'acf_the_content', 'wpautop' );
	$field = get_sub_field( $field_name, 'option' );
	add_filter( 'acf_the_content', 'wpautop' );
	return $field;
}

function debug( $data ){
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
}

function theme_the_image( $id, $classes = null, $size = 'full' ){
	if ( !empty( $id ) && is_int( $id ) ) : ?>
		<img
			<?php if ( !empty( $classes ) ) : ?>
				class="<?php echo esc_attr( $classes ); ?>"
			<?php endif; ?>
			src="<?php echo wp_get_attachment_image_url( $id, $size ); ?>"
			alt="<?php echo esc_attr( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) ?>"
		/>
	<?php endif;
}

function theme_the_image_2x( $id, $id_2x = null, $classes = null ){
	if ( !empty( $id ) && is_int( $id ) ) : ?>
		<img
			<?php if ( !empty( $classes ) ) : ?>
				class="<?php echo esc_attr( $classes ); ?>"
			<?php endif; ?>
			src="
				<?php echo wp_get_attachment_image_url( $id, 'full' ); ?>"
				srcset="<?php echo wp_get_attachment_image_url( $id, 'full' ); ?> 1x,
				<?php if ( !empty( $id_2x ) && is_int( $id_2x ) ) :
					echo wp_get_attachment_image_url( $id_2x, 'full' ); ?> 2x
				<?php endif; ?>
			"
			alt="<?php echo esc_attr( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) ?>"
		/>
	<?php endif;
}

function theme_the_button( $link, $classes = null ){
	if ( isset( $link ) && is_array( $link ) ) : ?>
		<a
			target="<?php echo esc_attr( $link['target'] ) ? $link['target'] : '_self'; ?>"
			href="<?php echo esc_url( $link['url'] ); ?>"
			<?php if ( isset( $classes ) && !empty( $classes ) ) : ?>
				class="<?php echo esc_attr( $classes ); ?>"
			<?php endif; ?>
			>
			<?php echo esc_html( $link['title'] ); ?>
		</a>
	<?php endif;
}