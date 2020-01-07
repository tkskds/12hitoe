<?php

// ======
//  MEMO
// ======
//
// ` 'transport' => 'postMessage' `を設定するとリアルタイムプレビューを無効
// panel（フォルダ） >> section（フォルダ） >> label（ファイル）みたいなイメージ
//
// 3-1 タイプの登録
// 3-2 サニタイザー登録
// 3-3 カスタマイザー項目追加
//
//  label -> description -> type -> section
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
// 3-2 サニタイザー登録
//////////////////////////////

function sanitize_checkbox($input){
  return ($input == true);
}

//////////////////////////////
// 3-3 カスタマイザー項目追加
//////////////////////////////

function org_customizer($wp_customize){

  /********
  // STEP1
  ********/
  $wp_customize->add_panel('site_conf', array(
    'priority'                  => 1,
    'title'                     => 'STEP1【基本設定】',
    'description'               => 'サイトの基本設定です。設定することでSEOに有効に働く項目もあります。'
  ));

      $wp_customize->add_section('title_tagline', array(
        'title'                 => '基本情報とロゴの設定',
        'panel'                 => 'site_conf',
      ));

          $wp_customize->add_setting('meta_description', array(
            'default'           => '',
            'type'              => 'option',
          ));

          $wp_customize->add_control('meta_description', array(
            'label'             => 'サイトの説明文',
            'description'       => '検索結果などに表示されます。記述がなかった場合、サイト名などを用いて自動で設定されます。（推奨100文字以内）',
            'type'              => 'textarea',
            'section'           => 'title_tagline',
          ));

          $wp_customize->add_setting('only_logo', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('only_logo', array(
            'label'             => 'タイトルテキストの非表示',
            'description'       => 'チェックを入れるとタイトル部分がロゴ画像だけになります。',
            'type'              => 'checkbox',
            'section'           => 'title_tagline',
          ));

      $wp_customize->add_section('static_front_page', array(
        'title'                 => 'トップページの設定',
        'panel'                 => 'site_conf',
      ));

  /********
  // STEP2
  ********/
  $wp_customize->add_panel('site_builder', array(
    'priority'                  => 2,
    'title'                     => 'STEP2【外観設定】',
    'description'               => 'サイトの外観設定です。',
  ));

      $wp_customize->add_section('site_bone', array(
        'priority'              => 1,
        'title'                 => '1.全体/トップページの設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_bone_type', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_bone_type', array(
            'label'             => '1-1.トップページのタイプ',
            'description'       => '現在4種類から選べます。詳しくは<a href="https://withdiv.com/12hitoe/12hitoe-customize/#m1-1" rel="noreferrer noopener" target="_blank">こちら</a>',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1（Nav/Main/Side/Footer）',
              'value2'          => 'デザイン2（Nav/Main/Footer）',
              'value3'          => 'デザイン3（Nav/DynamicHeader/Main/Side/Footer）',
              'value4'          => 'デザイン4（Nav/DynamicHeader/Features/Footer）',
            ),
            'section'           => 'site_bone',
          ));

          $wp_customize->add_setting('site_bone_content_area', array(
            'default'           => 1200,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_bone_content_area', array(
            'label'             => '1-2.コンテンツエリアの最大横幅',
            'description'       => 'コンテンツ部分の最大横幅を設定します。（デフォルト:1200）',
            'type'              => 'number',
            'section'           => 'site_bone',
          ));

          $wp_customize->add_setting('site_bone_sidebar', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_bone_sidebar', array(
            'label'             => '1-3.サイドバーを左側に表示',
            'description'       => 'サイトバーがある構造の場合、チェックを入れるとサイドバーが左側に表示されます。',
            'type'              => 'checkbox',
            'section'           => 'site_bone',
          ));

          $wp_customize->add_setting('site_bone_priority', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_bone_priority', array(
            'label'             => '1-4.ダイナミックヘッダーを画面最上部に表示',
            'description'       => 'チェックを入れると画面最上部にダイナミックヘッダーが表示され、その下にナビバーが表示されます。（『トップページのタイプ』でコーポレートまたはランディングを選択した場合のみ適用）',
            'type'              => 'checkbox',
            'section'           => 'site_bone',
          ));

          $wp_customize->add_setting('site_cssfw_choice', array(
            'default'           => 'value2',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_cssfw_choice', array(
            'label'             => '1-5.サイト全体の雰囲気',
            'description'       => '現在2種類から選べます。',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => '開発者・デザイナー向け（CSS適用なし）',
              'value2'          => 'マテリアル',
              'value3'          => 'フラット（開発中。選択不可）',
              'value4'          => 'ライン（開発中。選択不可）',
            ),
            'section'           => 'site_bone',
          ));

          $wp_customize->add_setting('site_bone_dark', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox'
          ));

          $wp_customize->add_control('site_bone_dark', array(
            'label'             => '1-6.ダークモード有効化',
            'description'       => 'チェックを入れるとダークモードを有効化できます。サイドメニューの最下部にボタンが表示されます。詳しくはこちら',
            'type'              => 'checkbox',
            'section'           => 'site_bone',
          ));

      $wp_customize->add_section('site_dyheader', array(
        'priority'              => 2,
        'title'                 => '2.ダイナミックヘッダー（1-1で選択した場合のみ）の設定',
        'panel'                 => 'site_builder',
      ));


          $wp_customize->add_setting('site_dyheader_text', array(
            'default'           => "Let's enjoy self-expression!",
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_text', array(
            'label'             => '2-1.ヘッダー部分のテキスト',
            'type'              => 'text',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_text_size', array(
            'default'           => 200,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_text_size', array(
            'label'             => '2-2.ヘッダー部分のテキストサイズ',
            'type'              => 'number',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_text_color', array(
            'default'           => '#333333',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_dyheader_text_color', array(
            'label'             => '2-3.ヘッダー部分のテキスト色',
            'section'           => 'site_dyheader',
          )));

          $wp_customize->add_setting('site_dyheader_text_animation', array(
            'default'           => 'value0',
            'type'              => 'option',
          ));
          $wp_customize->add_control('site_dyheader_text_animation', array(
            'label'             => '2-4.テキストへ適用するアニメーション',
            'description'       => '現在4種類から選択できます。',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => 'フェードイン（下から上）',
              'value2'          => 'ラインが走る',
              'value3'          => 'ズーム',
              'value4'          => 'フラッシュ',
            ),
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_button', array(
            'default'           => '',
            'type'              => 'option',
          ));
          $wp_customize->add_control('site_dyheader_button', array(
            'label'             => '2-5.ヘッダー部分のボタン',
            'description'       => 'ヘッダー部分に適用されるCTA的に使用可能なボタンです。（空白の場合ボタンは表示されません。）',
            'type'              => 'text',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_button_link', array(
            'default'           => '#',
            'type'              => 'option',
          ));
          $wp_customize->add_control('site_dyheader_button_link', array(
            'label'             => '2-6.ボタンのリンク先URL',
            'description'       => 'リンク先のURLを入力してください。',
            'section'           => 'site_dyheader',
            'type'              => 'text',
          ));

          $wp_customize->add_setting('site_dyheader_button2', array(
            'default'           => '',
            'type'              => 'option',
          ));
          $wp_customize->add_control('site_dyheader_button2', array(
            'label'             => '2-7.ヘッダー部分のボタン2',
            'description'       => 'もう一つボタンが必要な場合はこちらから。（空白の場合ボタンは表示されません。）',
            'type'              => 'text',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_button2_link', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_button2_link', array(
            'label'             => '2-8.ボタンのリンク先URL',
            'description'       => '',
            'type'              => 'text',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_dyheader_img', array(
      			'label'             => '2-9.ヘッダー部分の画像（文字の隣）',
            'description'       => 'ヘッダー部分のテキストの隣に画像を挿入します。',
      			'section'           => 'site_dyheader',
        	)));

          $wp_customize->add_setting('site_dyheader_img_width', array(
            'default'           => 100,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_img_width', array(
      			'label'             => '2-10.ヘッダー部分の画像のサイズ',
            'description'       => 'ヘッダー部分の画像のサイズの調整ができます。（デフォルト:100,最大:100）',
            'type'              => 'number',
            'section'           => 'site_dyheader',
        	));

          $wp_customize->add_setting('site_dyheader_img_position', array(
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_dyheader_img_position', array(
            'label'             => '2-11.ヘッダー部分の画像を左側へ移動',
            'type'              => 'checkbox',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_bkimg', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_dyheader_bkimg', array(
            'label'             => '2-12.ヘッダー部分の画像（背景）',
            'description'       => 'ヘッダー部分の背景に画像を挿入します。',
            'section'           => 'site_dyheader',
          )));

          $wp_customize->add_setting('site_dyheader_bkimg_filter', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_bkimg_filter', array(
            'label'             => '2-13.ヘッダー部分の背景画像フィルター',
            'description'       => 'ヘッダーの背景画像にフィルターをかけることができます。文字が見づらい背景画像を使用する場合に有効です。',
            'type'              => 'select',
            'choices'           => array(
              'value1'          => 'フィルターなし',
              'value2'          => 'うっすら暗く',
              'value3'          => 'うっすら明るく',
              'value4'          => 'ドット',
              'value5'          => '斜線',
              'value6'          => '罫線',
              'value7'          => 'ボカシ',
            ),
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_bkcolor', array(
            'default'           => '#f1f2f3',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_dyheader_bkcolor', array(
            'label'             => '2-14.ヘッダー部分の背景色',
            'description'       => 'ヘッダー部分の背景の色を設定します（画像がある場合は画像が優先されます）。',
            'section'           => 'site_dyheader',
          )));

          $wp_customize->add_setting('site_dyheader_width', array(
            'default'           => 1200,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_width', array(
            'label'             => '2-15.ヘッダー部分の最大横幅',
            'description'       => 'ヘッダー部分の最大横幅を設定できます。『1:骨組みの設定』で設定した数値と同じものがオススメです。（デフォルト:1200,最大3000）',
            'type'              => 'number',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_height', array(
            'default'           => 50,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_height', array(
            'label'             => '2-16.ヘッダー部分の高さ',
            'description'       => 'ヘッダー部分の高さを調整できます（デフォルト:50,最大:100）',
            'type'              => 'number',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_margin-top', array(
            'default'           => 0,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_margin-top', array(
            'label'             => '2-17.ヘッダー部分の上部の余白',
            'description'       => 'ヘッダー部分の上部に余白を設け、調整できます（デフォルト:0,推奨:0または20）',
            'type'              => 'number',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_padding', array(
            'default'           => 20,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_dyheader_padding', array(
            'label'             => '2-18.ヘッダー部分の下部の余白',
            'description'       => 'ヘッダー部分の下部に余白を設け、調整できます（デフォルト:20）。',
            'type'              => 'number',
            'section'           => 'site_dyheader',
          ));

          $wp_customize->add_setting('site_dyheader_notTop', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_dyheader_notTop', array(
            'label'             => '2-19.トップ（ホーム）画面以外でも表示',
            'description'       => '通常はトップページのみで表示するようになっているダイナミックヘッダーを記事ページやカテゴリページでも表示するようにします。',
            'type'              => 'checkbox',
            'section'           => 'site_dyheader',
          ));

      $wp_customize->add_section('site_feature', array(
        'priority'              => 3,
        'title'                 => '3.フューチャー部分（1-1で選択した場合のみ）の設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_feature_section_animation', array(
            'default'           => 'value9',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_animation', array(
            'label'             => '3-1.セクション1にアニメーションを使用',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => '少し下からフェードイン',
              'value2'          => '大きくしたからフェードイン',
              'value3'          => '少し上からフェードダウン',
              'value4'          => '大きく上からフェードダウン',
              'value5'          => '少し左からフェードイン',
              'value6'          => '大きく左からフェードイン',
              'value7'          => '少し右からフェードイン',
              'value8'          => '大きく右からフェードイン',
            ),
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_ttl', array(
            'type'              => 'option'
          ));

          $wp_customize->add_control('site_feature_section_ttl', array(
            'label'             => '3-2.タイトル（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_description', array(
            'type'              => 'option'
          ));

          $wp_customize->add_control('site_feature_section_description', array(
            'label'             => '3-3.説明文（セクション1）',
            'description'       => 'HTMLを使用することも可能です。',
            'type'              => 'textarea',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item1_icon', array(
            'default'           => '<i class="fas fa-shield-alt"></i>',
            'type'              => 'option',

          ));

          $wp_customize->add_control('site_feature_section_item1_icon', array(
            'label'             => '3-4.アイテム1のアイコン（セクション1）',
            'description'       => '<pre><code>&lt;i class=&quot;fas fa-mobile&quot;&gt;&lt;/i&gt;</code></pre>のようなコードを貼り付けてください。',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item1_icon_color', array(
            'default'           => '#1C6ECD',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section_item1_icon_color', array(
            'label'             => '3-5.アイテム1のアイコン色（セクション1）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section_item1_ttl', array(
            'default'           => 'SAMPLE1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item1_ttl', array(
            'label'             => '3-6.アイテム1のタイトル（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item1_description', array(
            'default'           => 'SAMPLE1の説明文です。',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item1_description', array(
            'label'             => '3-7.アイテム1の説明文（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item2_icon', array(
            'default'           => '<i class="fas fa-heartbeat"></i>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item2_icon', array(
            'label'             => '3-8.アイテム2のアイコン（セクション1）',
            'description'       => '<pre><code>&lt;i class=&quot;fas fa-mobile&quot;&gt;&lt;/i&gt;</code></pre>のようなコードを貼り付けてください。',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item2_icon_color', array(
            'default'           => '#E64A64',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section_item2_icon_color', array(
            'label'             => '3-9.アイテム2のアイコン色（セクション1）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section_item2_ttl', array(
            'default'           => 'SAMPLE2',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item2_ttl', array(
            'label'             => '3-10.アイテム2のタイトル（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item2_description', array(
            'default'           => 'SAMPLE2の説明文です。',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item2_description', array(
            'label'             => '3-11.アイテム2の説明文（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item3_icon', array(
            'type'              => 'option',
            'default'           => '<i class="fas fa-coins"></i>'
          ));

          $wp_customize->add_control('site_feature_section_item3_icon', array(
            'label'             => '3-12.アイテム3のアイコン（セクション1）',
            'description'       => '<pre><code>&lt;i class=&quot;fas fa-mobile&quot;&gt;&lt;/i&gt;</code></pre>のようなコードを貼り付けてください。',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item3_icon_color', array(
            'default'           => '#ffcc00',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section_item3_icon_color', array(
            'label'             => '3-13.アイテム3のアイコン色（セクション1）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section_item3_ttl', array(
            'default'           => 'SAMPLE3',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item3_ttl', array(
            'label'             => '3-14.アイテム3のタイトル（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section_item3_description', array(
            'default'           => 'SAMPLE3の説明文です。',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section_item3_description', array(
            'label'             => '3-15.アイテム3の説明文（セクション1）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_animation', array(
            'default'           => 'value9',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section2_animation', array(
            'label'             => '3-16.セクション2にアニメーションを使用',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => '少し下からフェードイン',
              'value2'          => '大きくしたからフェードイン',
              'value3'          => '少し上からフェードダウン',
              'value4'          => '大きく上からフェードダウン',
              'value5'          => '少し左からフェードイン',
              'value6'          => '大きく左からフェードイン',
              'value7'          => '少し右からフェードイン',
              'value8'          => '大きく右からフェードイン',
            ),
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_ttl', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section2_ttl', array(
            'label'             => '3-17.タイトル（セクション2）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_description', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section2_description', array(
            'label'             => '3-18.本文（セクション2）',
            'description'       => 'HTMLを使用することもできます。',
            'type'              => 'textarea',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section2_bk_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_feature_section2_bk_img', array(
            'label'             => '3-19.背景画像（セクション2）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section2_color', array(
            'default'           => '#f9f9f9',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section2_color', array(
            'label'             => '3-20.文字色（セクション2）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section2_bk_color', array(
            'default'           => '#212121',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section2_bk_color', array(
            'label'             => '3-21.背景色（セクション2）',
            'description'       => '画像がある場合は画像が優先されます。透過している画像を使用した場合は色も適用されます。',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section3_animation', array(
            'default'           => 'value9',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section3_animation', array(
            'label'             => '3-22.セクション3にアニメーションを使用',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => '少し下からフェードイン',
              'value2'          => '大きくしたからフェードイン',
              'value3'          => '少し上からフェードダウン',
              'value4'          => '大きく上からフェードダウン',
              'value5'          => '少し左からフェードイン',
              'value6'          => '大きく左からフェードイン',
              'value7'          => '少し右からフェードイン',
              'value8'          => '大きく右からフェードイン',
            ),
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section3_ttl', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section3_ttl', array(
            'label'             => '3-23.タイトル（セクション3）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section3_description', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section3_description', array(
            'label'             => '3-24.本文（セクション3）',
            'type'              => 'textarea',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section3_bk_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_feature_section3_bk_img', array(
            'label'             => '3-25.背景画像（セクション3）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section3_color', array(
            'default'           => '#f9f9f9',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section3_color', array(
            'label'             => '3-26.文字色（セクション3）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section3_bk_color', array(
            'default'           => '#212121',
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section3_bk_color', array(
            'label'             => '3-27.背景色（セクション3）',
            'section'           => 'site_feature',
          )));

          $wp_customize->add_setting('site_feature_section4_animation', array(
            'default'           => 'value9',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section4_animation', array(
            'label'             => '3-28.セクション4にアニメーションを使用',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => '少し下からフェードイン',
              'value2'          => '大きくしたからフェードイン',
              'value3'          => '少し上からフェードダウン',
              'value4'          => '大きく上からフェードダウン',
              'value5'          => '少し左からフェードイン',
              'value6'          => '大きく左からフェードイン',
              'value7'          => '少し右からフェードイン',
              'value8'          => '大きく右からフェードイン',
            ),
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q1', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_q1', array(
            'label'             => '3-29.質問1（セクション4）',
            'description'       => '空白にした場合、セクション4は表示されません。詳しくはこちら',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a1', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_a1', array(
            'label'             => '3-30.答え1（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q2', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_q2', array(
            'label'             => '3-31.質問2（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a2', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_a2', array(
            'label'             => '3-32.答え2（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q3', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_q3', array(
            'label'             => '3-33.質問3（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a3', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_a3', array(
            'label'             => '3-34.答え3（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q4', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_q4', array(
            'label'             => '3-35.質問4（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a4', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_a4', array(
            'label'             => '3-36.答え4（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_q5', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_q5', array(
            'label'             => '3-37.質問5（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_a5', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_a5', array(
            'label'             => '3-38.答え5（セクション4）',
            'type'              => 'text',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section5_animation', array(
            'default'           => 'value9',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section5_animation', array(
            'label'             => '3-39.セクション5にアニメーションを使用',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => '少し下からフェードイン',
              'value2'          => '大きくしたからフェードイン',
              'value3'          => '少し上からフェードダウン',
              'value4'          => '大きく上からフェードダウン',
              'value5'          => '少し左からフェードイン',
              'value6'          => '大きく左からフェードイン',
              'value7'          => '少し右からフェードイン',
              'value8'          => '大きく右からフェードイン',
            ),
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section5_info', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section5_info', array(
            'label'             => '3-40.フリースペース（セクション5）',
            'description'       => '会社情報や商品情報など',
            'type'              => 'textarea',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section5_map', array(
            'default'           => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.2823422657766!2d139.77007871513112!3d35.71927413549223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188e827551ab83%3A0x59f3effef9b46130!2z5p2x5Lqs6Jed6KGT5aSn5a2m!5e0!3m2!1sja!2sjp!4v1574213861441!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section5_map', array(
            'label'             => '3-41.地図スペース（セクション5）',
            'description'       => 'GoogleMapの埋め込み機能など利用できます。詳しくはこちら',
            'type'              => 'textarea',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section6_animation', array(
            'default'           => 'value9',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section6_animation', array(
            'label'             => '3-42.セクション6にアニメーションを使用',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value0'          => 'アニメーションなし',
              'value1'          => '少し下からフェードイン',
              'value2'          => '大きくしたからフェードイン',
              'value3'          => '少し上からフェードダウン',
              'value4'          => '大きく上からフェードダウン',
              'value5'          => '少し左からフェードイン',
              'value6'          => '大きく左からフェードイン',
              'value7'          => '少し右からフェードイン',
              'value8'          => '大きく右からフェードイン',
            ),
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section6_description', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_feature_section6_description', array(
            'label'             => '3-44.本文（セクション6）',
            'type'              => 'textarea',
            'section'           => 'site_feature',
          ));

          $wp_customize->add_setting('site_feature_section6_bk_color', array(
            'type'              => 'option',
            'default'           => '#1fb2aa',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section6_bk_color', array(
            'label'             => '3-45.背景色（セクション6）',
          )));

          $wp_customize->add_setting('site_feature_section6_color', array(
            'type'              => 'option',
            'default'           => '#ffffff',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_feature_section6_color', array(
            'label'             => '3-46文字色（セクション6）',
          )));

      $wp_customize->add_section('site_carousel', array(
        'priority'              => 4,
        'title'                 => '4.ピックアップ部分',
        'description'           => 'ニュースや最新情報、ピックアップして掲載したい情報などは本項目をご利用ください。',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_carousel_news_on', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_carousel_news_on', array(
            'label'             => 'ニュース欄を表示する',
            'description'       => 'ナビバーの下に表示されるニュース欄です。最新情報や目立たせたい情報などを掲載しましょう',
            'type'              => 'checkbox',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_news', array(
            'default'           => 'こんな感じで表示されます',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_news', array(
            'label'             => 'ニュース欄の文章',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_news_link', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_news_link', array(
            'label'             => 'ニュース欄のリンク先',
            'description'       => 'ニュース欄をクリックしたリンク先ページのURL',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_news_bk', array(
            'type'              => 'option',
            'default'           => '#3bb3fa',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_carousel_news_bk', array(
            'label'             => 'ニュース欄の背景色（1色目）',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_news_bk2', array(
            'type'              => 'option',
            'default'           => '#ff5757',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_carousel_news_bk2', array(
            'label'             => 'ニュース欄の背景色（2色目）',
            'description'       => '1色目と異なる色を選択するとグラデーションになります',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_on', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_on', array(
            'label'             => 'ピックアップ部分',
            'description'       => 'ピックアップ欄を表示します。目立たせたい記事や画像などを掲載しましょう。詳しくはこちら。',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => '表示しない',
              'value2'          => 'デザイン1',
              'value3'          => 'デザイン2',
            ),
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_item1_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_carousel_item1_img', array(
            'label'             => 'ピックアップ1枚目の画像',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_item1_link', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_item1_link', array(
            'label'             => 'ピックアップ1枚目のリンクです',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_item2_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_carousel_item2_img', array(
            'label'             => 'ピックアップ2枚目の画像',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_item2_link', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_item2_link', array(
            'label'             => 'ピックアップ2枚目のリンクです',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_item3_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_carousel_item3_img', array(
            'label'             => 'ピックアップ3枚目の画像',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_item3_link', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_item3_link', array(
            'label'             => 'ピックアップ3枚目のリンクです',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_item4_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_carousel_item4_img', array(
            'label'             => 'ピックアップ4枚目の画像',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_item4_link', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_item4_link', array(
            'label'             => 'ピックアップ4枚目のリンクです',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

          $wp_customize->add_setting('site_carousel_item5_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_carousel_item5_img', array(
            'label'             => 'ピックアップ5枚目の画像',
            'section'           => 'site_carousel',
          )));

          $wp_customize->add_setting('site_carousel_item5_link', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_carousel_item5_link', array(
            'label'             => 'ピックアップ5枚目のリンクです',
            'type'              => 'text',
            'section'           => 'site_carousel',
          ));

      $wp_customize->add_section('site_font',array(
        'priority'              => 5,
        'title'                 => '5.フォントの設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_font_title', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_title', array(
            'label'             => '5-1.サイトタイトルのフォント',
            'description'       => '現在10種類からお選びいただけます。[注意：（）内の言語にしか適用されません]',
            'type'              => 'radio',
            'choices'           => array(
                'value1'        => 'デフォルト',
                'value2'        => 'ポップ（英）',
                'value3'        => '個性的（英）',
                'value4'        => '残像（英）',
                'value5'        => '近未来（英）',
                'value6'        => '切り抜き（英）',
                'value7'        => '手書き風（英）',
                'value8'        => 'カクカク（日・英）',
                'value9'        => 'はんなり（日）',
                'value10'       => 'にくきゅう（日）'
            ),
            'section'           => 'site_font',
          ));

          $wp_customize->add_setting('site_font_body', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_body', array(
            'label'             => '5-2.サイト全体のフォント',
            'description'       => '現在7種類からお選びいただけます。日英対応しています。こちらからフォント製作者へのサンクスページへ飛べます。フォントの変更をする場合はぜひ覗いてみてください。',
            'type'              => 'radio',
            'choices'           => array(
                'value1'        => 'デフォルト',
                'value2'        => 'きっちり',
                'value3'        => '柔らかい',
                'value4'        => 'ゴシック',
                'value5'        => 'タイムマシーン',
                'value6'        => 'せのび',
                'value7'        => '木漏れ日',
            ),
            'section'           => 'site_font',
          ));

          $wp_customize->add_setting('site_font_body_only_heading', array(
            'default'           => false,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_body_only_heading', array(
            'label'             => '5-3.前項を記事見出しにのみ適用',
            'description'       => 'チェックを入れると、5-2で設定した項目を記事内の見出しにのみ適用します',
            'type'              => 'checkbox',
            'sanitize_callback' => 'sanitize_checkbox',
            'section'           => 'site_font',
          ));

          $wp_customize->add_setting('site_font_title_size', array(
            'default'           => 160,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_title_size', array(
            'label'             => '5-3.サイトタイトルの文字サイズ',
            'description'       => '文字サイズが調節できます。あまり大きくし過ぎてしまうとヘッダーからはみ出てしまうのでご注意ください。（デフォルト:160）',
            'type'              => 'number',
            'section'           => 'site_font',
          ));

          $wp_customize->add_setting('site_font_pc_size', array(
            'default'           => 100,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_pc_size', array(
            'label'             => '5-4.【PC】サイトの文字サイズ',
            'description'       => '961px以上の画面幅で適用されます。（デフォルト:100）',
            'type'              => 'number',
            'section'           => 'site_font',
          ));

          $wp_customize->add_setting('site_font_tab_size', array(
            'default'           => 98,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_tab_size', array(
            'label'             => '5-5.【タブレット】サイトの文字サイズ',
            'description'       => '561〜960pxまでの画面幅で適用されます。（デフォルト:98）',
            'type'              => 'number',
            'section'           => 'site_font',
          ));

          $wp_customize->add_setting('site_font_sp_size', array(
            'default'           => 95,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_font_sp_size', array(
            'label'             => '5-6.【スマホ】サイトの文字サイズ',
            'description'       => '320〜560pxまでの画面幅で適用されます。（デフォルト:95）',
            'section'           => 'site_font',
            'type'              => 'number',
          ));


      $wp_customize->add_section('site_color',array(
        'priority'              => 6,
        'title'                 => '6.色の設定',
        'description'           => '各パーツごとに色が設定できます。使い方の詳細や上手な使い方はこちら。',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_color_main', array(
            'type'              => 'option',
            'default'           => '#1a2760',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_main', array(
            'label'             => 'メインカラー',
            'description'       => '見出しやボタンなど様々な場所で使用されます。濃い色を設定しましょう。詳しい適用箇所や決め方に迷っている方はこちら',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_sub', array(
            'type'              => 'option',
            'default'           => '#3bb3fa',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_sub', array(
            'label'             => 'サブカラー',
            'description'       => '見出しやボタンなど様々な場所で使用されます。濃い色に比べて薄い色を設定しましょう。詳しい適用箇所や決め方に迷っている方はこちら',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_acc', array(
            'type'              => 'option',
            'default'           => '#ff3f3f',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_acc', array(
            'label'             => 'アクセントカラー',
            'description'       => '見出しやボタンなど様々な場所で使用されます。メインカラーの補色系統の色を設定しましょう。詳しい適用箇所や決め方に迷っている方はこちら',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_nav_bk', array(
            'type'              => 'option',
            'default'           => '#1a2760',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_nav_bk', array(
            'label'             => 'ナビバーの背景色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_nav_bk_grad', array(
            'type'              => 'option',
            'default'           => '#9287e5',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_nav_bk_grad', array(
            'label'             => 'ナビバーの背景色（2色目）',
            'description'       => '2色目を選択するとグラデーション仕様になります。',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_nav_color', array(
            'type'              => 'option',
            'default'           => '#ffffff'
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_nav_color', array(
            'label'             => 'ナビバーの文字色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_body_bk', array(
            'type'              => 'option',
            'default'           => '#f5f5f5',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_body_bk', array(
            'label'             => 'コンテンツエリア全体の背景色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_body_color', array(
            'type'              => 'option',
            'default'           => '#2b546a',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_body_color', array(
            'label'             => 'コンテンツエリア全体の文字色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_widget_bk', array(
            'type'              => 'option',
            'default'           => '#ffffff',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_widget_bk', array(
            'label'             => 'サイドバーのウィジェット背景色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_footer_bk_color', array(
            'type'              => 'option',
            'default'           => '#1a2760',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_footer_bk_color', array(
            'label'             => 'フッターの背景色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_footer_color', array(
            'type'              => 'option',
            'default'           => '#ffffff',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_footer_color', array(
            'label'             => 'フッターの文字色',
            'section'           => 'site_color',
          )));

          $wp_customize->add_setting('site_color_a_tag_color', array(
            'type'              => 'option',
            'default'           => '#2d6eef;',
          ));

          $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_color_a_tag_color', array(
            'label'             => 'リンクの文字色',
            'section'           => 'site_color',
          )));

      $wp_customize->add_section('site_nav',array(
        'priority'              => 7,
        'title'                 => '7.ナビメニューの設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_nav_width',array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_width',array(
            'label'             => 'ナビメニューの横幅に上限を設ける',
            'description'       => 'コンテンツエリア（記事とサイドバーの部分）に設けている横幅とナビメニューの横幅を合わせます。',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_centering_title', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_centering_title', array(
            'label'             => 'サイトタイトルを中央寄せにする',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_fixed_top', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_fixed_top', array(
            'label'             => 'ナビメニューをサイト上部に固定する',
            'description'       => '固定時は背景が白色になるため文字色はメインカラーになります',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_fixed_top_anime',array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_fixed_top_anime',array(
            'label'             => 'ナビメニューの固定に伴うアニメーション',
            'description'       => 'ナビメニューをサイト上部に固定する際に内部のロゴやメニューボタンが小さくなります。',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_transparentable',array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_transparentable',array(
            'label'             => 'ナビメニューの背景透明化',
            'description'       => 'ナビメニューを透明化します。透明化すると背景が擦りガラス風になります（一部のブラウザでは適用されません）。色項目で設定した色は反映されなくなります',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_menu_icon',array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_menu_icon',array(
            'label'             => 'メニューアイコン',
            'description'       => 'スマホ閲覧時のメニューアイコンを変更できます',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
              'value4'          => 'デザイン4',
            ),
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_extended', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_extended', array(
            'label'             => 'ナビメニューにコンテンツを追加する',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_extended_text', array(
            'default'           => 'これはサンプルです',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_extended_text', array(
            'label'             => '追加するコンテンツのテキスト',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_extended_uri', array(
            'default'           => 'https://takasaki.work/12hitoe',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_extended_uri', array(
            'label'             => '追加するコンテンツのボタンリンク先（URL）',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list1', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_list1', array(
            'label'             => 'メニューの下の英文字1',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list2', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_list2', array(
            'label'             => 'メニューリストの下の英文字2',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list3', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_list3', array(
            'label'             => 'メニューリストの下の英文字3',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list4', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_list4', array(
            'label'             => 'メニューリストの下の英文字4',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_list5', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_list5', array(
            'label'             => 'メニューリストの下の英文字5',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_sp_sideauthor', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_sp_sideauthor', array(
            'label'             => 'スマホで表示されるメニューに運営者プロフィールを非表示',
            'description'       => '詳しくはこちら',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_sp_sideauthor_bkimg', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_nav_sp_sideauthor_bkimg', array(
            'label'             => '運営者プロフィールの背景画像',
            'section'           => 'site_nav',
          )));

          $wp_customize->add_setting('site_nav_sp_sideauthor_img', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_nav_sp_sideauthor_img', array(
            'label'             => '運営者プロフィール画像',
            'description'       => 'SEOに効果があるとされる構造化データでも使用されます。',
            'section'           => 'site_nav',
          )));

          $wp_customize->add_setting('site_nav_sp_sideauthor_name', array(
            'default'           => '運営者名',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_sp_sideauthor_name', array(
            'label'             => '運営者の名前',
            'description'       => 'SEOに効果があるとされる構造化データでも使用されます。',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_sp_sideauthor_mail', array(
            'default'           => 'SAMPLE@SAMPLE.COM',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_sp_sideauthor_mail', array(
            'label'             => '運営者の連絡先',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_sp_sidemenu', array(
            'default'           => 'MENU',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_nav_sp_sidemenu', array(
            'label'             => 'スマホで表示されるサイドメニュータイトル',
            'type'              => 'text',
            'section'           => 'site_nav',
          ));

          $wp_customize->add_setting('site_nav_sp_menu_menu', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_nav_sp_menu_menu', array(
            'label'             => 'スマホで表示されるサイドメニューにメニューを非表示',
            'description'       => '詳しくはこちら。',
            'type'              => 'checkbox',
            'section'           => 'site_nav',
          ));

      $wp_customize->add_section('site_article',array(
        'priority'              => 8,
        'title'                 => '8.記事の設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_article_list_type', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_list_type', array(
            'label'             => '8-1.記事一覧のデザイン',
            'description'       => 'トップ画面で表示する記事一覧のデザイン。現在4種類からお選びいただけます。',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
              'value4'          => 'デザイン4',
              'value5'          => 'デザイン5',
              'value6'          => 'デザイン6',
              'value7'          => 'デザイン7',
            ),
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_type' ,array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_type', array(
            'label'             => '8-2.記事ページデザイン',
            'description'       => '記事詳細画面のデザイン設定。（固定ページにも同様のものが適用されます）',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
              'value4'          => 'デザイン4',
            ),
            'section'           => 'site_article'
          ));

          $wp_customize->add_setting('site_article_p_margin', array(
            'default'           => 0.5,
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_p_margin', array(
            'label'             => '8-3.pタグ下の余白調整',
            'description'       => 'pタグ下の余白を設定します。',
            'type'              => 'number',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_authorable', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_article_authorable', array(
            'label'             => '8-4.「この記事を書いた人」を非表示',
            'type'              => 'checkbox',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_author_ttl', array(
            'default'           => 'この記事を書いた人',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_author_ttl', array(
            'label'             => '8-5.「この記事を書いた人」のタイトル',
            'type'              => 'text',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_relatedable', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_setting('site_article_author_sns_ttl', array(
            'default'           => 'Follow Me:)',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_author_sns_ttl', array(
            'label'             => 'SNSフォロー欄のタイトル',
            'type'              => 'text',
            'section'           => 'site_article',
          ));

          $wp_customize->add_control('site_article_relatedable', array(
            'label'             => '8-5.関連記事を非表示',
            'type'              => 'checkbox',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_related_ttl', array(
            'default'           => '関連記事',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_related_ttl', array(
            'label'             => '8-5.関連記事部分のタイトル',
            'type'              => 'text',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_related_design', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_related_design', array(
            'label'             => '8-6.関連記事のデザイン',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
            ),
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_share', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_share', array(
            'label'             => '8-7.記事内シェアボタンの位置',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'アイキャッチ下と本文下',
              'value2'          => 'アイキャッチ下のみ',
              'value3'          => '本文下のみ',
              'value4'          => '表示しない',
            ),
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_sharebf_type', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_sharebf_type', array(
            'label'             => '8-8.アイキャッチ下シェアボタンのデザイン',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
              'value4'          => 'デザイン4',
              'value5'          => 'デザイン5',
            ),
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_shareaf_type', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_shareaf_type', array(
            'label'             => '8-9.本文下シェアボタンのデザイン',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
              'value4'          => 'デザイン4',
              'value5'          => 'デザイン5',
            ),
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_share_ttl', array(
            'default'           => 'SHARE',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_share_ttl', array(
            'label'             => '8-10.記事下シェアボタンのタイトル',
            'type'              => 'text',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_toc', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_article_toc', array(
            'label'             => '8-11.目次を非表示',
            'description'       => 'チェックを入れると投稿ページで目次が表示されなくなります',
            'type'              => 'checkbox',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_toc_page', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_article_toc_page', array(
            'label'             => '8-12.固定ページでも目次を表示',
            'description'       => '固定ページでも目次が表示されます。デフォルトはオフです',
            'type'              => 'checkbox',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_toc_ttl', array(
            'default'           => 'CONTENT',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_toc_ttl', array(
            'label'             => '8-13.目次のタイトル',
            'type'              => 'text',
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_toc_design', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_toc_design', array(
            'label'             => '8-14.目次のデザイン',
            'description'       => '記事側で表示される目次のデザインです。（サイドバーの目次には適用されません）',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
              'value4'          => 'デザイン4',
              'value5'          => 'デザイン5',
            ),
            'section'           => 'site_article',
          ));

          $wp_customize->add_setting('site_article_comment_ttl', array(
            'default'           => 'COMMENT',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_article_comment_ttl', array(
            'label'             => '8-15.コメント欄のタイトル',
            'description'       => 'コメント欄のタイトルです。使用しない場合はWordPress管理画面の設定から非表示にできます。詳しくはこちら',
            'type'              => 'text',
            'section'           => 'site_article',
          ));

      $wp_customize->add_section('site_decoration',array(
        'priority'              => 9,
        'title'                 => '9.記事装飾の設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_decoration_bread', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_decoration_bread', array(
            'label'             => 'パンくずリストのデザイン',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
            ),
            'section'           => 'site_decoration',
          ));

          $wp_customize->add_setting('site_decoration_h2_type', array(
            'default'           => 'type1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_decoration_h2_type', array(
            'label'             => '記事内の見出し（h2）デザイン',
            'description'       => '記事内の見出しを一括で変更できます',
            'type'              => 'radio',
            'choices'           => array(
              'type1'           => 'デザイン1',
              'type2'           => 'デザイン2',
              'type3'           => 'デザイン3',
              'type4'           => 'デザイン4',
              'type5'           => 'デザイン5',
              'type6'           => 'デザイン6',
              'type7'           => 'デザイン7',
              'type8'           => 'デザイン8',
            ),
            'section'           => 'site_decoration',
          ));

          $wp_customize->add_setting('site_decoration_h3_type', array(
            'default'           => 'type2',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_decoration_h3_type', array(
            'label'             => '記事内の見出し（h3）デザイン',
            'description'       => '記事内の見出しを一括で変更できます',
            'type'              => 'radio',
            'choices'           => array(
              'type1'           => 'デザイン1',
              'type2'           => 'デザイン2',
              'type3'           => 'デザイン3',
              'type4'           => 'デザイン4',
              'type5'           => 'デザイン5',
              'type6'           => 'デザイン6',
              'type7'           => 'デザイン7',
              'type8'           => 'デザイン8',
            ),
            'section'           => 'site_decoration',
          ));

          $wp_customize->add_setting('site_decoration_h4_type', array(
            'default'           => 'type3',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_decoration_h4_type', array(
            'label'             => '記事内の見出し（h4）デザイン',
            'description'       => '記事内の見出しを一括で変更できます',
            'type'              => 'radio',
            'choices'           => array(
              'type1'           => 'デザイン1',
              'type2'           => 'デザイン2',
              'type3'           => 'デザイン3',
              'type4'           => 'デザイン4',
              'type5'           => 'デザイン5',
              'type6'           => 'デザイン6',
              'type7'           => 'デザイン7',
              'type8'           => 'デザイン8',
            ),
            'section'           => 'site_decoration',
          ));

          $wp_customize->add_setting('site_decoration_image_box', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_decoration_image_box', array(
            'label'             => '記事内画像のポップアップ機能をオフ',
            'type'              => 'checkbox',
            'section'           => 'site_decoration',
          ));

          $wp_customize->add_setting('site_decoration_a_tag_icon', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_decoration_a_tag_icon', array(
            'label'             => '記事内リンクに自動でアイコンをつける機能をオフ',
            'type'              => 'checkbox',
            'section'           => 'site_decoration',
          ));

      $wp_customize->add_section('site_footer',array(
        'priority'              => 10,
        'title'                 => '10.フッターの設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_footer_gototop', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_footer_gototop', array(
            'label'             => 'トップへ戻るボタンを表示する',
            'description'       => '詳しくはこちら',
            'type'              => 'checkbox',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_share', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_footer_share', array(
            'label'             => 'シェアボタンを表示する',
            'description'       => '詳しくはこちら',
            'type'              => 'checkbox',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_footer_sp_menu', array(
            'label'             => 'スマホで独自フッターメニューを表示',
            'description'       => '詳しくはこちら',
            'type'              => 'checkbox',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_design', array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_design', array(
            'label'             => '独自フッターメニューのデザイン',
            'description'       => '詳しくはこちら',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
            ),
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li1_icon', array(
            'default'           => '<i class="fas fa-bars"></i>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li1_icon', array(
            'label'             => '独自フッターメニュー1のアイコン',
            'descriptin'        => '空白にするとその他の項目の大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li1_ttl', array(
            'default'           => 'MENU',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li1_ttl', array(
            'label'             => '独自フッターメニュー1のテキスト',
            'descriptin'        => '空白にするとアイコンの大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li1_uri', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li1_uri', array(
            'label'             => '独自フッターメニュー1のリンク先',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li2_icon', array(
            'default'           => '<i class="fas fa-paper-plane"></i>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li2_icon', array(
            'label'             => '独自フッターメニュー2のアイコン',
            'descriptin'        => '空白にするとその他の項目の大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li2_ttl', array(
            'default'           => 'Contact',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li2_ttl', array(
            'label'             => '独自フッターメニュー2のテキスト',
            'descriptin'        => '空白にするとアイコンの大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li2_uri', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li2_uri', array(
            'label'             => '独自フッターメニュー2のリンク先',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li3_icon', array(
            'default'           => '<i class="fas fa-home"></i>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li3_icon', array(
            'label'             => '独自フッターメニュー3のアイコン',
            'descriptin'        => '空白にするとその他の項目の大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li3_ttl', array(
            'default'           => 'HOME',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li3_ttl', array(
            'label'             => '独自フッターメニュー3のテキスト',
            'descriptin'        => '空白にするとアイコンの大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li3_uri', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li3_uri', array(
            'label'             => '独自フッターメニュー3のリンク先',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li4_icon', array(
            'default'           => '<i class="fas fa-phone"></i>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li4_icon', array(
            'label'             => '独自フッターメニュー4のアイコン',
            'descriptin'        => '空白にするとその他の項目の大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li4_ttl', array(
            'default'           => 'TEL',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li4_ttl', array(
            'label'             => '独自フッターメニュー4のテキスト',
            'descriptin'        => '空白にするとアイコンの大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li4_uri', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li4_uri', array(
            'label'             => '独自フッターメニュー4のリンク先',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li5_icon', array(
            'default'           => '<i class="fas fa-question-circle"></i>',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li5_icon', array(
            'label'             => '独自フッターメニュー5のアイコン',
            'descriptin'        => '空白にするとその他の項目の大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li5_ttl', array(
            'default'           => 'Q&A',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li5_ttl', array(
            'label'             => '独自フッターメニュー5のテキスト',
            'descriptin'        => '空白にするとアイコンの大きさが自動的に調整されます。',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_sp_menu_li5_uri', array(
            'default'           => '#',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_footer_sp_menu_li5_uri', array(
            'label'             => '独自フッターメニュー5のリンク先',
            'type'              => 'text',
            'section'           => 'site_footer',
          ));

          $wp_customize->add_setting('site_footer_credit', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_footer_credit', array(
            'label'             => 'フッターで12hitoeへのリンクを非表示にする',
            'description'       => '',
            'type'              => 'checkbox',
            'section'           => 'site_footer',
          ));

      $wp_customize->add_section('site_widgets',array(
        'priority'              => 11,
        'title'                 => '11.サイドバー/ウィジェットの設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_widgets_design',array(
            'default'           => 'value1',
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_widgets_design',array(
            'label'             => 'サイドバーのデザイン',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => 'デザイン1',
              'value2'          => 'デザイン2',
              'value3'          => 'デザイン3',
            ),
            'section'           => 'site_widgets',
          ));

          $wp_customize->add_setting('site_widgets_h_icon',array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_widgets_h_icon',array(
            'label'             => 'ウィジェットタイトル前にアイコンを使用',
            'type'              => 'checkbox',
          ));


      $wp_customize->add_section('site_anime',array(
        'priority'              => 12,
        'title'                 => '12.アニメーションの設定',
        'panel'                 => 'site_builder',
      ));

          $wp_customize->add_setting('site_anime_body',array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_anime_body',array(
            'label'             => '全体をふわっと表示',
            'type'              => 'checkbox',
            'section'           => 'site_anime',
          ));

  // サイト構造（コンポーネントの順番）
  // ## example )
  // - HEADER => NAV => ARTCILE LIST => ASIDE => FOOTER
  // - NAV => ARTICLE LIST => FOOTER
  // - DYNAMIC HEADER => ARTICLE => FOOTER

  /********
  // STEP3
  ********/
  $wp_customize->add_panel('site_admin', array(
    'priority'                  => 3,
    'title'                     => 'STEP3【運営設定】',
    'description'               => 'サイトの運営設定',
  ));

      $wp_customize->add_section('site_speed',array(
        'priority'              => 1,
        'title'                 => '1.ページスピード高速化設定',
        'panel'                 => 'site_admin',
      ));

          $wp_customize->add_setting('site_head_jquery', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_head_jquery', array(
            'label'             => 'jQueryを使用しない',
            'description'       => 'jQueryを読み込まないことでサイトスピードの向上が測れます。詳しくはこちら',
            'type'              => 'checkbox',
            'section'           => 'site_speed',
          ));

          $wp_customize->add_setting('site_pv_count', array(
            'default'           => false,
            'type'              => 'option',
            'sanitize_callback' => 'sanitize_checkbox',
          ));

          $wp_customize->add_control('site_pv_count', array(
            'label'             => 'PV計測をしない',
            'description'       => 'PVを計測しないことで記事ページの処理速度が向上します。',
            'type'              => 'checkbox',
            'section'           => 'site_speed',
          ));

      $wp_customize->add_section('site_ogp', array(
        'priority'              => 2,
        'title'                 => "OGP設定",
        'panel'                 => 'site_admin'
      ));

          $wp_customize->add_setting('site_ogp_tw_account', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_ogp_tw_account', array(
            'label'             => 'シェアに表示するTwitterアカウント',
            'description'       => 'Twitterでシェアされたときに表示されるアカウントです。@の後から入力してください。不要な場合は空欄で問題ありません。',
            'type'              => 'text',
            'section'           => 'site_ogp',
          ));

          $wp_customize->add_setting('site_ogp_tw_card', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_ogp_tw_card', array(
            'label'             => 'シェアのカードタイプ',
            'description'       => 'シェアされたときに表示するカードのタイプを設定できます',
            'type'              => 'radio',
            'choices'           => array(
              'value1'          => '大きなカード',
              'value2'          => '小さいカード',
            ),
            'section'           => 'site_ogp',
          ));

          $wp_customize->add_setting('site_ogp_fb_appid', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_ogp_fb_appid', array(
            'label'             => 'Facebook AppID',
            'description'       => 'Facebook用OGPタグに出力されます。必要な場合は設定しましょう。',
            'type'              => 'text',
            'section'           => 'site_ogp',
          ));

      $wp_customize->add_section('site_google', array(
        'priority'              => 3,
        'title'                 => "Googleツール",
        'panel'                 => 'site_admin'
      ));

          $wp_customize->add_setting('site_google_analytics', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_google_analytics', array(
            'label'             => 'アナリティクスの設定',
            'description'       => 'アナリティクスのトラッキングIDを入力してください',
            'type'              => 'text',
            'section'           => 'site_google',
          ));

          $wp_customize->add_setting('site_google_adsense', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_google_adsense', array(
            'label'             => 'アドセンスの設定',
            'description'       => 'Adsenseコードを入力してください。',
            'type'              => 'text',
            'section'           => 'site_google',
          ));

      $wp_customize->add_section('site_head', array(
        'priority'              => 4,
        'title'                 => "headに挿入",
        'panel'                 => 'site_admin'
      ));

          $wp_customize->add_setting('site_head_addcode', array(
            'type'              => 'option',
          ));

          $wp_customize->add_control('site_head_addcode', array(
            'label'             => 'headにコードを挿入する',
            'description'       => 'サードパーティ製のツールなど必要に応じ、ここに入力したコードをheadに追記できます（上級者向け）',
            'type'              => 'textarea',
            'section'           => 'site_head',
          ));

} //END org_customizer()
