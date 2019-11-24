<?php

//================
//      MEMO
//================

//ショートコード内でショートコードを使えるようにする↓
// $content = do_shortcode(shortcode_unautop($content));



//================
//      END
//================




function add_shortcodes(){


  add_shortcode('cell', 'columns_cell');
  add_shortcode('yoko', 'columns');


  function columns_cell($atts, $content = null ){
    return '<div class="cell">' . $content . '</div>';
  }

  function columns($atts, $content = null){
    $content = do_shortcode(shortcode_unautop($content));
    return '<div class="flex_box">' . $content . '</div>';
  }



//
// function hogeFunc( $atts, $content = null ) {
//     extract( shortcode_atts( array(
//         'class' => 'default',
//     ), $atts ) );
//
//     return '<p class="' . $class. '"><span>' . $content . '</span></p>';
// }
// add_shortcode('hoge', 'hogeFunc');
//
//
// function sng_rate_box($atts, $content = null)
// {
//   $title = isset($atts['title']) ? '<div class="rate-title has-fa-before dfont main-c-b">' . esc_attr($atts['title']) . '</div>' : '';
//   $content = do_shortcode(shortcode_unautop($content));
//   if ($content) {
//     return $title . '<div class="rate-box">' . $content . '</div>';
//   }
// }


}
