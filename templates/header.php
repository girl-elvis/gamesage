<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="
<?php echo get_template_directory_uri() . "/dist/images/logo.png" ; ?>" >

</a>
     <!--    <a class="navbar-brand sr-only" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> -->
      <span class="tagline h5"><?php bloginfo('description'); ?></span>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
  </div>
</header>

