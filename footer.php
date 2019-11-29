    <footer id="footer" class="footer">
      <div class="container footer_container">
        <?php
          if(
            is_active_sidebar('footer_left_widget')||
            is_active_sidebar('footer_center_widget')||
            is_active_sidebar('footer_right_widget')) :
        ?>
          <div class="footer_widgets_wrap">
            <?php if(is_active_sidebar('footer_left_widget')) dynamic_sidebar('footer_left_widget'); ?>
            <?php if(is_active_sidebar('footer_center_widget')) dynamic_sidebar('footer_center_widget'); ?>
            <?php if(is_active_sidebar('footer_right_widget')) dynamic_sidebar('footer_right_widget'); ?>
          </div>
        <?php endif; ?>
        <?php
          // wp_nav_menu(array(
          //   'theme_location' => 'nav_footer',
          //   'container' => 'nav',
          //   'container_id' => 'nav_footer',
          //   'container_class' => 'nav_footer',
          //   'fallback_cb' => ''
          // ));
        ?>
      </div>
    </footer>
    <a href="#" class="btn-floating btn-large waves-effect waves-light gototop acc__color"><i class="material-icons">expand_less</i></a>
    <?php get_template_part('parts/footer/link_js') ?>
    <?php wp_footer(); ?>
  </body>
</html>
