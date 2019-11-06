<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="<?php echo get_style_sheet_uri(); ?>">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header id="header">
      <div class="header__inner">
        <!--フロント以外のページでは<h1>タグを使わない-->
        <?php
          if (is_home()||is_front_page()) {
            $title_tag_start = '<h1 class="site_title">'
            // $title_tag_end = '</h1>'
          }else{
            $title_tag_start = '<p class="site_title">'
            $title_tag_end = '</p>'
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

        <!--スマホ用メニューボタン-->
        <button type="button" id="nav_button" class="nav_button">
          <i class="fas fa-bars"></i>
        </button>

        <!--ナビメニュー-->
        <div id="header_nav_wrap" class="header_nav_wrap">
          <?php
           wp_nav_menu(array(
             'theme_location' => 'header_nav',
             'container' => 'nav',
             'container_class' => 'header_nav',
             'container_id' => 'header_nav',
             'fallback' => ''
           ));
          ?>
        </div>

      </div>
    </header>
