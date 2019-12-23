<?php
 $cssfw = get_option('site_cssfw_choice') ? get_option('site_cssfw_choice') : 'value2' ;
 $tocOff = get_option('site_article_toc');
?>

<?php if ($cssfw != 'value1') : ?>
  <script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/materialize/js/materialize.min.js"></script>
  <script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/materialize.js"></script>
<?php endif; ?>
<script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/delighters/delighters.min.js"></script>
<script async type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/vendor/lazysizes/lazysizes.min.js"></script>
<?php if ($tocOff == false) : ?>
  <script defer type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/toc.js"></script>
<?php endif; ?>

<script type="text/javascript">FontAwesomeConfig = { searchPseudoElements: true };</script>
<script defer type="text/javascript" src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

<?php //コメント用js ?>
<?php if (is_singular()) wp_enqueue_script("comment-reply"); ?>
