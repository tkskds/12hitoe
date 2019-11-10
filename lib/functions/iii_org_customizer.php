<?php

//////////////////////////////
// 3 カスタマイザー項目追加
//////////////////////////////

function org_customizer(){

  //TEST
  $wp_cus->add_settings('test[test]', array(
    'default' => '',
    'type' => 'option',
    'trasnport' =>  'postMassage',
  ));
} //END org_customizer()
