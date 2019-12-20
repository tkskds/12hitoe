<div class="sharebutton">
  <ul class="sharebutton_list">
    <li class="share_button share_twitter">
      <a href="http://twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&amp;<?php echo urlencode(get_permalink()); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noreferrer" title="Twitterで共有" aria-label="Twitterで共有">
        <i class="fab fa-twitter"></i>
      </a>
    </li>
    <li class="share_button share_facebook">
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>" target="blank" rel="nofollow noopener noreferrer" aria-label="Facebookで共有">
        <i class="fab fa-facebook"></i></a>
    </li>
    <li class="share_button share_hatena">
      <a href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" rel="nofollow noopener noreferrer" data-hatena-bookmark-title="<?php the_permalink(); ?>" title="このエントリーをはてなブックマークに追加" aria-label="はてブで共有">
        B!
      </a>
    </li>
    <li class="share_button share_pocket">
      <a href="https://getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(the_title("","",0)); ?>" target="blank" rel="nofollow noopener noreferrer" aria-label="pocketで共有">
        <i class="fab fa-get-pocket"></i>
      </a>
    </li>
    <li class="share_button share_line">
      <a href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noreferrer" title="Lineで共有" aria-label="LINEで共有">
        <i class="fab fa-line"></i>
      </a>
    </li>
  </ul>
</div>
