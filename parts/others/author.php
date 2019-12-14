<?php
 $twitter     = get_the_author_meta('twitter');
 $facebook    = get_the_author_meta('facebook');
 $googleplus  = get_the_author_meta('googleplus');
 $instagram   = get_the_author_meta('instagram');
?>

<div class="author">
  <h3 class="author_ttl article_af_ttl">
    この記事を書いた人
  </h3>
  <div class="author_box">
    <div class="author_thumb">
      <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
    </div>
    <div class="author_info">
      <p class="author_name">
        <?php the_author(); ?>
      </p>
      <p>
        <?php the_author_meta('user_description'); ?>
      </p>
      <div class="author_sns">
       <?php if(!empty($twitter)) : ?>
       <span class="follow_button">
       <a class="twitter" href="//twitter.com/<?php echo $twitter; ?>" target="_blank" title="Twitterをフォロー" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i></a>
       </span>
       <?php endif; ?>
       <?php if(!empty($facebook)) : ?>
       <span class="follow_button">
       <a class="facebook" href="//www.facebook.com/<?php echo $facebook; ?>" target="_blank" title="Facebookをフォロー" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a>
       </span>
       <?php endif; ?>
       <?php if(!empty($googleplus)) : ?>
       <span class="follow_button">
       <a class="googleplus" href="//plus.google.com/<?php echo $googleplus; ?>" target="_blank" title="Google+をフォロー" rel="nofollow"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
       </span>
       <?php endif; ?>
       <?php if(!empty($instagram)) : ?>
       <span class="follow_button">
       <a class="instagram" href="//www.instagram.com/<?php echo $instagram; ?>" target="_blank" title="Instagramをフォロー" rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i></a>
       </span>
       <?php endif; ?>
    </div>
  </div>
 </div>
</div>
