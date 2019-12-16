<?php

//////////////////////////////
// 4 ウィジェットの新規登録
//////////////////////////////

function register_widgets(){

/*****  ウィジェットエリア登録  ******/

  /****************
  通常のサイドバー
  ****************/
  register_sidebar(array(
    'name'          => 'サイドバー',
    'id'            => 'side_widget',
    'description'   => '通常のサイドバーです。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="sidebar_title">',
    'after_title'   => '</h4>',
    ));

  /****************
  固定サイドバー
  ****************/
  register_sidebar(array(
    'name'          => '固定サイドバー',
    'id'            => 'fixed_side_widget',
    'description'   => 'スクロールに追従する固定サイドバーです。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="sidebar_title">',
    'after_title'   => '</h4>',
    ));

  /****************
  サイドメニュー
  ****************/
  register_sidebar(array(
    'name'          => 'サイドメニュー',
    'id'            => 'sidenav_widget',
    'description'   => 'スマホでのみ表示されるサイドメニューです',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="sidenav_widget_title">',
    'after_title'   => '</h4>',
    ));

  /****************
  最初の見出しの前
  ****************/
  register_sidebar(array(
    'name'          => '記事内の見出し前',
    'id'            => 'ad_before_h2',
    'description'   => '記事内の最初の見出し前です。広告など設置するのにご使用いただけます。（注意：目次は自動挿入されるため設置不要です）',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ));

  /****************
  記事内最後
  ****************/
  register_sidebar(array(
    'name'          => '記事内の最下部',
    'id'            => 'ad_after_content',
    'description'   => '記事内の最下部です。広告など設置するのにご使用いただけます。',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ));

  /****************
  フッター左
  ****************/
  register_sidebar(array(
    'name'          => 'フッターウィジェット（左）',
    'id'            => 'footer_left_widget',
    'description'   => 'フッターの左側に表示されるウィジェットです。真ん中と右のフッターウィジェットに何も配置されていない場合は左詰めになります。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="footer_w_title">',
    'after_title'   => '</h4>',
  ));

  /****************
  フッター真ん中
  ****************/
  register_sidebar(array(
    'name'          => 'フッターウィジェット（真ん中）',
    'id'            => 'footer_center_widget',
    'description'   => 'フッターの真ん中に表示されるウィジェットです。左と右のフッターウィジェットに何も配置されていない場合は左詰めになります。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="footer_w_title">',
    'after_title'   => '</h4>',
  ));

  /****************
  フッター右
  ****************/
  register_sidebar(array(
    'name'          => 'フッターウィジェット（右）',
    'id'            => 'footer_right_widget',
    'description'   => 'フッターの右側に表示されるウィジェットです。左と真ん中のフッターウィジェットに何も配置されていない場合は左詰めになります。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="footer_w_title">',
    'after_title'   => '</h4>',
  ));

/*****  ウィジェット登録  ******/

  /****************
  目次
  ****************/
  class TOC_Widget extends WP_Widget{
    function __construct(){
  		parent::__construct('toc_widget','目次',array(
        'description' => '記事の目次を表示します',
      ));
  	}
  	public function widget($args, $instance){
  	$toc_ttl    = $instance['toc_ttl'] ? $instance['toc_ttl'] : 'CONTENT' ;
    $tocOff     = get_option('site_article_toc');
    $tocOnPage  = get_option('site_article_toc_page');
    if ($tocOff == false && is_single() || $tocOnPage == true && is_page()){
    		echo $args['before_widget'];
    		echo '<h4 class="sidebar_title">'.$toc_ttl.'</h4><div class="widget_toc_body"></div></div>';
        echo $args['after_widget'];
      }
  	}
    public function form($instance){
      $toc_ttl  = $instance['toc_ttl'];
      $toc_id   = $this->get_field_id('toc_ttl');
      ?>
      <p>
        <label for="<?php echo $toc_id; ?>">タイトル:</label>
        <input class="widefat" id="<?php echo $toc_id; ?>" type="text" value="<?php echo esc_attr($toc_ttl); ?>">
      </p>
      <?php
    }
    function update($new_instance, $old_instance) {
      if(!filter_var($new_instance['toc_ttl'],FILTER_VALIDATE_EMAIL)){
        return false;
      }
      return $new_instance;
}
  }
  register_widget('TOC_Widget');

} //END register_widgets()
