<?php

//////////////////////////////
// 4 ウィジェットの新規登録
//////////////////////////////

function register_widgets(){
  register_sidebar(array(
    'name'=>'サイドバー',
    'id' => 'side_widget',
    'before_widget'=>'<div id="%1$s" class="%2$s sidebar_wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="sidebar_title">',
    'after_title' => '</h4>'
    ));
} //END register_widgets()
