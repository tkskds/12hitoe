<?php
  $sideOn      = get_option('site_bone_type')     ? get_option('site_bone_type')    : 'value1' ;
  $articleType = get_option('site_article_type')  ? get_option('site_article_type') : 'value1' ;
 ?>

<?php get_header(); ?>
  <div class="row contentArea">
    <main id="main" class="main<?php if ($sideOn == 'value1' || $sideOn == 'value3'){echo ' col l9';}?>">
      <div class="main__container articleShow_wrap">
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
