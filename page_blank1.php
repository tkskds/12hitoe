<?php
/**
* Template Name: 白紙ページ
* Template Post Type: page
*/
?>
<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>
  <?php the_content(); ?>
<?php endif; ?>

<?php get_footer(); ?>
