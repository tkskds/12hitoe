<?php
  $sidenavTtl = get_option('site_nav_sp_sidemenu') ? get_option('site_nav_sp_sidemenu') : 'MENU' ;
?>

<ul id="mobile-sidenav" class="sidenav">
  <li>
    <h3 class="sidenav_ttl"><?php echo $sidenavTtl ?></h3>
  </li> 
</ul>
