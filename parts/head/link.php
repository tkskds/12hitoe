<?php //リセットCSS ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<!-- <link rel="dns-prefetch" href="//use.fontawesome.com"> -->

<?php //CSSフレームワークの分岐 （materialize.css/common.css呼び出し） ?>
<?php $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;?>
<?php if ($cssfw != 'value1') : ?>
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/css/materialize.min.css" rel="preload" media="all" as="style" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/css/materialize.min.css" rel="stylesheet" media="print" onload="this.media='all'">
  <link href="<?php echo get_template_directory_uri(); ?>/lib/css/materialize.css" rel="preload" media="all" as="style" type="text/css">
  <link href="<?php echo get_template_directory_uri(); ?>/lib/css/materialize.css" rel="stylesheet" media="print" onload="this.media='all'">
<?php endif; ?>

<!-- <?php //サードパーティ製css/js呼び出し ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" type="text/css" media="all"> -->

<?php //GoogleFont呼び出し ?>
<?php $fontTitle = get_option('site_font_title') ? get_option('site_font_title') : 'value1' ; ?>
<?php if ($fontTitle == 'value2'): ?>
  <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value3') : ?>
  <link href="https://fonts.googleapis.com/css?family=Megrim&display=swap" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value4') : ?>
  <link href="https://fonts.googleapis.com/css?family=Faster+One&display=swap" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value5') : ?>
  <link href="https://fonts.googleapis.com/css?family=Iceland&display=swap" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value6') : ?>
  <link href="https://fonts.googleapis.com/css?family=Londrina+Outline&display=swap" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value7') : ?>
  <link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value8') : ?>
  <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value9') : ?>
  <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet" media="all">
<?php elseif ($fontTitle == 'value10') : ?>
  <link href="https://fonts.googleapis.com/earlyaccess/nikukyu.css" rel="stylesheet" media="all">
<?php endif ?>

<?php $fontBody = get_option('site_font_body'); ?>
<?php if ($fontBody ==  'value3' ): ?>
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet" media="all">
<?php endif ?>

<?php $articleList = get_option('site_articleList_card') ? get_option('site_articleList_card') : 'value1' ; ?>
<?php if ($articleList == 'value1'): ?>
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet" media="all">
<?php endif; ?>

<?php if (is_home()){
        $canonical_url = get_bloginfo('url')."/";
      } elseif (is_category()){
        $canonical_url = get_category_link(get_query_var('cat'));
      } elseif (is_page()||is_single()){
        $canonical_url = get_permalink();
      }
      if ($paged >= 2 || $page >= 2){
        $canonical_url = $canonical_url.'page/'.max( $paged, $page ).'/';
      }
?>
<?php if(!(is_404())):?>
    <link rel="canonical" href="<?php echo $canonical_url; ?>" />
<?php endif;?>

<?php //jQueryを使用しない ?>
<?php $jQueryON = get_option('site_head_jquery') ? get_option('site_head_jquery') : false ?>
<?php if ($jQueryON == true) : ?>
  <?php wp_deregister_script('jquery');?>
<?php endif; ?>

<?php //ファビコンなど ?>
<link rel="icon" size="256x256" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome.png">
<link rel="icon" type="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
