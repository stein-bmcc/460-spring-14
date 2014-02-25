<nav class="top-bar" data-topbar >
	<ul class="title-area">
	    <li class="name">
	     
	    </li>
	    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
 	</ul>	
	<section class="top-bar-section">
	

	<?php
		$main_menu_top = array(
		'theme_location' => 'main-menu',
		'container' => false,
		'menu_class' => 'left',
		'walker' => new GC_walker_nav_menu()


		);
		wp_nav_menu( $main_menu_top ); 
	?>
	</section>
</nav> 