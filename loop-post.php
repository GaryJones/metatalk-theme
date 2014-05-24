<?php
	
	$args = array(
		'post_type'		 => 'post',
		'posts_per_page' => -1
	);

	$template = 'templates/test.php';

	if(!file_exists(get_template_directory().'/'.$template)) {
		echo '<div class="theme-error">Template <i>'.$template.'</i> not found!</div>';
	}

	$query = new WP_Query($args);

	if($query->have_posts()):

		while ($query->have_posts()) :
			$query->the_post();

			include_once($template);

		endwhile;

	else:

		//no posts found

	endif;

	wp_reset_postdata();