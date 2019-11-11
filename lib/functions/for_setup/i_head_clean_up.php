<?php

//////////////////////////////
// 1 <head>タグを綺麗にする
//////////////////////////////

function head_clean_up(){

  /****************
  // WPバージョンの削除
  ****************/
  remove_action('wp_head', 'wp_generator');

  /****************
  // フィードリンクの削除（ブログ要素が全くない場合は上段の削除もやぶさかでない）
  ****************/
  // remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);

  /****************
  // ショートリンクの削除
  ****************/
  remove_action('wp_head', 'wp_shortlink_wp_head');

  /****************
  // Windows Live Writerリンクの削除
  ****************/
  remove_action('wp_head', 'wlwmanifest_link');

  /****************
  // RSDリンクの削除
  ****************/
  remove_action('wp_head', 'rsd_link');

  /****************
  ****************/
  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');

  /****************
  // 絵文字リンクの削除
  ****************/
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

}//END head_clean_up();
