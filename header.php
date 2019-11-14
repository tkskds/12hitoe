<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: http://ogp.me/ns#">
    <?php get_template_part('parts/head/meta') ?>
    <?php get_template_part('parts/head/link') ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

<?php

    //カスタマイズ画面から選択した骨組みやFWによって呼び出す部分テンプレートを変更する
      $cssfw = get_option('site_cssfw_choice');

      if ($cssfw == 'value1'){
        get_template_part('parts/header/header_contents');
      }elseif ($cssfw == 'value2'){
        get_template_part('parts/header/header_contents_mt');
      }elseif ($cssfw == 'value3'){
        get_template_part('parts/header/header_contents_bs');
      }else{
        //子テーマの特定ファイルを呼び出す関数
      }
?>
