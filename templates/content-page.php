<div class="thecontent">
	<?php the_content(); ?>
</div>


<?php if(is_front_page()) { ?>

<div class="hidden-xs ff">
		<img class="aligncenter wp-image-2075 size-full" src="http://www.gamesnightguru.com/wp-content/uploads/2015/01/take-that.png" alt="take-that" height="144" width="894">
<div class="tooltips" title="take that" style="position: absolute; left: 0%; top: 0%; width: 16.89%; height: 104.86%; z-index: 2;"></div>
<div class="tooltips"  title="fidget factor" style="position: absolute; left: 27.18%; top: 0%; width: 19.24%; height: 101.39%; z-index: 2;"></div>
<div class="tooltips" title="brain burn" style="position: absolute; left: 54.7%; top: 0%; width: 17.23%; height: 103.47%; z-index: 2;"></div>
<div class="tooltips"  title="" style="position: absolute; left: 83.45%; top: 2.08%; width: 16.67%; height: 100%; z-index: 2;"></div>
</div>

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



