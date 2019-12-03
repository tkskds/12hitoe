<?php
  $sideOn = get_option('site_bone_type');
  $articleType = get_option('site_article_type');
 ?>

<?php get_header(); ?>
  <div class="row contentArea">
    <main id="main" class="main <?php if ($sideOn == 'value1' || $sideOn == 'value3'){echo 'col l9';}?>">
      <div class="main__container">
        <?php
          if ($articleType == 'value1'){
            get_template_part('parts/pages/type1');
          }elseif($articleType == 'value2'){
            get_template_part('parts/pages/type2');
          }elseif($articleType == 'value3'){
            get_template_part('parts/pages/type3');
          }elseif($articleType == 'value4'){
            get_template_part('parts/pages/type4');
          }
         ?>
      </div>
    </main>
    <?php if ($sideOn == 'value1' || $sideOn == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
