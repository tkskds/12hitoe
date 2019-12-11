<?php
if(has_category()){
	$cats    = get_the_category();
	$catkwds = array();
	foreach($cats as $cat){
		$catkwds[] = $cat->term_id;
	}
}
$ttl     = get_the_title();
$myposts = get_posts(array(
	'post_type'      => 'post',
	'posts_per_page' => '6',
	'post__not_in'   => array( $post->ID ),
	'category__in'   => $catkwds,
	'orderby'        => 'rand',
));
?>

<?php if($myposts): ?>
  <div class="related">
    <h3>関連記事</h3>
    <ul>
      <?php foreach($myposts as $post):setup_postdata($post); ?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <div class="related-thumb">
              <?php if( has_post_thumbnail() ): ?>
	              <?php echo get_the_post_thumbnail($post->ID, 'thumb100', 'alt'->$ttl); ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="100" height="100">
              <?php endif; ?>
	          </div>
	          <div class="related-title">
	            <?php echo $ttl ?>
	          </div>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php wp_reset_postdata();endif; ?>
