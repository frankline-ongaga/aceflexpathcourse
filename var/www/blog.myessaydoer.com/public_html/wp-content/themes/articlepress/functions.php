<?php
/**
 * ArticlePress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ArticlePress
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.7.5' );
}

if ( ! function_exists( 'articlepress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function articlepress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ArticlePress, use a find and replace
		 * to change 'articlepress' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'articlepress', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'Primary', 'articlepress' ),
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
		add_theme_support( 'custom-background', apply_filters( 'articlepress_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		
		add_filter('the_content','add_my_content');
function add_my_content($content) {
$my_custom_text = '<div style="background:orange; font-size:18px; padding:10px 3px;"><p>Myessaydoer’s  team of experts is available 24/7 to assist you in completing such tasks. We assure you of a well written and plagiarism free paper. Place your order at myessaydoer.com by clicking on the <a href="https://myessaydoer.com/order_now">ORDER NOW</a> option and get a 20% discount on your first assignment.</p></div>'; //
if(is_single() && !is_home()) {
$content .= $my_custom_text;
}
return $content;
}

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'articlepress_setup' );

/*==================================================
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
==================================================*/
function articlepress_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'articlepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'articlepress_content_width', 0 );

/*==================================================
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
==================================================*/
function articlepress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'articlepress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'articlepress' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'articlepress_widgets_init' );


/*==================================================
 * Implement the Custom Header feature.
==================================================*/
require get_template_directory() . '/inc/custom-header.php';

/*==================================================
 * Custom template tags for this theme.
==================================================*/
require get_template_directory() . '/inc/template-tags.php';

/*==================================================
 * Functions which enhance the theme by hooking into WordPress.
==================================================*/
require get_template_directory() . '/inc/template-functions.php';

/*==================================================
 * Customizer additions.
==================================================*/
require get_template_directory() . '/inc/customizer.php';

/*==================================================
 * Load Jetpack compatibility file.
==================================================*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*==================================================
 * Registers an editor stylesheet for the theme.
==================================================*/
function articlepress_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'articlepress_add_editor_styles' );


/*==================================================
 * All Include File
==================================================*/
// Enqueue Scripts
include( get_template_directory() . '/inc/theme-enqueue.php' );

// Theme Function
include( get_template_directory() . '/inc/articlepress-function.php' );

// Plugin Activation
include( get_template_directory() . '/inc/activation/activation.php' );