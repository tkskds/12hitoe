<?php get_header(); ?>
  <div class="row contentArea">
    <main id="main"
          class="<?php
                    //サイト構造がサイドバーを含むものならグリッドクラス付与
                    $sideOn = get_option('site_bone_type');
                    if ($sideOn == 'value1' || $sideOn == 'value3'){
                      echo 'col s12 l9';
                      }
                  ?> main">
      <div class="main__container">
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
    <?php if ($sideOn == 'value1' || $sideOn == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
