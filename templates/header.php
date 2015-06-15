<header class="banner" role="banner">
 
  <div class="container custom-wrapper pure-g" id="menu">

<div class="pure-u-1 pure-u-md-1-3">
        <div class="pure-menu">
    <a class="pure-menu-heading custom-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <a href="#" class="custom-toggle" id="toggle"><s class="bar"></s><s class="bar"></s></a>
        </div>
  </div>

<div class="pure-u-1 pure-u-md-1-3">
    <nav role="navigation" class="pure-menu pure-menu-horizontal custom-can-transform">
      <?php
      if (has_nav_menu('primary_navigation')) :
        echo '<ul class="pure-menu-list">';
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav','walker' => new Pure_Menu_Walker(), 'items_wrap' => '%3$s', 'container' => false, ]);
        echo '</ul>';
      endif;
      ?>
    </nav>
 </div>
 
 

  </div>

</header>
