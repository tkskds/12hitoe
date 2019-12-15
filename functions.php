<?php

//////////////////////////////
//セットアップ内容
//////////////////////////////

require_once ('lib/functions/for_setup/i_head_clean_up.php');
require_once ('lib/functions/for_setup/ii_theme_support.php');
require_once ('lib/functions/for_setup/iii_customizer.php');
require_once ('lib/functions/for_setup/iiii_add_head_css.php');
require_once ('lib/functions/for_setup/iiiii_register_widgets.php');
require_once ('lib/functions/for_setup/iiiiii_add_shortcode.php');

function setup(){

  /** 1 <head>タグ内不要なコードの削除 **/
  add_action('init', 'head_clean_up');

  /** 2 できること追加する **/
  add_action('init', 'theme_supports');

  /** 3 オリジナルのカスタマイザー追加 **/
  add_action('customize_register', 'org_customizer');

  /** 4 カスタマイザーの項目に伴うCSSの追加 **/
  add_action('wp_head', 'add_customizerCSS');

  /** 5 ウィジェットやウィジェットエリアの追加 **/
  add_action('widgets_init', 'register_widgets');

  /** 6 ショートコードの登録！ **/
  add_action('init', 'add_shortcodes');

}

add_action('after_setup_theme', 'setup');

/////////////////////////////
//テンプレート用の関数
/////////////////////////////

require      ('lib/functions/for_template/functions.php');

/////////////////////////////
//管理画面から更新ができるように
/////////////////////////////

require      ('vendor/plugin-update-checker/plugin-update-checker.php');

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://takasaki.work/12hitoe/theme.json',
    __FILE__,
    'bone'
);
