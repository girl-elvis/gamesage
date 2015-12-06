<?php get_template_part('templates/page', 'header'); ?>

<?php


if ( is_post_type_archive('game') || is_tax() ) {
    ?>
   <div class="homesearch"><div class="text-hide"><h3>Ask the Guru</h3></div>
		<?php 
		get_template_part('templates/searchform', 'game'); 
		get_template_part('templates/searchform', 'filter'); 
		?>
	</div>
    <?php
}


 if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>


<div class="gameloop">

<?php 
if ( is_post_type_archive('game') || is_tax()) {
	query_posts($query_string . '&orderby=rand');	
}

while (have_posts()) : the_post(); ?>
 <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

</div>

<?php 
	if(function_exists('wp_pagenavi')) : 
		wp_pagenavi(); 
	else : 
		the_posts_navigation();
	endif; 

?>


