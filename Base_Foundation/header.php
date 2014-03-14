<!doctype html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php bloginfo('name'); ?> : <?php bloginfo('description')?></title>
 		<?php wp_head(); ?>
  	</head>

  	<body>
  	
  		<!-- This is example nav 1 that is at the top of the page -->
  		<nav class="top-bar" data-topbar >
			<ul class="title-area">
			    <li class="name">

			    </li>
			    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
		 	</ul>	
			<section class="top-bar-section">


			<?php
				$main_menu_top = array(
				'theme_location' => 'main',
				'container' => false,
				'menu_class' => 'left',
				'walker' => new GC_walker_nav_menu()


				);
				wp_nav_menu( $main_menu_top ); 
			?>
			</section>
		</nav> 
    	<div id="wrapper">
      		<header class="row">
       			<div class="small-12 columns">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<h2><small> <?php bloginfo('description')?></small></h2>
				</div>
      		</header>
	 
			<div class="row">
				<div class="small-12 columns">

					<!-- This is example nav 2 that is in the middle of the page but then snaps to the top as you scrolll down -->
					<div class="contain-to-grid sticky">
			  			<nav class="top-bar" data-topbar >
			  				 <ul class="title-area">
							    <li class="name">
							      <!-- <h1><a href="#">My Site</a></h1> -->
							    </li>
							    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
							 </ul>	
							<section class="top-bar-section">
								
							
				  			<?php
				  				$main_menu_top = array(
									'theme_location' => 'main',
									'container' => false,
									'menu_class' => 'left',
									'walker' => new GC_walker_nav_menu()
								);
								wp_nav_menu( $main_menu_top ); 
							?>
							</section>
						</nav>
					</div> <!-- end contain-to-grid-sticky -->

				</div> <!-- end small-12 -->
			</div><!-- end nav row -->
