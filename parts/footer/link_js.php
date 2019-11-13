<?php $cssfw = get_option('site_cssfw_choice');?>
<?php if ($cssfw == 'value1') : ?>
<?php elseif ($cssfw == 'value2') : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js"></script>
<?php elseif ($cssfw == 'value3') : ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<?php elseif ($cssfw == 'value4') : ?>
<?php elseif ($cssfw == 'value5') : ?>
<?php endif; ?>
