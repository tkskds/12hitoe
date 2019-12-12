<?php
 $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;
 $tocOn = get_option('site_article_toc');
?>

<?php if ($cssfw != 'value1') : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js" defer></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/materialize.js" defer></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/delighters/min/delighters.min.js" defer></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/lazysizes/lazysizes.min.js" defer></script>
<?php if ($tocOn == true) : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/toc.js" defer></script>
<?php endif; ?>
