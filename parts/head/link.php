<?php //リセットCSS ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

<?php //CSSフレームワークの分岐 ?>
<?php $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;?>
<?php if ($cssfw != 'value1') : ?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/css/materialize.min.css">
<?php endif; ?>

<?php //共通CSS ?>
<?php if ($cssfw != 'value1'): ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/common.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/responsive.css">
<?php endif; ?>

<?php //サードパーティ製css/js呼び出し ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"><!--font-awesomeのスタイルシートの呼び出し-->

<?php //GoogleFont呼び出し ?>
<?php $fontTitle = get_option('site_font_title') ? get_option('site_font_title') : 'value1' ; ?>
<?php if ($fontTitle == 'value2'): ?>
  <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
<?php elseif ($fontTitle == 'value3') : ?>
  <link href="https://fonts.googleapis.com/css?family=Megrim&display=swap" rel="stylesheet">
<?php elseif ($fontTitle == 'value4') : ?>
  <link href="https://fonts.googleapis.com/css?family=Faster+One&display=swap" rel="stylesheet">
<?php elseif ($fontTitle == 'value5') : ?>
  <link href="https://fonts.googleapis.com/css?family=Iceland&display=swap" rel="stylesheet">
<?php elseif ($fontTitle == 'value6') : ?>
  <link href="https://fonts.googleapis.com/css?family=Londrina+Outline&display=swap" rel="stylesheet">
<?php elseif ($fontTitle == 'value7') : ?>
  <link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet">
<?php elseif ($fontTitle == 'value8') : ?>
  <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
<?php elseif ($fontTitle == 'value9') : ?>
  <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
<?php elseif ($fontTitle == 'value10') : ?>
  <link href="https://fonts.googleapis.com/earlyaccess/nikukyu.css" rel="stylesheet">
<?php endif ?>

<?php $fontBody = get_option('site_font_body'); ?>
<?php if ($fontBody ==  'value3' ): ?>
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
<?php endif ?>

<?php $articleList = get_option('site_articleList_card') ? get_option('site_articleList_card') : 'value1' ; ?>
<?php if ($articleList == 'value1'): ?>
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
<?php endif; ?>

<?php //ファビコンなど ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
<link rel="icon" type="image/png" size="256x256" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome.png">
