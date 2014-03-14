<!-- Each post is in a li beacuse that goes along with Foundations block-grid layout -->
<li>
	<div class="image">
		<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('sidebar-thumb'); ?></a>
	</div>
	<h3><a href="<?php the_permalink(); ?>">	<?php the_title(); ?></a></h3>
	<div class="description">
		<?php the_excerpt(); ?>
	</div>
</li>