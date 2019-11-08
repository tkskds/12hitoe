<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: http://ogp.me/ns#">
    <?php get_template_part('parts/head/meta') ?>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header id="header" class="header">
      <div class="container header__container">
        <?php get_template_part('parts/header/header_content') ?>
      </div>
    </header>
