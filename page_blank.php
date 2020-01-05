<?php
/**
* Template Name: 白紙ページ（ヘッダーとフッターのみ）
* Template Post Type: page
*/
?>

<?php
  $sideOn = get_option('site_bone_type');
  $articleType = get_option('site_article_type');
 ?>

<?php get_header(); ?>
<?php the_content(); ?>
<?php get_footer(); ?>
