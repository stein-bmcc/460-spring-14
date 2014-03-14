<li>
	<!-- This is HTML to show a thubmnail with the title and excerpt inside and showing the excerpt on hover
	Modified from code from Jenn Lukas: http://codepen.io/Jenn/pen/zvkLy 
	There is matching CSS in hover-thumb.css that must go with this.
	-->
	<div class="work-thumb">
	    <a href="<?php the_permalink(); ?>">
	     <?php the_post_thumbnail('sidebar-thumb'); ?>
	        <div class="work-info">
	            <h2><?php the_title(); ?></h2>
	            <div class="info-reveal">
	                <?php the_excerpt(); ?>
	            </div>
	        </div>
	    </a>
	</div>
</li>