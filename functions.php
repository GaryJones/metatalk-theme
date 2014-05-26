<?php

require_once('inc/class-plugin-activation.php');
require_once('inc/plugin-activation.php');
require_once('inc/theme-options.php');
require_once('inc/snippets.php');


/**
 * Setup. 
 * 
 * Everything that has to be done on init 
 * 
 */

/* Register menu & thumbnails */

function register_custom_menu() {
	register_nav_menu('custom_menu', __('Custom Menu'));
}
add_action('init', 'register_custom_menu');

add_theme_support( 'post-thumbnails' );



/**
 * Javascript & css
 * 
 * All Javascript & css files. Looks for a css/main.css file
 * 
 */

function load_scripts() {

	wp_deregister_script( 'jquery' );

	wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.0.min.js', array(), null, true );
	//place all other scripts here
    wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), null, true  );

	wp_enqueue_script( 'main' );

}

add_action( 'wp_enqueue_scripts', 'load_scripts' );


function load_styles() {
	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style( 'main' );
}

add_action( 'wp_enqueue_scripts', 'load_styles' );


/**
 * Filterzzz. 
 *  
 * Customize output of stuff.
 *
 */

/* Put a div around an embed. Usefull for making embeds responsive in CSS */

add_filter('embed_oembed_html', 'embed_wrapper', 99, 4);

function embed_wrapper($html, $url, $attr, $post_id) {
	return '<div class="video-wrapper">' . $html . '</div>';
}