<?php  

/* 
    ========================================
    Featured Images
    ======================================== 
*/

/* Adding support for Featured Images */
add_theme_support( 'post-thumbnails' );

/* add sizes for potential uses of featured images

    add_image_size('name-for-size', width, height, cropped?);

    change what is below to what you need and copy/paste to add more 

    At the end is true of false
    false = no crop, just resizes so the image fits in the given box. preserves aspect ratio.
    true = crop, removes part of the image if it is over the given size
*/
add_image_size( 'feature-thumb', 325, 325, true ); //325x325 square image
add_image_size( 'sidebar-thumb', 300, 200, false); //resizes image to fit inside 300x200 container
add_image_size( 'feature-image', 600, 99999, false);//600 pixels wide (and unlimited height)



/*  
    ========================================
    ADD STYLESHEES AND JAVASCRIPT
    ========================================
  This adds the css files and js files our theme uses.
  
   Many of these are the JavaScript required by Foundation. 
   if you use other foundation features like orbit, you will need to include other scripts here as well.

   more on how wp_enqueue_script works here: http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 */
function portfolio_styles_scripts(){
  // Stylesheets -------------
wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
  //Foundation Stylesheet
  wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.min.css', array('normalize') );

  // Load our main stylesheet. Make sure it is after foundation_css
  wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array('foundation_css', 'normalize') );

  //Load Google Web Fonts
  wp_enqueue_style( 'font-lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,900,300italic,400italic' );



  // JavaScript --------------
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js' );
  wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/vendor/foundation.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/vendor/fastclick.js', array( 'foundation_js' ), null, true );
  wp_enqueue_script( 'topbar', get_template_directory_uri() . '/js/vendor/foundation.topbar.js', array( 'foundation_js','fastclick' ), null, true );

}
add_action( 'wp_enqueue_scripts', 'portfolio_styles_scripts' );


/* This code hides the Toolbar that appears at the top of the screen on the front end */
show_admin_bar(false );



/*  
    ========================================
    NAVIGATION MENUS
    ======================================== 
    This adds navigation menus to the theme.
    For more visit: http://themes.blogs.peopleio.net/template-functionality/navigation/
*/
function theme_nav_menus(){
    register_nav_menus( array(
        'main'=>'Main Menu',
        'footer'=>'Footer Menu',
        'sidebar' => 'This is the Sidebar Menu'
        ) );
}

add_action('init','theme_nav_menus' );


/* 
    =======================================================
    Foundation Navigation
     =======================================================
   The following allows you to add in the Top Bar Navigation that comes with Foundation. More on that is here:
   http://foundation.zurb.com/docs/components/topbar.html
*/

/*  ADD ACTIVE CLASS TO CURRENT PAGE IN NAVIGATION

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