<div class="thecontent">
	<?php the_content(); ?>
</div>


<?php if(is_front_page()) { ?>
	<div class="visible-xs-block">
		<h2 class="browse">Browse by category...</h2>
	</div>

	<div class="homesearch"><div class="text-hide"><h3>Ask the Guru</h3></div>
		<?php 
		
		get_template_part('templates/searchform', 'game'); 
		get_template_part('templates/searchform', 'filter'); 
		?>
	</div>


<?php } ?>



