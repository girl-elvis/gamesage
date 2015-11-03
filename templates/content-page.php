<?php the_content(); ?>

<?php if(is_front_page()) { ?>

	<div class="homesearch"><div class="text-hide"><h3>Ask the Guru</h3></div>
		<?php 
		get_search_form( $echo = true );
		get_template_part('templates/searchform', 'game'); 
		?>
	</div>


<?php } ?>



<?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
