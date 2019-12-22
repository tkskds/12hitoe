<div class="popular_posts">
  <ul>
    <?php get_the_ID();
      $args = array(
        'meta_key'       => 'post_views_count',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'posts_per_page' => $number
      );
      $my_query = new WP_Query( $args );?>
      <?php while ( $my_query->have_posts() ) : $my_query->the_post(); $loopcounter++; ?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <span class="rank rank_count<?php echo $loopcounter; ?>">
           <?php echo $loopcounter; ?>
          </span>
          <?php if( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('thumbnail'); ?>
          <?php endif; ?>
          <div class="sidekiji-text">
            <?php the_title(); ?>
            <br>
              <span class="cat-data">
               <?php if( has_category() ): ?>
                <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
            <?php endif; ?></span>
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </ul>
</div>
