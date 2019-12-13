<?php

// article    > .tumbnail / .content
// .thumbnail > time / img / .category

$ttl         = get_the_title();
$articleList = get_option('site_article_list_type') ? get_option('site_article_list_type') : 'value1' ;

?>

<?php //materializeのcomponentカード以外は下のコード ?>
<?php if ($articleList != 'value7' ) : ?>

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



      <?php if($articleList != 'value5'): //デザイン5以外ではアイキャッチ出力 ?>
        <div class="thumbnail"><?php // アイキャッチ部分 ?>

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
            <?php echo convert_src_for_lazyload(get_the_post_thumbnail($post->ID, 'eyecatch', array('class' => 'activator lazyload'))); ?>
          <?php else: ?>
            <img data-src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300" class="lazyload">
          <?php endif; ?>

          <?php // .category ?>
          <?php if (!is_category() && has_category()): ?>
            <?php if($articleList == 'value1' || $articleList == 'value2' || $articleList == 'value3') : //デザイン1~3でのみカテゴリ表示 ?>
              <div class="category acc__color">
                <?php
                  $post_cat = get_the_category();
                  echo $post_cat[0]->name;
                ?>
              </div>
            <?php endif; //END デザイン1~3でのみカテゴリ表示 ?>
          <?php endif; //END .category ?>

        </div><?php //END .thumbnail ?>
      <?php endif; ?>

      <?php if($articleList != 'value4') : //デザイン4以外では.content表示 ?>

        <div class="content"><?php // タイトル部分 ?>
          <p class="title"><?php the_title(); ?></p>
          <?php if($articleList == 'value5' || $articleList == 'value6') : ?>
            <div class="content_info">
              <span>
                <?php
                  $post_cat = get_the_category();
                  echo $post_cat[0]->name;
                ?>
              </span>
              <span>・</span>
              <span><?php the_time(get_option('date_format')); ?></span>
            </div>
          <?php endif; ?>
        </div>

      <?php endif; //END デザイン4以外では.content表示 ?>

    </a>
  </article>

<?php elseif($articleList == 'value7') : //materializeデザインの記事リスト ?>

  <article class="articleList7 card">
    <div class="card-image waves-effect waves-block thumbnail">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('eyecatch', array(
          'alt'    => $ttl,
          'class'  => 'activator lazyload',
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
        <i class="fas fa-ellipsis-v"></i>
      </span>
      <p><a href="#">This is a link</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">
        <?php the_title(); ?>
        <i class="fas fa-times"></i>
      </span>
      <p>
        <?php //記事のディスクリプション ?>
      </p>
    </div>
  </article>

<?php endif; ?>
