<?php

function add_customizerCSS(){

//サイトの骨組み
  $siteType             = get_option('site_bone_type');

//ヘッダー
  $navShadow            = get_option('site_others_nav_shadow')      ? get_option('site_others_nav_shadow')    : false;

//ダークモード
  $darkModeOn           = get_option('site_bone_dark')              ? get_option('site_bone_dark')            : false;

//コンテンツエリア横幅
  $contentArea          = get_option('site_bone_content_area')      ? get_option('site_bone_content_area')    : '1200';

//サイドバー
  $sidebarLeft          = get_option('site_bone_sidebar');

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
  $featureSec2Color     = get_option('site_feature_section2_color')           ? get_option('site_feature_section2_color')           : '#f9f9f9';
  $featureSec2BkColor   = get_option('site_feature_section2_bk_color')        ? get_option('site_feature_section2_bk_color')        : '#212121';
  $featureSec3BkImg     = get_option('site_feature_section3_bk_img');
  $featureSec3Color     = get_option('site_feature_section3_color')           ? get_option('site_feature_section3_color')           : '#f9f9f9';
  $featureSec3BkColor   = get_option('site_feature_section3_bk_color')        ? get_option('site_feature_section3_bk_color')        : '#212121';

// ニュース欄
  $newsBk1              = get_option('site_carousel_news_bk')       ? get_option('site_carousel_news_bk')  : '#3bb3fa' ;
  $newsBk2              = get_option('site_carousel_news_bk2')      ? get_option('site_carousel_news_bk2') : '#ff3f3f' ;

//フォントの設定
  $fontDefault          = "'メイリオ','Avenir','Helvetica Neue','Helvetica','Arial','Hiragino Sans','ヒラギノ角ゴシック',YuGothic,'Yu Gothic', Meiryo,'ＭＳ Ｐゴシック','MS PGothic',sans-serif";

  /*** タイトルフォントの設定 ***/
  $titleFont            = get_option('site_font_title');
  switch ($titleFont) {
    case 'value1' : $TF = $fontDefault         ; break;
    case 'value2' : $TF = "'Luckiest Guy'"     ; break;
    case 'value3' : $TF = "'Megrim'"           ; break;
    case 'value4' : $TF = "'Faster One'"       ; break;
    case 'value5' : $TF = "'Iceland'"          ; break;
    case 'value6' : $TF = "'Londrina Outline'" ; break;
    case 'value7' : $TF = "'Caveat'"           ; break;
    case 'value8' : $TF = "'Nico Moji'"        ; break;
    case 'value9' : $TF = "'Hannari'"          ; break;
    case 'value10': $TF = "'Nikukyu'"          ; break;
  }

  /*** 本文フォントの設定 ****/
  $fontBody             = get_option('site_font_body');
  switch ($fontBody) {
    case 'value1' : $FB = $fontDefault; break;
    case 'value2' : $FB = "'Yu Mincho Light','YuMincho','Yu Mincho','游明朝体','Yu Gothic UI','ヒラギノ明朝 ProN','Hiragino Mincho ProN',sans-serif"; break;
    case 'value3' : $FB = "'M PLUS Rounded 1c', sans-serif"; break;
    case 'value4' : $FB = "'NotoSansCJK',".$fontDefault; break;
    case 'value5' : $FB = "'timemachine',".$fontDefault; break;
    case 'value6' : $FB = "'Senobi',".$fontDefault; break;
    case 'value7' : $FB = "'komorebi',".$fontDefault; break;
  }

  /*** 上のフォントを見出しにのみ適用 ***/
  $fontOnlyHeading = get_option('site_font_body_only_heading') ? get_option('site_font_body_only_heading') : false ;

  /*** サイトの文字サイズ ***/
  $titleSize  = get_option('site_font_title_size')        ? get_option('site_font_title_size')        : '160';
  $pcSize     = get_option('site_font_pc_size')           ? get_option('site_font_pc_size')           : '100';
  $tabSize    = get_option('site_font_tab_size')          ? get_option('site_font_tab_size')          : '98';
  $spSize     = get_option('site_font_sp_size')           ? get_option('site_font_sp_size')           : '95';


  /*** ナビメニューの横幅 ***/
  $nav        = get_option('site_nav_width');
  $navEn1     = get_option('site_nav_list1');
  $navEn2     = get_option('site_nav_list2');
  $navEn3     = get_option('site_nav_list3');
  $navEn4     = get_option('site_nav_list4');
  $navEn5     = get_option('site_nav_list5');
  $navtp      = get_option('site_nav_transparentable')    ? get_option('site_nav_transparentable')    : false;

  /*** 色の設定 ***/
  $main_c     = get_option('site_color_main')             ? get_option('site_color_main')             : '#1a2760';
  $sub_c      = get_option('site_color_sub')              ? get_option('site_color_sub')              : '#3bb3fa';
  $acc_c      = get_option('site_color_acc')              ? get_option('site_color_acc')              : '#ff3f3f';
  $nav_bk     = get_option('site_color_nav_bk')           ? get_option('site_color_nav_bk')           : '#1a2760';
  $nav_bk_grad= get_option('site_color_nav_bk_grad')      ? get_option('site_color_nav_bk_grad')      : '#9287e5';
  $nav_c      = get_option('site_color_nav_color')        ? get_option('site_color_nav_color')        : '#ffffff';
  $body_bk    = get_option('site_color_body_bk')          ? get_option('site_color_body_bk')          : '#f5f5f5';
  $body_c     = get_option('site_color_body_color')       ? get_option('site_color_body_color')       : '#2b546a';
  $side_bk    = get_option('site_color_widget_bk')        ? get_option('site_color_widget_bk')        : '#ffffff';
  $foot_bk    = get_option('site_color_footer_bk_color')  ? get_option('site_color_footer_bk_color')  : '#1a2760';
  $foot_c     = get_option('site_color_footer_color')     ? get_option('site_color_footer_color')     : '#ffffff';
  $link_c     = get_option('site_color_a_tag_color')      ? get_option('site_color_a_tag_color')      : '#2d6eef';

  $main_rgba  = getConversionRgba($main_c, 0.2);
  $sub_rgba   = getConversionRgba($sub_c , 0.2);

  $cta_rgba1  = getConversionRgba($acc_c , 0.9);
  $cta_rgba2  = getConversionRgba($main_c, 0.9);
  $cta_rgba3  = getConversionRgba($main_c, 0.8);
  $cta_rgba4  = getConversionRgba($main_c, 0.7);

  /*** 記事に関する設定 ***/
  $p_margin   = get_option('site_article_p_margin')       ? get_option('site_article_p_margin')       : '0.5';

  /*** フッターに関する設定 ***/
  $spOrgNav   = get_option('site_footer_sp_menu')         ? get_option('site_footer_sp_menu')         : false;
  $footShr    = get_option('site_footer_share')           ? get_option('site_footer_share')           : false;
  $footTop    = get_option('site_footer_gototop')         ? get_option('site_footer_gototop')         : false;

  ?>


<?php

 //////////////////////////////////////
 // ここからカスタマイザーの値を<head>に出力
 //////////////////////////////////////

 ?>
<style>
<?php if ($fontBody == 'value4'): ?>
@font-face{
font-family: 'NotoSansCJK';
src: url("<?php echo get_template_directory_uri(); ?>/lib/fonts/NotoSansCJKjp-Regular.woff") format("woff");
}
<?php elseif($fontBody == 'value5'): ?>
@font-face{
font-family: 'timemachine';
src: url("<?php echo get_template_directory_uri(); ?>/lib/fonts/timemachine-wa.woff") format("woff");
}
<?php elseif($fontBody == 'value6'): ?>
@font-face{
font-family: 'Senobi';
src: url("<?php echo get_template_directory_uri(); ?>/lib/fonts/Senobi-Gothic-Regular.woff") format("woff");
}
<?php elseif($fontBody == 'value7'): ?>
@font-face{
font-family: 'komorebi';
src: url("<?php echo get_template_directory_uri(); ?>/lib/fonts/komorebi-gothic.woff") format("woff");
}
<?php endif; ?>
body{<?php if($fontOnlyHeading == false): ?>font-family:<?php echo $FB ?>;<?php endif; ?>color:<?php echo $body_c ?>;background:<?php echo $body_bk ?>;}
<?php if($navShadow == true): ?>nav{-webkit-box-shadow:none;box-shadow:none;}<?php endif; ?>
nav a.siteTitle{font-family:<?php echo $TF ?>;font-size: <?php echo $titleSize ?>%;}
a{color:<?php echo $link_c ?>;}
@media (min-width: 961px){body{font-size:<?php echo $pcSize ?>%;<?php if ($sidebarLeft == true): ?>}.contentArea{flex-direction: row-reverse;-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse;}<?php endif; ?>}}
@media (max-width:960px){body{font-size:<?php echo $tabSize ?>%;}}
@media (max-width:560px){body{font-size:<?php echo $spSize ?>%;}}
/*** ダイナミックヘッダーとフューチャー ***/
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
.dyheaderBkImgFil3::after{background: url("<?php echo get_template_directory_uri(); ?>/images/dyheader_fil/dot.png") repeat;}
.dyheaderBkImgFil4::after{background: url("<?php echo get_template_directory_uri(); ?>/images/dyheader_fil/line.png") repeat;}
.dyheaderBkImgFil5::after{background: url("<?php echo get_template_directory_uri(); ?>/images/dyheader_fil/ruledLine.png") repeat;}
<?php endif; //END そもそもダイナミックヘッダーがあるかどうか?>
<?php if ( $siteType == 'value4' ) : //フューチャーがあるかどうか ?>
.f_item:nth-child(1) svg{color:<?php echo $featureIcon1Color ?>;}
.f_item:nth-child(2) svg{color:<?php echo $featureIcon2Color ?>;}
.f_item:nth-child(3) svg{color:<?php echo $featureIcon3Color ?>;}
#feature2{<?php if ($featureSec2BkImg != null) : ?>background:url("<?php echo $featureSec2BkImg ?>") no-repeat center/cover;<?php endif; ?>background-color:<?php echo $featureSec2BkColor ?>;color:<?php echo $featureSec2Color ?>;}
#feature3{<?php if ($featureSec3BkImg != null) : ?>background:url("<?php echo $featureSec3BkImg ?>") no-repeat center/cover;<?php endif; ?>background-color:<?php echo $featureSec3BkColor ?>;color:<?php echo $featureSec3Color ?>;}
<?php endif; //END フューチャーがあるかどうか ?>
.contentArea{max-width:<?php echo $contentArea ?>px;}
<?php if ($nav == true): ?>
.nav-wrapper,.footer_container{max-width:<?php echo $contentArea ?>px;margin: auto;}
<?php endif; ?>
.footer_container{max-width:<?php echo $contentArea ?>px;margin: auto;}
<?php if($navtp == true): ?>
body.started .headerArea nav{background:transparent;-webkit-backdrop-filter:blur(4px);backdrop-filter:blur(4px);}
<?php endif; ?>
#topnav li:nth-of-type(1) a::after{content:"<?php echo $navEn1 ?>";}
#topnav li:nth-of-type(2) a::after{content:"<?php echo $navEn2 ?>";}
#topnav li:nth-of-type(3) a::after{content:"<?php echo $navEn3 ?>";}
#topnav li:nth-of-type(4) a::after{content:"<?php echo $navEn4 ?>";}
#topnav li:nth-of-type(5) a::after{content:"<?php echo $navEn5 ?>";}
.news{background: linear-gradient(45deg, <?php echo $newsBk1 ?>, <?php echo $newsBk2 ?>);}
/*** 色 ***/
.main__color,.main_color:active,.main_color:focus,.main_color:hover,.main_color:visited,.main_color:focus-within,.pagination li span,.tocType3 .toc_ttl, .tocType4,.btn,.btn:hover,.btn-large,.btn-large:hover{background:<?php echo $main_c ?>;}
.sub__color,.sub_color:active,.sub_color:focus,.sub_color:hover,.sub_color:visited,.sub_color:focus-within,.tocType5 .toc_ttl::after,.tabs .indicator{background:<?php echo $sub_c ?>;}
.acc__color,.acc_color:active,.acc_color:focus,.acc_color:hover,.acc_color:visited,.acc_color:focus-within,input[type="submit"]{background:<?php echo $acc_c ?>;}
.main_c,.pagination li a,.articleList_wrap .articleList5 .content .title:hover,div.related_ttl:hover,.tocType4 .toc_body>ul>li>a::before,.started .navbar-fixed.main_c nav a{color:<?php echo $main_c ?>;}
/*** その他個別に設定すべきメイン.サブ.アクセントカラー ***/
.article_content h2.h2type1,.article_content h3.h3type1,.article_content h4.h4type1,.article_content h2.h2type7::before, .article_content h2.h2type7::after,.article_content h3.h3type7::before, .article_content h3.h3type7::after,.article_content h4.h4type7::before, .article_content h4.h4type7::after,.article_content h2.h2type8,.article_content h3.h3type8,.article_content h4.h4type8{border-color:<?php echo $main_c ?>;}
.article_content h2.h2type2,.article_content h3.h3type2,.article_content h4.h4type2,.article_content h2.h2type3::before,.article_content h3.h3type3::before,.article_content h4.h4type3::before,.article_content h2.h2type5,.article_content h3.h3type5,.article_content h4.h4type5{background:<?php echo $main_c ?>;}
.article_content h2.h2type2::after,.article_content h3.h3type2::after,.article_content h4.h4type2::after{border-top-color:<?php echo $main_c ?>;}
.article_content h2.h2type4:first-letter,.article_content h3.h3type4:first-letter,.article_content h4.h4type4:first-letter,.tabs .tab a:hover,.tabs .tab a.active,.tabs .tab a{color:<?php echo $main_c ?>;}
.article_content h2.h2type6::after,.article_content h3.h3type6::after,.article_content h4.h4type6::after{background: linear-gradient(to right, <?php echo $main_c ?>, <?php echo $sub_c ?>, #fff);}
.article_content ul li::before{background:<?php echo $sub_c ?>;}
.sideType1 h4.sidebar_title::after,.breadcrumbType1 li:not(.bread_home)::before{background:<?php echo $body_bk ?>;}
.btn-floating:hover,.dyheader_textArea>.btn-large:nth-of-type(2){background-color:<?php echo $acc_c ?>;}
.articleList_wrap .articleList3 .category::before{border-top-color:<?php echo $acc_c ?>;border-right-color:<?php echo $acc_c ?>;}
.tocType3{border-color:<?php echo $main_c ?>;}
.tabs .tab a:focus, .tabs .tab a:focus.active{background:rgba(<?php echo $sub_rgba ?>);}
.sc_marker{background: linear-gradient(transparent 70%, <?php echo $sub_c ?> 70%);}
.cta_body{background: linear-gradient(45deg,rgba(<?php echo $cta_rgba1 ?>),rgba(<?php echo $cta_rgba2 ?>),rgba(<?php echo $cta_rgba3 ?>),rgba(<?php echo $cta_rgba4 ?>));}
/*ナビ*/
nav{background: linear-gradient(45deg, <?php echo $nav_bk ?>, <?php echo $nav_bk_grad ?>);color:<?php echo $nav_c ?>;}
nav .brand-logo,nav a,nav ul a{color:<?php echo $nav_c ?>;}
.aside .widget,.profile_widget img,.author_thumb img{background:<?php echo $side_bk ?>;}
footer, .page-footer{background:<?php echo $foot_bk ?>;color:<?php echo $foot_c ?>;}
.footer_widgets_wrap .search_form_wrap input,.footer_widgets_wrap .search_form_wrap svg{color:<?php echo $foot_c ?>;}
a.tohomelink{color:<?php echo $foot_c ?>;}
/*** 記事 ***/
<?php if ($fontOnlyHeading == true): ?>
.article_content h2,.article_content h3, .article_content h4{font-family:<?php echo $FB ?>;}
<?php endif; ?>
.article_content p{margin-bottom:<?php echo $p_margin ?>em;}
/*** フッター ***/
<?php if($spOrgNav == true) : ?>
.gototop,.fixed-action-btn{bottom: 60px;}
<?php endif; ?>
<?php if($footTop == true && $footShr == true) : ?>
.fixed-action-btn{margin-bottom:61px;}
<?php endif; ?>

<?php if($darkModeOn==true): ?>
@media (prefers-color-scheme: dark){
.dark_theme,.dark_theme .articleShow_wrap article,.dark_theme .author_box,.dark_theme ul.related_posts,.dark_theme .comment_box{background:#444;color:#e4e4e4;}
.dark_theme .aside .widget,.dark_theme .profile_widget img,.dark_theme .author_thumb img,.dark_theme ul.tabs,.dark_theme .breadcrumbType1 li a,.dark_theme .breadcrumbType1 li:last-of-type span,
.dark_theme .articleList_wrap article:not(.articleList3):not(.articleList6) .thumbnail,.dark_theme .articleList_wrap article:not(.articleList5):not(.articleList6) .content, .dark_theme .articleList_wrap .articleList2,
.dark_theme .articleList_wrap .articleList2 .thumbnail time,.dark_theme .articleList_wrap .articleList1 .thumbnail .category,.dark_theme .articleList_wrap .articleList2 .thumbnail .category{background: #555;}
.dark_theme .sideType1 h4.sidebar_title::after,.dark_theme .breadcrumbType1 li:not(.bread_home)::before{background:#444;}
.dark_theme nav,.dark_theme footer,.dark_theme .page-footer, .dark_theme .btn,.dark_theme .btn-floating,.dark_theme .comment_text,.dark_theme .sidenav{background:#333;}
.dark_theme .comment_text::before{border-bottom:10px solid #333;}
.dark_theme .modal .modal-footer,.dark_theme .modal .modal-content,.dark_theme .pagination li span{background:#222;}
.dark_theme a,.dark_theme .sidenav li>a, .dark_theme .pagination li a{color: #e39777;}
.dark_theme .toc{color:#333}
.dark_theme img{filter: grayscale(30%);}
}
<?php endif; ?>
</style>

<?php
}//END add_customizerCSS()
