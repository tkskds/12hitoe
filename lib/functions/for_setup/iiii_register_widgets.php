<?php

//////////////////////////////
// 4 ウィジェットの新規登録
//////////////////////////////

function register_widgets(){

  /****************
  // 通常のサイドバー
  ****************/
  register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side_widget',
    'description' => '通常のサイドバーです。',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar_title">',
    'after_title' => '</h4>',
    ));

  /****************
  // 固定サイドバー
  ****************/
  register_sidebar(array(
    'name'=>'固定サイドバー',
    'id' => 'fixed_side_widget',
    'description' => 'スクロールに追従する固定サイドバーです。',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar_title">',
    'after_title' => '</h4>',
    ));

  /****************
  // サイドメニュー
  ****************/
  register_sidebar(array(
    'name'=>'サイドメニュー',
    'id' => 'sidenav_widget',
    'description' => 'スマホでのみ表示されるサイドメニューです',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidenav_widget_title">',
    'after_title' => '</h4>',
    ));

  /****************
  // フッター左
  ****************/
  register_sidebar(array(
    'name' => 'フッターウィジェット（左）',
    'id' => 'footer_left_widget',
    'description' => 'フッターの左側に表示されるウィジェットです。真ん中と右のフッターウィジェットに何も配置されていない場合は左詰めになります。',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="footer_w_title">',
    'after_title' => '</h4>',
  ));

  /****************
  // フッター真ん中
  ****************/
  register_sidebar(array(
    'name' => 'フッターウィジェット（真ん中）',
    'id' => 'footer_center_widget',
    'description' => 'フッターの真ん中に表示されるウィジェットです。左と右のフッターウィジェットに何も配置されていない場合は左詰めになります。',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="footer_w_title">',
    'after_title' => '</h4>',
  ));

  /****************
  // フッター右
  ****************/
  register_sidebar(array(
    'name' => 'フッターウィジェット（右）',
    'id' => 'footer_right_widget',
    'description' => 'フッターの右側に表示されるウィジェットです。左と真ん中のフッターウィジェットに何も配置されていない場合は左詰めになります。',
    'before_widget'=>'<div id="%1$s" class="widget %2$s">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="footer_w_title">',
    'after_title' => '</h4>',
  ));

  /****************
  // 目次
  ****************/
  class TOC_Widget extends WP_Widget{

    function __construct(){
  		parent::__construct('toc_widget','目次',array(
        'description' => '記事の目次を表示します',
      ));
  	}

  	public function widget($args, $instance){
  	$toc_ttl = get_option('site_article_toc_ttl') ? get_option('site_article_toc_ttl') : 'CONTENT';
  		echo $args['before_widget'];
  		echo '<div class="toc tocType2"><div class="toc_ttl">'.$toc_ttl.'</div><div class="aside_toc_body"></div></div>';
      echo $args['after_widget'];
  	}

    public function form( $instance ){

    }
  }
  register_widget('TOC_Widget');

} //END register_widgets()
