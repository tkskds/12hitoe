<?php
 $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;
 $tocOff = get_option('site_article_toc');
?>

<?php if ($cssfw != 'value1') : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js" defer></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/materialize.js" defer></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/delighters/delighters.min.js" defer></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/lazysizes/lazysizes.min.js" async=""></script>
<?php if ($tocOff == false) : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/toc.js" defer></script>
<?php endif; ?>
