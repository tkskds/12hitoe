<?php


// MEMO
//
// ## 大見出し
// $wp_customize->add_panel('変数', array(
//     'priority' => 1,
//     'title' => 'サイトの基本設定',
// ));
//
// ## 小見出し
// $wp_customizer->add_section('変数', array(
//
// ));
//
// ## 項目
// $wp_customizer->add_settings('変数', array(
//
// ));
//
// ## 設定
// $wp_customizer->add_controle('変数',array(
//
// ));



//////////////////////////////
// 3 カスタマイザー項目追加
//////////////////////////////

function org_customizer($wp_customizer){

  // STEP1
  $wp_customizer->add_panel('site_conf', array(
    'priority' => 1,
    'title' => 'STEP1【基本設定】',
    'description' => 'サイトの基本設定'
  ));

      $wp_customizer->add_section('title_tagline', array(
        'title' => '基本情報とロゴの設定',
        'panel' => 'site_conf',
      ));

      $wp_customizer->add_section('meta_description', array(
        'title' => 'サイトの説明文',

      ));

      $wp_customizer->add_setting('meta_description', array(
        'default' => '',
        'type' => 'option',
        'transport'  => 'postMessage',
      ));



  // STEP2
  $wp_customizer->add_panel('site_builder', array(
    'priority' => 2,
    'title' => 'STEP2【外観設定】',
    'description' => 'サイトの外観設定',
  ));


  // STEP3

  $wp_customizer->add_panel('site_admin', array(
    'priority' => 3,
    'title' => 'STEP3【運営設定】',
    'description' => 'サイトの運営設定',
  ));

} //END org_customizer()
