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


  add_shortcode('yoko'      , 'sc_columns');
  add_shortcode('cell'      , 'sc_columns_cell');
  add_shortcode('marker'    , 'sc_marker');
  add_shortcode('fukidasi'  , 'sc_fukidasi');

  function sc_columns($atts, $content = null){
    $content = do_shortcode(shortcode_unautop($content));
    return '<div class="sc_column">'.$content.'</div>';
  }

  function sc_columns_cell($atts, $content = null ){
    return '<div class="sc_cell">'.$content.'</div>';
  }

  function sc_marker($atts, $content = null){
    return '<span class="sc_marker">'.$content.'</span>';
  }

}
