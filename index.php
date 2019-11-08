<?php get_header(); ?>
  <div class="contents">
    <main id="main" class="main">
      <div class="container main__container">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <?php get_template_part('parts/others/loop') ?>
        <?php endwhile; endif; ?>
        <div class="pagination">
          <?php echo paginate_links(array(
            'type' => 'list',
            'mid_size' => '1',
            'prev_text' => '<i class="fas fa-angle-left"></i>',
            'next_text' => '<i class="fas fa-angle-right"></i>'
          )); ?>
        </div>
      </div>
    </main>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>
