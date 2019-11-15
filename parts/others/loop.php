<?php
$ttl = get_the_title();
$cssfw = get_option('site_cssfw_choice');
$articleList = get_option('site_articleList_card');
// if (『記事一覧に抜粋を表示する』チェックボックスがON){
//   $bassui = the_excerpt();
// }else{
//   $bassui = ''
// }endif;
?>
<article <?php if ($articleList = 'value1') {post_class('articleList1');} ?>>
  <a href="<?php the_permalink(); ?>">
    <div class="thumbnail">
      <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="main__color">
        <span class="day"><?php echo get_the_date('d'); ?></span>
        <span class="month"><?php echo get_post_time('M'); ?></span>
      </time>
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('eyecatch', array('alt' => $ttl)); ?>
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/default_thumbnail.png" alt="<?php echo $ttl ?>" width="520" height="300">
      <?php endif; ?>
      <?php if (!is_category() && has_category()): ?>
        <div class="category main__color">
          <?php
            $post_cat = get_the_category();
            echo $post_cat[0]->name;
          ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="content">
      <p class="title"><?php the_title(); ?></p>
    </div>
  </a>
</article>
