<?php

$ttl = get_the_title();
$cssfw = get_option('site_cssfw_choice');

// if (『記事一覧に抜粋を表示する』チェックボックスがON){
//   $bassui = the_excerpt();
// }else{
//   $bassui = ''
// }endif;




 ?>
 <?php if ($cssfw == 'value1') : //CSSフレームワークによって出力する記事一覧変更 ?>
   <!--オリジナル-->
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

 <?php elseif ($cssfw == 'value2') : /////////////////マテリアライズ ?>
   <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium', array( 'class' => 'activator', 'alt' => $ttl )); ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" class="activator">
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

 <?php elseif ($cssfw == 'value3') : //////////////ブートストラップ ?>
   <div class="card" style="width: 18rem;">
     <?php if (has_post_thumbnail()): ?>
       <?php the_post_thumbnail('medium', array( 'class' => 'card-img-top', 'alt' => $ttl )); ?>
     <?php else: ?>
       <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" class="activator">
     <?php endif; ?>
     <div class="card-body">
       <h5 class="card-title"><?php the_title(); ?></h5>
       <p class="card-text"><?php the_excerpt(); ?></p>
       <a href="<?php the_permalink(); ?>" class="btn btn-primary">続きを読む</a>
     </div>
   </div>


 <?php elseif ($cssfw == 'value4') : ?>

 <?php elseif ($cssfw == 'value5') : ?>

 <?php endif; ?>
