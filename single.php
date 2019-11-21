<?php

  $sideOn = get_option('site_bone_type');
  $articleType = get_option('site_article_type');

 ?>

<?php get_header(); ?>
  <div class="row contentArea">
    <main id="main" class="<?php if ($sideOn == 'value1' || $sideOn == 'value3'){echo 'col s12 l9';}?> main">
      <div class="main__container">
        <?php
          if ($articleType == 'value1'){
            get_template_part('parts/article/type1');
          }elseif($articleType == 'value2'){
            get_template_part('parts/article/type2');
          }elseif($articleType == 'value3'){
            get_template_part('parts/article/type3');
          }elseif($articleType == 'value4'){
            get_template_part('parts/article/type4');
          }
         ?>
      </div>
    </main>
    <?php if ($sideOn == 'value1' || $sideOn == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
