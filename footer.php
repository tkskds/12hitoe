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
    <a href="#" id="go_to_top">↑</a>
    <?php wp_footer(); ?>
  </body>
</html>
