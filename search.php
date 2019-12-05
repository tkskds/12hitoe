<?php // サーチフォームテスト ?>

<?php if ( have_posts() ) : ?>
  <h1>
    <?php printf( __( 'Search Results for: %s', 'altitude' ), '<span>' . get_search_query() . '</span>' ); ?>
  </h1>

  <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'search' ); ?>
  <?php endwhile; ?>

  <?php else : ?>
    該当なし
  <?php endif; ?>
