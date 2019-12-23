<?php

//////////////////////////////
// 2 テーマサポート
//////////////////////////////

function theme_supports(){

  /****************
  //HTML5を使用可能に
  ****************/
  add_theme_support('html5',array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption')
  );

  /****************
  //カスタマイザーからロゴ使用可能に
  ****************/

  add_theme_support('custom-logo');

  /****************
  //アイキャッチ画像使用可能に
  ****************/
  add_theme_support('post-thumbnails');
  add_image_size('eyecatch', 520, 300, true );


  /****************
  //メニューを使用可能に
  ****************/
  add_theme_support('menus');

  /****************
  //タイトルタグをよしなに
  ****************/
  add_theme_support('title-tag');

  /****************
  //メニューの有効化
  ****************/
  register_nav_menu('nav_header', 'ヘッダーメニュー（PC）');
  register_nav_menu('nav_header_sp', 'ヘッダーメニュー（スマホ）');
  register_nav_menu('nav_footer', 'フッターメニュー（PC・スマホ）');

  /****************
  //コメント関係
  ****************/
  /*URL無効*/
  remove_filter('comment_text', 'make_clickable');
  /*タグ制限*/
  add_filter('comments_open', 'filter_comment_tags');
  add_filter('pre_comment_approved', 'filter_comment_tags');
  function filter_comment_tags($data){
    global $allowedtags;
    unset($allowedtags['a']);
    unset($allowedtags['abbr']);
    unset($allowedtags['acronym']);
    unset($allowedtags['b']);
    unset($allowedtags['div']);
    unset($allowedtags['cite']);
    unset($allowedtags['code']);
    unset($allowedtags['del']);
    unset($allowedtags['em']);
    unset($allowedtags['i']);
    unset($allowedtags['q']);
    unset($allowedtags['strike']);
    unset($allowedtags['strong']);
    return $data;
  }

}//END theme_supports();
