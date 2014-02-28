//Add this inside of function portfolio_styles_scripts(){
// with the other wp_enqueue_style 

  //CSS for the Front-page hover thumbnails
  wp_enqueue_style( 'hover-thumb', get_template_directory_uri() . '/css/hover-thumb.css', array('portfolio-style', 'normalize') );


