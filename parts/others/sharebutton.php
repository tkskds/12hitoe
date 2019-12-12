<div class="sharebutton">
  <ul class="sharebutton_list">
    <li class="share_button share_facebook">
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>" target="blank" rel="nofollow" class="opensub">
        <i class="fab fa-facebook"><i class="fab fa-facebook-f"></i></i></a>
    </li>
    <li class="share_button share_twitter">
      <a href="http://twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&amp;<?php echo urlencode(get_permalink()); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow" title="Twitterで共有" class="opensub">
        <i class="fab fa-twitter"></i>
      </a>
    </li>
    <li class="share_button share_line">
      <a href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow" title="Lineで共有" class="opensub">
        <i class="fab fa-line"></i>
      </a>
    </li>
    <li class="share_button share_hatena">
      <a href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" rel="nofollow" data-hatena-bookmark-title="<?php the_permalink(); ?>" title="このエントリーをはてなブックマークに追加" class="opensub">
        B!
      </a>
    </li>
    <li class="share_button share_pocket">
      <a href="https://getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(the_title("","",0)); ?>" target="blank" rel="nofollow" class="opensub">
        <i class="fab fa-get-pocket"></i>
      </a>
    </li>
  </ul>
</div>
