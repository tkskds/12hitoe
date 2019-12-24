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
    'name'          => '記事内の下部（シェアボタン前）',
    'id'            => 'ad_after_content',
    'description'   => '記事内の最下部です。広告など設置するのにご使用いただけます。',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ));

  register_sidebar(array(
    'name'          => '記事内の下部（シェアボタン後）',
    'id'            => 'ad_bottom_content',
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
      		echo '<h4 class="sidebar_title">'.$toc_ttl.'</h4><div class="widget_toc_body"></div>';
          echo $args['after_widget'];
        }
  	}
    public function form($instance){
      $toc_ttl  = $instance['toc_ttl'];
      $toc_name = $this->get_field_name('toc_ttl');
      $toc_id   = $this->get_field_id('toc_ttl');
      ?>
      <p>
        <label for="<?php echo $toc_id; ?>">タイトル:</label>
        <input class="widefat" id="<?php echo $toc_id; ?>" name="<?php echo $toc_name ?>" type="text" value="<?php echo esc_attr($toc_ttl); ?>">
      </p>
      <?php
    }
    public function update($new_instance, $old_instance) {
      $instance = array();
      $instance['toc_ttl'] = (!empty($new_instance['toc_ttl'])) ? $new_instance['toc_ttl'] : '' ;
      return $instance;
    }
  }

  /****************
  CTA
  ****************/
  class CTA_Widget extends WP_Widget{
    function __construct(){
  		parent::__construct('cta_widget','CTA',array(
        'description' => 'CTA（call to action）を表示します',
      ));
  	}
  	public function widget($args, $instance){
      $cta_img  = $instance['cta_img'];
      $cta_ttl  = $instance['cta_ttl'] ? $instance['cta_ttl']  : 'CTA TITLE';
      $cta_text = $instance['cta_text']? $instance['cta_text'] : 'CTAはこんな感じで表示されます。';
      $cta_btn  = $instance['cta_btn'] ? $instance['cta_btn']  : 'CLICK ME' ;
      $cta_url  = $instance['cta_url'] ? $instance['cta_url']  : '#' ;

  		echo $args['before_widget'];
  		echo '<div class="cta">'.
           '<div class="cta_body delighter">';
      if(!empty($cta_img)){
      echo '<div class="cta_img_area">'.
           '<img width="200" data-src="'.$cta_img.'" alt="CTAエリアイメージ" class="lazyload fadeinimg">'.
           '</div>';
      }
      echo '<div class="cta_text_area">'.
           '<h4 class="cta_ttl">'.$cta_ttl.'</h4>'.
           '<div class="cta_text">'.$cta_text.'</div>'.
           '<a href="'.$cta_url.'" class="btn waves-effect cta_btn delighter" data-delighter="start:0.6">'.$cta_btn.'</a>'.
           '</div></div></div>';
      echo $args['after_widget'];
  	}
    public function form($instance){
      $cta_img  = $instance['cta_img'];
      $img_name = $this->get_field_name('cta_img');
      $img_id   = $this->get_field_id('cta_img');
      $cta_ttl  = $instance['cta_ttl'] ? $instance['cta_ttl']  : 'CTA TITLE';
      $cta_n1   = $this->get_field_name('cta_ttl');
      $cta_id1  = $this->get_field_id('cta_ttl');
      $cta_text = $instance['cta_text']? $instance['cta_text'] : 'CTAはこんな感じで表示されます。';
      $cta_n2   = $this->get_field_name('cta_text');
      $cta_id2  = $this->get_field_id('cta_text');
      $cta_btn  = $instance['cta_btn'] ? $instance['cta_btn']  : 'CLICK ME' ;
      $cta_n3   = $this->get_field_name('cta_btn');
      $cta_id3  = $this->get_field_id('cta_btn');
      $cta_url  = $instance['cta_url'] ? $instance['cta_url']  : '#' ;
      $cta_n4   = $this->get_field_name('cta_url');
      $cta_id4  = $this->get_field_id('cta_url');
      ?>
      <p>
        <label for="<?php echo $img_id; ?>">イメージ画像</label><br>
        <?php
            $show_sml   = '';
            $show_img = '';
            if (empty($cta_img)){
              $show_img = ' style="display: none;" ';
            }else{
              $show_sml = ' style="display: none;" ';
            }
        ?>
        <small class="fixed-image-text " <?php echo $show_sml; ?>>画像が未選択です</small>
        <p><img class="fixed-image-view" src="<?php echo $cta_img; ?>" width="260" <?php echo $show_img; ?>></p>
        <input class="fixed-image-url" id="<?php echo $img_id; ?>" name="<?php echo $img_name ?>" type="text" value="<?php echo $cta_img; ?>">
        <button type="button" class="fixed-select-image">画像を選択</button>
        <button type="button" class="fixed-delete-image" <?php echo $show_img; ?>>画像を削除</button>
        <script>
          jQuery(document).ready(function($) {
            var frame;
            const placeholder = jQuery('.fixed-image-text');
            const imageUrl = jQuery('.fixed-image-url');
            const imageView = jQuery('.fixed-image-view');
            const deleteImage = jQuery('.fixed-delete-image');
            jQuery('.fixed-select-image').on('click', function(e){
              e.preventDefault();
              if ( frame ) {
                frame.open();
                return;
              }
              frame = wp.media({
                title: '画像を選択',
                library: {
                  type: 'image'
                },
                button: {
                  text: '画像を追加する'
                },
                multiple: false
              });
              frame.on('select', function(){
                var images = frame.state().get('selection');
                images.each(function(file) {
                  placeholder.css('display', 'none');
                  imageUrl.val(file.toJSON().url);
                  imageView.attr('src', file.toJSON().url).css('display', 'block');
                  deleteImage.css('display', 'inline-block');
                });
                imageUrl.trigger('change');
              });
              frame.open();
            });
            jQuery('.fixed-delete-image').off().on('click', function(e){
              e.preventDefault();
              imageUrl.val('');
              imageView.css('display', 'none');
              deleteImage.css('display', 'none');
              imageUrl.trigger('change');
            });
          });
        </script>
      </p>
      <p>
        <label for="<?php echo $cta_id1; ?>">タイトル:</label>
        <input class="widefat" id="<?php echo $cta_id1; ?>" name="<?php echo $cta_n1 ?>" type="text" value="<?php echo esc_attr($cta_ttl); ?>">
      </p>
      <p>
        <label for="<?php echo $cta_id2; ?>">タイトル下のテキスト:</label>
        <input class="widefat" id="<?php echo $cta_id2; ?>" name="<?php echo $cta_n2 ?>" type="text" value="<?php echo esc_attr($cta_text); ?>">
      </p>
      <p>
        <label for="<?php echo $cta_id3; ?>">ボタン内のテキスト:</label>
        <input class="widefat" id="<?php echo $cta_id3; ?>" name="<?php echo $cta_n3 ?>" type="text" value="<?php echo esc_attr($cta_btn); ?>">
      </p>
      <p>
        <label for="<?php echo $cta_id4; ?>">ボタンのリンク先:</label>
        <input class="widefat" id="<?php echo $cta_id4; ?>" name="<?php echo $cta_n4 ?>" type="text" value="<?php echo esc_attr($cta_url); ?>">
      </p>
      <?php
    }
    public function update($new_instance, $old_instance) {
      $instance = array();
      $instance['cta_ttl']  = (!empty($new_instance['cta_ttl']))  ? $new_instance['cta_ttl']  : '' ;
      $instance['cta_text'] = (!empty($new_instance['cta_text'])) ? $new_instance['cta_text'] : '' ;
      $instance['cta_btn']  = (!empty($new_instance['cta_btn']))  ? $new_instance['cta_btn']  : '' ;
      $instance['cta_url']  = (!empty($new_instance['cta_url']))  ? $new_instance['cta_url']  : '' ;
      $instance['cta_img']  = (!empty($new_instance['cta_img']))  ? $new_instance['cta_img']  : '' ;
      return $instance;
    }
  }

  /****************
  タブボックス
  ****************/
  class TAB_Widget extends WP_Widget{
    function __construct(){
  		parent::__construct('tab_widget','タブ',array(
        'description' => 'タブボックスを表示します',
      ));
  	}
  	public function widget($args, $instance){
    	$tab_ttl     = $instance['tab_ttl']  ? $instance['tab_ttl']  : 'タブボックス' ;
    	$tab_ttl1    = $instance['tab_ttl1'] ? $instance['tab_ttl1'] : '<i class="fas fa-folder-open"></i>' ;
    	$tab_con1    = $instance['tab_con1'] ? $instance['tab_con1'] : 'タブボックス' ;
    	$tab_ttl2    = $instance['tab_ttl2'] ? $instance['tab_ttl2'] : '<i class="fas fa-pen-nib"></i>' ;
    	$tab_con2    = $instance['tab_con2'] ? $instance['tab_con2'] : 'タブボックス' ;
    	$tab_ttl3    = $instance['tab_ttl3'] ? $instance['tab_ttl3'] : '<i class="fas fa-fire"></i>' ;
    	$tab_con3    = $instance['tab_con3'] ? $instance['tab_con3'] : 'タブボックス' ;
    	$tab_ttl4    = $instance['tab_ttl4'] ? $instance['tab_ttl4'] : '<i class="fas fa-user-circle"></i>' ;
    	$tab_con4    = $instance['tab_con4'] ? $instance['tab_con4'] : 'test' ;
    		echo $args['before_widget'];
    		echo '<h4 class="sidebar_title">'.$tab_ttl.'</h4><div class="widget_tab_body row">'.
             '<div class="col s12"><ul class="tabs">'.
             '<li class="tab col s3"><a href="#tab1" aria-label="タブ1のボタン">'.$tab_ttl1.'</a></li>'.
             '<li class="tab col s3"><a href="#tab2" aria-label="タブ2のボタン">'.$tab_ttl2.'</a></li>'.
             '<li class="tab col s3"><a href="#tab3" aria-label="タブ3のボタン">'.$tab_ttl3.'</a></li>'.
             '<li class="tab col s3"><a href="#tab4" aria-label="タブ4のボタン">'.$tab_ttl4.'</a></li>'.
             '</ul></div>'.
             '<div id="tab1" class="col s12">'.$tab_con1.'</div>'.
             '<div id="tab2" class="col s12">'.$tab_con2.'</div>'.
             '<div id="tab3" class="col s12">'.$tab_con3.'</div>'.
             '<div id="tab4" class="col s12">'.$tab_con4.'</div></div>';
        echo $args['after_widget'];
  	}
    public function form($instance){
      $tab_ttl    = $instance['tab_ttl']  ? $instance['tab_ttl']  : 'タブボックス' ;
      $tab_name   = $this->get_field_name('tab_ttl');
      $tab_id     = $this->get_field_id('tab_ttl');
      $tab_ttl1   = $instance['tab_ttl1'] ? $instance['tab_ttl1'] : '<i class="fas fa-folder-open"></i>';
      $tab_ttl1n  = $this->get_field_name('tab_ttl1');
      $tab_ttl1id = $this->get_field_id('tab_ttl1');
      $tab_con1   = $instance['tab_con1'] ? $instance['tab_con1'] : 'タブボックス';
      $tab_con1n  = $this->get_field_name('tab_con1');
      $tab_con1id = $this->get_field_id('tab_con1');
      $tab_ttl2   = $instance['tab_ttl2'] ? $instance['tab_ttl2'] : '<i class="fas fa-pen-nib"></i>';
      $tab_ttl2n  = $this->get_field_name('tab_ttl2');
      $tab_ttl2id = $this->get_field_id('tab_ttl2');
      $tab_con2   = $instance['tab_con2'] ? $instance['tab_con2'] : 'タブボックス';
      $tab_con2n  = $this->get_field_name('tab_con2');
      $tab_con2id = $this->get_field_id('tab_con2');
      $tab_ttl3   = $instance['tab_ttl3'] ? $instance['tab_ttl3'] : '<i class="fas fa-fire"></i>';
      $tab_ttl3n  = $this->get_field_name('tab_ttl3');
      $tab_ttl3id = $this->get_field_id('tab_ttl3');
      $tab_con3   = $instance['tab_con3'] ? $instance['tab_con3'] : 'タブボックス';
      $tab_con3n  = $this->get_field_name('tab_con3');
      $tab_con3id = $this->get_field_id('tab_con3');
      $tab_ttl4   = $instance['tab_ttl4'] ? $instance['tab_ttl4'] : '<i class="fas fa-user-circle"></i>';
      $tab_ttl4n  = $this->get_field_name('tab_ttl4');
      $tab_ttl4id = $this->get_field_id('tab_ttl4');
      $tab_con4   = $instance['tab_con4'] ? $instance['tab_con4'] : 'test';
      $tab_con4n  = $this->get_field_name('tab_con4');
      $tab_con4id = $this->get_field_id('tab_con4');
      ?>
      <p>
        <label for="<?php echo $tab_id; ?>">タイトル:</label>
        <input class="widefat" id="<?php echo $tab_id; ?>" name="<?php echo $tab_name ?>" type="text" value="<?php echo esc_attr($tab_ttl); ?>">
      </p>
      <p>
        <label for="<?php echo $tab_ttl1id; ?>">タブ1のタイトル:</label>
        <input class="widefat" id="<?php echo $tab_ttl1id; ?>" name="<?php echo $tab_ttl1n ?>" type="text" value="<?php echo esc_attr($tab_ttl1); ?>">
        <small>タブのタイトル部分です。文字を設定することも可能ですが、文字数が限られているため、FontAwesomeなど設定してください。</small>
      </p>
      <p>
        <label for="<?php echo $tab_con1; ?>">タブ1のコンテンツ</label><br>
        <textarea class="widefat" id="<?php echo $tab_con1id; ?>" name="<?php echo $tab_con1n ?>" value="<?php echo esc_attr($tab_con1); ?>"><?php echo $tab_con1; ?></textarea>
        <small>タブのコンテンツ部分です。文章のほか、ショートコードやHTMLコードなどもご利用いただけます。</small>
      </p>
      <p>
        <label for="<?php echo $tab_ttl2id; ?>">タブ2のタイトル:</label>
        <input class="widefat" id="<?php echo $tab_ttl2id; ?>" name="<?php echo $tab_ttl2n ?>" type="text" value="<?php echo esc_attr($tab_ttl2); ?>">
      </p>
      <p>
        <label for="<?php echo $tab_con2; ?>">タブ2のコンテンツ</label><br>
        <textarea class="widefat" id="<?php echo $tab_con2id; ?>" name="<?php echo $tab_con2n ?>" value="<?php echo esc_attr($tab_con2); ?>"><?php echo $tab_con2; ?></textarea>
      </p>
      <p>
        <label for="<?php echo $tab_ttl3id; ?>">タブ3のタイトル:</label>
        <input class="widefat" id="<?php echo $tab_ttl3id; ?>" name="<?php echo $tab_ttl3n ?>" type="text" value="<?php echo esc_attr($tab_ttl3); ?>">
      </p>
      <p>
        <label for="<?php echo $tab_con3; ?>">タブ3のコンテンツ</label><br>
        <textarea class="widefat" id="<?php echo $tab_con3id; ?>" name="<?php echo $tab_con3n ?>" value="<?php echo esc_attr($tab_con3); ?>"><?php echo $tab_con3; ?></textarea>
      </p>
      <p>
        <label for="<?php echo $tab_ttl4id; ?>">タブ4のタイトル:</label>
        <input class="widefat" id="<?php echo $tab_ttl4id; ?>" name="<?php echo $tab_ttl4n ?>" type="text" value="<?php echo esc_attr($tab_ttl4); ?>">
      </p>
      <p>
        <label for="<?php echo $tab_con4; ?>">タブ4のコンテンツ</label><br>
        <textarea class="widefat" id="<?php echo $tab_con4id; ?>" name="<?php echo $tab_con4n ?>" value="<?php echo esc_attr($tab_con4); ?>"><?php echo $tab_con4; ?></textarea>
      </p>
      <?php
    }
    public function update($new_instance, $old_instance) {
      $instance = array();
      $instance['tab_ttl']  = (!empty($new_instance['tab_ttl']))  ? $new_instance['tab_ttl']  : '' ;
      $instance['tab_ttl1'] = (!empty($new_instance['tab_ttl1'])) ? $new_instance['tab_ttl1'] : '' ;
      $instance['tab_con1'] = (!empty($new_instance['tab_con1'])) ? $new_instance['tab_con1'] : '' ;
      $instance['tab_ttl2'] = (!empty($new_instance['tab_ttl2'])) ? $new_instance['tab_ttl2'] : '' ;
      $instance['tab_con2'] = (!empty($new_instance['tab_con2'])) ? $new_instance['tab_con2'] : '' ;
      $instance['tab_ttl3'] = (!empty($new_instance['tab_ttl3'])) ? $new_instance['tab_ttl3'] : '' ;
      $instance['tab_con3'] = (!empty($new_instance['tab_con3'])) ? $new_instance['tab_con3'] : '' ;
      $instance['tab_ttl4'] = (!empty($new_instance['tab_ttl4'])) ? $new_instance['tab_ttl4'] : '' ;
      $instance['tab_con4'] = (!empty($new_instance['tab_con4'])) ? $new_instance['tab_con4'] : '' ;
      return $instance;
    }
  }
  /****************
  プロフィールボックス
  ****************/
  class Prof_Widget extends WP_Widget {
    function __construct(){
      parent::__construct('prof_widget','プロフィール（サイドバー用）',array(
        'description' => 'プロフィールボックスです。サイドバーに追加しましょう',
      ));
    }
    public function widget($args, $instance){
      $prof_name = $instance['prof_name'] ? $instance['prof_name'] : 'Name' ;
      $prof_img  = $instance['prof_img']  ? $instance['prof_img']  : '';
      $prof_text = $instance['prof_text'] ? $instance['prof_text'] : 'SAMPLE TEXT';
      echo $args['before_widget'];
      echo '<div class="profile_widget"><img width="150" height="150" data-src="'.$prof_img.'" alt="'.$prof_name.'のプロフィール画像" class="lazyload fadeinimg">';
      echo '<div class="profile_info"><p class="profile_name">'.$prof_name.'</p>';
      echo '<p class="profile_text">'.$prof_text.'</p>';
      echo get_template_part('parts/others/follow_button');
      echo '</div></div>';
      echo $args['after_widget'];
    }
    public function form($instance) {
      $prof_name = $instance['prof_name'];
      $prof_img  = $instance['prof_img'];
      $prof_text = $instance['prof_text'];
      $name_name = $this->get_field_name('prof_name');
      $img_name  = $this->get_field_name('prof_img');
      $text_name = $this->get_field_name('prof_text');
      $name_id   = $this->get_field_id('prof_name');
      $img_id    = $this->get_field_id('prof_img');
      $text_id   = $this->get_field_id('prof_text');
      ?>
      <p>
        <label for="<?php echo $name_id; ?>">名前</label><br>
        <input class="widefat" id="<?php echo $name_id ?>" name="<?php echo $name_name ?>" type="text" value="<?php echo esc_attr($prof_name); ?>">
      </p>
      <p>
        <label for="<?php echo $img_id; ?>">プロフィール画像</label><br>
        <?php
            $show_sml   = '';
            $show_img = '';
            if (empty($prof_img)){
              $show_img = ' style="display: none;" ';
            }else{
              $show_sml   = ' style="display: none;" ';
            }
        ?>
        <small class="fixed-image-text " <?php echo $show_sml; ?>>画像が未選択です</small>
        <p><img class="fixed-image-view" src="<?php echo $prof_img; ?>" width="260" <?php echo $show_img; ?>></p>
        <input class="fixed-image-url" id="<?php echo $img_id; ?>" name="<?php echo $img_name ?>" type="text" value="<?php echo $prof_img; ?>">
        <button type="button" class="fixed-select-image">画像を選択</button>
        <button type="button" class="fixed-delete-image" <?php echo $show_img; ?>>画像を削除</button>
        <script>
          jQuery(document).ready(function($) {
            var frame;
            const placeholder = jQuery('.fixed-image-text');
            const imageUrl = jQuery('.fixed-image-url');
            const imageView = jQuery('.fixed-image-view');
            const deleteImage = jQuery('.fixed-delete-image');
            jQuery('.fixed-select-image').on('click', function(e){
              e.preventDefault();
              if ( frame ) {
                frame.open();
                return;
              }
              frame = wp.media({
                title: '画像を選択',
                library: {
                  type: 'image'
                },
                button: {
                  text: '画像を追加する'
                },
                multiple: false
              });
              frame.on('select', function(){
                var images = frame.state().get('selection');
                images.each(function(file) {
                  placeholder.css('display', 'none');
                  imageUrl.val(file.toJSON().url);
                  imageView.attr('src', file.toJSON().url).css('display', 'block');
                  deleteImage.css('display', 'inline-block');
                });
                imageUrl.trigger('change');
              });
              frame.open();
            });
            jQuery('.fixed-delete-image').off().on('click', function(e){
              e.preventDefault();
              imageUrl.val('');
              imageView.css('display', 'none');
              deleteImage.css('display', 'none');
              imageUrl.trigger('change');
            });
          });
        </script>
      </p>
      <p>
        <label for="<?php echo $text_id; ?>">プロフィール文</label><br>
        <textarea class="widefat" id="<?php echo $text_id; ?>" name="<?php echo $text_name ?>" value="<?php echo esc_attr($prof_text); ?>"><?php echo $prof_text; ?></textarea>
      </p>

      <?php
        }
    function update($new_instance, $old_instance){
      $instance = array();
      $instance['prof_name'] = !empty($new_instance['prof_name']) ? $new_instance['prof_name'] : '';
      $instance['prof_img']  = !empty($new_instance['prof_img'])  ? $new_instance['prof_img']  : '';
      $instance['prof_text'] = !empty($new_instance['prof_text']) ? $new_instance['prof_text'] : '';
      return $instance;
    }
  }

  /****************
  人気記事
  ****************/


  class Popular_Posts extends WP_Widget {
  function __construct(){
    parent::__construct('popular_posts','人気記事',array(
      'description' => 'PV数の多い順で記事を表示します。カスタマイザー（運営設定）でPV計測機能のON/OFFが切り替え可能です。（デフォルトはON）オフにするとこのウィジェットはうまく機能しません。',
    ));
   }
  function form($instance) {
    if(empty($instance['title'])){
      $instance['title'] = '';
    }
    if(empty($instance['number'])){
      $instance['number'] = 5;
    }
  ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル:'); ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
      name="<?php echo $this->get_field_name('title'); ?>"
      value="<?php echo esc_attr( $instance['title'] ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('記事表示件数:'); ?></label>
      <input type="text" id="<?php echo $this->get_field_id('limit'); ?>"
      name="<?php echo $this->get_field_name('number'); ?>"
      value="<?php echo esc_attr( $instance['number'] ); ?>" size="3">
    </p>
  <?php
  }
  /*カスタマイズ欄の入力内容が変更された場合の処理*/
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['number'] = is_numeric($new_instance['number']) ? $new_instance['number'] : 5;
      return $instance;
  }
  /*ウィジェットのに出力される要素の設定*/
  function widget($args, $instance) {
    extract($args);
    echo $before_widget;
      if(!empty($instance['title'])){
        $title = apply_filters('widget_title', $instance['title'] );
      }
      if (!empty($title)){
        echo $before_title . $title . $after_title;
      } else {
        echo '<h4 class="sidebar_title">今週の人気記事</h4>';
      }
    $number = !empty($instance['number']) ? $instance['number'] : get_option('number');
    ?>
    <div class="popular_posts">
      <ul class="popular_posts_lists">
        <?php get_the_ID();
          $args = array(
            'meta_key'       => 'post_views_count',
            'orderby'        => 'meta_value_num',
            'order'          => 'DESC',
            'posts_per_page' => $number
          );
          $my_query = new WP_Query($args);?>
          <?php while($my_query->have_posts()) : $my_query->the_post(); $loopcounter++; ?>
          <li class="popular_posts_list">
            <a href="<?php the_permalink(); ?>">
              <div class="rank_img">
                <span class="rank rank_count<?php echo $loopcounter; ?>"><i class="fas fa-crown"></i></span>
                <?php if (has_post_thumbnail()): ?>
                  <?php echo convert_src_for_lazyload(get_the_post_thumbnail($post->ID, 'minimum', array('class' => 'fadeinimg lazyload', 'width' => 80, 'height' => 80))); ?>
                <?php else: ?>
                  <img data-src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php the_title(); ?>" width="80" height="80" class="fadeinimg lazyload">
                <?php endif; ?>
              </div>
              <div class="rank_ttl">
                <span><?php the_title(); ?></span>
              </div>
            </a>
          </li>
          <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php echo $after_widget;
    }
  }

  register_widget('TOC_Widget');
  register_widget('CTA_Widget');
  register_widget('TAB_Widget');
  register_widget('Prof_Widget');
  register_widget('Popular_Posts');

} //END register_widgets()
