<?php get_header(); ?>
<?php $siteType = get_option('site_bone_type') ? get_option('site_bone_type') : 'value1' ; ?>
<?php if($siteType != 'value4'): ?>
  <div class="row contentArea">
    <main id="main"
          class="<?php
                    //サイト構造がサイドバーを含むものならグリッドクラス付与
                    if ($siteType == 'value1' || $siteType == 'value3'){
                      echo 'col l9';
                      }
                  ?> main">
      <div class="main__container articleList_wrap">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <?php get_template_part('parts/others/loop') ?>
        <?php endwhile; endif; ?>
      </div>
      <?php m_pagination(); ?>
    </main>
    <?php if ($siteType == 'value1' || $siteType == 'value3'){ get_sidebar(); } ?>
  </div>
<?php endif; ?>
<?php get_footer(); ?>
