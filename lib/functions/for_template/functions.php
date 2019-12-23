<?php

/***************
テンプレート用関数

- ページネーション
- タグ大きさ統一
- カテゴリやタグの()の削除
- ナビメニューにクラス付与
- パンくずリスト
- 最初の見出し前に広告
- 目次の出力
- 関連記事
- 画像遅延読み込み
- 画像拡大機能
- aタグにアイコン付与
- コンバーター登録
- 見出しのクラス出力
- SNSフォローボタン（この記事を書いた人）
- 構造化データ
- 通知欄
- 人気記事
- コメント欄コールバック

***************/

/////////////////////
// ページネーション
/////////////////////

function m_pagination() {
  global $wp_query;
  if ( $wp_query->max_num_pages <= 1 ) return;
  $big   = 999999999;
  $pages = paginate_links(array(
    'base'        => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format'      => '?paged=%#%',
    'current'     => max(1, get_query_var('paged')),
    'total'       => $wp_query->max_num_pages,
    'type'        => 'array',
    'prev_text'   => '<i class="fas fa-angle-left"></i>',
    'next_text'   => '<i class="fas fa-angle-right"></i>',
  ));
  $pages = str_replace('<a', '<a aria-label="戻る/進むボタン"', $pages);

  if(is_array($pages)){
    $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
    echo '<ul class="pagination">';
    foreach ( $pages as $page ) {
      echo '<li class="waves-effect">'.$page.'</li>';
    }
    echo '</ul>';
  }
  return $classes;
}

/////////////////////
// タグの大きさ統一
/////////////////////

function tag_font_size($args){
  $org_args = array(
    'smallest'  => 100,
    'largest'   => 100,
    'unit'      => '%',
    'number'    => 50,
    'format'    => 'list',
    'separator' => "\n",
    'orderby'   => 'count',
    'order'     => 'DESC'
  );
  $args = wp_parse_args($args, $org_args);
  return $args;
}

/////////////////////
// カテゴリ数の()削除
/////////////////////

function remove_post_count_parentheses($output) {
  $output = preg_replace('/<\/a>.*\((\d+)\)/','<span class="post-count">$1</span></a>',$output);
  return $output;
}

/////////////////////
// タグ数の()削除
/////////////////////

function wp_tag_cloud_custom_ex( $output ) {
  $output = preg_replace( '/\s*?style="[^"]+?"/i', '',  $output); //スタイル削除
  $output = str_replace( ' (', '',  $output); // "("削除
  $output = str_replace( ')', '',  $output); // ")"削除
  return $output;
}

/////////////////////
// ナビメニュー用関数
/////////////////////

// メニューに'.active'付与
function active_nav_class($classes, $item){
  if(in_array('current-menu-item', $classes) ){
    $classes[] = 'active';
  }
  return $classes;
}

// モバイルメニューに'.waves-effect'付与
function sp_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'nav_header_sp') {
    $classes[] = 'waves-effect';
  }
  return $classes;
}

/////////////////////
// パンくずリスト
/////////////////////

if (!function_exists('custom_breadcrumb')){
  function custom_breadcrumb(){
    if (is_front_page()) return false;
    $wp_obj     = get_queried_object();
    $json_array = array();
    $breadcrumb = get_option('site_decoration_bread') ? get_option('site_decoration_bread') : 'value1' ;
    $bc_class   = type_class($breadcrumb, 'breadcrumb');
    echo  '<div class="breadcrumb '.$bc_class.'"><ul class="bread_lists">'.'<li class="bread_list bread_home">'.'<a href="'.esc_url(home_url()).'" class="bread_link" aria-labelledby="パンくずリストリンク"><i class="fas fa-home"></i><span>ホーム</span></a>'.'</li>';
    if (is_attachment()){
      $post_title = apply_filters('the_title', $wp_obj->post_title);
      echo '<li class="bread_list"><span class="bread_activepage">'.esc_html($post_title).'</span></li>';
    } elseif ( is_single() ) {
      $post_id    = $wp_obj->ID;
      $post_type  = $wp_obj->post_type;
      $post_title = apply_filters( 'the_title', $wp_obj->post_title );
      if ($post_type !== 'post'){
        $the_tax   = "";
        $tax_array = get_object_taxonomies($post_type, 'names');
        foreach ($tax_array as $tax_name) {
          if ($tax_name != 'post_format'){
              $the_tax = $tax_name;
              break;
          }
        }
        $post_type_link   = esc_url( get_post_type_archive_link($post_type));
        $post_type_label  = esc_html( get_post_type_object($post_type )->label);
        echo  '<li class="bread_list">'.'<a href="'. $post_type_link .'" class="bread_link">'.'<span>'. $post_type_label .'</span>'.'</a>'.'</li>';
        $json_array[] = array(
          'id'   => $post_type_link,
          'name' => $post_type_label
        );
        } else {
          $the_tax = 'category';
        }
        $terms = get_the_terms( $post_id, $the_tax );
        if ( $terms !== false ) {
          $child_terms  = array();
          $parents_list = array();
          foreach ( $terms as $term ) {
            if ( $term->parent !== 0 ) {
              $parents_list[] = $term->parent;
            }
          }
          foreach ( $terms as $term ) {
            if ( ! in_array( $term->term_id, $parents_list ) ) {
              $child_terms[] = $term;
            }
          }
          $term = $child_terms[0];
          if ( $term->parent !== 0 ) {
            $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );
            foreach ( $parent_array as $parent_id ) {
              $parent_term = get_term( $parent_id, $the_tax );
              $parent_link = esc_url( get_term_link( $parent_id, $the_tax ) );
              $parent_name = esc_html( $parent_term->name );
              echo  '<li class="bread_list">'.'<a href="'. $parent_link .'" class="bread_link">'.'<span>'. $parent_name .'</span>'.'</a>'.'</li>';
              $json_array[] = array(
                'id' => $parent_link,
                'name' => $parent_name
              );
            }
          }
          $term_link = esc_url(get_term_link($term->term_id, $the_tax));
          $term_name = esc_html($term->name);
          echo  '<li class="bread_list">'.'<a href="'. $term_link .'" class="bread_link">'.'<span>'. $term_name .'</span>'.'</a>'.'</li>';
          $json_array[] = array(
            'id' => $term_link,
            'name' => $term_name
          );
        }
        echo '<li class="bread_list"><span class="bread_activepage">'. esc_html(strip_tags($post_title)) .'</span></li>';
    } elseif (is_page() || is_home()){
      $page_id    = $wp_obj->ID;
      $page_title = apply_filters('the_title', $wp_obj->post_title);
      if ($wp_obj->post_parent !== 0){
        $parent_array = array_reverse(get_post_ancestors($page_id));
        foreach($parent_array as $parent_id){
          $parent_link = esc_url(get_permalink($parent_id));
          $parent_name = esc_html(get_the_title($parent_id));
          echo  '<li>'.
                '<a href="'. $parent_link .'" class="bread_link">'.
                '<span>'. $parent_name .'</span>'.
                '</a>'.
                '</li>';
          $json_array[] = array(
            'id' => $parent_link,
            'name' => $parent_name
          );
        }
      }
      echo '<li><span>'. esc_html(strip_tags($page_title)) .'</span></li>';
    } elseif (is_post_type_archive()){
      echo '<li><span>'. esc_html($wp_obj->label) .'</span></li>';
    } elseif (is_date()){
      $year  = get_query_var('year');
      $month = get_query_var('monthnum');
      $day   = get_query_var('day');
      if ( $day !== 0 ) {
        echo  '<li>'.
              '<a href="'. esc_url(get_year_link($year)) .'" class="bread_link"><span>'. esc_html($year) .'年</span></a>'.
              '</li>'.
              '<li>'.
              '<a href="'. esc_url(get_month_link($year, $month)) . '" class="bread_link"><span>'. esc_html($month) .'月</span></a>'.
              '</li>'.
              '<li>'.
              '<span>'. esc_html($day) .'日</span>'.
              '</li>';
      } elseif ( $month !== 0 ) {
        echo  '<li>'.
              '<a href="'. esc_url(get_year_link($year)) .'" class="bread_link"><span>'. esc_html($year) .'年</span></a>'.
              '</li>'.
              '<li>'.
              '<span>'. esc_html($month) .'月</span>'.
              '</li>';
      } else {
        echo '<li><span>'. esc_html($year) .'年</span></li>';
      }
    }elseif(is_author()) {
      echo '<li><span>'. esc_html($wp_obj->display_name) .' の執筆記事</span></li>';
    }elseif(is_archive()) {
      $term_id   = $wp_obj->term_id;
      $term_name = $wp_obj->name;
      $tax_name  = $wp_obj->taxonomy;
      if ($wp_obj->parent !== 0){
        $parent_array = array_reverse(get_ancestors($term_id, $tax_name));
        foreach($parent_array as $parent_id){
          $parent_term = get_term($parent_id, $tax_name );
          $parent_link = esc_url(get_term_link($parent_id, $tax_name));
          $parent_name = esc_html($parent_term->name );
          echo  '<li>'.
                '<a href="'. $parent_link .'" class="bread_link">'.
                '<span>'. $parent_name .'</span>'.
                '</a>'.
                '</li>';
          $json_array[] = array(
            'id' => $parent_link,
            'name' => $parent_name
          );
        }
      }
      echo '<li>'.
            '<span>'. esc_html($term_name) .'</span>'.
          '</li>';
    } elseif (is_search()){
      echo '<li><span>「'.esc_html(get_search_query()).'」で検索した結果</span></li>';
    } elseif (is_404()){
      echo '<li><span>お探しの記事は見つかりませんでした。</span></li>';
    } else {
      echo '<li><span>'.esc_html(get_the_title()).'</span></li>';
    }
    echo '</ul>';
    if (!empty( $json_array)):
      $pos = 1;
      $json = '';
      foreach ($json_array as $data) :
        $json .= '{
          "@type": "ListItem",
          "position": '. $pos++ .',
          "item": {
              "@id": "'. $data['id'] .'",
              "name": "'. $data['name'] .'"
          }
        },';
      endforeach;
      echo '<script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": ['. rtrim( $json, ',' ) .']
      }</script>';
      endif;
    echo '</div>'; //https://wemo.tech/356
  }
}

/////////////////////
// 最初の目次前に広告
/////////////////////

function add_ad_before_h2($content){
  global $post;
  if (is_single() && is_active_sidebar('ad_before_h2')){
    if (!defined('H2S')) {
      define('H2S', '/<h2.*?>/i');
    }
    preg_match_all(H2S, $content, $matches);
    ob_start();
    dynamic_sidebar('ad_before_h2');
    $ad = ob_get_contents();
    ob_end_clean();
    if ($matches) {
      if (isset($matches[0][0])) {
        $content = preg_replace(H2S, $ad.$matches[0][0], $content, 1);
      }
    }
  }
  return $content;
}

/////////////////////
// 目次
/////////////////////

function add_index_to_content($content){
  $tocOff      = get_option('site_article_toc');
  $tocOnPage   = get_option('site_article_toc_page');
  if ($tocOff == false && is_single() || $tocOnPage == true && is_page()){
    $toc_ttl    = get_option('site_article_toc_ttl')    ? get_option('site_article_toc_ttl')    : 'CONTENT';
    $toc_type   = get_option('site_article_toc_design') ? get_option('site_article_toc_design') : 'value1';
    switch ($toc_type) {
      case 'value1':
        $toc_wrap  = '<div class="toc tocType1"><ul class="collapsible"><li><div class="collapsible-header toc_ttl">'.
                     $toc_ttl.
                     '<i class="fas fa-angle-down"></i></div><div class="collapsible-body toc_body"></div></li></ul></div>';
        break;
      case 'value2':
        $toc_wrap  = '<div class="toc tocType2"><div class="toc_ttl">'.$toc_ttl.'</div><div class="toc_body"></div></div>';
        break;
      case 'value3':
        $toc_wrap  = '<div class="toc tocType3"><div class="toc_ttl">'.$toc_ttl.'</div><div class="toc_body"></div></div>';
        break;
      case 'value4':
        $toc_wrap  = '<div class="toc tocType4"><div class="toc_ttl">'.$toc_ttl.'</div><div class="toc_body"></div></div>';
        break;
      case 'value5':
        $toc_wrap  = '<div class="toc tocType5"><div class="toc_ttl">'.$toc_ttl.'</div><div class="toc_body"></div></div>';
        break;
    }
    $tag = '/<h2.*?>/i';
    if (preg_match( $tag, $content, $tags)) {
      $content = preg_replace($tag, $toc_wrap.$tags[0], $content, 1);
    }
    return $content;
  }else{
    return $content;
  }
}

/////////////////////
// 画像遅延読み込み
/////////////////////

function add_lazyload_class($content){
  $content = preg_replace('/(<img[^>]*)\s+class="([^"]*)"/', '$1 class="$2 fadeinimg lazyload"', $content);
  return $content;
}

function convert_src_for_lazyload($content){
  $content = preg_replace('/(<img[^>]*)\s+src=/', '$1 data-src=', $content);
  return $content;
}

function use_lazyload($content){
  add_lazyload_class($content);
  convert_src_for_lazyload($content);
  return $content;
}

/////////////////////
//  画像拡大機能
/////////////////////

function add_img_box_class($content){
  $content = preg_replace('/(<img[^>]*)\s+class="([^"]*)"/', '$1 class="$2 materialboxed"', $content);
  return $content;
}
$imageBox = get_option('site_decoration_image_box');
if($imageBox == false){
  add_filter('the_content', 'add_img_box_class');
}

/////////////////////
// aタグにアイコン付与
/////////////////////

function add_a_tag_icon($content){
  $content = preg_replace('/(<\/a>)/', '<i class="fas fa-external-link-alt link_icon"></i>$1', $content);
  return $content;
}

$aTagIcon = get_option('site_decoration_a_tag_icon');
if($aTagIcon == false){
  add_filter('the_content', 'add_a_tag_icon');
}

/////////////////////
// コンバーター登録
/////////////////////

function convert_box($content){
  return $content;
}

/////////////////////
// 見出しのクラス出力
/////////////////////

function add_heading_class($content){
  $h2class   = get_option('site_decoration_h2_type') ? get_option('site_decoration_h2_type') : 'type1';
  $h3class   = get_option('site_decoration_h3_type') ? get_option('site_decoration_h3_type') : 'type1';
  $h4class   = get_option('site_decoration_h4_type') ? get_option('site_decoration_h4_type') : 'type1';
  $h2replace = '<h2 class="h2'.$h2class.'"';
  $h3replace = '<h3 class="h3'.$h3class.'"';
  $h4replace = '<h4 class="h4'.$h4class.'"';
  $content   = str_replace(array('<h2','<h3','<h4'),array($h2replace,$h3replace,$h4replace),$content);
  return $content;
}

/////////////////////
// この記事を書いた人
/////////////////////

function author_profile_box($sns){
   $sns['twitter']    = 'Twitter（https://twitter.com/ここの部分）';
   $sns['facebook']   = 'Facebook（https://facebook.com/ここの部分）';
   $sns['instagram']  = 'Instagram（https://instagram.com/ここの部分）';
   $sns['youtube']    = 'Youtube（https://youtube.com/channel/ここの部分）';
   $sns['github']     = 'Github（https://github.com/ここの部分）';
   $sns['codepen']    = 'Codepen（https://codepen.io/ここの部分）';
   return $sns;
}

/////////////////////
// 構造化データの挿入
/////////////////////

function ld_json(){

  $thumbnail_id = get_post_thumbnail_id($post);
  $imageobject  = wp_get_attachment_image_src( $thumbnail_id, 'full' );

?>
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage":{
      "@type":"WebPage",
      "@id":"<?php the_permalink(); ?>"
    },
    "headline":"<?php the_title(); ?>",
    "image": [
      "<?php echo $imageobject[0]; ?>"
    ],
    "datePublished": "<?php echo get_date_from_gmt(get_post_time('c', true), 'c');?>",
    "dateModified": "<?php echo get_date_from_gmt(get_post_modified_time('c', true), 'c');?>",
    "author": {
      "@type": "Person",
      "name": "<?php the_author();?>",
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php get_option('site_nav_sp_sideauthor_name'); ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?php get_option('site_nav_sp_sideauthor_img'); ?>"
      }
    },
    "description": "<?php echo get_the_excerpt(); ?>"
  }
  </script>
<?php
}

/////////////////////
// 人気記事（PV計測）
/////////////////////

function set_post_views($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

function is_bot() {
  $ua = $_SERVER['HTTP_USER_AGENT'];
  $bot = array(
    'Googlebot',
    'Yahoo! Slurp',
    'Mediapartners-Google',
    'msnbot',
    'bingbot',
    'MJ12bot',
    'Ezooms',
    'pirst; MSIE 8.0;',
    'Google Web Preview',
    'ia_archiver',
    'Sogou web spider',
    'Googlebot-Mobile',
    'AhrefsBot',
    'YandexBot',
    'Purebot',
    'Baiduspider',
    'UnwindFetchor',
    'TweetmemeBot',
    'MetaURI',
    'PaperLiBot',
    'Showyoubot',
    'JS-Kit',
    'PostRank',
    'Crowsnest',
    'PycURL',
    'bitlybot',
    'Hatena',
    'facebookexternalhit',
    'NINJA bot',
    'YahooCacheSystem',
    'NHN Corp.',
    'Steeler',
    'DoCoMo',
  );
  foreach( $bot as $bot ) {
    if (stripos( $ua, $bot ) !== false){
      return true;
    }
  }
  return false;
}

/////////////////////
// コメント欄コールバック
/////////////////////

function callback_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
   <div class="comment">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
         <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('コメントは承認されてから表示されます') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
          <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
        </a>
        <?php edit_comment_link(__('(編集)'),'  ','') ?>
      </div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
   </div>
<?php
}

/////////////////////
// hex　<=> rgba
/////////////////////

function getConversionRgba($color_code, $alpha) {
  $color_code         = preg_replace('/#/', '', $color_code);
  $rgba_code['red']   = hexdec(substr($color_code, 0, 2));
  $rgba_code['green'] = hexdec(substr($color_code, 2, 2));
  $rgba_code['blue']  = hexdec(substr($color_code, 4, 2));
  $rgba_code['alpha'] = $alpha;
  $rgba_code['full']  = implode(',', $rgba_code);

  return $rgba_code['full'];
}

/////////////////////
// クラス付与
/////////////////////

function type_class($type, $n){
  switch ($type) {
    case 'value1':
      return ' '.$n.'Type1 ';
      break;
    case 'value2':
      return ' '.$n.'Type2 ';
      break;
    case 'value3':
      return ' '.$n.'Type3 ';
      break;
    case 'value4':
      return ' '.$n.'Type4 ';
      break;
    case 'value5':
      return ' '.$n.'Type5 ';
      break;
    case 'value6':
      return ' '.$n.'Type6 ';
      break;
  }
}
/*出力用*/

function output_type_class($type, $n){
  switch ($type) {
    case 'value1':
      echo ' '.$n.'Type1 ';
      break;
    case 'value2':
      echo ' '.$n.'Type2 ';
      break;
    case 'value3':
      echo ' '.$n.'Type3 ';
      break;
    case 'value4':
      echo ' '.$n.'Type4 ';
      break;
    case 'value5':
      echo ' '.$n.'Type5 ';
      break;
    case 'value6':
      echo ' '.$n.'Type6 ';
      break;
  }
}

?>
