<?php //シンプル（普通） ?>

<?php

$share     = get_option('site_article_share')        ? get_option('site_article_share')        : 'value1' ;
$share_bf  = get_option('site_article_sharebf_type') ? get_option('site_article_sharebf_type') : 'value1' ;
$share_af  = get_option('site_article_shareaf_type') ? get_option('site_article_shareaf_type') : 'value1' ;
$share_ttl = get_option('site_article_share_ttl')    ? get_option('site_article_share_ttl')    : 'SHARE'  ;

?>

<?php if(have_posts()):the_post(); ?>

  <?php custom_breadcrumb(); ?>

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
      <!--アイキャッチ-->
      <div class="article_thumbnail">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('eyecatch', array('alt' => $ttl, 'class' => 'lazyloads')); ?>
          <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300" class="lazyloads">
          <?php endif; ?>
      </div>
      <!--シェアアイキャッチ下-->
      <?php if($share=='value1'||$share=='value2'): ?>
        <div class="article_share before_share<?php output_type_class($share_bf,'share'); ?>">
          <?php get_template_part('parts/others/sharebutton') ?>
        </div>
      <?php endif; ?>
      <!--本文-->
      <div class="article_content painttoc">
        <?php the_content(); ?>
      </div>
      <!--タグ-->
      <div class="article_tag">
          <?php the_tags('<ul class="tag_list"><li></li></ul>'); ?>
      </div>
      <!--シェア記事下-->
      <?php if($share=='value1'||$share=='value3'): ?>
        <p class="share_af_ttl"><?php echo $share_ttl ?></h3>
        <div class="article_share after_share<?php output_type_class($share_af,'share'); ?>">
          <?php get_template_part('parts/others/sharebutton') ?>
        </div>
    <?php endif; ?>
    </div>
  </article>

<?php endif; ?>
