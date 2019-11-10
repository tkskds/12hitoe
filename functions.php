<?php

require_once ('lib/functions/i_head_clean_up.php');
require_once ('lib/functions/ii_theme_support.php');
require_once ('lib/functions/iii_org_customizer.php');
require_once ('lib/functions/iiii_register_widgets.php');


//////////////////////////////
//セットアップ内容
//////////////////////////////
function sets_up(){

  /** 1 <head>タグを綺麗にする！ **/
  add_action('init', 'head_clean_up');

  /** 2 できること追加する！ **/
  add_action('init', 'theme_support');

  /** 3 オリジナルのカスタマイザー追加！ **/
  add_action('customize_register', 'org_customizer');

  /** 4 ウィジェット追加！ **/
  add_action('widgets_init', 'register_widgets');

  /** 5 CSSの切り替え **/
  /** 6  **/


}//END sets_up();
add_action('after_setup_theme', 'sets_up');
