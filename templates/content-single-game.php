

<?php while (have_posts()) : the_post(); ?>


 <?php 
    $designer = get_the_term_list( get_the_ID(), 'designer', 'Designed by: ', ', ');
	$ages = get_the_term_list( get_the_ID(), 'age', 'Ages: ');

	$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'names');
	$players = wp_get_object_terms( get_the_ID(), 'num_players', $args);
	$players = 	'Number of Players: ' . $players[0] . '-' . array_pop($players);
	$playtime = get_the_term_list( get_the_ID(), 'regular_play_times', 'Regular Play Time: ');
	$complexity = get_the_term_list( get_the_ID(), 'complexity','Complexity: ' );

 	$takethat = types_render_field("take-that");
 	$fidget = types_render_field("fidget-factor");
 	$brainburn = types_render_field("brain-burn");
 	$again = types_render_field("again-again");

 	$learning = get_the_term_list( get_the_ID(), 'learning_time', 'Learning Time: ');
 	$firstplay = get_the_term_list( get_the_ID(), 'first-play', 'First Play Time: ');

	?>


<article id="game-wrapper" <?php post_class(); ?> >
 <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
    
    </header>


	<div class="entry-content">
		<div class="row">
			<div class="col-md-6"> 
				<?php get_template_part('templates/carousel'); ?>

<div class="gameextra ">
				 <h3 class="icon">Take That</h2>
			   	<p> <?php echo $takethat ; ?></p>
			    <h3 class="icon">Fidget Factor</h2>
			    <p> <?php echo $fidget ; ?></p>
			    <h3 class="icon">Brain Burn</h2>
			    <p> <?php echo $brainburn ; ?></p>
			    <h3 class="icon">Again again</h2>
			    <p> <?php echo $again ; ?></p>
			</div>

			<div class="gameextra-meta">
				<p> <?php echo $learning ; ?></p>
				<p> <?php echo $firstplay ; ?></p>
				<p> <?php echo $playtime ; ?></p>
				<h5> If you like this game, try:</h5>

				<?php 

				$posts = get_field('related_games');

				if( $posts ): ?>
				    <ul>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <li>
				            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				            <!-- <span>Custom field from $post: <?php the_field('author'); ?></span> -->
				        </li>
				    <?php endforeach; ?>
				    </ul>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

				
			</div>

			
			</div>
			<div class="col-md-6">

			 


	<div class="meta">
	<div class="game-meta"> <?php echo $designer ; ?></div>
	<div class="game-meta"><?php echo $ages ; ?>+</div>
	<div class="game-meta"><?php echo $players ; ?></div>
	<div class="game-meta"><?php echo $playtime ; ?></div>
	<div class="game-meta"><?php echo $complexity ; ?></div>
</div>
				<?php the_content(); ?>	

<div  class="showmore"><a href="#"><i class="fa fa-arrow-circle-o-down"></i> Read More </a></div>
	<div id="samjoe" class="hide">
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


