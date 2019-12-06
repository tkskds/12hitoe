<?php

$ttl         = get_the_title();
$articleList = get_option('site_article_list_type') ? get_option('site_article_list_type') : 'value1' ;

?>

<article
<?php
  switch ($articleList):
    case 'value1' : post_class('articleList1'); break ;
    case 'value2' : post_class('articleList2'); break ;
    case 'value3' : post_class('articleList3'); break ;
    case 'value4' : post_class('articleList4'); break ;
    case 'value5' : post_class('articleList5'); break ;
    case 'value6' : post_class('articleList6'); break ;
  endswitch;
?>>
  <a href="<?php the_permalink(); ?>">
    <div class="thumbnail">
      <?php if ($articleList == 'value1' || $articleList == 'value2' ) : ?>
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="acc__color">
          <span class="day"><?php echo get_the_date('d'); ?></span>
          <span class="month"><?php echo get_post_time('M'); ?></span>
        </time>
      <?php endif; ?>
      <?php if ($articleList == 'value3' || $articleList == 'value4' ) : ?>
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
          <i class="fas fa-calendar-alt"></i>
          <span><?php the_time(get_option('date_format')); ?></span>
        </time>
      <?php endif; ?>
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('eyecatch', array('alt' => $ttl)); ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300">
      <?php endif; ?>
      <?php if (!is_category() && has_category()): ?>
        <div class="category acc__color">
          <?php
            $post_cat = get_the_category();
            echo $post_cat[0]->name;
          ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="content">
      <p class="title"><?php the_title(); ?></p>
    </div>
  </a>
</article>
