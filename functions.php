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
	wp_enqueue_script( 'freesn-script', get_template_directory_uri() . '/js/freesn-script.js' );

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
function create_posttype() {

	register_post_type( 'workshops',
    // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Delavnice' ),
				'singular_name' => __( 'Delavnica' )
			),
			'supports' => array( 'title', 'page-attributes' ),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'delavnica'),
			'menu_position' => 5,
			'menu_icon' => 'dashicons-format-chat',
		)
	);

		register_post_type( 'partners',
    // CPT Options
		array(
			'labels' => array(
				'name' => __( 'Partnerji' ),
				'singular_name' => __( 'Partner' )
			),
			'supports' => array( 'title', 'page-attributes' ),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'partner'),
			'menu_position' => 5,
			'menu_icon' => 'dashicons-universal-access-alt',
		)
	);

}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



