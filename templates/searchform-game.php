<div class="filterlabel">Or use these filters to find the sort of game you're interested in:</div>
<form  class="filtersearch" method="post" action="<?php bloginfo('url');?>/game-results/">
<?php  $taxonomies = get_object_taxonomies('game');
    foreach($taxonomies as $tax){
        echo buildSelect($tax);
    }
?>
<input type="submit" name="search" value="search" />
</form>

