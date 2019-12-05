<?php get_header(); ?>
  <div class="row contentArea">
    <main id="main"
          class="<?php
                    //サイト構造がサイドバーを含むものならグリッドクラス付与
                    if ($siteType == 'value1' || $siteType == 'value3'){
                      echo 'col l9';
                      }
                  ?> main">
      <h4 class="search_result_ttl">「<?php the_search_query(); ?>」の検索結果</h4>
      <div class="main__container">
        <?php if (have_posts() && get_search_query()) : while (have_posts()) : the_post();?>
          <?php get_template_part('parts/others/loop') ?>
        <?php endwhile; else : ?>
          <?php get_template_part('parts/article/not_found'); ?>
        <?php endif; ?>
      </div>
      <?php m_pagination(); ?>
    </main>
    <?php if ($siteType == 'value1' || $siteType == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
