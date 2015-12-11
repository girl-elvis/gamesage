<?php get_template_part('templates/page', 'header'); ?>

<div class="homesearch"><div class="text-hide"><h3 class="searchagain">Search Again</h3></div>
		<?php 
		get_template_part('templates/searchform', 'game'); 
		get_template_part('templates/searchform', 'filter'); 
		?>
	</div>

<?php 

if (!have_posts()) : ?>
	  <div class="alert alert-warning">
	    <?php _e('Sorry, no results were found.', 'sage'); ?>
	  </div>
	  <?php get_search_form(); ?>
<?php endif; ?>

<div class="gameloop">

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'game'); ?>
<?php endwhile; ?>

</div>

<?php if(function_exists('wp_pagenavi')) : 
		wp_pagenavi(); 
	else : 
		the_posts_navigation();
	endif;  ?>
