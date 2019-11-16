<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: http://ogp.me/ns#">
    <?php get_template_part('parts/head/meta') ?>
    <?php get_template_part('parts/head/link') ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

<?php

$priority = get_option('site_bone_priority');
$cssfw = get_option('site_cssfw_choice');
$dyheader = get_option('site_bone_type');



      if ($dyheader == 'value3' && $priority == true || $dyheader == 'value4' && $priority == true  ){
        get_template_part('parts/header/dynamic_header_contents');
      }

      if ($cssfw == 'value1'){
        get_template_part('parts/header/header_contents');
      }elseif ($cssfw == 'value2'){
        get_template_part('parts/header/header_contents_mt');
      }elseif ($cssfw == 'value3'){
        get_template_part('parts/header/header_contents_bs');
      }else{
        //開発者用テンプレートを選択した場合は子テーマのCSSファイルを呼び出す
      }

      if ($dyheader == 'value3' && $priority == false || $dyheader == 'value4' && $priority == false ){
        get_template_part('parts/header/dynamic_header_contents');
      }



?>
