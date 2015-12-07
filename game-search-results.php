<?php
/**
 * Template Name: Search Games results
 */





global $cleanArray;
$list = array();
$item = array();
$printlist= array();

if ($_GET) {
	foreach($_GET as $key => $value){
		if($value != ''){
			//echo ($key . " : " . $value . "<br>");
			$item['taxonomy'] = htmlspecialchars($key);
			$item['terms'] = htmlspecialchars($value);
			$item['field'] = 'slug';
			//$item['name'] = 'name';
			$list[] = $item;
			$printlist[$key]= $value;
			
		}
	}

 $cleanArray = array_merge(array('relation' => 'AND'), $list);
}


$gets = http_build_query($printlist, '', ', ');
$gets = str_replace('=', ' ', $gets);

$gets = str_replace('num_players', 'Number of Players', $gets);
$gets = str_replace('regular_play_times', 'Play time', $gets);
$gets = str_replace('game_category ', '', $gets);
$gets = str_replace('-', ' ', $gets);

$args['post_type'] = 'game';
$args['showposts'] = 9;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
$args['paged'] = $paged;
$args['tax_query'] =  $cleanArray;
//print_r ($args);
$the_query = new WP_Query( $args );
//print_r($the_query->found_posts);

?>

<div class="page-header ">
  <h1 class=''>Search: <?php echo $gets . " (" . $the_query->found_posts . " results)";  ?></h1>
</div>

<div class="homesearch"><div class="text-hide"><h3 class="searchagain">Search Again</h3></div>
		<?php 
		get_template_part('templates/searchform', 'game'); 
		get_template_part('templates/searchform', 'filter'); 
		?>
	</div>

 <?php //echo ($the_query->found_posts > 0) ? '<h3 class="foundPosts">' . $the_query->found_posts. ' Games found with ' . http_build_query($printlist, '', ', ') . '</h3>' : '<h3 class="foundPosts">We found no results</h3>'; ?>
 <div class="row page-navigation">
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





