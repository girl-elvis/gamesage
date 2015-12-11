<?php

namespace Roots\Sage\Titles;

/**
 * Page titles
 */
function title() {
  if (is_home()) {
      if (get_option('page_for_posts', true)) {
        return get_the_title(get_option('page_for_posts', true));
      } else {
        return __('Latest Posts', 'sage');
      }
  } elseif (is_search()) {
    global $wp_query;
    //print_r($wp_query);
      $title = sprintf(__('Search: %s', 'sage'), "<i>" . get_search_query() . "</i>") ;
      $title .= " (" . $wp_query->found_posts . " results)";
      return  $title;
  } elseif ( is_post_type_archive('game') ) {
      return __('All Games', 'sage');
  } elseif ( is_tax()){
    global $wp_query;
    $obj = (get_queried_object());
      $tax = get_taxonomy( get_queried_object()->taxonomy );
    /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
      $title = sprintf( __( 'All Games with %1$s %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
      $title .= " (" . $obj->count . " results)";
      return $title;
  } elseif (is_archive()) {
      return get_the_archive_title();
  } elseif (is_404()) {
      return __('Not Found', 'sage');
  } else {
      return get_the_title();
  }
}
