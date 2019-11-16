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
            'label' => 'トップページのタイプ',
            'description' => '現在4種類から選べます。（Nav:ヘッダー部分。Main:記事一覧部分。DynamicHeader:宣伝などに使える部分。Side:サイドバー部分。Footer:フッター部分。）',
            'section' => 'site_bone',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'ノーマル（Nav/Main/Side/Footer）',
              'value2' => 'インディビジュアル（Nav/Main/Footer）',
              'value3' => 'ライクコーポレート（DynamicHeader/Main/Side/Footer）',
              'value4' => 'ライクランディング（DynamicHeader/Features/Footer）',
            ),
          ));

          $wp_customizer->add_setting('site_bone_content_area', array(
            'default' => 1200,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_bone_content_area', array(
            'label' => 'コンテンツエリアの最大横幅',
            'description' => 'コンテンツ部分の最大横幅を設定します。（デフォルト:1200）',
            'section' => 'site_bone',
            'type' => 'number',
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

          $wp_customizer->add_setting('site_bone_sidebar_width', array(
            'default' => 30,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_bone_sidebar_width', array(
            'label' => 'サイドバーの横幅（デフォルト:30）',
            'description' => 'サイドバーの横幅を設定できます',
            'section' => 'site_bone',
            'type' => 'number',
          ));

      $wp_customizer->add_section('site_dyheader', array(
        'priority' => 2,
        'title' => '2:ダイナミックヘッダー（『1:骨組みの設定』で選択した場合のみ）',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_dyheader_text', array(
            'default' => "Let's enjoy self-expression!",
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_dyheader_text', array(
            'label' => 'ヘッダー部分のテキスト',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customizer->add_setting('site_dyheader_text_animation', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_text_animation', array(
            'label' => 'テキストへ適用するアニメーション',
            'description' => '現在4種類から選択できます。',
            'section'  => 'site_dyheader',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'アニメーションなし',
              'value2' => 'フェードイン',
              'value3' => 'タイプライター',
              'value4' => 'ズームイン',
              'value5' => 'キラキラ',
            ),
          ));

          $wp_customizer->add_setting('site_dyheader_button', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_button', array(
            'label' => 'ヘッダー部分のボタン',
            'description' => 'ヘッダー部分に適用されるCTA的に使用可能なボタンです。（空白の場合ボタンは表示されません。）',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customizer->add_setting('site_dyheader_button_link', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_button_link', array(
            'label' => 'ボタンのリンク先URL',
            'description' => 'リンク先のURLを入力してください。',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customizer->add_setting('site_dyheader_button2', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_button2', array(
            'label' => 'ヘッダー部分のボタン2',
            'description' => 'もう一つボタンが必要な場合はこちらから。（空白の場合ボタンは表示されません。）',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customizer->add_setting('site_dyheader_button2_link', array(
            'default' => '#',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_button2_link', array(
            'label' => 'ボタンのリンク先URL',
            'description' => '',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customizer->add_setting('site_dyheader_width', array(
            'default' => 1200,
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_width', array(
            'label' => 'ヘッダー部分の最大横幅',
            'description' => 'ヘッダー部分の最大横幅を設定できます。『1:骨組みの設定』で設定した数値と同じものがオススメです。（デフォルト:1200,最大3000）',
            'section'  => 'site_dyheader',
            'type' => 'number',
          ));

          $wp_customizer->add_setting('site_dyheader_height', array(
            'default' => 30,
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customizer->add_control('site_dyheader_height', array(
            'label' => 'ヘッダー部分の高さ',
            'description' => 'ヘッダー部分の高さを調整できます（デフォルト:30,最大:100）',
            'section'  => 'site_dyheader',
            'type' => 'number',
          ));



      $wp_customizer->add_section('site_cssfw', array(
        'priority' => 3,
        'title' => '3:デザインの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_cssfw_choice', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customizer->add_control('site_cssfw_choice', array(
            'label' => 'サイト全体の雰囲気',
            'description' => '現在4種類から選べます。',
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
        'priority' => 4,
        'title' => '4:フォントの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_font_title', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_title', array(
            'label' => 'サイトタイトルのフォント',
            'description' => '現在10種類からお選びいただけます。[注意：（）内の言語にしか適用されません]',
            'section' => 'site_font',
            'type' => 'radio',
            'choices' => array(
                'value1' => 'デフォルト',
                'value2' => 'ポップ（英）',
                'value3' => '個性的（英）',
                'value4' => '残像（英）',
                'value5' => '近未来（英）',
                'value6' => '切り抜き（英）',
                'value7' => '手書き風（英）',
                'value8' => 'カクカク（日・英）',
                'value9' => 'はんなり（日）',
                'value10' => 'にくきゅう（日）'
            ),
          ));

          $wp_customizer->add_setting('site_font_body', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_body', array(
            'label' => '全体（記事本文）のフォント',
            'description' => '現在3種類からお選びいただけます。',
            'section' => 'site_font',
            'type' => 'radio',
            'choices' => array(
                'value1' => 'デフォルト',
                'value2' => 'きっちり',
                'value3' => '柔らかい',
            ),
          ));

          $wp_customizer->add_setting('site_font_title_size', array(
            'default' => '200',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_title_size', array(
            'label' => 'サイトタイトルの文字サイズ',
            'description' => '文字サイズが調節できます。あまり大きくし過ぎてしまうとヘッダーからはみ出てしまうのでご注意ください。（デフォルト:200）',
            'section' => 'site_font',
            'type' => 'number',
          ));

          $wp_customizer->add_setting('site_font_pc_size', array(
            'default' => '100',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_pc_size', array(
            'label' => '【PC】サイトの文字サイズ',
            'description' => '961px以上の画面幅で適用されます。（デフォルト:100）',
            'section' => 'site_font',
            'type' => 'number',
          ));
          $wp_customizer->add_setting('site_font_tab_size', array(
            'default' => '98',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_tab_size', array(
            'label' => '【タブレット】サイトの文字サイズ',
            'description' => '561〜960pxまでの画面幅で適用されます。（デフォルト:98）',
            'section' => 'site_font',
            'type' => 'number',
          ));
          $wp_customizer->add_setting('site_font_sp_size', array(
            'default' => '95',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_font_sp_size', array(
            'label' => '【スマホ】サイトの文字サイズ',
            'description' => '320〜560pxまでの画面幅で適用されます。（デフォルト:95）',
            'section' => 'site_font',
            'type' => 'number',
          ));


      $wp_customizer->add_section('site_color',array(
        'priority' => 5,
        'title' => '5:色の設定',
        'panel' => 'site_builder',
      ));

      $wp_customizer->add_section('site_nav',array(
        'priority' => 6,
        'title' => '6:ナビメニューの設定',
        'panel' => 'site_builder',
      ));

          $wp_customizer->add_setting('site_nav_type',array(
            'default' => '1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_nav_type',array(
            'label' => 'ナビメニューの設定',
            'description' => '1〜3の中で選択して下さい。[注意：選択している組み合わせによっては上手く機能しない可能性もあります]',
            'section' => 'site_nav',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'デザイン1',
              'value2' => 'デザイン2',
              'value3' => 'デザイン3',
            ),
          ));

          $wp_customizer->add_setting('site_nav_width',array(
            'default' => false,
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_nav_width',array(
            'label' => 'ナビメニューの横幅に上限を設ける',
            'description' => 'コンテンツエリア（記事とサイドバーの部分）に設けている横幅とナビメニューの横幅を合わせます。',
            'section' => 'site_nav',
            'type' => 'checkbox',
          ));

      $wp_customizer->add_section('site_articleList',array(
        'priority' => 7,
        'title' => '7:記事一覧の設定',
        'panel' => 'site_builder',
      ));

          // $wp_customizer->add_setting('site_articleList_card_columns',array(
          //   'default' => '2',
          //   'type' => 'option',
          //   'transport' => 'refresh',
          // ));
          //
          // $wp_customizer->add_control('site_articleList_card_columns',array(
          //   'label' => '記事一覧のカラム',
          //   'description' => '1〜3の中で選択して下さい。[注意：選択している組み合わせによっては上手く機能しない可能性もあります]',
          //   'type' => 'radio',
          //   'choices' => array(
          //     'value1' => '1カラム',
          //     'value2' => '2カラム',
          //     'value3' => '3カラム',
          //   ),
          // ));

          $wp_customizer->add_setting('site_articleList_card', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customizer->add_control('site_articleList_card', array(
            'label' => '記事一覧のデザイン',
            'description' => '現在4種類からお選びいただけます。',
            'section' => 'site_articleList',
            'type' => 'radio',
            'choices' => array(
                'value1' => '縦/長めカード',
                'value2' => '横/長めカード',
                'value3' => 'サムネイルの上に文字',
                'value4' => 'カテゴリの乗り方がなんかいい感じ',
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

//コンテンツエリア横幅
  $contentArea = get_option('site_bone_content_area');

//サイドバー
  $sidebarLeft = get_option('site_bone_sidebar');
  $sidebarWidth = get_option('site_bone_sidebar_width');

//フォントの設定
  /*** タイトルフォントの設定 ***/
  $fontTitle = get_option('site_font_title');
    if ($fontTitle == 'value2') {
      $fontTitle = "'Luckiest Guy'";
    } elseif ($fontTitle == 'value3') {
      $fontTitle = "'Megrim'";
    } elseif ($fontTitle == 'value4') {
      $fontTitle = "'Faster One'";
    } elseif ($fontTitle == 'value5') {
      $fontTitle = "'Iceland'";
    } elseif ($fontTitle == 'value6') {
      $fontTitle = "'Londrina Outline'";
    } elseif ($fontTitle == 'value7') {
      $fontTitle = "'Caveat'";
    } elseif ($fontTitle == 'value8') {
      $fontTitle = '"Nico Moji"';
    } elseif ($fontTitle == 'value9') {
      $fontTitle = '"Hannari"';
    } elseif ($fontTitle == 'value10') {
      $fontTitle = '"Nikukyu"';
    }

  /*** 本文フォントの設定 ****/
  $fontBody =  get_option('site_font_body');
    if ($fontBody == 'value2') {
      $fontBody = "'Yu Mincho Light','YuMincho','Yu Mincho','游明朝体','Yu Gothic UI','ヒラギノ明朝 ProN','Hiragino Mincho ProN',sans-serif";
    } elseif ($fontBody == 'value3') {
      $fontBody = "'M PLUS Rounded 1c', sans-serif";
    } else {
      $fontBody = '';
    }

  /*** サイトタイトルの文字サイズ ***/
  $titleSize = get_option('site_font_title_size');
  $pcSize = get_option('site_font_pc_size');
  $tabSize = get_option('site_font_tab_size');
  $spSize = get_option('site_font_sp_size');


  /*ナビメニューの横幅*/
  $nav = get_option('site_nav_width');
  ?>
  <style>
    body{font-family:<?php echo $fontBody ?>;}
    nav a.siteTitle{font-family:<?php echo $fontTitle ?>;font-size: <?php echo $titleSize ?>%;}
    @media (min-width: 961px){body{font-size:<?php echo $pcSize ?>%;<?php if ($sidebarLeft == true): ?>}.contentArea{flex-direction: row-reverse;-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse;}<?php endif; ?>}
    @media (max-width:960px){body{font-size:<?php echo $tabSize ?>%;}}
    @media (max-width:560px){body{font-size:<?php echo $spSize ?>%;}}
    .contentArea{max-width:<?php $contentArea ?>px;}
    <?php if ($nav == true): ?>
    .nav-wrapper{max-width:<?php $contentArea ?>px;margin: auto;}
    <?php endif; ?>
    .row .col.l3{width:<?php echo $sidebarWidth ?>%;}
  </style>
  <?php
}//END add_customizerCSS()

add_action('wp_head', 'add_customizerCSS');
