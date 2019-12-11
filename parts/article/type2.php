<?php
////////////////////////////
////////////////////////////
////////////////////////////
////////////////////////////
//       そのうち変更       //
////////////////////////////
////////////////////////////
////////////////////////////
////////////////////////////
////////////////////////////

// アイキャッチを大々的に表示
// アイキャッチにタイトル重ねる


 ?>

<?php if(have_posts()): the_post(); ?>
  <article <?php post_class('article_content'); ?>>
    <div class="article_container">
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
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('eyecatch', array('alt' => $ttl)); ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300">
        <?php endif; ?>
      </div>
      <!--本文-->
      <?php the_content(); ?>
      <!--タグ-->
      <div class="article_tag">
        <?php the_tags('<ul class="tag_list"><li></li></ul>'); ?>
      </div>
    </div>
  </article>
<?php endif; ?>
