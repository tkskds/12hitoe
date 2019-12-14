<?php

  $author       = get_the_author_meta('id');
  $author_img   = get_avatar($author);
  $author_bk    = get_option('site_nav_sp_sideauthor_bkimg');
  $sideAuthor   = get_option('site_nav_sp_sideauthor')      ? get_option('site_nav_sp_sideauthor')      : true   ;
  $sidenavTtl   = get_option('site_nav_sp_sidemenu')        ? get_option('site_nav_sp_sidemenu')        : 'MENU' ;
  $sidenavMenu  = get_option('site_nav_sp_menu_menu')       ? get_option('site_nav_sp_menu_menu')       : true   ;
  $sideMail     = get_option('site_nav_sp_sideauthor_mail') ? get_option('site_nav_sp_sideauthor_mail') : 'SAMPLE@SAMPLE.COM' ;

  $imgtag       = '/<img.*?src=(["\'])(.+?)\1.*?>/i';

  if(preg_match($imgtag, $author_img, $imgurl)){
    $authorimg = home_url().$imgurl[2];
  }
  if(preg_match($imgtag, $author_bk, $imgurl)){
    $authorbk  = home_url().$imgurl[2];
  }

?>

<ul id="mobile-sidenav" class="sidenav">

  <?php if ($sideAuthor == true) : ?>
    <li class="sidenav_author_list">
      <div class="user-view">
      <div class="background">
        <img class="lazyload" data-src="<?php echo $authorbk ?>">
      </div>
      <a href="#user">
        <img class="circle lazyload" data-src="<?php echo $authorimg ?>">
      </a>
      <a href="#name">
        <span class="white-text name">
          <?php the_author(); ?>
        </span>
      </a>
      <a href="#email">
        <span class="white-text sns">
          <?php echo $sideMail ?>
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
