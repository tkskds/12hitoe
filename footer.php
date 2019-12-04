<?php

  $credit     = get_option('site_footer_credit')              ? get_option('site_footer_credit')           : false ;
  $goToTop    = get_option('site_footer_gototop')             ? get_option('site_footer_gototop')          : false ;
  $shareBtn   = get_option('site_footer_share')               ? get_option('site_footer_share')            : false ;
  $spfooter   = get_option('site_footer_sp_menu')             ? get_option('site_footer_sp_menu')          : false ;
  $li1icon    = get_option('site_footer_sp_menu_li1_icon')    ? get_option('site_footer_sp_menu_li1_icon') : '<i class="fas fa-bars"></i>' ;
  $li1text    = get_option('site_footer_sp_menu_li1_ttl')     ? get_option('site_footer_sp_menu_li1_ttl')  : 'MENU' ;
  $li1uri     = get_option('site_footer_sp_menu_li1_uri')     ? get_option('site_footer_sp_menu_li1_uri')  : '#';
  $li2icon    = get_option('site_footer_sp_menu_li2_icon')    ? get_option('site_footer_sp_menu_li2_icon') : '<i class="fas fa-paper-plane"></i>' ;
  $li2text    = get_option('site_footer_sp_menu_li2_ttl')     ? get_option('site_footer_sp_menu_li2_ttl')  : 'CONTACT' ;
  $li2uri     = get_option('site_footer_sp_menu_li2_uri')     ? get_option('site_footer_sp_menu_li2_uri')  : '#';
  $li3icon    = get_option('site_footer_sp_menu_li3_icon')    ? get_option('site_footer_sp_menu_li3_icon') : '<i class="fas fa-home"></i>' ;
  $li3text    = get_option('site_footer_sp_menu_li3_ttl')     ? get_option('site_footer_sp_menu_li3_ttl')  : 'HOME' ;
  $li3uri     = get_option('site_footer_sp_menu_li3_uri')     ? get_option('site_footer_sp_menu_li3_uri')  : '#';
  $li4icon    = get_option('site_footer_sp_menu_li4_icon')    ? get_option('site_footer_sp_menu_li4_icon') : '<i class="fas fa-phone"></i>' ;
  $li4text    = get_option('site_footer_sp_menu_li4_ttl')     ? get_option('site_footer_sp_menu_li4_ttl')  : 'TEL' ;
  $li4uri     = get_option('site_footer_sp_menu_li4_uri')     ? get_option('site_footer_sp_menu_li4_uri')  : '#';
  $li5icon    = get_option('site_footer_sp_menu_li5_icon')    ? get_option('site_footer_sp_menu_li5_icon') : '<i class="fas fa-question-circle"></i>' ;
  $li5text    = get_option('site_footer_sp_menu_li5_ttl')     ? get_option('site_footer_sp_menu_li5_ttl')  : 'Q&A' ;
  $li5uri     = get_option('site_footer_sp_menu_li5_uri')     ? get_option('site_footer_sp_menu_li5_uri')  : '#';


?>

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
          <?php if ($credit == false) : ?>
            <a class="grey-text text-lighten-4 right" href="https://takasaki.work/12hitoe">
              CreatedBy12hitoe
            </a>
          <?php endif; ?>
        </div>
      </div>
    </footer>
    <?php if ($goToTop == true) : ?>
      <a href="#" class="btn-floating btn-large waves-effect waves-light gototop acc__color">
        <i class="material-icons">expand_less</i>
      </a>
    <?php endif; ?>
    <?php if ($shareBtn == true) : ?>
      <div class="fixed-action-btn">
      <a class="btn-floating btn-large sub__color">
        <i class="large material-icons">share</i>
      </a>
      <ul>
        <li><a class="btn-floating red"><i class="fab fa-twitter"></i></a></li>
        <li><a class="btn-floating yellow darken-1"><i class="fab fa-line"></i></a></li>
        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
      </ul>
    </div>
    <?php endif; ?>
    <?php if ($spfooter == true && wp_is_mobile()) : ?>
      <div class="navbar-fixed">
        <nav class="footer_sp_menu">
          <ul>
            <?php if ($li1icon != null) : ?>
              <li>
                <a href="<?php echo $li1uri ?>" class="waves-effect">
                  <?php echo $li1icon ?>
                  <span><?php echo $li1text ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($li2icon != null) : ?>
              <li>
                <a href="<?php echo $li2uri ?>" class="waves-effect">
                  <?php echo $li2icon ?>
                  <span><?php echo $li2text ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($li3icon != null) : ?>
              <li>
                <a href="<?php echo $li3uri ?>" class="waves-effect">
                  <?php echo $li3icon ?>
                  <span><?php echo $li3text ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($li4icon != null) : ?>
              <li>
                <a href="<?php echo $li4uri ?>" class="waves-effect">
                  <?php echo $li4icon ?>
                  <span><?php echo $li4text ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($li5icon != null) : ?>
              <li>
                <a href="<?php echo $li5uri ?>" class="waves-effect">
                  <?php echo $li5icon ?>
                  <span><?php echo $li5text ?></span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    <?php  endif; ?>

    <?php get_template_part('parts/footer/link_js') ?>
    <?php wp_footer(); ?>
  </body>
</html>
