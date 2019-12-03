<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;?>
<?php if ($cssfw != 'value1') : ?>
  <script src="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/lib/js/nav_materialize.js"></script>
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/lib/js/fadein.js"></script>
