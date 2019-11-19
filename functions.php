<?php

require_once ('lib/functions/for_setup/i_head_clean_up.php');
require_once ('lib/functions/for_setup/ii_theme_support.php');
require_once ('lib/functions/for_setup/iii_org_customizer.php');
require_once ('lib/functions/for_setup/iiii_register_widgets.php');


//////////////////////////////
//セットアップ内容
//////////////////////////////
function setup(){

  /** 1 <head>タグを綺麗にする！ **/
  add_action('init', 'head_clean_up');

  /** 2 できること追加する！ **/
  add_action('init', 'theme_supports');

  /** 3 オリジナルのカスタマイザー追加！ **/
  add_action('customize_register', 'org_customizer');

  /** 4 ウィジェット追加！ **/
  add_action('widgets_init', 'register_widgets');

  /** 5  **/


}//END sets_up();
add_action('after_setup_theme', 'setup');
