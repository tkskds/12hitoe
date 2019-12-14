<?php

  $onlyLogo        = get_option('only_logo');
  $logo            = get_theme_mod('custom_logo');
  $logoUrl	       = wp_get_attachment_url( $logo );

// ホーム画面ではサイトタイトルにh1、それ以外では記事タイトルにh1
if(is_home() || is_front_page()) {
  $title_tag_start = '<h1>';
  $title_tag_end   = '</h1>';
} else {
  $title_tag_start = '<p>';
  $title_tag_end   =  '</p>';
}// END ishome()||is_front_page()

  $centering       = get_option('site_nav_centering_title') ? get_option('site_nav_centering_title') : false    ;
  $fixed           = get_option('site_nav_fixed_top')       ? get_option('site_nav_fixed_top')       : false    ;
  $menuIcon        = get_option('site_nav_menu_icon')       ? get_option('site_nav_menu_icon')       : 'value1' ;
  $extend          = get_option('site_nav_extended')        ? get_option('site_nav_extended')        : false    ;
  $extend_text     = get_option('site_nav_extended_text')   ? get_option('site_nav_extended_text')   : 'SAMPLE' ;
  $extend_uri      = get_option('site_nav_extended_uri')    ? get_option('site_nav_extended_uri')    : 'https://takasaki.work/12hitoe' ;

 ?>

<?php if($fixed  == true){echo '<div class="navbar-fixed">'; } ?>
<nav<?php if($extend == true){echo ' class="nav-extended"';} ?>>
  <div class="nav-wrapper">
    <?php echo $title_tag_start; ?>
    <a href="<?php echo home_url(); ?>" class="brand-logo siteTitle<?php if ($centering == true) { echo ' center'; } ?>">
      <?php if(has_custom_logo()): ?>
        <img src="<?php echo $logoUrl ?>" alt="ロゴ" class="custom-logo lazeload" />
      <?php endif; ?>
      <?php if ($onlyLogo == false) { bloginfo('name'); } ?>
    </a>
    <?php echo $title_tag_end; ?>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger">
      <?php switch ($menuIcon) {
              case 'value1':
                echo '<i class="fas fa-bars"></i>';
                break;
              case 'value2':
                echo '<i class="fas fa-ellipsis-v"></i>';
                break;
              case 'value3':
                echo '<i class="fas fa-ellipsis-h"></i>';
                break;
              case 'value4':
                echo '<i class="fas fa-hamburger"></i>';
                break;
            }
      ?>
    </a>
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
  <?php if($extend == true): ?>
    <div class="nav-content">
      <span><?php echo $extend_text ?></span>
      <a class="btn-floating btn-large halfway-fab waves-effect" href="<?php echo $extend_uri ?>">
        <i class="fas fa-link"></i>
      </a>
    </div>
  <?php endif; ?>
</nav>
<?php if ($fixed == true){ echo '</div>'; } ?>

<?php get_template_part('sp_nav_menu') ?>
<?php
  wp_nav_menu(array(
    'theme_location' => 'nav_header_sp',
    'container' => 'ul',
    'menu_id' => 'mobile-demo',
    'menu_class' => 'sidenav',
    // 'before' => '<li class="sidenav-ttl">MENU</li>',
    'fallback' => ''
  ));
?>
