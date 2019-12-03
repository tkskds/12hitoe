<?php

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

add_filter('nav_menu_css_class' , 'active_nav_class' , 10 , 2);
add_filter('nav_menu_css_class' , 'sp_menu_classes'  , 10 , 3);


?>
