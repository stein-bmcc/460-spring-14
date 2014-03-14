<?php get_header(); ?>

			<!-- This shows the content of whatever page you have set as the front page
			It assumes that you are using a Static Front page set in the dashboard
			Settings > Reading 
			
			Delete the entire static-page-content div if you don't want to show that
			-->
			<div id="static-page-content" class="row">
				<div class="small-12 columns">
					<?php
				        if ( have_posts() ) :
				            // Start the Loop.
				            while ( have_posts() ) : the_post();
				        		the_content();
				            endwhile;
				        else :
				            // If no content, include the "No posts found" template.
				            get_template_part( 'content', 'none' );
				        endif;
				    ?>
				</div>
       		</div> <!-- end #static-page-content -->

			<div id="main" class="row">
				<div class="small-12 columns">
					<h2>My Work</h2>

					<!-- 
					this shows an example of how the block-grid layout works in foundation.
					See this for more: http://foundation.zurb.com/docs/components/block_grid.html 
					-->
					<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
						
					 <?php
						//create arguments array for custom loop
						$args = array(
						'category_name' => 'featured'
						);

						//create a custom loop
						$featured = new WP_Query($args);
					?>

					<?php
					    // runn the loop
					    if($featured->have_posts()) :
					        while($featured->have_posts()) : $featured->the_post();
					            get_template_part( 'content','front' );
					        endwhile;
					    else: ?>
					        <p>Query returned no posts</p>
					    <?php endif;

					//RESET The Loop
					wp_reset_postdata();
					?>
					
					</ul>
				</div>
       		</div> <!-- end #main -->


<?php get_footer(); ?>