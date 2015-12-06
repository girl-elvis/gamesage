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
      $title = sprintf(__('Search: %s', 'sage'), "<i>" . get_search_query() . "</i>") ;
      $title .= " (" . $wp_query->post_count . " results)";
      return  $title;
  } elseif ( is_post_type_archive('game') ) {
      return __('All Games', 'sage');
  } elseif (is_archive()) {
      return get_the_archive_title();
  } elseif (is_404()) {
      return __('Not Found', 'sage');
  } else {
      return get_the_title();
  }
}
