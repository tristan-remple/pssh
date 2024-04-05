<?php

if ( ! function_exists( 'pssh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function pssh_setup() {

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'header'   => __( 'Header', 'Menu that appears at the top of every page.' ),
			'footer' => __( 'Footer', 'Menu that appears at the bottom of every page.' ),
			'home' => __( 'Call to Action', 'Put one link here to appear on the Home page.' ),
		) );

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );

	}
endif; // pssh_setup
add_action( 'after_setup_theme', 'pssh_setup' );

// add custom css
function pssh_enqueue() {
    // wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    // wp_enqueue_script('bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_style('my_style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'pssh_enqueue');

?>