<?php 

/* =======================================================
    NAVIGATION MENUS
   ======================================================= */
	function theme_nav_menus(){
	    register_nav_menus( array(
	        'main'=>'Main Menu',
	        'footer'=>'Footer Menu'
	        ) );
	}
	add_action('init','theme_nav_menus' );



/* =======================================================
    Featured Images
   ======================================================= */
/* Adding support for Featured Images */
add_theme_support( 'post-thumbnails' );

/* add sizes for potential uses of featured images
	change to what you need and copy/paste to add more 
	
	At the end is true of false
	false = no crop, just resizes so the image fits in the given box. preserves aspect ratio.
	true = crop, removes part of the image if it is over the given size
*/
add_image_size( 'feature-thumb', 250, 250, true ); //250x250 square image
add_image_size( 'sidebar-thumb', 300, 200, false); //resizes image to fit in 300x200 size
add_image_size( 'feature-image', 600, 99999, false);//600 pixels wide (and unlimited height)



/* =======================================================
   Foundation Navigation

   The following allows you to add in the Top Bar Navigation that comes with Foundation. More on that is here:
   http://foundation.zurb.com/docs/components/topbar.html
   ======================================================= */
/*
	ADD ACTIVE CLASS TO CURRENT PAGE IN NAVIGATION

 from http://wordpress.org/support/topic/adding-active-class-to-active-menu-item
 */
function foundation_active_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

add_filter('nav_menu_css_class' , 'foundation_active_class' , 10 , 2);
   

/* 
	FOUNDATION CUSTOM WALKER
	This addis in the various classes and elements needed so that drowpdowns work. 
	I believe it only works properly for one level of dropdowns, so keep it simple.

 code from http://garethcooper.com/2014/01/zurb-foundation-5-and-wordpress-menus/
*/
class GC_walker_nav_menu extends Walker_Nav_Menu {

  // add classes to ul sub-menus
  function start_lvl(&$output, $depth) {
    // depth dependent classes
    $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent

    // build html
    $output .= "\n" . $indent . '<ul class="dropdown">' . "\n";
  }
}

if (!function_exists('GC_menu_set_dropdown')) :
	function GC_menu_set_dropdown($sorted_menu_items, $args) {
	  $last_top = 0;
	  foreach ($sorted_menu_items as $key => $obj) {
	    // it is a top lv item?
	    if (0 == $obj->menu_item_parent) {
	      // set the key of the parent
	      $last_top = $key;
	    } else {
	      $sorted_menu_items[$last_top]->classes['dropdown'] = 'has-dropdown';
	    }
	  }

	  return $sorted_menu_items;
	}
endif;
add_filter('wp_nav_menu_objects', 'GC_menu_set_dropdown', 10, 2);



?>