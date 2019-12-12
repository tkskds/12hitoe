<?php
  $siteType    = get_option('site_bone_type')        ? get_option('site_bone_type')         : 'value1' ;
  $articleType = get_option('site_article_type')     ? get_option('site_article_type')      : 'value1' ;
  $tocOn       = get_option('site_article_toc_page') ? get_option('site_article_toc_page')  : false    ;
 ?>

<?php get_header(); ?>
  <div class="row contentArea showPage">
    <main id="main" class="main<?php if ($siteType == 'value1' || $siteType == 'value3'){echo ' columns col l9';}?>">
      <div class="main__container articleShow_wrap<?php if($tocOn==true){echo ' painttoc';} ?>">
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
    <?php if ($siteType == 'value1' || $siteType == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
