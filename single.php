<?php get_header(); ?>
  <div class="contents">
    <main id="main" class="main">
      <div class="container main__container">
      <?php if(have_posts()): the_post(); ?>
        <article <?php post_class('article_content'); ?>>
          <div class="article_meta_info">
            <!--カテゴリ-->
            <?php if(has_category()): ?>
              <span class="cat_data">
                <?php echo get_the_category_list(''); ?>
              </span>
            <?php endif; ?>
            <!--投稿日-->
            <span class="article_date">
              <i class="far fa-clock"></i>
              <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                <?php echo get_the_date(); ?>
              </time>
            </span>
          </div>
          <!--タイトル-->
          <h1><?php the_title(); ?></h1>
          <!--アイキャッチ-->
          <div class="article_thumbnail">
            <?php if( has_post_thumbnail()): ?>
              <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>
          </div>
          <!--本文-->
          <?php the_content(); ?>
          <!--タグ-->
          <div class="article_tag">
            <?php the_tags('<ul class="tag_list"><li></li></ul>'); ?>
          </div>
        </article>
      <?php endif; ?>
    </div>
    </main>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>
