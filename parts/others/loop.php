<?php

// article    > .tumbnail / .content
// .thumbnail > time/ img / .category

$ttl         = get_the_title();
$articleList = get_option('site_article_list_type') ? get_option('site_article_list_type') : 'value1' ;

?>

<?php //materializeのcomponentカード以外は下のコード ?>
<?php if ($artcileList != 'value7' ) : ?>

  <article
  <?php
    switch ($articleList):
      case 'value1' : post_class('articleList1'); break ; // マテリアル
      case 'value2' : post_class('articleList2'); break ; // カクカク
      case 'value3' : post_class('articleList3'); break ; // 細長
      case 'value4' : post_class('articleList4'); break ; // 画像だけ
      case 'value5' : post_class('articleList5'); break ; // 文字だけ
      case 'value6' : post_class('articleList6'); break ; // 画像と文字だけ
    endswitch;
  ?>>
    <a href="<?php the_permalink(); ?>">

      <div class="thumbnail"><?php // time / img / .category ?>

        <?php // time ?>
        <?php if ($articleList == 'value1' || $articleList == 'value2' ) : ?>
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="acc__color">
            <span class="day"><?php echo get_the_date('d'); ?></span>
            <span class="month"><?php echo get_post_time('M'); ?></span>
          </time>
        <?php elseif ($articleList == 'value3') : ?>
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
            <i class="fas fa-calendar-alt"></i>
            <span><?php the_time(get_option('date_format')); ?></span>
          </time>
        <?php else : ?>
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>"></time>
        <?php endif; //END time ?>

        <?php // img ?>
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('eyecatch', array('alt' => $ttl)); ?>
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300">
        <?php endif; ?>

        <?php // .category ?>
        <?php if (!is_category() && has_category()): ?>
          <div class="category acc__color">
            <?php
              $post_cat = get_the_category();
              echo $post_cat[0]->name;
            ?>
          </div>
        <?php endif; //END .category ?>

      </div>

      <div class="content">
        <p class="title"><?php the_title(); ?></p>
      </div>

    </a>
  </article>

<?php elseif($articleList == 'value7') : //materializeデザインの記事リスト ?>

  <article class="articleList7 card">
    <div class="card-image waves-effect waves-block">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('eyecatch', array(
          'alt'    => $ttl,
          'class'  => 'activator',
          'width'  => 520,
          'height' => 300,
          ));
        ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" class="activator" alt="<?php echo $ttl ?>" width="520" height="300">
      <?php endif; ?>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">
        <?php the_title(); ?>
        <i class="material-icons right">more_vert</i>
      </span>
      <p><a href="#">This is a link</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <?php the_title(); ?>
        <i class="material-icons right">close</i>
      </span>
      <p>
        <?php //記事のディスクリプション ?>
      </p>
    </div>
  </article>

<?php endif; ?>
