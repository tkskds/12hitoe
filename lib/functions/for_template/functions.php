<?php


add_filter('widget_tag_cloud_args', 'tag_font_size'); //タグのフォントサイズ修正
add_filter('wp_list_categories'   , 'remove_post_count_parentheses' ); //カテゴリの()削除
add_filter('get_archives_link'    , 'remove_post_count_parentheses' ); //アーカイブの()削除
add_filter('wp_tag_cloud'         , 'wp_tag_cloud_custom_ex'); //タグの()削除
add_filter('nav_menu_css_class'   , 'active_nav_class' , 10 , 2); //navにクラス付与
add_filter('nav_menu_css_class'   , 'sp_menu_classes'  , 10 , 3); //navにクラス付与


/////////////////////
// ページネーション
/////////////////////

function m_pagination() {
  global $wp_query;
  if ( $wp_query->max_num_pages <= 1 ) return;
  $big   = 999999999;
  $pages = paginate_links(array(
    'base'        => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'      => '?paged=%#%',
    'current'     => max( 1, get_query_var('paged') ),
    'total'       => $wp_query->max_num_pages,
    'type'        => 'array',
    'prev_text'   => '<i class="fas fa-angle-left"></i>',
     'next_text'  => '<i class="fas fa-angle-right"></i>',
  ));

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
  if( in_array('current-menu-item', $classes) ){
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

?>
