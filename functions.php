<?php
/**
 * ipitledger-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ipitledger-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ipitledger_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ipitledger-theme, use a find and replace
		* to change 'ipitledger-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ipitledger-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'mainmenu' => esc_html__( 'Primary menu', 'ipitledger-theme' ),
			'footermenu' => esc_html__( 'Footer menu', 'ipitledger-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ipitledger_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ipitledger_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ipitledger_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ipitledger_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'ipitledger_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ipitledger_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ipitledger-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ipitledger-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ipitledger_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ipitledger_theme_styles() {
	$version = wp_get_theme()->get('Version');

	wp_enqueue_style( 'ipitledger-theme-bundle', get_template_directory_uri() . "/bundle.css", array(), null );
	if ( is_singular("services") ) {
		wp_enqueue_style( 'ipitledger-theme-virtual-select-css', get_template_directory_uri() . "/virtual-select.css", array(), null );
	}
	wp_enqueue_style( 'ipitledger-theme-style', get_stylesheet_uri(), array(), $version, null);
}
add_action( 'wp_enqueue_scripts', 'ipitledger_theme_styles' );

function ipitledger_theme_scripts() {
	$version = wp_get_theme()->get('Version');

	wp_enqueue_script( 'ipitledger-theme-vendors', get_template_directory_uri() . "/assets/js/vendors.js", null, true );
	if ( is_singular("services") ) {
		wp_enqueue_script( 'ipitledger-theme-virtual-select-js', get_template_directory_uri() . "/assets/js/virtual-select.js", null, true );
	}

	wp_enqueue_script( 'ipitledger-theme-lottie', "https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.4/lottie.min.js", null, true );

	if ( is_front_page() ) {
		wp_enqueue_script( 'ipitledger-theme-sliders', get_template_directory_uri() . "/assets/js/sliders.js", null, true );
	}
	wp_enqueue_script( 'ipitledger-theme-all', get_template_directory_uri() . "/assets/js/all.js", null, $version, true );
}
add_action( 'wp_enqueue_scripts', 'ipitledger_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
// Carbon Fields
require get_template_directory() . '/inc/custom-fields.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// ** Custom code
add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if( 'mainmenu' === $args->theme_location ){
		$classes[] = 'list__item';
	}

	return $classes;
}
