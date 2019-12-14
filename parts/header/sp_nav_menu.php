<?php
  $sidenavTtl   = get_option('site_nav_sp_sidemenu')  ? get_option('site_nav_sp_sidemenu')  : 'MENU' ;
  $sidenavMenu  = get_option('site_nav_sp_menu_menu') ? get_option('site_nav_sp_menu_menu') : true   ;
?>

<ul id="mobile-sidenav" class="sidenav">
  <li>
    <h3 class="sidenav_ttl"><?php echo $sidenavTtl ?></h3>
  </li>
  <li>
    <?php
    if ($sidenavMenu == true){
      wp_nav_menu(array(
        'theme_location' => 'nav_header_sp',
        'container' => 'ul',
        'fallback' => ''
      ));
    }
     ?>
  </li>
  <?php if(is_active_sidebar('sidenav_widget')): ?>
    <li>
      <?php echo dynamic_sidebar('sidenav_widget'); ?>
    </li>
  <?php endif; ?>
</ul>
