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

$relatedTtl  = get_option('site_article_related_ttl')    ? get_option('site_article_related_ttl')    : '関連記事';
$relatedType = get_option('site_article_related_design') ? get_option('site_article_related_design') : 'value1' ;

?>

<?php if($myposts): ?>
  <div class="related<?php output_type_class($relatedType,'related') ?>">
    <h3 class="related_ttl article_af_ttl"><?php echo $relatedTtl ?></h3>
    <ul class="related_posts">
      <?php foreach($myposts as $post):setup_postdata($post); ?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <div class="related_thumb">
              <?php if(has_post_thumbnail()&&$relatedType=='value1'): ?>
	              <?php echo convert_src_for_lazyload(get_the_post_thumbnail($post->ID, 'minimum', array(
									'class' => 'fadeinimg lazyload')));
								?>
              <?php elseif(has_post_thumbnail()&&$relatedType=='value2'): ?>
                <?php echo convert_src_for_lazyload(get_the_post_thumbnail($post->ID, 'eyecatch', array(
									'class' => 'fadeinimg lazyload')));
								?>
              <?php elseif($relatedType=='value1'): ?>
                <img data-src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="関連記事アイキャッチ画像" width="80" height="80" class="fadeinimg lazyload">
              <?php elseif($relatedType=='value2'): ?>
                <img data-src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="関連記事アイキャッチ画像" width="520" height="300" class="fadeinimg lazyload">
              <?php endif; ?>
	          </div>
	          <div class="related_post_ttl">
              <?php the_title(); ?>
	          </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php wp_reset_postdata();endif; ?>
