<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

	<div class="content">
		<?php get_template_part( 'template-parts/not', 'found' ); ?>
	</div>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
