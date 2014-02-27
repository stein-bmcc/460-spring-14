<?php get_header(); ?>

			<div id="main" class="row">
				<div class="small-12 columns">
				<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
					<?php
				        if ( have_posts() ) :
				            // Start the Loop.
				            while ( have_posts() ) : the_post();
				                //YOU CAN USE LOOP TEMPLATE TAGS HERE
				        		get_template_part('content');
				            endwhile;
				        else :
				            // If no content, include the "No posts found" template.
				            get_template_part( 'content', 'none' );
				        endif;
				    ?>
				<ul />
				</div>
       		</div> <!-- end #main -->

<?php get_footer(); ?>