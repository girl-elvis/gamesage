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

// Setup custom Image sizes

add_action( 'after_setup_theme', 'cat_theme_setup' );
function cat_theme_setup() {
  add_image_size( 'slidethumb', 100, 100, 1 ); //  (cropped)
  add_image_size( 'slide', 9999, 300 ); //
}




 // Mark parent navigation active when on custom post type single page


  add_filter( 'nav_menu_css_class', 'nav_parent_class', 10, 2 );

function nav_parent_class( $classes, $item ) {
    $cpt_name = 'games';
    $parent_slug = 'games';

    if ( $cpt_name == get_post_type() && ! is_admin() ) {
        global $wpdb;

        // remove any active classes from nav (blog is usually gets the currept_page_parent class on cpt single pages/posts)
        $classes = array_filter($classes, ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item' ? false : true ));

        // get page info
        // - we really just want the post_name so it cane be compared to the post type slug
        $page = get_page_by_title( $item->title, OBJECT, 'page' );

        // check if slug matches post_name
        if( $page->post_name == $parent_slug ) {
            $classes[] = 'current_page_parent';
        }

    }

    return $classes;
}


 
// Setup Admin Thumbnail Size  
if ( function_exists( 'add_theme_support' ) ) {  
  add_image_size( 'admin-thumb', 100, 999999 ); // 100 pixels wide (and unlimited height)  
    }  
  
// Thumbnails to Admin Post View  
add_filter('manage_posts_columns', 'thumbnail_column', 5);  
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);  
  
function thumbnail_column($columns){  
  $new = array();
  foreach($columns as $key => $title) {
    if ($key=='title') // Put the Thumbnail column before the Author column
      $new['thumbnail'] = 'Featured Img';
    $new[$key] = $title;
  }
  return $new;
}  
  
function posts_custom_columns($column_name, $id){  
    if($column_name === 'thumbnail'){  
        echo the_post_thumbnail( 'admin-thumb' ); 
    }  
} 

// Add css for thumb column
add_action('admin_head', 'thumb_column_width');

function thumb_column_width() {
    echo '<style type="text/css">';
    echo '.column-thumbnail { width:120px; }';
    echo '</style>';
}

// Add filter for thumb column

add_action( 'restrict_manage_posts' , 'add_game_filters'  );

function add_game_filters()
{
    // Only apply the filter to our specific post type
    global $typenow;
    if( $typenow == 'game' )
    {
        $current = isset($_GET['FILTER_IMG'])? $_GET['FILTER_IMG']:'';
       
        $eselect = ($current == "EXISTS") ?  "SELECTED" : "" ;
        $nselect = ($current == "NOT EXISTS") ? "SELECTED" : "" ;


        echo "<select name='FILTER_IMG'>";
        echo '<option value="" >Featured Image</option>';
       
            echo '<option value="EXISTS" '.  $eselect.'>Has Featured Image</option>';
            echo '<option value="NOT EXISTS" ' .  $nselect. '>No Featured Image</option>';
       
        echo "</select>";
    }
}

add_filter( 'parse_query', 'modify_filter_games' );
function modify_filter_games( $query )
{
    global $typenow;
    global $pagenow;

    if( $pagenow == 'edit.php' && $typenow == 'game' && isset($_GET['FILTER_IMG']) && $_GET['FILTER_IMG'] != ""  )
    {
        $query->query_vars[ 'meta_key' ] = '_thumbnail_id';
        $query->query_vars[ 'meta_compare' ] = $_GET['FILTER_IMG'];
        $query->query_vars[ 'meta_value' ] = "" ;

    }
}

// END ADMIN THUMB


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


// Custom Search / filter

function buildSelect($tax){

  $terms = get_terms($tax);
  $taxonomy = get_taxonomy( $tax );
  $labels =get_taxonomy_labels( $taxonomy );
  $taxname = ($labels->singular_name) ;

  $x = '<select name="'. $tax .'">';
  $x .= '<option value="">'. ucfirst($taxname) .'</option>';
  foreach ($terms as $term) {
     $x .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
  }
  $x .= '</select>';

  $notshow = array ("publisher", "designer", "post_tag", "learning_time", "first-play");
  if ( !in_array ($tax, $notshow )) 
  return $x;
}


?>