<div class="thecontent">
	<?php the_content(); ?>
</div>


<?php if(is_front_page()) { ?>
	<div class="visible-xs-block">
		
		<h2 class="collapsed browse" data-toggle="collapse" data-target=".mobcatlist">Browse by category...</h2>
<ul class="mobcatlist collapse">

<?php wp_list_categories( array('taxonomy'=> 'game_category', 'title_li' => '')); ?>

</ul>
	</div>

	<div class="homesearch"><div class="text-hide"><h3>Ask the Guru</h3></div>
		<?php 
		
		get_template_part('templates/searchform', 'game'); 
		get_template_part('templates/searchform', 'filter'); 
		?>
	</div>


<?php } ?>



