<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Pretty As A Picture' );
define( 'CHILD_THEME_URL', 'http://www.bobbingwide.com/oik-themes' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
//add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	//wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
//add_theme_support( 'genesis-footer-widgets', 3 );

add_filter( 'genesis_footer_creds_text', "paap_footer_creds_text" );


function paap_footer_creds_text( $text ) {
  $text = "[bw_copyright] <br />[bw_wpadmin]"; 
  return( $text );
}


//* Create blue, green, orange and red color style options
//add_theme_support( 'genesis-style-selector', array(
//	'theme-blue'	=> __( 'Blue', 'themename' ),
//	'theme-green'	=> __( 'Green', 'themename' ),
//	'theme-orange'	=> __( 'Orange', 'themename' ),
//	'theme-red'	=> __( 'Red', 'themename' )
//) );

// Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
 'header',
	'nav',
//        'subnav',
	'site-inner'
) );

/*
 * Logic to make the sidebar ( secondary ) to the left of the header
 * with the RHS containing
 * - header
 * - primary menu
 * - content
 * 
 * Footer placement not defined.
 *
 * Extracts from {@link http://amethystwebsitedesign.com/genesis-full-height-sidebar-with-header-above-content/}
 */
unregister_sidebar( 'sidebar' );
remove_action( 'genesis_after_content', 'genesis_get_sidebar' );

remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Move header into into content-sidebar-wrap
add_action( 'genesis_before_content', 'genesis_header_markup_open', 5 );
add_action( 'genesis_before_content', 'genesis_do_header' );
add_action( 'genesis_before_content', 'genesis_header_markup_close', 15 );

remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_content', 'genesis_do_nav' );

add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );


/*Set default image size on the attachment pages*/

//add_filter('prepend_attachment', 'ag_prepend_attachment');
//function ag_prepend_attachment($p) {
//   return '<p>'.wp_get_attachment_link(0, 'large', false).'</p>';
//}


