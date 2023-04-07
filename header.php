<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="logo">
				<?php if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					} else {
						echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
					} ?>
			</div>
			<nav>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'nav',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new WP_Bootstrap_Navwalker(),
					) );
				?>
			</nav>
		</div>
	</header>
