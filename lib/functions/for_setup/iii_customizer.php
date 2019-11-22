<?php

// ======
//  MEMO
// ======
//
// ` 'transport' => 'postMessage' `を設定するとリアルタイムプレビューを無効
// panel（フォルダ） >> section（フォルダ） >> label（ファイル）みたいなイメージ
//
// 3-1 タイプの登録
// 3-2 カスタマイザー項目ついか
// 3-3 設定した値の出力
//
// ======
//  END
// ======

//////////////////////////////
// 3-1 タイプの登録
//////////////////////////////

// 'type'で'textarea'の登録
if (class_exists('WP_Customize_Control')){
  class EX_Customize_Textarea_Control extends WP_Customize_Control{
    public $type = 'textarea';
    public function render_content(){
      ?>
      <label>
        <span><?php echo esc_html($this->label); ?></span>
        <textarea rows="8" style="width:100%;"><?php $this->link(); ?><?php echo esc_textarea($this->value()); ?></textarea>
      </label>
      <?php
    }
  }
}


//////////////////////////////
// 3-2 カスタマイザー項目追加
//////////////////////////////

function org_customizer($wp_customize){

  /********
  // STEP1
  ********/
  $wp_customize->add_panel('site_conf', array(
    'priority' => 1,
    'title' => 'STEP1【基本設定】',
    'description' => 'サイトの基本設定です。SEOに有効に働く項目もあります。*は設定必須項目です。'
  ));

      $wp_customize->add_section('title_tagline', array(
        'title' => '基本情報とロゴの設定*',
        'panel' => 'site_conf',
      ));

          $wp_customize->add_setting('meta_description', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'postMessage',
          ));

          $wp_customize->add_control('meta_description', array(
            'settings' => 'meta_description',
            'label' => 'サイトの説明文*',
            'description' => '検索結果などに表示されます。（推奨100文字以内）',
            'section' => 'title_tagline',
            'type' => 'textarea',
          ));


  /********
  // STEP2
  ********/
  $wp_customize->add_panel('site_builder', array(
    'priority' => 2,
    'title' => 'STEP2【外観設定】',
    'description' => 'サイトの外観設定です。',
  ));

      $wp_customize->add_section('site_bone', array(
        'priority' => 1,
        'title' => '1:骨組みの設定',
        'panel' => 'site_builder',
      ));

          $wp_customize->add_setting('site_bone_type', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_bone_type', array(
            'label' => 'トップページのタイプ',
            'description' => '現在4種類から選べます。（Nav:ヘッダー部分。Main:記事一覧部分。DynamicHeader:宣伝などに使える部分。Side:サイドバー部分。Footer:フッター部分。）',
            'section' => 'site_bone',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'メディア（Nav/Main/Side/Footer）',
              'value2' => 'ワンカラム（Nav/Main/Footer）',
              'value3' => 'コーポレート（Nav/DynamicHeader/Main/Side/Footer）',
              'value4' => 'ランディング（Nav/DynamicHeader/Features/Footer）',
            ),
          ));

          $wp_customize->add_setting('site_bone_content_area', array(
            'default' => 1200,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_bone_content_area', array(
            'label' => 'コンテンツエリアの最大横幅',
            'description' => 'コンテンツ部分の最大横幅を設定します。（デフォルト:1200）',
            'section' => 'site_bone',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_bone_sidebar', array(
            'default' => false,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_bone_sidebar', array(
            'label' => 'サイドバーを左側に表示',
            'description' => 'サイトバーがある構造の場合、チェックを入れるとサイドバーが左側に表示されます。',
            'section' => 'site_bone',
            'type' => 'checkbox',
          ));

          $wp_customize->add_setting('site_bone_sidebar_width', array(
            'default' => 30,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_bone_sidebar_width', array(
            'label' => 'サイドバーの横幅（デフォルト:30）',
            'description' => 'サイドバーの横幅を設定できます',
            'section' => 'site_bone',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_bone_priority', array(
            'default' => false,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_bone_priority', array(
            'label' => 'ダイナミックヘッダーを画面最上部に表示',
            'description' => 'チェックを入れると画面最上部にダイナミックヘッダーが表示され、その下にナビバーが表示されます。（『トップページのタイプ』でコーポレートまたはランディングを選択した場合のみ適用）',
            'section' => 'site_bone',
            'type' => 'checkbox',
          ));

      $wp_customize->add_section('site_dyheader', array(
        'priority' => 2,
        'title' => '2:ダイナミックヘッダー（『1:骨組みの設定』で選択した場合のみ）',
        'panel' => 'site_builder',
      ));


          $wp_customize->add_setting('site_dyheader_text', array(
            'default' => "Let's enjoy self-expression!",
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_dyheader_text', array(
            'label' => 'ヘッダー部分のテキスト',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customize->add_setting('site_dyheader_text_size', array(
            'default' => 200,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_dyheader_text_size', array(
            'label' => 'ヘッダー部分のテキストサイズ',
            'section'  => 'site_dyheader',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_dyheader_text_color', array(
            'default' => '#333333',
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_dyheader_text_color', array(
            'label' => 'ヘッダー部分のテキスト色',
            'section'  => 'site_dyheader',
          )));

          $wp_customize->add_setting('site_dyheader_text_animation', array(
            'default' => 'value1',
            'type' => 'option',
          ));
          $wp_customize->add_control('site_dyheader_text_animation', array(
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

          $wp_customize->add_setting('site_dyheader_button', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customize->add_control('site_dyheader_button', array(
            'label' => 'ヘッダー部分のボタン',
            'description' => 'ヘッダー部分に適用されるCTA的に使用可能なボタンです。（空白の場合ボタンは表示されません。）',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customize->add_setting('site_dyheader_button_link', array(
            'default' => '#',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customize->add_control('site_dyheader_button_link', array(
            'label' => 'ボタンのリンク先URL',
            'description' => 'リンク先のURLを入力してください。',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customize->add_setting('site_dyheader_button2', array(
            'default' => '',
            'type' => 'option',
            'transport'  => 'refresh',
          ));
          $wp_customize->add_control('site_dyheader_button2', array(
            'label' => 'ヘッダー部分のボタン2',
            'description' => 'もう一つボタンが必要な場合はこちらから。（空白の場合ボタンは表示されません。）',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customize->add_setting('site_dyheader_button2_link', array(
            'default' => '#',
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_dyheader_button2_link', array(
            'label' => 'ボタンのリンク先URL',
            'description' => '',
            'section'  => 'site_dyheader',
            'type' => 'text',
          ));

          $wp_customize->add_setting('site_dyheader_img', array(
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_dyheader_img', array(
      			'label' => 'ヘッダー部分の画像（文字の隣）',
            'description' => 'ヘッダー部分のテキストの隣に画像を挿入します。',
      			'section' => 'site_dyheader',
        	)));

          $wp_customize->add_setting('site_dyheader_img_width', array(
            'default' => '100',
            'type' => 'option',
          ));

          $wp_customize->add_control('site_dyheader_img_width', array(
      			'label' => 'ヘッダー部分の画像のサイズ',
            'description' => 'ヘッダー部分の画像のサイズの調整ができます。（デフォルト:100,最大:100）',
      			'section' => 'site_dyheader',
            'type' => '100',
        	));

          $wp_customize->add_setting('site_dyheader_img_position', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_dyheader_img_position', array(
            'label' => 'ヘッダー部分の画像を左側へ移動',
            'section' => 'site_dyheader',
            'type' => 'checkbox',
          ));

          $wp_customize->add_setting('site_dyheader_bkimg', array(
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_dyheader_bkimg', array(
            'label' => 'ヘッダー部分の画像（背景）',
            'description' => 'ヘッダー部分の背景に画像を挿入します。',
            'section' => 'site_dyheader',
          )));

          $wp_customize->add_setting('site_dyheader_bkimg_filter', array(
            'default' => 'value1',
            'type' => 'option',
          ));

          $wp_customize->add_control('site_dyheader_bkimg_filter', array(
            'label' => 'ヘッダー部分の背景画像フィルター',
            'description' => 'ヘッダーの背景画像にフィルターをかけることができます。文字が見づらい背景画像を使用する場合に有効です。',
            'section' => 'site_dyheader',
            'type' => 'select',
            'choices' => array(
              'value1' => 'フィルターなし',
              'value2' => 'うっすら暗く',
              'value3' => 'うっすら明るく',
              'value4' => 'ドット',
              'value5' => '斜線',
              'value6' => '罫線',
              'value7' => 'ボカシ',
            ),
          ));

          $wp_customize->add_setting('site_dyheader_bkcolor', array(
            'default' => '#f1f2f3',
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_dyheader_bkcolor', array(
            'label' => 'ヘッダー部分の背景色',
            'description' => 'ヘッダー部分の背景の色を設定します（画像がある場合は画像が優先されます）。',
            'section' => 'site_dyheader',
          )));

          $wp_customize->add_setting('site_dyheader_width', array(
            'default' => 1200,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_dyheader_width', array(
            'label' => 'ヘッダー部分の最大横幅',
            'description' => 'ヘッダー部分の最大横幅を設定できます。『1:骨組みの設定』で設定した数値と同じものがオススメです。（デフォルト:1200,最大3000）',
            'section'  => 'site_dyheader',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_dyheader_height', array(
            'default' => 50,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_dyheader_height', array(
            'label' => 'ヘッダー部分の高さ',
            'description' => 'ヘッダー部分の高さを調整できます（デフォルト:50,最大:100）',
            'section'  => 'site_dyheader',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_dyheader_margin-top', array(
            'default' => 0,
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_dyheader_margin-top', array(
            'label' => 'ヘッダー部分の上部の余白',
            'description' => 'ヘッダー部分の上部に余白を設け、調整できます（デフォルト:0,推奨:0または20）',
            'section'  => 'site_dyheader',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_dyheader_padding', array(
            'default' => '20',
            'type' => 'option',
          ));

          $wp_customize->add_control('site_dyheader_padding', array(
            'label' => 'ヘッダー部分の余白',
            'description' => 'ヘッダー部分の余白を調整できます（デフォルト:20）。',
            'section' => 'site_dyheader',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_dyheader_notTop', array(
            'default' => false,
            'type' => 'option',
          ));

          $wp_customize->add_control('site_dyheader_notTop', array(
            'label' => 'トップ（ホーム）画面以外でも表示',
            'description' => '通常はトップページのみで表示するようになっているダイナミックヘッダーを記事ページやカテゴリページでも表示するようにします。',
            'section' => 'site_dyheader',
            'type' => 'checkbox',
          ));

      $wp_customize->add_section('site_feature', array(
        'priority' => 3,
        'title' => '3:フューチャー部分（『1:骨組みの設定』で選択した場合のみ）',
        'panel' => 'site_builder',
      ));

        $wp_customize->add_setting('site_feature_section_animation', array(
          'type' => 'option',
          'default' => false,
        ));

        $wp_customize->add_control('site_feature_section_animation', array(
          'label' => 'フェードインのアニメーションを使用する',
          'desscription' => 'フューチャー部分全体にjQueryのアニメーションを使用します。（サイトスピードが若干落ちます）',
          'type' => 'checkbox',
          'section' => 'site_feature',
        ));

          $wp_customize->add_setting('site_feature_section_ttl', array(
            'type' => 'option'
          ));

          $wp_customize->add_control('site_feature_section_ttl', array(
            'label' => 'セクションのタイトル',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_description', array(
            'type' => 'option'
          ));

          $wp_customize->add_control('site_feature_section_description', array(
            'label' => 'セクションの説明文（HTML使用可能）',
            'type' => 'textarea',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item1_icon', array(
            'type' => 'option',
            'default' => '<i class="fas fa-shield-alt"></i>'
          ));

          $wp_customize->add_control('site_feature_section_item1_icon', array(
            'label' => 'アイテム1のアイコン',
            'description' => '<i class="fas fa-coins"></i>のようなコードを貼り付けてください。',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item1_icon_color', array(
            'type' => 'option',
            'default' => '#1C6ECD'
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section_item1_icon_color', array(
            'label' => 'アイテム1のアイコン色',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section_item1_ttl', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item1_ttl', array(
            'label' => 'アイテム1のタイトル',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item1_description', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item1_description', array(
            'label' => 'アイテム1の説明文',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item2_icon', array(
            'type' => 'option',
            'default' => '<i class="fas fa-heartbeat"></i>'
          ));

          $wp_customize->add_control('site_feature_section_item2_icon', array(
            'label' => 'アイテム2のアイコン',
            'description' => '<i class="fas fa-coins"></i>のようなコードを貼り付けてください。',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item2_icon_color', array(
            'type' => 'option',
            'default' => '#E64A64'
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section_item2_icon_color', array(
            'label' => 'アイテム2のアイコン色',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section_item2_ttl', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item2_ttl', array(
            'label' => 'アイテム2のタイトル',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item2_description', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item2_description', array(
            'label' => 'アイテム2の説明文',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item3_icon', array(
            'type' => 'option',
            'default' => '<i class="fas fa-coins"></i>'
          ));

          $wp_customize->add_control('site_feature_section_item3_icon', array(
            'label' => 'アイテム3のアイコン',
            'description' => '<i class="fas fa-coins"></i>のようなコードを貼り付けてください。',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item3_icon_color', array(
            'type' => 'option',
            'default' => '#ffcc00'
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section_item3_icon_color', array(
            'label' => 'アイテム3のアイコン色',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section_item3_ttl', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item3_ttl', array(
            'label' => 'アイテム3のタイトル',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item3_description', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item3_description', array(
            'label' => 'アイテム3の説明文',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_ttl', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section2_ttl', array(
            'label' => 'セクション2のタイトル',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_description', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section2_description', array(
            'label' => 'セクション2の本文',
            'type' => 'textarea',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_bk_img', array(
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_feature_section2_bk_img', array(
            'label' => 'セクション2の背景画像',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section2_bk_color', array(
            'default' => '#f9f9f9',
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section2_bk_color', array(
            'label' => 'セクション2の背景色',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section3_ttl', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section3_ttl', array(
            'label' => 'セクション3のタイトル',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section3_description', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section3_description', array(
            'label' => 'セクション3の本文',
            'type' => 'textarea',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section3_bk_img', array(
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_feature_section3_bk_img', array(
            'label' => 'セクション3の背景画像',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section3_bk_color', array(
            'default' => '#f9f9f9',
            'type' => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section3_bk_color', array(
            'label' => 'セクション3の背景色',
            'section' => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_q1', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_q1', array(
            'label' => '質問1',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a1', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_a1', array(
            'label' => '答え1',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q2', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_q2', array(
            'label' => '質問2',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a2', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_a2', array(
            'label' => '答え2',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q3', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_q3', array(
            'label' => '質問3',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a3', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_a3', array(
            'label' => '答え3',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q4', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_q4', array(
            'label' => '質問4',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a4', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_a4', array(
            'label' => '答え4',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q5', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_q5', array(
            'label' => '質問5',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a5', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_a5', array(
            'label' => '答え5',
            'type' => 'text',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section5_info', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_feature_section5_info', array(
            'label' => 'フリースペース（会社情報や商品情報など）',
            'type' => 'textarea',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section5_map', array(
            'type' => 'option',
            'default' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.2823422657766!2d139.77007871513112!3d35.71927413549223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188e827551ab83%3A0x59f3effef9b46130!2z5p2x5Lqs6Jed6KGT5aSn5a2m!5e0!3m2!1sja!2sjp!4v1574213861441!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
          ));

          $wp_customize->add_control('site_feature_section5_map', array(
            'label' => '地図',
            'description' => 'GoogleMapの埋め込み機能を利用できます。',
            'type' => 'textarea',
            'section' => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section6_bk_color', array(
            'type' => 'option',
            'default' => '#1fb2aa',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section6_bk_color', array(
            'label' => 'セクション6の背景色',
          )));

          $wp_customize->add_setting('site_feature_section6_color', array(
            'type' => 'option',
            'default' => '#ffffff',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section6_color', array(
            'label' => 'セクション6の文字色'
          )));


//　よくある質問（5個/空白であれば出力なし） & コンタクト（お問い合わせ）CTAエリア &

      $wp_customize->add_section('site_cssfw', array(
        'priority' => 4,
        'title' => '4:デザインの設定',
        'panel' => 'site_builder',
      ));

          $wp_customize->add_setting('site_cssfw_choice', array(
            'default' => 'value1',
            'type' => 'option',
            'transport'  => 'refresh',
          ));

          $wp_customize->add_control('site_cssfw_choice', array(
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

      $wp_customize->add_section('site_font',array(
        'priority' => 5,
        'title' => '5:フォントの設定',
        'panel' => 'site_builder',
      ));

          $wp_customize->add_setting('site_font_title', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_font_title', array(
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

          $wp_customize->add_setting('site_font_body', array(
            'default' => 'value1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_font_body', array(
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

          $wp_customize->add_setting('site_font_title_size', array(
            'default' => '200',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_font_title_size', array(
            'label' => 'サイトタイトルの文字サイズ',
            'description' => '文字サイズが調節できます。あまり大きくし過ぎてしまうとヘッダーからはみ出てしまうのでご注意ください。（デフォルト:200）',
            'section' => 'site_font',
            'type' => 'number',
          ));

          $wp_customize->add_setting('site_font_pc_size', array(
            'default' => '100',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_font_pc_size', array(
            'label' => '【PC】サイトの文字サイズ',
            'description' => '961px以上の画面幅で適用されます。（デフォルト:100）',
            'section' => 'site_font',
            'type' => 'number',
          ));
          $wp_customize->add_setting('site_font_tab_size', array(
            'default' => '98',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_font_tab_size', array(
            'label' => '【タブレット】サイトの文字サイズ',
            'description' => '561〜960pxまでの画面幅で適用されます。（デフォルト:98）',
            'section' => 'site_font',
            'type' => 'number',
          ));
          $wp_customize->add_setting('site_font_sp_size', array(
            'default' => '95',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_font_sp_size', array(
            'label' => '【スマホ】サイトの文字サイズ',
            'description' => '320〜560pxまでの画面幅で適用されます。（デフォルト:95）',
            'section' => 'site_font',
            'type' => 'number',
          ));


      $wp_customize->add_section('site_color',array(
        'priority' => 6,
        'title' => '6:色の設定',
        'panel' => 'site_builder',
      ));

          $wp_customize->add_setting('site_color_nav_bk', array(
            'type' => 'option',
            'default' => '#1fb2aa',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_nav_bk', array(
            'label' => 'ナビバーの背景色',
            'section' => 'site_color',
          )));

          $wp_customize->add_setting('site_color_nav_color', array(
            'type' => 'option',
            'default' => '#ffffff'
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_nav_color', array(
            'label' => 'ナビバーの文字色',
            'section' => 'site_color',
          )));

          $wp_customize->add_setting('site_color_body_color', array(
            'type' => 'option',
            'default' => '#f5f5f5',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_body_color', array(
            'label' => 'コンテンツエリア全体の背景',
            'section' => 'site_color',
          )));

          $wp_customize->add_setting('site_color_body_color', array(
            'type' => 'option',
            'default' => '#2c3e50',
            'default' => '#1a2760',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_body_color', array(
            'label' => 'コンテンツエリア全体の文字色',
            'section' => 'site_color',
          )));

      $wp_customize->add_section('site_nav',array(
        'priority' => 7,
        'title' => '7:ナビメニューの設定',
        'panel' => 'site_builder',
      ));

      //背景の絶対位置化でダイナミックヘッダーと合成するオプションつける

          $wp_customize->add_setting('site_nav_type',array(
            'default' => '1',
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_nav_type',array(
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

          $wp_customize->add_setting('site_nav_width',array(
            'default' => false,
            'type' => 'option',
            'transport' => 'refresh',
          ));

          $wp_customize->add_control('site_nav_width',array(
            'label' => 'ナビメニューの横幅に上限を設ける',
            'description' => 'コンテンツエリア（記事とサイドバーの部分）に設けている横幅とナビメニューの横幅を合わせます。',
            'section' => 'site_nav',
            'type' => 'checkbox',
          ));

          $wp_customize->add_setting('site_nav_list1', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_nav_list1', array(
            'label' => 'テキスト',
            'type' => 'text',
            'section' => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list2', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_nav_list2', array(
            'label' => 'テキスト',
            'type' => 'text',
            'section' => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list3', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_nav_list3', array(
            'label' => 'テキスト',
            'type' => 'text',
            'section' => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list4', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_nav_list4', array(
            'label' => 'テキスト',
            'type' => 'text',
            'section' => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list5', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_nav_list5', array(
            'label' => 'テキスト',
            'type' => 'text',
            'section' => 'site_nav',
          ));

      $wp_customize->add_section('site_article',array(
        'priority' => 8,
        'title' => '8:記事の設定',
        'panel' => 'site_builder',
      ));

          // $wp_customize->add_setting('site_articleList_card_columns',array(
          //   'default' => '2',
          //   'type' => 'option',
          //   'transport' => 'refresh',
          // ));
          //
          // $wp_customize->add_control('site_articleList_card_columns',array(
          //   'label' => '記事一覧のカラム',
          //   'description' => '1〜3の中で選択して下さい。[注意：選択している組み合わせによっては上手く機能しない可能性もあります]',
          //   'type' => 'radio',
          //   'choices' => array(
          //     'value1' => '1カラム',
          //     'value2' => '2カラム',
          //     'value3' => '3カラム',
          //   ),
          // ));

          $wp_customize->add_setting('site_article_list_type', array(
            'type' => 'option',
            'default' => 'value1',
          ));

          $wp_customize->add_control('site_article_list_type', array(
            'label' => '記事一覧のデザイン',
            'description' => 'トップ画面で表示する記事一覧のデザイン。現在4種類からお選びいただけます。',
            'section' => 'site_article',
            'type' => 'radio',
            'choices' => array(
              'value1' => '縦/長めカード',
              'value2' => '横/長めカード',
              'value3' => 'サムネイルの上に文字',
              'value4' => 'カテゴリの乗り方がなんかいい感じ',
            ),
          ));

          $wp_customize->add_setting('site_article_type' ,array(
            'type' => 'option',
            'default' => 'value1',
          ));

          $wp_customize->add_control('site_article_type', array(
            'label' => '記事ページデザイン',
            'description' => '記事詳細画面のデザイン設定。（固定ページにも同様のものが適用されます）',
            'type' => 'radio',
            'choices' => array(
              'value1' => 'デザイン1',
              'value2' => 'デザイン2',
              'value3' => 'デザイン3',
              'value4' => 'デザイン4',
            ),
            'section' => 'site_article'
          ));

          $wp_customize->add_setting('site_article_p_margin', array(
            'type' => 'option',
          ));

          $wp_customize->add_control('site_article_p_margin', array(
            'default' => 0.5,
            'description' => 'pタグ下の余白を設定します。'
            'type' => 'number',
            'section' => 'site_article',
          ));



  // サイト構造（コンポーネントの順番）
  // ## example )
  // - HEADER => NAV => ARTCILE LIST => ASIDE => FOOTER
  // - NAV => ARTICLE LIST => FOOTER
  // - DYNAMIC HEADER => ARTICLE => FOOTER


  // STEP3

  $wp_customize->add_panel('site_admin', array(
    'priority' => 3,
    'title' => 'STEP3【運営設定】',
    'description' => 'サイトの運営設定',
  ));

} //END org_customizer()


//////////////////////////////
// 3-3 設定した値の出力
//////////////////////////////

function add_customizerCSS(){


//サイトの骨組み
  $siteType             = get_option('site_bone_type');

//コンテンツエリア横幅
  $contentArea          = get_option('site_bone_content_area') ? get_option('site_bone_content_area') : '1200';

//サイドバー
  $sidebarLeft          = get_option('site_bone_sidebar');
  $sidebarWidth         = get_option('site_bone_sidebar_width');

//ダイナミックヘッダー
  $dyheaderFontSize     = get_option('site_dyheader_text_size')     ? get_option('site_dyheader_text_size')   : '200';
  $dyheaderFontColor    = get_option('site_dyheader_text_color');
  $dyheaderWidth        = get_option('site_dyheader_width')         ? get_option('site_dyheader_width')       : '1200';
  $dyheaderHeight       = get_option('site_dyheader_height')        ? get_option('site_dyheader_height')      : '50';
  $dyheaderMarginTop    = get_option('site_dyheader_margin-top')    ? get_option('site_dyheader_margin-top')  : '0';
  $dyheaderPadding      = get_option('site_dyheader_padding')       ? get_option('site_dyheader_padding')     : '20';
  $dyheaderImg          = get_option('site_dyheader_img');
  $dyheaderImgWidth     = get_option('site_dyheader_img_width')     ? get_option('site_dyheader_img_width')   : '100';
  $dyheaderImgPosition  = get_option('site_dyheader_img_position');
  $dyheaderBkImg        = get_option('site_dyheader_bkimg');
  $dyheaderBkColor      = get_option('site_dyheader_bkcolor');

//フューチャー部分
  $featureIcon1Color    = get_option('site_feature_section_item1_icon_color') ? get_option('site_feature_section_item1_icon_color') : '#1C6ECD';
  $featureIcon2Color    = get_option('site_feature_section_item2_icon_color') ? get_option('site_feature_section_item2_icon_color') : '#E64A64';
  $featureIcon3Color    = get_option('site_feature_section_item3_icon_color') ? get_option('site_feature_section_item3_icon_color') : '#ffcc00';
  $featureSec2BkImg     = get_option('site_feature_section2_bk_img');
  $featureSec2BkColor   = get_option('site_feature_section2_bk_color')        ? get_option('site_feature_section2_bk_color') : '#f9f9f9';
  $featureSec3BkImg     = get_option('site_feature_section3_bk_img');
  $featureSec3BkColor   = get_option('site_feature_section3_bk_color')        ? get_option('site_feature_section3_bk_color') : '#f9f9f9';

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
      $fontBody = 'Avenir,Helvetica Neue,Helvetica,Arial,Hiragino Sans,ヒラギノ角ゴシック,YuGothic,Yu Gothic,メイリオ,Meiryo,ＭＳ\ Ｐゴシック,MS PGothic,sans-serif';
    }

  /*** サイトの文字サイズ ***/
  $titleSize  = get_option('site_font_title_size')  ? get_option('site_font_title_size') : '200';
  $pcSize     = get_option('site_font_pc_size')     ? get_option('site_font_pc_size') : '100';
  $tabSize    = get_option('site_font_tab_size')    ? get_option('site_font_tab_size') : '98';
  $spSize     = get_option('site_font_sp_size')     ? get_option('site_font_sp_size') : '95';


  /*ナビメニューの横幅*/
  $nav    = get_option('site_nav_width');
  $navEn1 = get_option('site_nav_list1');
  $navEn2 = get_option('site_nav_list2');
  $navEn3 = get_option('site_nav_list3');
  $navEn4 = get_option('site_nav_list4');
  $navEn5 = get_option('site_nav_list5');

  /*色の設定*/
  $nav_bk   = get_option('site_color_nav_bk')     ? get_option('site_color_nav_bk')     : '#1fb2aa';
  $body_bk  = get_option('site_color_body_bk')    ? get_option('site_color_body_bk')    : '#f5f5f5';
  $nav_c    = get_option('site_color_nav_color')  ? get_option('site_color_nav_color')  : '#ffffff';
  $body_c   = get_option('site_color_body_color') ? get_option('site_color_body_color') : '#2c3e50';

  /*記事に関する設定*/
  $p_margin = get_option('site_article_p_margin') ? get_option('site_article_p_margin') : '0.5';

  ?>
<?php // カスタマイザーの値を<head>に出力 ?>
<style>
body{font-family:<?php echo $fontBody ?>;color:<?php echo $body_c ?>;background:<?php echo $body_bk ?>;}
nav a.siteTitle{font-family:<?php echo $fontTitle ?>;font-size: <?php echo $titleSize ?>%;}
@media (min-width: 961px){body{font-size:<?php echo $pcSize ?>%;<?php if ($sidebarLeft == true): ?>}.contentArea{flex-direction: row-reverse;-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse;}<?php endif; ?>}}
@media (max-width:960px){body{font-size:<?php echo $tabSize ?>%;}}
@media (max-width:560px){body{font-size:<?php echo $spSize ?>%;}}
<?php if ($siteType == 'value3' || $siteType == 'value4' ) : ?>
.dyheader{background-color:<?php echo $dyheaderBkColor ?>;
  <?php if ($dyheaderBkImg != null) : ?>background:url("<?php echo $dyheaderBkImg ?>") no-repeat center/cover;<?php endif; ?>
}
.dyheader_textArea p{font-size:<?php echo $dyheaderFontSize ?>%;color:<?php echo $dyheaderFontColor ?>;}
.dyheader{max-width:<?php echo $dyheaderWidth ?>px;height:<?php echo $dyheaderHeight ?>vh;margin-top:<?php echo $dyheaderMarginTop ?>px;padding:<?php echo $dyheaderPadding ?>px;}
<?php if ($dyheaderImg != null) : ?>
.dyheader_container{-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;}
.dyheader_imgArea img{width:<?php echo $dyheaderImgWidth ?>%;}
<?php if ($dyheaderImgPosition == true) : ?>
.dyheader_container{-ms-flex-wrap: wrap-reverse;flex-wrap: wrap-reverse;-webkit-box-orient: horizontal;-webkit-box-direction: reverse;-ms-flex-direction: row-reverse;flex-direction: row-reverse;}
<?php endif; //END imgを左側にするか ?>
<?php endif; //END imageがあるかどうか ?>
<?php endif; //END そもそもダイナミックヘッダーがあるかどうか?>
<?php if ( $siteType == 'value4' ) : //フューチャーがあるかどうか ?>
.f_item:nth-child(1) i{color:<?php echo $featureIcon1Color ?>;}
.f_item:nth-child(2) i{color:<?php echo $featureIcon2Color ?>;}
.f_item:nth-child(3) i{color:<?php echo $featureIcon3Color ?>;}
.feature2{<?php if ($featureSec2BkImg != null) : ?>background:url("<?php echo $featureSec2BkImg ?>") no-repeat center/cover;<?php endif; ?>background-color:<?php echo $featureSec2BkColor ?>;}
.feature3{<?php if ($featureSec3BkImg != null) : ?>background:url("<?php echo $featureSec3BkImg ?>") no-repeat center/cover;<?php endif; ?>background-color:<?php echo $featureSec3BkColor ?>;}
<?php endif; //END フューチャーがあるかどうか ?>
.contentArea{max-width:<?php echo $contentArea ?>px;}
<?php if ($nav == true): ?>
.nav-wrapper{max-width:<?php echo $contentArea ?>px;margin: auto;}
<?php endif; ?>
#topnav li:nth-of-type(1)::after{content:"<?php echo $navEn1 ?>";}
#topnav li:nth-of-type(2)::after{content:"<?php echo $navEn2 ?>";}
#topnav li:nth-of-type(3)::after{content:"<?php echo $navEn3 ?>";}
#topnav li:nth-of-type(4)::after{content:"<?php echo $navEn4 ?>";}
#topnav li:nth-of-type(5)::after{content:"<?php echo $navEn5 ?>";}
.row .col.l3{width:<?php echo $sidebarWidth ?>%;}
/*****************************
******************************
色****************************
******************************
*****************************/
nav{background:<?php echo $nav_bk ?>;color:<?php echo $nav_c ?>;}
nav .brand-logo,nav a,nav ul a{color:<?php echo $nav_c ?>;}

/****************************
*****************************
記事****************************
*****************************
****************************/
.article_content p{margin-bottom:<?php echo $p_margin ?>em;}

</style>

<?php
}//END add_customizerCSS()

add_action('wp_head', 'add_customizerCSS');
