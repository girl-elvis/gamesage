<?php the_content(); ?>

<?php if(is_front_page()) { ?>

	<div class="homesearch"><div class="text-hide"><h3>Ask the Guru</h3></div>
		<?php 
		
		get_template_part('templates/searchform', 'game'); 
		get_template_part('templates/searchform', 'filter'); 
		?>
	</div>


<?php } ?>



