<?php
/**
 * playground functions and definitions
 *
 * @package playground
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'playground_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function playground_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on playground, use a find and replace
	 * to change 'playground' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'playground', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'playground' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'playground_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif; // playground_setup
add_action( 'after_setup_theme', 'playground_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function playground_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'playground' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
}
add_action( 'widgets_init', 'playground_widgets_init' );

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

/**
 * Enqueue scripts and styles.
 */

function rs_load_azure_scripts() {
	$template_dir = get_template_directory_uri();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'playground-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'playground-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'global-js', get_template_directory_uri() . '/js/global.js', array('jquery'), '20130115', true );
	// wp_enqueue_style( 'serene-elegant-font', $template_dir . '/css/elegant-font.css' );

	/*
	 * Loads the main stylesheet.
	 */
	wp_enqueue_style( 'azure-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'rs_load_azure_scripts' );


function serene_custom_excerpt_length( $length ) {
	return 90;
}
add_filter( 'excerpt_length', 'serene_custom_excerpt_length', 999 );

function serene_excerpt_more( $more ) {
	return sprintf( '...<a class="read-more" href="%s">%s</a>',
		get_permalink( get_the_ID() ),
		esc_html__( 'read more', 'Serene' )
	);
}
add_filter( 'excerpt_more', 'serene_excerpt_more' );

if ( ! function_exists( 'rs_azure_fonts_url' ) ) :
function rs_azure_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Oxygen, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$oxygen = _x( 'on', 'Oxygen font: on or off', 'Serene' );

	if ( 'off' !== $oxygen ) {
		$font_families = array();

		if ( 'off' !== $oxygen )
			$font_families[] = 'Oxygen:300,400,700';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => implode( '|', $font_families ),
			'subset' => 'latin,latin-ext',
		);
		$fonts_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif;

function rs_azure_load_fonts() {
	$fonts_url = rs_azure_fonts_url();
	if ( ! empty( $fonts_url ) )
		wp_enqueue_style( 'serene-fonts', esc_url_raw( $fonts_url ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'rs_azure_load_fonts' );