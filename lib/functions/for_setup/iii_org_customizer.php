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
        'title' => '基本情報とロゴの設定*',
        'panel' => 'site_conf',
      ));

          $wp_customizer->add_setting('meta_description', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'postMessage',
          ));

          $wp_customizer->add_control('meta_description', array(
            'settings' => 'meta_description',
            'label' => 'サイトの説明文*',
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
        'priority' => 1,
        'title' => '1:骨組みの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_bone_type', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'postMessage',
          ));

          $wp_customizer->add_control('site_bone_type', array(
            'settings' => 'site_bone_type',
            'label' => 'トップページのタイプ',
            'description' => '現在4種類から選べます。',
            'section' => 'site_bone',
            'type' => 'radio',
            'choices' => array(
              'value1' => '一般的なブログ/メディア（Nav/Main/Side/Footer）',
              'value2' => '個性的なブログ/メディア（Nav/Main/Footer）',
              'value3' => 'LP/販促用ページ風（DynamicNav/Main/Footer）',
              'value4' => 'コーポレートサイト風（DynamicNav/Main/Footer）',
            ),
          ));
      $wp_customizer->add_section('site_cssfw', array(
        'priority' => 2,
        'title' => '2:デザインの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_cssfw_choice', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'postMessage',
          ));

          $wp_customizer->add_control('site_cssfw_choice', array(
            'settings' => 'site_cssfw_choice',
            'label' => 'サイト全体の雰囲気',
            'description' => '現在6種類から選べます。',
            'section' => 'site_cssfw',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'フラットデザイン',
              'value2' => 'Googleライク（materialize）',
              'value3' => 'Twitterライク（boostrap）',
              'value4' => 'ガーリーデザイン',
              'value5' => '個性派',
              'value6' => 'コーポレートサイト向け',
            ),
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
