<?php
/**
 * Quotes on Dev Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package QOD_Starter_Theme
 */

if ( ! function_exists( 'qod_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function qod_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form' ) );

}
endif; // qod_setup
add_action( 'after_setup_theme', 'qod_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function qod_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qod_content_width', 640 );
}
add_action( 'after_setup_theme', 'qod_content_width', 0 );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function qod_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'qod_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function qod_scripts() {
	wp_enqueue_style( 'qod-style', get_stylesheet_uri() );
	wp_enqueue_style('inhabitent-starter-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css');

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'qod-starter-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );
	wp_enqueue_script( 'qod-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );
	wp_enqueue_script( 'qod-random-api', get_template_directory_uri() . '/build/js/random-quote-api.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'submit-quote-api', get_template_directory_uri() . '/build/js/submit-quote-api.min.js', array('jquery'), false, true );

	
	wp_localize_script( 'qod-random-api', 'qodVars', array(
		'rest_url' => esc_url_raw( rest_url() ),
		'wpapi_nonce' => wp_create_nonce( 'wp_rest' ),
		'post_id' => get_the_ID()
	) );

	wp_localize_script( 'submit-quote-api', 'qodSubmit', array(
		'rest_url' => esc_url_raw( rest_url() ),
		'nonce' => wp_create_nonce( 'wp_rest' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'qod_scripts' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
 require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom metaboxes generated using the CMB2 library.
 */
require get_template_directory() . '/inc/metaboxes.php';

 /**
 * Custom WP API modifications.
 */
require get_template_directory() . '/inc/api.php';


// set posts per page 

add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {

  if ( ( ! is_admin() ) && ( $query === $GLOBALS['wp_query'] ) && ( $query->is_search() ) ) {
    $query->set( 'posts_per_page', 10 );
  }
  elseif ( ( ! is_admin() ) && ( $query === $GLOBALS['wp_the_query'] ) && ( $query->is_archive() ) ) {
    $query->set( 'posts_per_page', 5 );
  }

  return $query;
}

// sets orders of post to random on home.php
add_action('pre_get_posts','alter_query');
function alter_query($query){
    if ($query->is_main_query() &&  is_home())
        $query->set('orderby', 'rand'); //Set the order to random
}

add_filter( 'wp_tag_cloud', 'wpse_50242_unstyled_tag_cloud' );

/**
 * Change tag cloud inline style to CSS classes.
 *
 * @param  string $tags
 * @return string
 */
function wpse_50242_unstyled_tag_cloud( $tags )
{
    return preg_replace(
        "~ style='font-size: (\d+)pt;'~",
        ' class="tag-cloud-size-\1"',
        $tags
    );
}