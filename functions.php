<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
   'lib/wp_bootstrap_navwalker.php', // bootstrap nav walker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_action( 'after_setup_theme', 'cat_theme_setup' );
function cat_theme_setup() {
  add_image_size( 'slidethumb', 100, 100, 1 ); //  (cropped)
  add_image_size( 'slide', 9999, 300 ); //
}




 
    
// Add Extra feilds to CPT
function add_after_post_content($content) {
  if(is_single() && ( 'game' == get_post_type() )) {
    //$take-that = types_render_field("take-that", array("output"=>"html"));
    //echo $take-that;
    $content .= '<h3 class="icon">Take That</h2>';
    $content .= types_render_field("take-that");
    $content .= '<h3 class="icon">Fidget Factor</h2>';
    $content .= types_render_field("fidget-factor");
    $content .= '<h3 class="icon">Brain Burn</h2>';
    $content .= types_render_field("brain-burn");
    $content .= '<h3 class="icon">Again again</h2>';
    $content .= types_render_field("again-again");
    
    
$content .= ' <p> <div>';
$content .= get_the_term_list( get_the_ID(), 'age', 'Age: ');
$content .= '+';      
      
$content .= '</div> <div>';
$content .= get_the_term_list( get_the_ID(), 'num_players', 'Number of Players: ', ', ');
      
$content .= '<div>';
$content .= get_the_term_list( get_the_ID(), 'complexity','Complexity: ' );

$content .= '</div> <div>';
$content .= get_the_term_list( get_the_ID(), 'learning_time', 'Learning Time: ');

$content .= '</div> <div>';
$content .= get_the_term_list( get_the_ID(), 'first-play', 'First Play Time: ');

$content .= '</div> <div>';
$content .= get_the_term_list( get_the_ID(), 'regular_play_times', 'Regular Play Time: ');

$content .= '</div> <div>';
$content .= get_the_term_list( get_the_ID(), 'publisher', 'publisher: ');

$content .= '</div> <div>';
$content .= get_the_term_list( get_the_ID(), 'designer', 'Designer(s): ', ', ');

  }
  return $content;
}
add_filter('the_content', 'add_after_post_content');



// Add Game posts to archive pages
function emf_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'game'
    ));
    return $query;
  }
}
add_filter( 'pre_get_posts', 'emf_add_custom_types' );


?>