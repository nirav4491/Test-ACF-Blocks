<?php
/**
 * Sonho functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sonho
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
function sonho_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Sonho, use a find and replace
		* to change 'sonho' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sonho', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'sonho' ),
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
			'sonho_custom_background_args',
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
add_action( 'after_setup_theme', 'sonho_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sonho_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sonho_content_width', 640 );
}
add_action( 'after_setup_theme', 'sonho_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sonho_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sonho' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sonho' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sonho_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sonho_scripts() {
	wp_enqueue_style( 'sonho-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sonho-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sonho-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sonho_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Function for enqueue styles and scripts.
 */
function sonho_enqueue_scripts() {
	wp_enqueue_style(
		'slick-min-style',
		get_template_directory_uri() . '/assets/css/slick_slider/slick.min.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/slick_slider/slick.min.css' ),
		'all'
	);

	wp_enqueue_style(
		'slick-theme-min-style',
		get_template_directory_uri() . '/assets/css/slick_slider/slick-theme.min.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/slick_slider/slick-theme.min.css' ),
		'all'
	);

	wp_enqueue_style(
		'header-style',
		get_template_directory_uri() . '/assets/css/header.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/header.css' ),
		'all'
	);

	wp_enqueue_style(
		'footer-style',
		get_template_directory_uri() . '/assets/css/footer.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/footer.css' ),
		'all'
	);

	wp_enqueue_style(
		'banner-style',
		get_template_directory_uri() . '/assets/css/banner.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/banner.css' ),
		'all'
	);

	wp_enqueue_style(
		'services-style',
		get_template_directory_uri() . '/assets/css/services.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/services.css' ),
		'all'
	);

	wp_enqueue_style(
		'project-style',
		get_template_directory_uri() . '/assets/css/project.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/project.css' ),
		'all'
	);

	wp_enqueue_style(
		'about-us-style',
		get_template_directory_uri() . '/assets/css/about_us.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/about_us.css' ),
		'all'
	);

	wp_enqueue_style(
		'contact-us-style',
		get_template_directory_uri() . '/assets/css/contact_us.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/contact_us.css' ),
		'all'
	);

	wp_enqueue_style(
		'client-us-style',
		get_template_directory_uri() . '/assets/css/client.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/client.css' ),
		'all'
	);

	wp_enqueue_style(
		'testimonial-style',
		get_template_directory_uri() . '/assets/css/testimonial.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/testimonial.css' ),
		'all'
	);

	wp_enqueue_style(
		'faq-style',
		get_template_directory_uri() . '/assets/css/faq.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/faq.css' ),
		'all'
	);

	wp_enqueue_script(
		'jquery-min-js',
		get_template_directory_uri() . '/js/jquery.min.js',
		array(),
		filemtime( get_template_directory() . '/js/jquery.min.js' ),
		'all'
	);

	wp_enqueue_script(
		'slick-min-js',
		get_template_directory_uri() . '/js/slick.min.js',
		array( 'jquery' ),
		filemtime( get_template_directory() . '/js/slick.min.js' ),
		'all'
	);

	wp_enqueue_script(
		'testimonial-js',
		get_template_directory_uri() . '/js/testimonial.js',
		array( 'jquery' ),
		filemtime( get_template_directory() . '/js/testimonial.js' ),
		'all'
	);

	wp_enqueue_script(
		'faq-js',
		get_template_directory_uri() . '/js/faq.js',
		array( 'jquery' ),
		filemtime( get_template_directory() . '/js/faq.js' ),
		'all'
	);
}
add_action( 'wp_enqueue_scripts', 'sonho_enqueue_scripts', 20 );

/**
 * Function for enqueue styles and scripts.
 */
function sonho_admin_enqueue_scripts() {
	wp_enqueue_style(
		'banner-style',
		get_template_directory_uri() . '/assets/css/banner.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/banner.css' ),
		'all'
	);
}
add_action( 'admin_enqueue_scripts', 'sonho_admin_enqueue_scripts', 20 );

add_action( 'acf/init', 'sonho_register_blocks' );
/**
 * Function To register ACF block.
 */
function sonho_register_blocks() {
	// chebck function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {
		// register a testimonial block.
		acf_register_block_type(
			array(
				'name'            => 'banner',
				'title'           => __( 'Banner' ),
				'description'     => __( 'A custom banner block.' ),
				'render_template' => 'template-parts/blocks/banner/banner.php',
				'category'        => 'formatting',
				'icon'            => 'block-default',
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'services',
				'title'           => __( 'Services' ),
				'description'     => __( 'A custom banner block.' ),
				'render_template' => 'template-parts/services/services.php',
				'category'        => 'formatting',
				'icon'            => 'block-default',
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'projects',
				'title'           => __( 'Projects' ),
				'description'     => __( 'A custom banner block.' ),
				'render_template' => 'template-parts/projects/projects.php',
				'category'        => 'formatting',
				'icon'            => 'desktop',
			)
		);
	}
}

