<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header id="header">
      <div class="header__inner">
        <!--フロント以外のページでは<h1>タグを使わない-->
        <?php
        if(is_home() || is_front_page()) {
          $title_tag_start = '<h1 class="site-title">';
          $title_tag_end = '</h1>';
        } else {
          $title_tag_start = '<p class="site-title">';
          $title_tag_end =  '</p>';
        }
        ?>
        <!--タイトルを画像に-->
        <div class="site_title_wrap">
          <?php echo $title_tag_start; ?>
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/images/title.png">
          </a>
          <?php echo $title_tag_end; ?>
        </div>
        <!--タイトルを文字に-->
        <div class="site_title_wrap">
          <?php echo $title_tag_start; ?>
          <a href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?>
          </a>
          <?php echo $title_tag_end; ?>
        </div>

        <!--ナビメニュー-->
        <div id="header_nav_wrap" class="header_nav_wrap">
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

      </div>
    </header>
