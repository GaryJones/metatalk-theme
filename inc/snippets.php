<?php

/**
 * Easy loop. 
 *  
 * Make looping easier.
 *
 * $template_name : the name of the template (without php), place the file in the templates folder
 * $args : arguments for the loop (http://codex.wordpress.org/Class_Reference/WP_Query)
 *
 * Example :  <?php the_loop('events',array('post_type' => 'event')); ?>
 *
 */

function the_loop($template_name=false,$args=array()) {

	$template = get_template_directory().'/'.'templates/'.$template_name.'.php';

	if(!file_exists($template)) {
		echo '<div class="theme-error">Template <i>'.$template.'</i> not found!</div>';
	}

	if(empty($args['post_type'])) {
		$args['post_type'] = $template_name;
	}

	$query = new WP_Query($args);

	if($query->have_posts()) {

		while ($query->have_posts()) {
			$query->the_post();

			require($template);

		}

	} else {

		echo '<div class="theme-error">No posts found!</div>';

	}

	wp_reset_postdata();

}




/**
 * Easy static images. 
 *  
 * No more fucking around with get_template_directory_uri
 *
 * $src : image source, relative from the theme directory
 * $attributes : array of html attributes (alt, id, class ...)
 * $format : set to false if you only want an url instead of an img tag
 *
 *	Example : <?php echo img('img/logo.png',array('alt' => 'Blabla', 'class' => 'logo')); ?>
 *
 */

function img($src = false, $attributes = array(), $format = true) {

	if(!$src) {
		return false;
	}

	$attr = '';
	$src  = get_template_directory_uri() . '/' . $src;

	if(!empty($attributes)) {
		foreach($attributes as $key => $value) {
			$attr .= $key .'="'.$value.'" ';
		}
	}

	if(!$format) {
		return $src;
	}

	$format = '<img src="'.$src.'" '.$attr.'>';

	return $format;

}


/**
 * Get the ID of the top page. 
 *  
 * Get the ID of the top parent when working with hierarchical pages or posts.
 *  
 * Example:
 *
 *	Parentpage (id : 3)
 *		- child page
 *		- child page
 *			- child page => <?php echo get_the_title(get_top_id()) ?> on this page returns the title of Parentpage
 *	
 *
 */


function get_top_id() {

	global $post;

	$id = $post->ID;

	if($post->post_parent) {
		
		$id = $post->post_parent;
		$grandparent = get_post_ancestors($id);

		if($grandparent && is_array($grandparent)) {
			$id = $grandparent[0];
		}
		
	}

	return $id;

}

/**
 * Breadcrumbs for hierarchical posts or pages
 *  
 * Basic breadcrumbs & formating in list items.
 * 
 */

function get_the_breadcrumb() {

	global $post;

	$ancestors = get_post_ancestors($post->ID);

	if(!empty($ancestors)) {

		$ancestors = array_reverse($ancestors);

		$crumbs = '<ul class="breadcrumbs">';

		foreach($ancestors as $ancestor) {
			$crumbs .= '<li><a href="'.get_permalink($ancestor).'">'.get_the_title($ancestor).'</a></li>';
		}

		$crumbs .= '<li><a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></li>';
		$crumbs .= '</ul>';

		return $crumbs;

	} 
	
}

