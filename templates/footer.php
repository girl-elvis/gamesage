<footer class="content-info" role="contentinfo">
  <div class="container">
  		<span class="center-block"><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'sage' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ); ?></span>
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
