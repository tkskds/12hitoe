<?php if(have_posts()): the_post(); ?>
  <article <?php post_class('articleType1'); ?>>
    <div class="article_container">
      <!--タイトル-->
      <div class="article_title">
          <h1><?php the_title(); ?></h1>
      </div>
      <!--本文-->
      <div class="article_content">
          <?php the_content(); ?>
      </div>
    </div>
  </article>
<?php endif; ?>
