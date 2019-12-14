<?php
 $twitter     = get_the_author_meta('twitter');
 $facebook    = get_the_author_meta('facebook');
 $instagram   = get_the_author_meta('instagram');
 $youtube     = get_the_author_meta('youtube');
?>

<div class="author">
  <h3 class="author_ttl article_af_ttl">
    この記事を書いた人
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
      <div class="author_sns">
       <?php if(!empty($twitter)) : ?>
       <span class="follow_button">
       <a class="twitter" href="//twitter.com/<?php echo $twitter; ?>" target="_blank" title="Twitterをフォロー" rel="nofollow">
         <i class="fab fa-twitter"></i>
       </a>
       </span>
       <?php endif; ?>
       <?php if(!empty($facebook)) : ?>
       <span class="follow_button">
       <a class="facebook" href="//facebook.com/<?php echo $facebook; ?>" target="_blank" title="Facebookをフォロー" rel="nofollow">
         <i class="fab fa-facebook-f"></i>
       </a>
       </span>
       <?php endif; ?>
       <?php if(!empty($instagram)) : ?>
       <span class="follow_button">
       <a class="instagram" href="//instagram.com/<?php echo $instagram; ?>" target="_blank" title="Instagramをフォロー" rel="nofollow">
         <i class="fab fa-instagram"></i>
       </a>
       </span>
       <?php endif; ?>
       <?php if(!empty($youtube)) : ?>
       <span class="follow_button">
       <a class="youtube" href="//youtube.com//channel/<?php echo $youtube; ?>" target="_blank" title="チャンネル登録" rel="nofollow">
         <i class="fab fa-youtube"></i>
       </a>
       </span>
       <?php endif; ?>
    </div>
  </div>
 </div>
</div>
