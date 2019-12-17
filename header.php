<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: http://ogp.me/ns#">
    <?php get_template_part('parts/head/meta') ?>
    <?php get_template_part('parts/head/link') ?>
    <?php wp_head(); ?>
  </head>

<?php $fixanm  = get_option('site_nav_fixed_top_anime') ? get_option('site_nav_fixed_top_anime') : false ;?>

  <body <?php body_class(); ?><?php if($fixanm == true){echo ' data-delighter="start:-0.01;end:-99999"';} ?>>
    <div class="headerArea">

<?php

$priority = get_option('site_bone_priority')      ? get_option('site_bone_priority')      : false    ;
$cssfw    = get_option('site_cssfw_choice')       ? get_option('site_cssfw_choice')       : 'value2' ;
$sitetype = get_option('site_bone_type')          ? get_option('site_bone_type')          : 'value1' ;
$nothome  = get_option('site_dyheader_notTop')    ? get_option('site_dyheader_notTop')    : false    ;
$news     = get_option('site_carousel_news_on')   ? get_option('site_carousel_news_on')   : false    ;
$newstext = get_option('site_carousel_news')      ? get_option('site_carousel_news')      : 'SAMPLE' ;
$newsurl  = get_option('site_carousel_news_link') ? get_option('site_carousel_news_link') : '#';

      //ナビメニューより先にダイナミックヘッダー呼び出す設定で、
      if ($sitetype == 'value3' && $priority == true || $sitetype == 'value4' && $priority == true ){
        // ホーム画面である or カスタマイザーの設定（ホーム画面以外でもダイナミックヘッダー表示）がONになってる
        if( is_home() || is_front_page() || $nothome == true && is_single() || $nothome == true && is_page()){
          get_template_part('parts/header/dynamic_header_contents');
        }
      }

      // CSSフレームワークが開発者向けのものでなければマテリアライズのを呼び出す
      if ($cssfw != 'value1'){
        get_template_part('parts/header/header_contents');
      }

      //ナビメニューより先にダイナミックヘッダー呼び出す設定でなく、
      if ($sitetype == 'value3' && $priority == false || $sitetype == 'value4' && $priority == false ){
        // ホーム画面である or カスタマイザーの設定（ホーム画面以外でもダイナミックヘッダー表示）がONになってる
        if( is_home() || is_front_page() || $nothome == true && is_single() || $nothome == true && is_page()){
          get_template_part('parts/header/dynamic_header_contents');
        }
      }

      //サイトのタイプがLP風ならフューチャー呼び出し
      if( $sitetype == 'value4' && is_home() || $sitetype == 'value4' && is_front_page()) {
        get_template_part('parts/others/features');
      }
?>

    </div>
    <?php if($news == true): ?>
      <a  href="<?php echo $newsurl ?>" class="news">
        <span><?php echo $newstext ?></span>
      </a>
    <?php endif; ?>
