<?php
/**
 * Template Name: Search Games results
 */




get_search_form(  ); 

// $list = array();
// $item = array();  
// if($_POST){
// 	foreach($_POST as $key => $value){
// 		if($value != ''){
// 			$item['taxonomy'] = htmlspecialchars($key);
// 			$item['terms'] = htmlspecialchars($value);
// 			$item['field'] = 'slug';
// 			$list[] = $item;
// 		}		
// 	}
// 	$_SESSION['realty-search'] = !empty($list) ? $list : array();
// }
// $search = !empty($_SESSION['realty-search']) ? $_SESSION['realty-search'] : array();
// $cleanArray = array_merge(array('relation' => 'AND'), $item);

global $cleanArray;
$list = array();
$item = array();
//print_r($_GET);
if ($_GET) {
	foreach($_GET as $key => $value){
		if($value != ''){
			echo ($key . " : " . $value . "<br>");
			$item['taxonomy'] = htmlspecialchars($key);
			$item['terms'] = htmlspecialchars($value);
			$item['field'] = 'slug';
			$list[] = $item;
		}
	}

 $cleanArray = array_merge(array('relation' => 'AND'), $list);
}


//print_r($the_query->query_vars);



$args['post_type'] = 'game';
$args['showposts'] = 9;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
$args['paged'] = $paged;
$args['tax_query'] =  $cleanArray;
//print_r ($args);
$the_query = new WP_Query( $args );



 //$pagedx = $paged; 
 //echo ("paged: " . $pagedx); 


 echo ($the_query->found_posts > 0) ? '<h3 class="foundPosts">' . $the_query->found_posts. ' Games found</h3>' : '<h3 class="foundPosts">We found no results</h3>';

 ?><div class="row page-navigation">
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
	<?php wp_pagenavi(array( 'query' => $the_query)); ?>
</div>
	<div class='gameloop'>

	<?php

	while ($the_query->have_posts())
	{
		$the_query->the_post();
		get_template_part('templates/content', 'game');
	}



	?>
<?php wp_reset_query(); ?>
</div>



<div class="row page-navigation">
	<?php wp_pagenavi(array( 'query' => $the_query )); ?>
</div>





