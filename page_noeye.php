<?php
/**
* Template Name: アイキャッチ画像なし
* Template Post Type: page
*/
?>

<?php
  $sideOn = get_option('site_bone_type');
  $articleType = get_option('site_article_type');
 ?>

<?php get_header(); ?>
  <div class="row contentArea">
    <main id="main" class="main <?php if ($sideOn == 'value1' || $sideOn == 'value3'){echo 'col s12 l9';}?>">
      <div class="main__container">
        <?php
          if ($articleType == 'value1'){
            get_template_part('parts/pages/type1');
          }elseif($articleType == 'value2'){
            get_template_part('parts/pages/type2');
          }elseif($articleType == 'value3'){
            get_template_part('parts/pages/type3');
          }elseif($articleType == 'value4'){
            get_template_part('parts/pages/type4');
          }
         ?>
      </div>
    </main>
    <?php if ($sideOn == 'value1' || $sideOn == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>




<?php if(have_posts()): the_post(); ?>
  <article <?php post_class('articleType1'); ?>>
    <div class="article_container">
      <div class="article_meta_info">
          <!--投稿日-->
          <span class="article_date">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
              <?php echo get_post_time('Y/m/d'); ?>
            </time>
          </span>
      </div>
      <!--タイトル-->
      <div class="article_title">
          <h1><?php the_title(); ?></h1>
      </div>
      <!--本文-->
      <div class="article_content">
          <?php the_content(); ?>
      </div>
    </div>
  </article>
<?php endif; ?>
