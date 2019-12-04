    <footer id="footer" class="footer page-footer">
      <div class="footer_container container">
        <?php
          if(
            is_active_sidebar('footer_left_widget')||
            is_active_sidebar('footer_center_widget')||
            is_active_sidebar('footer_right_widget')) :
        ?>
          <div class="footer_widgets_wrap">
            <?php if(is_active_sidebar('footer_left_widget')):?>
              <div>
                <?php echo dynamic_sidebar('footer_left_widget'); ?>
              </div>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer_center_widget')):?>
              <div>
                <?php echo dynamic_sidebar('footer_center_widget'); ?>
              </div>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer_right_widget')):?>
              <div>
                <?php echo dynamic_sidebar('footer_right_widget'); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <a href="<?php echo home_url(); ?>" class="tohomelink"><i class="fas fa-home"></i>HOME</a>
        <?php
          wp_nav_menu(array(
            'theme_location' => 'nav_footer',
            'container' => 'nav',
            'container_id' => 'nav_footer',
            'container_class' => 'nav_footer',
            'fallback_cb' => ''
          ));
        ?>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <span>©<?php echo date('Y'); ?></span><span><?php echo bloginfo('name'); ?></span>
          <a class="grey-text text-lighten-4 right" href="https://takasaki.work/12hitoe">CreatedBy12hitoe</a>
        </div>
      </div>
    </footer>
    <a href="#" class="btn-floating btn-large waves-effect waves-light gototop acc__color"><i class="material-icons">expand_less</i></a>
    <?php get_template_part('parts/footer/link_js') ?>
    <?php wp_footer(); ?>
  </body>
</html>
