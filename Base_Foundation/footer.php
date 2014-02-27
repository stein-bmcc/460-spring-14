
            <!-- Example of adding a nav in the footer. You don't need it, can delte the whole row. -->
            <div class="row">
                <div class="small-12 columns">
                    <div class="contain-to-grid">
                        <nav class="top-bar" data-topbar >
                             <ul class="title-area">
                                <li class="name">
                                </li>
                                <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
                             </ul>  
                            <section class="top-bar-section">


                            <?php
                                $main_menu_top = array(
                                    'theme_location' => 'footer',
                                    'container' => false,
                                    'menu_class' => 'left',
                                    'walker' => new GC_walker_nav_menu()    

                                );
                                wp_nav_menu( $main_menu_top ); 
                            ?>
                            </section>
                        </nav>
                    </div> <!-- end contain-to-grid -->
                </div> <!-- end small-12 -->
            </div> <!-- end row -->


            <footer class="row panel">
                <div class="small-12 columns">
                    <p>&copy; Copyright <?php echo date('Y'); ?> </p>
                    <p>The current date is: <?php echo date('D, d M Y'); ?> </p>
                </div>
            </footer>
    	</div> <!-- end wrapper div -->

        <?php wp_footer(); ?>
        <script>
            jQuery(function($){
                $(document).foundation(); //start foundation javascript
            });
         
        </script>
	</body>
</html>