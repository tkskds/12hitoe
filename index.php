<?php

  $siteType = get_option('site_bone_type') ? get_option('site_bone_type') : 'value1' ;

?>
<?php get_header(); ?>
<?php if($siteType != 'value4'): ?>
  <?php get_template_part('parts/others/carousel') ?>
  <div class="row contentArea indexPage">
    <main id="main" class="main<?php if ($siteType == 'value1' || $siteType == 'value3'){ echo ' columns col l9';}?>">
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
