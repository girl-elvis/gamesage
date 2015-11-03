<form  method="post" action="<?php bloginfo('url');?>/game-results/">
<?php  $taxonomies = get_object_taxonomies('game');
    foreach($taxonomies as $tax){
        echo buildSelect($tax);
    }
?>
<input type="submit"/>
</form>

