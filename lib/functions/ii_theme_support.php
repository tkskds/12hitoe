<?php

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
