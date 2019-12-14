<?php

  $authorImg    = get_option('site_nav_sp_sideauthor_img');
  $authorBk     = get_option('site_nav_sp_sideauthor_bkimg');
  $sideAuthor   = get_option('site_nav_sp_sideauthor')      ? get_option('site_nav_sp_sideauthor')      : true   ;
  $sidenavTtl   = get_option('site_nav_sp_sidemenu')        ? get_option('site_nav_sp_sidemenu')        : 'MENU' ;
  $sidenavMenu  = get_option('site_nav_sp_menu_menu')       ? get_option('site_nav_sp_menu_menu')       : true   ;
  $authorMail   = get_option('site_nav_sp_sideauthor_mail') ? get_option('site_nav_sp_sideauthor_mail') : 'SAMPLE@SAMPLE.COM' ;

?>

<ul id="mobile-sidenav" class="sidenav">

  <?php if ($sideAuthor == true) : ?>
    <li class="sidenav_author_list">
      <div class="user-view">
        <div class="background">
          <?php echo $authorBk ?>
        </div>
        <a href="#user">
          <?php echo $authorImg ?>
        </a>
        <a href="#name">
          <span class="white-text name">
            <?php the_author(); ?>
          </span>
        </a>
        <a href="#email">
          <span class="white-text sns">
            <?php echo $authorMail ?>
          </span>
        </a>
      </div>
    </li>
  <?php endif; ?>

  <?php if ($sidenavMenu == true) : ?>
    <li class="sidenav_menu_list">
      <h3 class="sidenav_ttl"><?php echo $sidenavTtl ?></h3>
      <?php wp_nav_menu(array(
              'theme_location' => 'nav_header_sp',
              'container' => 'ul',
              'fallback' => ''
            ));
      ?>
    </li>
  <?php endif; ?>

  <?php if(is_active_sidebar('sidenav_widget')): ?>
    <li class="sidenav_widget_list">
      <?php dynamic_sidebar('sidenav_widget'); ?>
    </li>
  <?php endif; ?>

</ul>
