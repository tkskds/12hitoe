<?php
/**
* Template Name: 白紙ページ
* Template Post Type: page
*/
?>

<?php
  $siteType    = get_option('site_bone_type')        ? get_option('site_bone_type')        : 'value1' ;
  $articleType = get_option('site_article_type');
  $tocOn       = get_option('site_article_toc_page') ? get_option('site_article_toc_page') : false ;
 ?>

 <?php get_header(); ?>
   <div class="row contentArea showPage">
     <main id="main" class="main<?php if ($siteType == 'value1' || $siteType == 'value3'){echo ' columns col l9';}?>">
       <div class="main__container articleShow_wrap<?php if($tocOn==true){echo ' painttoc';} ?>">
        <?php if(have_posts()): the_post(); ?>
          <article <?php post_class('articleType1'); ?>>
            <div class="article_container">
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

      </div>
    </main>
    <?php if ($siteType == 'value1' || $siteType == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
