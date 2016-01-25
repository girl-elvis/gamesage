

<?php while (have_posts()) : the_post(); ?>


 <?php 
    $designer = get_the_term_list( get_the_ID(), 'designer', 'Designed by: ', ', ');
	$ages = get_the_term_list( get_the_ID(), 'age', 'Ages: ', ',', '');

	$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'names');
	// $players = wp_get_object_terms( get_the_ID(), 'num_players', $args);
	// $players = 	'Number of Players: ' . $players[0] . '-' . array_pop($players);


	$players = get_the_term_list( get_the_ID(), 'num_players', 'Number of Players: ', ',', '');
	$playtime = get_the_term_list( get_the_ID(), 'regular_play_times', 'Play Time: ');
	//$complexity = get_the_term_list( get_the_ID(), 'complexity','Complexity: ' );
		$complexity = get_the_terms( get_the_ID(), 'complexity' );
		$comp_url = (get_term_link( ($complexity[0]->term_id), 'complexity' )); 

 	$takethat = types_render_field("take-that",array("raw"=>"true"));
 	$fidget = types_render_field("fidget-factor",array("raw"=>"true"));
 	$brainburn = types_render_field("brain-burn",array("raw"=>"true"));
 	$again = types_render_field("again-again",array("raw"=>"true"));

 	$learning = get_the_term_list( get_the_ID(), 'learning_time', 'Learning Time: ');
 	$firstplay = get_the_term_list( get_the_ID(), 'first-play', 'First Play Time: ');

	?>


<article id="game-wrapper" <?php post_class(); ?> >
 <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
    
    </header>


	<div class="entry-content">

<div class="mobpic visible-xs-block">
  <?php  the_post_thumbnail("medium");?>
</div>


		<div class="row">
			<div class="col-md-6 col-md-push-6">

	<div class="meta">
	<div class="game-meta"> <?php echo $designer ; ?></div>
	<div class="game-meta"><?php echo $ages ; ?></div>
	<div class="game-meta"><?php echo $players ; ?></div>
	<div class="game-meta"><?php echo $playtime ; ?> mins</div>
<div class="game-meta meta-complexity">Complexity: <a href='<?php echo $comp_url; ?>' ><span><?php echo($complexity[0]->name) ; ?></span></a></div>

</div>
				<?php the_content(); ?>	

	<div id="samjoe" class="">
	<?php if(get_field('sam_says')) { ?>
		<div class="sam_says"><h3>Sam Says...</h3>
		<?php the_field('sam_says'); ?>	
		</div>

	<?php } ?>  
	<?php if(get_field('joe_says')) { ?>
		<div class="joe_says"><h3>Joe Says...</h3>
		<?php the_field('joe_says'); ?>	
		</div>

	<?php } ?>


	</div> <!-- end samjoe -->


			</div>


			<div class="col-md-6 col-md-pull-6 imgextracol"> 
				<?php  
				 register_new_royalslider_files("1");
				 echo do_shortcode ('[gallery royalslider="1"]'); ?>

<div class="gameextra ">
				 <h3 class="tt icon"><span>Take That</span></h2>
			   	<p> <?php echo $takethat ; ?></p>
			    <h3 class="ff icon"><span>Fidget Factor</span></h2>
			    <p> <?php echo $fidget ; ?></p>
			    <h3 class="bb icon"><span>Brain Burn</span></h2>
			    <p> <?php echo $brainburn ; ?></p>
			    <h3 class="aa icon"><span>Again again</span></h2>
			    <p> <?php echo $again ; ?></p>
			</div>

			<div class="gameextra-meta">
				<p> <?php echo $learning ; ?> mins</p>
				<p> <?php echo $firstplay ; ?> mins</p>
				<p> <?php echo $playtime ; ?> mins</p>

				<div class="related">
				<p> If you like this game, try:</p>

				<?php 

				$posts = get_field('related_games');

				if( $posts ): ?>
				    <table>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); 
				        $complexity = get_the_terms( get_the_ID(), 'complexity','Complexity: ' );
				        $complexityval = $complexity[0]->name;
				        ?>
				        <tr>
				            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
				       
				            <td><span class='meta-complexity value<?php echo $complexityval; ?>'><span><?php echo $complexityval ; ?></span></span></td>
				            <!-- <span>Custom field from $post: <?php the_field('author'); ?></span> -->
				        </tr>
				    <?php endforeach; ?>
				    </table>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

				</div> <!-- end .related -->
			</div>

			
			</div>
			
		</div> <!-- end row -->

		<div class="row">
			

		</div> <!-- end row -->
	</div>

 <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>

    <?php comments_template('/templates/comments.php'); ?>

  </article>
<?php endwhile; ?>


