<?php
/**
 * kaust-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kaust-theme
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
function kaust_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kaust-theme, use a find and replace
		* to change 'kaust-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kaust-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'kaust-theme' ),
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
			'kaust_theme_custom_background_args',
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
add_action( 'after_setup_theme', 'kaust_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kaust_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kaust_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'kaust_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kaust_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kaust-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kaust-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kaust_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kaust_theme_scripts() {
	wp_enqueue_style( 'kaust-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kaust-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kaust-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaust_theme_scripts' );

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

function create_services_post_type() {
    $labels = array(
        'name' => _x('Services', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Services', 'text_domain'),
        'name_admin_bar' => __('Service', 'text_domain'),
        'archives' => __('Service Archives', 'text_domain'),
        'attributes' => __('Service Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Service:', 'text_domain'),
        'all_items' => __('All Services', 'text_domain'),
        'add_new_item' => __('Add New Service', 'text_domain'),
        'add_new' => __('Add New', 'text_domain'),
        'new_item' => __('New Service', 'text_domain'),
        'edit_item' => __('Edit Service', 'text_domain'),
        'update_item' => __('Update Service', 'text_domain'),
        'view_item' => __('View Service', 'text_domain'),
        'view_items' => __('View Services', 'text_domain'),
        'search_items' => __('Search Service', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into service', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this service', 'text_domain'),
        'items_list' => __('Services list', 'text_domain'),
        'items_list_navigation' => __('Services list navigation', 'text_domain'),
        'filter_items_list' => __('Filter services list', 'text_domain'),
    );
    $args = array(
        'label' => __('Service', 'text_domain'),
        'description' => __('Service Description', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies' => array(),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('service', $args);
}

add_action('init', 'create_services_post_type', 0);


function create_service_categories_taxonomy() {
    $labels = array(
        'name' => _x('Service Categories', 'Taxonomy General Name', 'text_domain'),
        'singular_name' => _x('Service Category', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name' => __('Service Categories', 'text_domain'),
        'all_items' => __('All Service Categories', 'text_domain'),
        'parent_item' => __('Parent Service Category', 'text_domain'),
        'parent_item_colon' => __('Parent Service Category:', 'text_domain'),
        'new_item_name' => __('New Service Category Name', 'text_domain'),
        'add_new_item' => __('Add New Service Category', 'text_domain'),
        'edit_item' => __('Edit Service Category', 'text_domain'),
        'update_item' => __('Update Service Category', 'text_domain'),
        'view_item' => __('View Service Category', 'text_domain'),
        'separate_items_with_commas' => __('Separate service categories with commas', 'text_domain'),
        'add_or_remove_items' => __('Add or remove service categories', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used', 'text_domain'),
        'popular_items' => __('Popular Service Categories', 'text_domain'),
        'search_items' => __('Search Service Categories', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain'),
        'no_terms' => __('No service categories', 'text_domain'),
        'items_list' => __('Service Categories list', 'text_domain'),
        'items_list_navigation' => __('Service Categories list navigation', 'text_domain'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );

    register_taxonomy('service_category', array('service'), $args);
    // wp_reset_query();
}

add_action('init', 'create_service_categories_taxonomy', 0);