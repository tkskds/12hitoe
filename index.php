<?php get_header(); ?>
<div class="container">
  <div class="contents">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php get_template_part('loop-content') ?>
      <!--ここにカスタマイザーでどういうループを表示するか設定できる項目を追加する-->
      <!--ループ1 / ループ2　のセレクトボックス-->
      <!--カスタマイザーの項目を引数としてphpの条件分岐をする-->
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
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
