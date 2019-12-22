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
      echo '<div class="profile_widget"><img width="150" height="150" src="'.$prof_img.'" alt="'.$prof_name.'のプロフィール画像" class="lazyload fadeinimg">';
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
    <div class="widget_popular_posts">
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
                <span class="rank rank_count<?php echo $loopcounter; ?>"><?php echo $loopcounter; ?></span>
                <?php if (has_post_thumbnail()): ?>
                  <?php echo convert_src_for_lazyload(get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'fadeinimg lazyload', 'width' => 100, 'height' => 100))); ?>
                <?php else: ?>
                  <img data-src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php the_title(); ?>" width="100" height="100" class="fadeinimg lazyload">
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
  register_widget('Prof_Widget');
  register_widget('Popular_Posts');

} //END register_widgets()
