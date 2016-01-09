<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    
    <div class="navbar-header">
 <!--    <div class="strip visible-xs-block"> <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div> -->
  <a class="navbar-brand hidden-xs" href="<?= esc_url(home_url('/')); ?>"><img src="
<?php echo get_template_directory_uri() . "/dist/images/logo.png" ; ?>" >
</a>

      <a class="navbar-brand moblogo visible-xs-block" href="<?= esc_url(home_url('/')); ?>"><img src="
<?php echo get_template_directory_uri() . "/dist/images/logo-mb.png" ; ?>" >
</a>
 
       <span class="tagline h4"><?php bloginfo('description'); ?></span>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>
  
 <?php
if ( !is_front_page()){
  if ( function_exists( 'yoast_breadcrumb' ) ) {
    yoast_breadcrumb();
  }
}

   ?>
</div>
</header>
