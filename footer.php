    <footer id="footer" class="footer">
      <div class="footer_inner">
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
    <?php wp_footer(); ?>
  </body>
</html>
