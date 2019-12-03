<?php
  $onlyLogo = get_option('only_logo');
  $logo = get_theme_mod('custom_logo');
  $logoUrl	 = wp_get_attachment_url( $logo );
 ?>

<nav>
  <div class="nav-wrapper">
    <a href="<?php echo home_url(); ?>" class="brand-logo siteTitle">
      <?php if(has_custom_logo()): ?>
        <img src="<?php echo $logoUrl ?>" alt="ロゴ" class="custom-logo" />
      <?php endif; ?>
      <?php if ($onlyLogo == false) { bloginfo('name'); } ?>
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
