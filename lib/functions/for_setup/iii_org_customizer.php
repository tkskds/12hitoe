<?php


// ======
//  MEMO
// ======
//
// ` 'transport' => 'postMessage' `を設定するとリアルタイムプレビューを無効
// panel（フォルダ） >> section（フォルダ） >> label（ファイル）みたいなイメージ
//



//////////////////////////////
// 3 カスタマイザー項目追加
//////////////////////////////

function org_customizer($wp_customizer){

  /********
  // STEP1
  ********/
  $wp_customizer->add_panel('site_conf', array(
    'priority' => 1,
    'title' => 'STEP1【基本設定】',
    'description' => 'サイトの基本設定です。SEOに有効に働く項目もあります。*は設定必須項目です。'
  ));

      $wp_customizer->add_section('title_tagline', array(
        'title' => '基本情報とロゴの設定<span style="color:red;">*</span>',
        'panel' => 'site_conf',
      ));

          $wp_customizer->add_setting('meta_description', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'postMessage',
          ));

          $wp_customizer->add_control('meta_description', array(
            'settings' => 'meta_description',
            'label' => 'サイトの説明文<span style="color:red;">*</span>',
            'description' => '検索結果などに表示されます。（推奨100文字以内）',
            'section' => 'title_tagline',
            'type' => 'textarea',
          ));


  /********
  // STEP2
  ********/
  $wp_customizer->add_panel('site_builder', array(
    'priority' => 2,
    'title' => 'STEP2【外観設定】',
    'description' => 'サイトの外観設定です。',
  ));

      $wp_customizer->add_section('site_bone', array(
        'title' => '1:骨組みを設定しよう',
        'panel' => 'site_buider',
      ));

          $wp_customizer->add_control('site_bone_type', array(
            'settings' => 'meta_description',
            'label' => 'サイトの説明文*',
            'description' => '検索結果などに表示されます。（推奨100文字以内）',
            'section' => 'site_bone',
            'type' => 'textarea',
          ));




  // サイト構造（コンポーネントの順番）
  // ## example )
  // - HEADER => NAV => ARTCILE LIST => ASIDE => FOOTER
  // - NAV => ARTICLE LIST => FOOTER
  // - DYNAMIC HEADER => ARTICLE => FOOTER


  // STEP3

  $wp_customizer->add_panel('site_admin', array(
    'priority' => 3,
    'title' => 'STEP3【運営設定】',
    'description' => 'サイトの運営設定',
  ));

} //END org_customizer()
