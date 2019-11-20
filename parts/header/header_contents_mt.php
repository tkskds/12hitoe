<nav class="main__color">
  <div class="nav-wrapper">
    <a href="<?php echo home_url(); ?>" class="brand-logo siteTitle">
      <?php bloginfo('name'); ?>
    </a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <?php
          wp_nav_menu(array(
            'theme_location' => 'nav_header',
            'container' => 'ul',
            'menu_id' => 'topnav',
            'menu_class' => 'right hide-on-med-and-down',
            'fallback' => ''
          ));
      ?>
  </div>
</nav>

<?php
  wp_nav_menu(array(
    'theme_location' => 'nav_header_sp',
    'container' => 'ul',
    'menu_id' => 'mobile-demo',
    'menu_class' => 'sidenav',
    'fallback' => ''
  ));
?>

<script type="text/javascript">
  //そのうち移動する
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
