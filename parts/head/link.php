<?php //スタイルシート呼び出し ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/css/components.css">


<?php $cssfw = get_option('site_cssfw_choice');?>
<?php if ($cssfw == 'value1') : ?>
<?php elseif ($cssfw == 'value2') : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js">
<?php elseif ($cssfw == 'value3') : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js">
<?php elseif ($cssfw == 'value4') : ?>
<?php elseif ($cssfw == 'value5') : ?>
<?php endif; ?>

<?php //サードパーティ製css/js呼び出し ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"><!--font-awesomeのスタイルシートの呼び出し-->



<!--materialize-->
<?php
//<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
//<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
?>


<?php //ファビコンなど ?>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
<link rel="icon" type="image/png" size="256x256" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome.png">
