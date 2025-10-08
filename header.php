<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="wrapper">
		<header class="header">
			<?php if ( has_nav_menu( 'menu_in_header' ) ) {
				wp_nav_menu( [
					'container'      => false,
					'theme_location' => 'menu_in_header',
					'menu_id'        => 'navigation',
					'menu_class'     => 'navigation',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker'         => new Custom_Nav_Walker(),
				] );
			} ?>
		</header>

		<main class="main">