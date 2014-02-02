<?php
/**
 * @package WordPress
 * @subpackage wp-coolkitten
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1000;

/* Add jQuery */
function add_jquery_script() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'coolkitten', get_stylesheet_directory_uri() . '/coolkitten.js' );
	wp_enqueue_script( 'coolkitten' );
}
add_action('wp_enqueue_scripts', 'add_jquery_script');


/* Large images for the slide backgrounds. Posts need a Featured Imgage to display a background. */
add_theme_support( 'post-thumbnails' );
add_image_size('slide-image',1024,824, true);


?>