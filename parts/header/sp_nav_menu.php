<?php

  $authorImg    = get_option('site_nav_sp_sideauthor_img')    ? get_option('site_nav_sp_sideauthor_img')  : get_avatar_url(get_the_author_meta('ID'), 80);
  $authorBk     = get_option('site_nav_sp_sideauthor_bkimg')  ? get_option('site_nav_sp_sideauthor_bkimg'): get_bloginfo('template_directory').'/images/others/author_bk.png';
  $sideAuthor   = get_option('site_nav_sp_sideauthor');
  $sidenavMenu  = get_option('site_nav_sp_menu_menu');
  $sidenavTtl   = get_option('site_nav_sp_sidemenu')          ? get_option('site_nav_sp_sidemenu')        : 'MENU';
  $authorName   = get_option('site_nav_sp_sideauthor_name')   ? get_option('site_nav_sp_sideauthor_name') : '運営者名';
  $authorMail   = get_option('site_nav_sp_sideauthor_mail')   ? get_option('site_nav_sp_sideauthor_mail') : 'SAMPLE@SAMPLE.COM';
  $darkModeOn   = get_option('site_bone_dark')                ? get_option('site_bone_dark')              : false;

?>

<ul id="mobile-sidenav" class="sidenav">

  <?php if ($sideAuthor == false) : ?>
    <li class="sidenav_author_list">
      <div class="user-view">
        <div class="background">
          <img data-src="<?php echo $authorBk ?>" class="fadeinimg lazyload" alt="運営者プロフィール背景画像">
        </div>
        <a href="#profile">
          <img data-src="<?php echo $authorImg ?>" class="fadeinimg lazyload circle" alt="運営者画像">
        </a>
        <a href="#name">
          <span class="white-text name">
            <?php echo $authorName ?>
          </span>
        </a>
        <a href="mailto:<?php echo $authorMail ?>">
          <span class="white-text sns">
            <?php echo $authorMail ?>
          </span>
        </a>
      </div>
    </li>
  <?php endif; ?>

  <?php if ($sidenavMenu == false) : ?>
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

  <?php if($darkModeOn==true): ?>
    <li class="side_nav_dark_switch">
      <h3 class="sidenav_ttl">Light → Dark</h3>
      <div class="switch">
        <label for="mode_switch">
          Off
          <input id="mode_switch" type="checkbox">
          <span class="lever"></span>
          On
        </label>
      </div>
    </li>
  <?php endif; ?>

</ul>
