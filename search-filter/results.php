<?php

/**

 * Search & Filter Pro 

 *

 * Sample Results Template

 * 

 * @package   Search_Filter

 * @author    Ross Morsali

 * @link      http://www.designsandcode.com/

 * @copyright 2014 Designs & Code

 * 

 * Note: these templates are not full page templates, rather 

 * just an encaspulation of the your results loop which should

 * be inserted in to other pages by using a shortcode - think 

 * of it as a template part

 * 

 * This template is an absolute base example showing you what

 * you can do, for more customisation see the WordPress docs 

 * and using template tags - 

 * 

 * http://codex.wordpress.org/Template_Tags

 *

 */



if ( $query->have_posts() )

{



	?>

	<div>

	There are <?php echo $query->found_posts; ?> Games. 

	This is Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />

	</div>

	<!-- <div class="pagination">

		

		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>

		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>

		<?php

			/* example code for using the wp_pagenavi plugin */

			if (function_exists('wp_pagenavi'))

			{

				echo "<br />";

				wp_pagenavi( array( 'query' => $query ) );

			}

		?>

	</div> -->

	<div class='gameloop'>

	<?php



	while ($query->have_posts())

	{

		$query->the_post();

		

		?>



		<?php get_template_part('templates/content-single-game'); ?>



		<?php

	}



	?>

</div>

	Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />

	

	 <div class="pagination">

		

		<div class="nav-previous"><?php next_posts_link( 'Older posts', $query->max_num_pages ); ?></div>

		<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>

		<?php

			/* example code for using the wp_pagenavi plugin */

			if (function_exists('wp_pagenavi'))

			{

				echo "<br />";

				wp_pagenavi( array( 'query' => $query ) );

			}

		?>

	</div> 

	<?php

}

else

{

	echo "No Results Found";

}



?>