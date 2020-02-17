<?php
/**
 * freesn functions and definitions
 *
 * @package freesn
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'freesn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function freesn_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on freesn, use a find and replace
	 * to change 'freesn' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'freesn', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', 'freesn' ),
		'footer' => __( 'Footer Menu', 'freesn' ),
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
	add_theme_support( 'custom-background', apply_filters( 'freesn_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // freesn_setup
add_action( 'after_setup_theme', 'freesn_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function freesn_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'freesn' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'freesn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freesn_scripts() {
	wp_enqueue_style( 'freesn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'freesn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'freesn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'freesn-script', get_template_directory_uri() . '/js/freesn.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'freesn_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Custom shortcodes.
 */
require get_template_directory() . '/inc/custom-shortcodes.php';

function the_excerpt_max_charlength($charlength, $permalink) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '.. <a href="' . $permalink . '">Preberi več &raquo;</a> ';
	} else {
		echo $excerpt;
	}
}

// New post type Workshops
function create_custom_posttype_workshops() {
	$labels = array(
		'name'               => _x( 'Workshops', 'post type general name' ),
		'singular_name'      => _x( 'Workshop', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'workshop' ),
		'add_new_item'       => __( 'Add New Workshops' ),
		'edit_item'          => __( 'Edit Workshop' ),
		'new_item'           => __( 'New Workshop' ),
		'all_items'          => __( 'All Workshops' ),
		'view_item'          => __( 'View Workshop' ),
		'search_items'       => __( 'Search Workshops' ),
		'not_found'          => __( 'No Workshop found' ),
		'not_found_in_trash' => __( 'No Workshop found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Workshops'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds workshops specific data',
		'public'        => true,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' 	=> true,
		'has_archive'   => true,
		'menu_icon' => 'dashicons-lightbulb',
		'can_export'            => true,
		'exclude_from_search'   => false,
		'rewrite' => array( 'slug' => 'delavnica' ),
	);
	register_post_type( 'workshops', $args );
}
add_action( 'init', 'create_custom_posttype_workshops' );

// New post type Partners
function create_custom_posttype_partners() {
	$labels = array(
		'name'               => _x( 'Partners', 'post type general name' ),
		'singular_name'      => _x( 'Partner', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'partner' ),
		'add_new_item'       => __( 'Add New Partners' ),
		'edit_item'          => __( 'Edit Partner' ),
		'new_item'           => __( 'New Partner' ),
		'all_items'          => __( 'All Partners' ),
		'view_item'          => __( 'View Partner' ),
		'search_items'       => __( 'Search Partners' ),
		'not_found'          => __( 'No Partner found' ),
		'not_found_in_trash' => __( 'No Partner found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Partners'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds partners specific data',
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail' ),
		'show_in_rest' 	=> true,
		'has_archive'   => true,
		'menu_icon' => 'dashicons-buddicons-groups',
		'can_export'            => true,
		'exclude_from_search'   => false,
		'rewrite' => array( 'slug' => 'partner' ),
	);
	register_post_type( 'partners', $args );
}
add_action( 'init', 'create_custom_posttype_partners' );

// New post type Team members
function create_custom_posttype_team_members() {
	$labels = array(
		'name'               => _x( 'Team members', 'post type general name' ),
		'singular_name'      => _x( 'Team member', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Team member' ),
		'add_new_item'       => __( 'Add New Team member' ),
		'edit_item'          => __( 'Edit Team member' ),
		'new_item'           => __( 'New Team member' ),
		'all_items'          => __( 'All Team members' ),
		'view_item'          => __( 'View Team member' ),
		'search_items'       => __( 'Search Team members' ),
		'not_found'          => __( 'No Team member found' ),
		'not_found_in_trash' => __( 'No Team member found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Team members'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds Team members specific data',
		'public'        => true,
		'supports'      => array( 'title', 'thumbnail', 'editor',
			'taxonomies' => array( 'sections' ),
		),
		'show_in_rest' 	=> true,
		'has_archive'   => true,
		'menu_icon' => 'dashicons-nametag',
		'can_export'            => true,
		'exclude_from_search'   => false,
		'rewrite' => array( 'slug' => 'ekipa' ),
		'taxonomies'	=> array( 'sections' )
	);
	register_post_type( 'team-members', $args );
}
add_action( 'init', 'create_custom_posttype_team_members' );

function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=workshops', // Workshops
        'edit.php?post_type=page', // Pages
		'edit.php?post_type=partners', // Partners
		'edit.php?post_type=team-members', // Team members
        'upload.php', // Media
        'link-manager.php', // Links
        'edit.php', // Posts
        'edit-comments.php', // Comments
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );

// add custom taxonomy for team members
add_action( 'init', 'create_sections_hierarchical_taxonomy', 0 );

// create a custom taxonomy
function create_sections_hierarchical_taxonomy() {
	$labels = array(
		'name' => _x( 'Sections', 'taxonomy general name' ),
		'singular_name' => _x( 'Section', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Sections' ),
		'all_items' => __( 'All Sections' ),
		'parent_item' => __( 'Parent Section' ),
		'parent_item_colon' => __( 'Parent Section:' ),
		'edit_item' => __( 'Edit Section' ),
		'update_item' => __( 'Update Section' ),
		'add_new_item' => __( 'Add New Section' ),
		'new_item_name' => __( 'New Section Name' ),
		'menu_name' => __( 'Sections' ),
	);

	register_taxonomy( 'sections', array('post'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'sekcija' ),
	));
};
