<?php the_content(); ?>

<?php if(is_front_page()) {
  get_search_form(  ); 
}

 ?>



<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
