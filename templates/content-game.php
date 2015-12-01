<article <?php post_class('col-sm-4'); ?>>
	<div class='card'>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php //get_template_part('templates/entry-meta'); ?>
  </header>

  	  <div class="entry-summary">

  	  	<a href="<?php the_permalink(); ?>">
  	<?php the_post_thumbnail( 'thumb' ); ?>
	</a>
	<div class="game-summary">
    <?php the_excerpt();  ?>
    </div>

 <?php
	$ages = get_the_term_list( get_the_ID(), 'age', 'Ages: ', ',', '');

	$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'names');
	$players = wp_get_object_terms( get_the_ID(), 'num_players', $args);
	$players = 	'Number of Players: ' . $players[0] . '-' . array_pop($players);
	$playtime = get_the_term_list( get_the_ID(), 'regular_play_times', 'Regular Play Time: ');
	//$complexity = get_the_term_list( get_the_ID(), 'complexity','Complexity: <span>', '' ,'</span>' );
	$complexity = get_the_terms( get_the_ID(), 'complexity' );
	$comp_url = (get_term_link( ($complexity[0]->term_id), 'complexity' )); 



 	$learning = get_the_term_list( get_the_ID(), 'learning_time', 'Learning Time: ');
 	$firstplay = get_the_term_list( get_the_ID(), 'first-play', 'First Play Time: ');


	?>


	<div class="game-meta meta-ages"><?php echo $ages ; ?>+</div>
	<div class="game-meta meta-players"><?php echo $players ; ?></div>
	<div class="game-meta meta-playtime"><?php echo $playtime ; ?></div>
<div class="game-meta meta-complexity">Complexity: <a href='<?php echo $comp_url; ?>' ><span><?php echo($complexity[0]->name) ; ?></span></a></div>



 
</div>
</article>
