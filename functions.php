<?php
/**
 * @package trinitimsk
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function trinitimsk_setup() {
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
			'menu-1' => esc_html__( 'Primary', 'trinitimsk' ),
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
add_action( 'after_setup_theme', 'trinitimsk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function trinitimsk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'trinitimsk_content_width', 640 );
}
add_action( 'after_setup_theme', 'trinitimsk_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function trinitimsk_scripts() {
	wp_enqueue_style( 'trinitimsk-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'trinitimsk-style', 'rtl', 'replace' );

	wp_enqueue_style( 'trinitimsk-fonts-style', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
	wp_style_add_data( 'trinitimsk-fonts-style', 'rtl', 'replace' );

	wp_enqueue_style( 'trinitimsk-roots-style', get_stylesheet_directory_uri() . '/assets/css/roots.css' );
	wp_style_add_data( 'trinitimsk-roots-style', 'rtl', 'replace' );

	wp_enqueue_style( 'trinitimsk-swiper-style', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.css' );
	wp_style_add_data( 'trinitimsk-swiper-style', 'rtl', 'replace' );

	wp_enqueue_style( 'trinitimsk-main-style', get_stylesheet_directory_uri() . '/assets/css/main.css' );
	wp_style_add_data( 'trinitimsk-main-style', 'rtl', 'replace' );

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.js');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js');
	wp_enqueue_script( 'countries', get_template_directory_uri() . '/assets/js/countries.js');
}
add_action( 'wp_enqueue_scripts', 'trinitimsk_scripts' );

/**
 * API.
 */
require get_template_directory() . '/api/index.php';

function format_phone_to_tel($phone) {
    // Удаляем все символы, кроме цифр и плюса
    $tel = preg_replace('/[^\d+]/', '', $phone);
    // Удаляем все плюсы, кроме первого
    $tel = preg_replace('/(?!^)\+/', '', $tel);
    return 'tel:' . $tel;
}