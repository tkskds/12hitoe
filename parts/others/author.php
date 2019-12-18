<?php
 $authorTitle = get_option('site_article_author_ttl') ? get_option('site_article_author_ttl') : 'この記事を書いた人' ;
?>

<div class="author">
  <h3 class="author_ttl article_af_ttl">
    <?php echo $authorTitle ?>
  </h3>
  <div class="author_box">
    <div class="author_thumb">
      <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
      <p class="author_name">
        <?php the_author(); ?>
      </p>
    </div>
    <div class="author_info">
      <p>
        <?php the_author_meta('user_description'); ?>
      </p>
      <?php get_template_part('parts/others/follow_button') ?>
    </div>
  </div>
</div>
