<?php
if(is_home() || is_front_page()) {
  $title_tag_start = '<h1 class="siteTitle">';
  $title_tag_end = '</h1>';
} else {
  $title_tag_start = '<p class="siteTitle">';
  $title_tag_end =  '</p>';
}
?>

<nav>
  <div class="nav-wrapper">

    <div class="site-title-wrapper">
      <?php echo $title_tag_start; ?>
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri() ?>/images/title.png">
      </a>
      <?php echo $title_tag_end; ?>
      <?php echo $title_tag_start; ?>
      <a href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
      </a>
      <?php echo $title_tag_end; ?>
    </div><!--END site_title_wrap-->

    <!--ナビメニュー-->
    <ul>
      <div class="nav-menu-wrapper">
        <?php
          if (wp_is_mobile()){
            wp_nav_menu(array(
              'theme_location' => 'nav_header_sp',
              'container' => 'nav',
              'container_class' => 'nav_header_sp',
              'container_id' => 'nav_header_sp',
              'fallback' => ''
            ));
          } else {
            wp_nav_menu(array(
              'theme_location' => 'nav_header',
              'container' => 'nav',
              'container_class' => 'nav_header',
              'container_id' => 'nav_header',
              'fallback' => ''
            ));
          }
        ?>
      </div>
    </ul><!--ヘッダーナビ-->

  </div>
</nav>
