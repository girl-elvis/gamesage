<?php get_template_part('templates/page', 'header'); ?>

<?php 
//echo do_shortcode('[searchandfilter id="181"]');
if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="theloop">

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'game'); ?>
<?php endwhile; ?>

</div>

<?php the_posts_navigation(); ?>
