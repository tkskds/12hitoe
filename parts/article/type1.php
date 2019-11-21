<?php //シンプル（普通） ?>

<?php if(have_posts()): the_post(); ?>
  <article <?php post_class('article_content article_content_type1'); ?>>
    <div class="article_container">
      <div class="article_meta_info">
          <!--投稿日-->
          <span class="article_date">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
              <?php echo get_post_time('Y/m/d'); ?>
            </time>
          </span>
          <!--カテゴリ-->
          <?php if(has_category()): ?>
            <span class="cat_data">
              <?php echo get_the_category_list(''); ?>
            </span>
          <?php endif; ?>
      </div>
      <!--タイトル-->
      <div class="article_title">
          <h1><?php the_title(); ?></h1>
      </div>
      <!--アイキャッチ-->
      <div class="article_thumbnail">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('eyecatch', array('alt' => $ttl)); ?>
          <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300">
          <?php endif; ?>
      </div>
      <!--本文-->
      <div class="article_content">
          <?php the_content(); ?>
      </div>
      <!--タグ-->
      <div class="article_tag">
          <?php the_tags('<ul class="tag_list"><li></li></ul>'); ?>
      </div>
    </div>
  </article>
<?php endif; ?>
