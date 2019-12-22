<?php get_header(); ?>
  <div class="row contentArea showPage">
    <main id="main"
          class="<?php
                    //サイト構造がサイドバーを含むものならグリッドクラス付与
                    $sideOn = get_option('site_bone_type');
                    if ($sideOn == 'value1' || $sideOn == 'value3'){
                      echo 'col s12 l9';
                      }
                  ?> main">
      <div class="main__container">
        <?php get_template_part('parts/article/not_found'); ?>
      </div>
    </main>
    <?php if ($sideOn == 'value1' || $sideOn == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
