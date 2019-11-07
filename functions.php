<?php

//////////////////////////////
//セットアップ内容
//////////////////////////////
function sets_up(){

  /** 1 <head>タグを綺麗にする！ **/
  add_action('init', 'head_clean_up');

  /** 2 できること追加する！ **/
  add_action('init', 'theme_support');

  /** 3 カスタマイザーの項目追加 **/

  /** 4 ウィジェットの項目追加 **/
  add_action('widgets_init', 'register_widgets');

  /** 5 CSSの切り替え **/
  /** 6  **/


}//END sets_up();
add_action('after_setup_theme', 'sets_up');

//////////////////////////////
// 1 <head>タグを綺麗にする
//////////////////////////////

function head_clean_up(){

  // WPバージョンの削除
  remove_action('wp_head', 'wp_generator');
  // フィードリンクの削除（ブログ要素が全くない場合は上段の削除もやぶさかでない）
  //remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  // ショートリンクの削除
  remove_action('wp_head', 'wp_shortlink_wp_head');
  // Windows Live Writerリンクの削除
  remove_action('wp_head', 'wlwmanifest_link');
  // RSDリンクの削除
  remove_action('wp_head', 'rsd_link');
  // 自動挿入される<p>タグの削除
  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');
  // 絵文字リンクの削除
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

}//END head_clean_up();

//////////////////////////////
// 2 テーマサポート
//////////////////////////////

function theme_supports(){

  //HTML5を使用可能に
  add_theme_support('html5',array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption')
  );
  //アイキャッチ画像使用可能に
  add_theme_support('post-thumbnails');
  //メニューを使用可能に
  add_theme_support('menus');
  //タイトルタグをよしなに
  add_theme_support('title-tag');

  //メニューの有効化
  register_nav_menu( 'nav_header',  'ヘッダーメニュー（PC）' );
  register_nav_menu( 'nav_header_sp',  'ヘッダーメニュー（スマホ）' );
  register_nav_menu( 'nav_footer',  'フッターナビゲーション（PC・スマホ共用）' );


}//END theme_supports();



//////////////////////////////
//////////////////////////////



//////////////////////////////
// 4 ウィジェットの新規登録
//////////////////////////////

function register_widgets(){
  register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side_widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar_wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar_title">',
    'after_title' => '</h4>'
    ));
}


//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
//////////////////////////////
