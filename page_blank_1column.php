<?php
/**
* Template Name: 白紙ページ（サイドバーなし）
* Template Post Type: page
*/
?>

<?php
  $tocOn       = get_option('site_article_toc_page') ? get_option('site_article_toc_page') : false ;
 ?>

 <?php get_header(); ?>
   <div class="row contentArea showPage">
     <main id="main" class="main">
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
  </div>
<?php get_footer(); ?>
