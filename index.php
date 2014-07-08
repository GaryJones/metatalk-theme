<?php get_header() ?>
	
<div class="container">

	<div class="pure-g">
		<div class="pure-u-1 pure-u-md-1-3" style="background:blue">
			<?php the_loop('post',array('posts_per_page' => 1)) ?>
		</div>
		<div class="pure-u-1 pure-u-md-1-3" style="background:red">
			<?php the_loop('post',array('posts_per_page' => 1)) ?>
		</div>
	</div>

</div>
	
<?php get_footer() ?>