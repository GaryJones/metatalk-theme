<?php

/**
 * Plugin activation. 
 *  
 * Easily install the most common plugins we use.
 *
 */

require_once('inc/class-plugin-activation.php');
require_once('inc/plugin-activation.php');



/**
 * Development snippets. 
 *  
 * Code snippets to use in the theme.
 *
 */

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