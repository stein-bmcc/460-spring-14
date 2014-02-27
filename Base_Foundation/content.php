<li>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<div class="featured">
		<?php the_post_thumbnail('feature-thumb'); ?>
	</div>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
	<hr>
    
</article><!-- end post -->
</li>
