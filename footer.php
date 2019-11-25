    <footer id="footer" class="footer">
      <div class="container footer_container">
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
    </footer>
    <a class="btn-floating btn-large waves-effect waves-light gototop acc__color"><i class="material-icons">expand_less</i></a>
    <?php get_template_part('parts/footer/link_js') ?>
    <?php wp_footer(); ?>
  </body>
</html>
