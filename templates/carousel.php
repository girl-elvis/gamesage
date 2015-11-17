<?php
//echo "post is" . $post->ID ;

$args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' =>'any', 'post_parent' => $post->ID ); 

$attachments = get_posts( $args );

if ( $attachments ) {
	
	foreach ( $attachments as $attachment ) {
		$sliderimages[] = $attachment->ID;
		
	}
}

?>

<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
    <div class='carousel-outer'>
        <!-- Wrapper for slides -->
        <div class='carousel-inner'>

<?php
foreach ($sliderimages as $index => $slide) {
	echo "<div class='item";
	if ($index == 0) {
      echo " active"; //Make first slide "active"
 	}
	echo " '>";
    echo '<a data-target="#myModal" role="button" data-toggle="modal">';
	echo wp_get_attachment_image( $slide, 'slide' ) . "</a></div>" ;
?>

    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
    </div>


<?php
} // end foreach
?>


          
        </div>
            
        <!-- Controls -->
        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
            <span class='glyphicon glyphicon-arrow-left'></span>
        </a>
        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
            <span class='glyphicon glyphicon-arrow-right'></span>
        </a>
    </div>
    
    <!-- Indicators -->
    <ol class='carousel-indicators mCustomScrollbar'>



<?php
foreach ($sliderimages as $index => $thumb) {
	echo "<li data-target='#carousel-custom' data-slide-to='" . $index . "' " ;
	if ($index == 0) {
      echo "class='active'"; //Make first slide "active"
 	}
	echo " >";
	echo wp_get_attachment_image( $thumb, 'slidethumb' ) . "</li>" ;
}
?>

    </ol>
</div>
