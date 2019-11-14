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
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_bone_type', array(
            'settings' => 'site_bone_type',
            'label' => 'トップページのタイプ',
            'description' => '現在4種類から選べます。（Nav:ヘッダー部分。Main:記事一覧部分。DynamicNav:宣伝などに使える部分。Side:サイドバー部分。Footer:フッター部分。）',
            'section' => 'site_bone',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'ノーマル（Nav/Main/Side/Footer）',
              'value2' => 'インディビジュアル（Nav/Main/Footer）',
              'value3' => 'ライクコーポレート（DynamicNav/Main/Side/Footer）',
              'value4' => 'ライクランディング（DynamicNav/Footer）',
            ),
          ));
          $wp_customizer->add_setting('site_bone_sidebar', array(
            'default' => false,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_bone_sidebar', array(
            'label' => 'サイドバーを左側に表示',
            'description' => 'サイトバーがある構造の場合、チェックを入れるとサイドバーが左側に表示されます。',
            'section' => 'site_bone',
            'type' => 'checkbox',
          ));
      $wp_customizer->add_section('site_cssfw', array(
        'priority' => 2,
        'title' => '2:デザインの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_cssfw_choice', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_cssfw_choice', array(
            'label' => 'サイト全体の雰囲気',
            'description' => '現在5種類から選べます。',
            'section' => 'site_cssfw',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'フラット',
              'value2' => 'マテリアル',
              'value3' => 'シンプル',
              'value4' => '開発者・デザイナー向け（CSS適用なし）',
            ),
          ));

      $wp_customizer->add_section('site_font',array(
        'priority' => 3,
        'title' => '3:フォントの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_font_title', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_title', array(
            'label' => 'サイトタイトルのフォント',
            'description' => '現在10種類からお選びいただけます。（）内の言語にしか適用されません。',
            'section' => 'site_font',
            'type' => 'radio',
            'choices' => array(
                'value1' => 'デフォルト',
                'value2' => 'ゴシック（英語）',
                'value3' => '明朝（英語）',
                'value4' => '角ゴシック（英語）',
                'value5' => '手書き風（英語）',
                'value6' => 'ゴシック（日本）',
                'value7' => '明朝（日本）',
                'value8' => '手書き風（日本）',
            ),
          ));
          $wp_customizer->add_setting('site_font_menu', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_menu', array(
            'label' => 'サイトタイトルのフォント',
            'description' => '現在10種類からお選びいただけます。（）内の言語にしか適用されません。',
            'section' => 'site_font',
            'type' => 'radio',
            'choices' => array(
                'value1' => 'デフォルト',
                'value2' => 'ゴシック（英語）',
                'value3' => '明朝（英語）',
                'value4' => '角ゴシック（英語）',
                'value5' => '手書き風（英語）',
                'value6' => 'ゴシック（日本）',
                'value7' => '明朝（日本）',
                'value8' => '手書き風（日本）',
            ),
          ));
          $wp_customizer->add_setting('site_font_body', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_body', array(
            'label' => '全体（記事本文）のフォント',
            'description' => '現在5種類からお選びいただけます。',
            'section' => 'site_font',
            'type' => 'radio',
            'choices' => array(
                'value1' => 'デフォルト',
                'value2' => 'きっちり',
                'value3' => '柔らかい',
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

function add_customizerCSS(){


//フォントの設定


  /*** タイトルフォントの設定 ***/
  $fontTitle = get_theme_mod('site_font_title', 'value1');

  /*** 本文フォントの設定 ****/
  $fontBody =  get_theme_mod('site_font_body', 'value1');
    if ($fontBody == 'value2') {
      $fontfamilybody = "'Yu Mincho Light','YuMincho','Yu Mincho','游明朝体','Yu Gothic UI','ヒラギノ明朝 ProN','Hiragino Mincho ProN',sans-serif";
    } elseif ($fontBody == 'value3') {
      $fontfamilybody = "'M PLUS Rounded 1c', sans-serif";
    } else {
      $fontfamilybody = '';
    }
  ?>
  <style>
    body{font-family:<?php echo $fontfamilybody ?>}
  </style>
  <?php
}//END add_customizerCSS()

add_action('wp_head', 'add_customizerCSS');
