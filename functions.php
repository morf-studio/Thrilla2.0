<?php
/**
 * Thrilla 2.0 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Thrilla_2.0
 */

if ( ! function_exists( 'thrilla2_0_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thrilla2_0_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Thrilla 2.0, use a find and replace
	 * to change 'thrilla2-0' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'thrilla2-0', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'thrilla2-0' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thrilla2_0_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'thrilla2_0_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thrilla2_0_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thrilla2_0_content_width', 640 );
}
add_action( 'after_setup_theme', 'thrilla2_0_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thrilla2_0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thrilla2-0' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'thrilla2-0' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title caps">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'thrilla2_0_widgets_init' );

// Create any new image sizes
//add_image_size('largest', 3000, 9999);

function add_image_sizes() {
  if( function_exists( 'add_image_size' )) {
    add_image_size( 'thumbnail-retina', 600, 338 );
    add_image_size( 'small', 750 );
    add_image_size( 'xlarge', 1500 );
    add_image_size( 'xxlarge', 2000 );
    add_image_size( 'featured', 1200, 600 );
    add_image_size( 'xlfeatured', 2400, 1200 );
  }
}
add_action('after_setup_theme', 'add_image_sizes');

function add_image_choices( $sizes ) {
  return array_merge( $sizes, array(
    'thumbnail-retina' => __( 'Thumbnail Retina' ),
    'small' => __( 'Small' ),
    'xlarge' => __( 'X Large' ),
    'xxlarge' => __( 'XX Large' ),
    'featured' => __( 'Featured' ),
    'xlfeatured' => __( 'XL Featured' ),
  ) );
}
add_filter( 'image_size_names_choose', 'add_image_choices' );

function custom_theme_setup() {
    add_theme_support( 'advanced-image-compression' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );


/**
 * Enqueue scripts and styles.
 */
function thrilla2_0_scripts() {
	wp_enqueue_style( 'thrilla2-0-style', get_stylesheet_uri() );

	//wp_enqueue_script( 'thrilla2-0-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	//wp_enqueue_script( 'thrilla2-0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'thrilla2-0-main-min', get_template_directory_uri() . '/js/min/main-min.js', array(), '20160715', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thrilla2_0_scripts' );


/************* ENQUEUE JS *************************/

/* pull jquery from google's CDN. If it's not available, grab the local copy. Code from wp.tutsplus.com :-) */

$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'; // the URL to check against
$test_url = @fopen($url,'r'); // test parameters
if( $test_url !== false ) { // test if the URL exists

    function load_external_jQuery() { // load external file
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'); // register the external file
        wp_enqueue_script('jquery'); // enqueue the external file
    }

    add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function
} else {

    function load_local_jQuery() {
        wp_deregister_script('jquery'); // initiate the function
        wp_register_script('jquery', get_template_directory_uri().'/js/jquery-3.1.0.min.js', __FILE__, false, '3.1.0', true); // register the local file

        wp_enqueue_script('jquery'); // enqueue the local file
    }

    add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
