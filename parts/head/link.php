<?php //テーマスタイルシート呼び出し ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/common.css">

<?php //CSSフレームワークの分岐 ?>
<?php $cssfw = get_option('site_cssfw_choice');?>
<?php if ($cssfw == 'value1') : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/flatDesign.css">
<?php elseif ($cssfw == 'value2') : ?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js">
<?php elseif ($cssfw == 'value3') : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js">
<?php endif; ?>

<?php //サードパーティ製css/js呼び出し ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"><!--font-awesomeのスタイルシートの呼び出し-->

<?php //GoogleFont呼び出し ?>
<?php $fontBody = get_option('site_font_body'); ?>
<?php if ($fontBody ==  'value3' ): ?>
  <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
<?php endif ?>

<?php //ファビコンなど ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
<link rel="icon" type="image/png" size="256x256" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome.png">
