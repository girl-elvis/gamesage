<?php
/**
 * Template Name: Search Games results
 */


get_search_form(  ); 


$list = array();
$item = array();
foreach($_POST as $key => $value){
	if($value != ''){
		$item['taxonomy'] = htmlspecialchars($key);
		$item['terms'] = htmlspecialchars($value);
		$item['field'] = 'slug';
		$list[] = $item;
	}
}
$cleanArray = array_merge(array('relation' => 'AND'), $list);


$args['post_type'] = 'game';
$args['showposts'] = 3;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args['paged'] = $paged;
$args['tax_query'] = $cleanArray;
$the_query = new WP_Query( $args );

//print_r($the_query);

 echo ($the_query->found_posts > 0) ? '<h3 class="foundPosts">' . $the_query->found_posts. ' Games found</h3>' : '<h3 class="foundPosts">We found no results</h3>';

 ?>
	<div class='gameloop'>

	<?php

	while ($the_query->have_posts())
	{
		$the_query->the_post();
		get_template_part('templates/content'); 
	}



	?>

</div>

	<?php  wp_reset_postdata();?>

<div class="row page-navigation">
	 <?php next_posts_link('&laquo; Older Entries', $the_query->max_num_pages) ?>
	 <?php previous_posts_link('Newer Entries &raquo;') ?>
</div>





