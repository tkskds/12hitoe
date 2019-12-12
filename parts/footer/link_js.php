<?php
 $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;
 $tocOn = get_option('site_article_toc');
?>

<?php if ($cssfw != 'value1') : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js" async></script>
  <script src="<?php echo get_template_directory_uri(); ?>/lib/js/materialize.js" async></script>
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/delighters/min/delighters.min.js" async></script>
<?php if ($tocOn == true) : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/toc.js" async></script>
<?php endif; ?>
