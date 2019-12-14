<?php
  $siteType    = get_option('site_bone_type')           ? get_option('site_bone_type')            : 'value1' ;
  $articleType = get_option('site_article_type')        ? get_option('site_article_type')         : 'value1' ;
  $authorOn    = get_option('site_article_authorable')  ? get_option('site_article_authorable')   : true ;
  $relatedOn   = get_option('site_article_relatedable') ? get_option('site_article_relatedable')  : true ;
 ?>

<?php get_header(); ?>
  <div class="row contentArea showPage">
    <main id="main" class="main<?php if ($siteType == 'value1' || $siteType == 'value3'){echo ' columns col l9';}?>">
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
      <?php if($authorOn==true){get_template_part('parts/others/author');} ?>
      <?php if($relatedOn==true){get_template_part('parts/others/relatedPost');} ?>
    </main>
    <?php if($siteType == 'value1' || $siteType == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
