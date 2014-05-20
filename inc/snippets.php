<?php

/**
 * Easy static images. 
 *  
 * No more fucking around with get_template_directory_uri
 *
 * $src : image source, relative from the theme directory
 * $attributes : array of html attributes (alt, id, class ...)
 * $format : set to false if you only want an url instead of an img tag
 */

function img($src = false, $attributes = array(), $format = true) {

	if(!$src) {
		return false;
	}

	$attr = '';
	$src  = get_template_directory_uri() . '/'.$src;

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

	} else {
		return false;
	}

}

