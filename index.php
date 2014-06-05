<?php get_header() ?>
	
<div class="container">

	<div class="pure-g-r pure-g-padding">
		<div class="pure-u-1-2" style="background:blue">
			<?php the_loop('post',array('posts_per_page' => 1)) ?>
		</div>
		<div class="pure-u-1-2" style="background:red">
			<?php the_loop('post',array('posts_per_page' => 1)) ?>
		</div>
	</div>

</div>
	
<?php get_footer() ?>