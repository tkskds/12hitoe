<?php
 $twitter     = get_the_author_meta('twitter');
 $facebook    = get_the_author_meta('facebook');
 $instagram   = get_the_author_meta('instagram');
 $youtube     = get_the_author_meta('youtube');
 $github      = get_the_author_meta('github');
 $codepen     = get_the_author_meta('codepen');
 ?>

<?php if(!empty($twitter)||!empty($facebook)||!empty($youtube)||!empty($instagram)||!empty($github)||!empty($codepen)): ?>
  <div class="author_sns">
   <?php if(!empty($twitter)) : ?>
   <a class="follow_button follow_button_tw circle" href="//twitter.com/<?php echo $twitter; ?>" target="_blank" title="Twitterをフォロー" rel="nofollow">
     <i class="fab fa-twitter"></i>
   </a>
   <?php endif; ?>
   <?php if(!empty($facebook)) : ?>
   <a class="follow_button follow_button_fb circle" href="//facebook.com/<?php echo $facebook; ?>" target="_blank" title="Facebookをフォロー" rel="nofollow">
     <i class="fab fa-facebook-f"></i>
   </a>
   <?php endif; ?>
   <?php if(!empty($instagram)) : ?>
   <a class="follow_button follow_button_is circle" href="//instagram.com/<?php echo $instagram; ?>" target="_blank" title="Instagramをフォロー" rel="nofollow">
     <i class="fab fa-instagram"></i>
   </a>
   <?php endif; ?>
   <?php if(!empty($youtube)) : ?>
   <a class="follow_button follow_button_yt circle" href="//youtube.com/channel/<?php echo $youtube; ?>" target="_blank" title="チャンネル登録" rel="nofollow">
     <i class="fab fa-youtube"></i>
   </a>
   <?php endif; ?>
   <?php if(!empty($github)) : ?>
   <a class="follow_button follow_button_gh circle" href="//github.com/<?php echo $github; ?>" target="_blank" title="Githubをフォロー" rel="nofollow">
     <i class="fab fa-github"></i>
   </a>
   <?php endif; ?>
   <?php if(!empty($codepen)) : ?>
   <a class="follow_button follow_button_cp circle" href="//codepen.io/<?php echo $codepen; ?>" target="_blank" title="Codepenをフォロー" rel="nofollow">
     <i class="fab fa-codepen"></i>
   </a>
   <?php endif; ?>
 </div>
<?php endif; ?>