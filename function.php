<?php

// Register and enqueue styles and scripts
function mytheme_enqueue_assets() {
	// Styles
	wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'mytheme-custom-style', get_template_directory_uri() . '/css/custom-style.css' );
	
	// Scripts
	wp_enqueue_script( 'mytheme-custom-js', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_assets' );

// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Register a custom navigation menu
function mytheme_register_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'mytheme' ) );
}
add_action( 'after_setup_theme', 'mytheme_register_menu' );

// Add a custom image size
add_image_size( 'mytheme-large', 800, 600, true );

// Register a widget area
function mytheme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mytheme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

// Customize the read more link
function mytheme_excerpt_more( $more ) {
	return ' <a href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'mytheme' ) . '</a>';
}
add_filter( 'excerpt_more', 'mytheme_excerpt_more' );

// Customize the read more link for the_content()
function mytheme_content_more( $more ) {
	return ' <a href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'mytheme' ) . '</a>';
}
add_filter( 'the_content_more_link', 'mytheme_content_more' );

// Add a previous post navigation link
function mytheme_post_navigation() {
	$prev_post = get_previous_post();
	if ( ! empty( $prev_post ) ) {
		$prev_post_url = get_permalink( $prev_post->ID );
		$prev_post_title = get_the_title( $prev_post->ID );
		echo '<a href="' . esc_url( $prev_post_url ) . '" class="previous-post-link">' . esc_html__( 'Previous Post:', 'mytheme' ) . ' ' . esc_html( $prev_post_title ) . '</a>';
	}
}

// Add a function to display previous posts related to the current post
function mytheme_previous_posts() {
	$previous_posts = get_posts( array(
		'orderby' => 'date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'exclude' => get_the_ID()
	) );

	if ( ! empty( $previous_posts ) ) { ?>
		<section class="previous-posts">
		
