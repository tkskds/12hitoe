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
  add_image_size('eyecatch', 520, 300, true);//アイキャッチ用
  add_image_size('minimum', 80, 80, true);//関連記事、人気記事用


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

}//END theme_supports();
