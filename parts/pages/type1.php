<?php //シンプル（普通） ?>

<?php if(have_posts()): the_post(); ?>
  <article <?php post_class('articleType1'); ?>>
    <div class="article_container">
      <div class="article_meta_info">
          <!--投稿日-->
          <span class="article_date">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
              <?php echo get_post_time('Y/m/d'); ?>
            </time>
            <?php if(get_the_date('Y/m/d') != get_the_modified_date('Y/m/d')): ?>
              <time datetime="<?php echo the_modified_date('Y-m-d'); ?>">
                <?php echo the_modified_date('Y/m/d'); ?>
              </time>
            <?php endif; ?>
          </span>
      </div>
      <!--タイトル-->
      <div class="article_title">
          <h1><?php the_title(); ?></h1>
      </div>
      <!--アイキャッチ-->
      <div class="article_thumbnail">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('eyecatch', array('alt' => $ttl, 'class' => 'fadeinimg lazyload')); ?>
          <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300" class="fadeinimg lazyload">
          <?php endif; ?>
      </div>
      <!--本文-->
      <div class="article_content">
          <?php the_content(); ?>
      </div>
    </div>
    <?php ld_json(); ?>
  </article>
<?php endif; ?>
