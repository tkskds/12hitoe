<?php

//ループに関する条件分岐をする
  //
  // if (ループ1を選択している){
  // ブログ向け
  // }elseif (ループ1を選択している){
  // ブログ向け2
  // }elseif (ループ3を選択している){
  //　メディア向け
  // }else{
  // メディア向け（著者の表示など）
  // }

 ?>

<div class="card">
 <div class="card-image waves-effect waves-block waves-light">
   <?php if (has_post_thumbnail()): ?>
     <?php the_post_thumbnail('medium', array( 'class' => 'activator' )); ?>
   <?php else: ?>
     <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="サムネイル画像">
   <?php endif; ?>
 </div>
 <div class="card-content">
   <span class="card-title activator grey-text text-darken-4">
     <?php the_title(); ?>
     <i class="material-icons right">more_vert</i>
   </span>
   <p><a href="<?php the_permalink(); ?>">続きを読む</a></p>
 </div>
 <div class="card-reveal">
   <span class="card-title grey-text text-darken-4">
     <?php the_title(); ?>
     <i class="material-icons right">close</i></span>
   <p><?php the_excerpt(); ?></p>
 </div>
</div>


<article <?php post_class('article_list'); ?>>
  <a href="<?php the_permalink(); ?>" class="container article_container">
    <!--カテゴリ（絶対値で自由に配置）-->
    <?php if (!is_category() && has_category()): ?>
      <span class="cat_data">
        <?php
          $post_cat = get_the_category();
          echo $post_cat[0]->name;
        ?>
      </span>
    <?php endif; ?>
    <!--画像-->
    <div class="article_img_wrap">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="サムネイル画像">
      <?php endif; ?>
    </div>
    <!--タイトル-->
    <div class="article_ttl_wrap">
      <h2><?php the_title(); ?></h2>
      <span class="article_date">
        <i class="far fa-clock"></i>
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
          <?php echo get_the_date(); ?>
        </time>
      </span>
    </div>
  </a>
</article>
