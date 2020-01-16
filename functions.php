<?php

//////////////////////////////
//セットアップ内容
//////////////////////////////

include ('lib/functions/for_setup/i_head_clean_up.php');
include ('lib/functions/for_setup/ii_theme_support.php');
include ('lib/functions/for_setup/iii_customizer.php');
include ('lib/functions/for_setup/iiii_add_head_css.php');
include ('lib/functions/for_setup/iiiii_register_widgets.php');
include ('lib/functions/for_setup/iiiiii_add_shortcode.php');

function setup(){

  /** 1 <head>タグ内不要なコードの削除 **/
  add_action('init'               , 'head_clean_up');

  /** 2 できること追加する **/
  add_action('init'               , 'theme_supports');

  /** 3 オリジナルのカスタマイザー追加 **/
  add_action('customize_register' , 'org_customizer');

  /** 4 カスタマイザーの項目に伴うCSSの追加 **/
  add_action('wp_head'            , 'add_customizerCSS');

  /** 5 ウィジェットやウィジェットエリアの追加 **/
  add_action('widgets_init'       , 'register_widgets');

  /** 6 ショートコードの登録！ **/
  add_action('init'               , 'add_shortcodes');

}

add_action('after_setup_theme', 'setup');

/////////////////////////////
//テンプレート用関数
/////////////////////////////

include ('lib/functions/for_template/functions.php');

function filters(){

  /** タグのフォントサイズ修正 **/
  add_filter('widget_tag_cloud_args', 'tag_font_size');

  /** post-countの出力変更 **/
  add_filter('wp_list_categories'   , 'remove_post_count_parentheses');
  add_filter('get_archives_link'    , 'remove_post_count_parentheses');
  add_filter('wp_tag_cloud'         , 'wp_tag_cloud_custom_ex');

  // /** ナビメニューのあれこれ **/
  // add_filter('nav_menu_css_class'   , 'active_nav_class');
  // add_filter('nav_menu_css_class'   , 'sp_menu_classes');

  /** 最初の見出し前に広告 **/
  add_filter('the_content'          , 'add_ad_before_h2');

  /** 目次挿入 **/
  add_filter('the_content'          , 'add_index_to_content');

  /** 見出しにクラス付与 **/
  add_filter('the_content'          , 'add_heading_class');

  /** lazyloadの適用 **/
  add_filter('the_content'          , 'convert_src_for_lazyload');
  add_filter('the_content'          , 'add_lazyload_class');

  /** プロフィールボックス拡張 **/
  add_filter('user_contactmethods'  , 'author_profile_box');

  /** コメント欄のタグ制限 **/
  add_filter('comments_open'        , 'filter_comment_tags');
  add_filter('pre_comment_approved' , 'filter_comment_tags');

  /** コメント欄でURL無効 **/
  remove_filter('comment_text'      , 'make_clickable');

  /** 記事埋め込み embed **/
  remove_action('embed_head'        , 'print_embed_styles');
  remove_action('embed_footer'      , 'print_embed_sharing_dialog');
  add_action('embed_head'           , 'my_embed_styles');

}

add_action('init', 'filters');

/////////////////////////////
//管理画面から更新ができるように
/////////////////////////////

require ('vendor/plugin-update-checker/plugin-update-checker.php');

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://withdiv.com/theme.json',
    __FILE__,
    'bone'
);
