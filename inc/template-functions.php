<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ipitledger-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ipitledger_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ipitledger_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ipitledger_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ipitledger_theme_pingback_header' );

// Custom
// Remove Contact Form 7 <p> and <br>
define('WPCF7_AUTOP', false );
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// Register post type
add_action( 'init', 'register_custom_posts_type' );
function register_custom_posts_type() {
	register_post_type( 'services', array(
		'labels'             => array(
			'name'                  => "Services",
			'singular_name'         => "Service",
			'menu_name'             => "Services",
			'name_admin_bar'        => "Services",
			'add_new'               => "Add new service",
			'add_new_item'          => "Add new service",
			'new_item'              => "New service",
			'edit_item'             => "Edit service",
			'view_item'             => "View service",
			'all_items'             => "All services"
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest' 			 => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
	));
}

// Remove wp-container-random
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
// Remove wpcf7 script
add_filter( 'wpcf7_load_js', '__return_false' );
// Captcha
function pine_scripts() {
	if ( is_front_page() || is_single() ) {
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
			wp_enqueue_script( 'google-recaptcha' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'pine_scripts' );
