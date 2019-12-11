<?php

if(has_category()){
	$cats    = get_the_category();
	$catkwds = array();
	foreach($cats as $cat){
		$catkwds[] = $cat->term_id;
	}
}

$myposts = get_posts(array(
	'post_type'      => 'post',
	'posts_per_page' => '6',
	'post__not_in'   => array( $post->ID ),
	'category__in'   => $catkwds,
	'orderby'        => 'rand',
));

$relatedType = get_option('site_article_related_design') ? get_option('site_article_related_design') : 'value1' ;

?>

<?php if($myposts): ?>
  <div class="related <?php if($relatedType=='value1')echo'relatedType1';elseif($relatedType=='value2')echo'relatedType2';endif; ?>">
    <h3 class="related_ttl">関連記事</h3>
    <ul class="related_posts">
      <?php foreach($myposts as $post):setup_postdata($post); ?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <div class="related-thumb">
              <?php if( has_post_thumbnail() ): ?>
	              <?php echo get_the_post_thumbnail($post->ID, 'thumb100'); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="関連記事アイキャッチ画像" width="100" height="100">
              <?php endif; ?>
	          </div>
	          <div class="related-title">
              <?php the_title(); ?>
	          </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php wp_reset_postdata();endif; ?>
