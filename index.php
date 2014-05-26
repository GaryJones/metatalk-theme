<?php get_header() ?>
	
	<div class="pure-g-r">
		<div class="pure-u-1-2">
			<?php the_loop('post',array('posts_per_page' => 1)) ?>
		</div>
	</div>
	
<?php get_footer() ?>