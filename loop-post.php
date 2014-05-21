<?php
	
	$args = array(
		'post_type'		 => 'post',
		'posts_per_page' => -1
	);

	$query = new WP_Query($args);

	if($query->have_posts()):

		while ($query->have_posts()) :
			$query->the_post();

			// html & stuff

		endwhile;

	else:

		//no posts found

	endif;