<?php

  $onlyLogo = get_option('only_logo');
  $logo = get_theme_mod('custom_logo');
  $logoUrl	 = wp_get_attachment_url( $logo );

// ホーム画面ではサイトタイトルにh1、それ以外では記事タイトルにh1
if(is_home() || is_front_page()) {

  $title_tag_start = '<h1>';
  $title_tag_end = '</h1>';

} else {

  $title_tag_start = '<p>';
  $title_tag_end =  '</p>';

}// END ishome()||is_front_page()

 ?>


<nav>
  <div class="nav-wrapper">
    <?php echo $title_tag_start; ?>
    <a href="<?php echo home_url(); ?>" class="brand-logo siteTitle">
      <?php if(has_custom_logo()): ?>
        <img src="<?php echo $logoUrl ?>" alt="ロゴ" class="custom-logo" />
      <?php endif; ?>
      <?php if ($onlyLogo == false) { bloginfo('name'); } ?>
    </a>
    <?php echo $title_tag_end; ?>
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
    'before' => '<li class="sidenav-ttl"><i class="material-icons">apps</i>MENU</li>',
    'fallback' => ''
  ));
?>
