<?php use Roots\Sage\Titles; ?>
<?php 
$off = ( is_front_page()) ? "offscreen" : '' ;

	?>
<div class="page-header <?php echo $off ?>">
  <h1 class=''><?= Titles\title(); ?></h1>
</div>
