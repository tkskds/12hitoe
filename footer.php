<?php

  $onlyLogo   = get_option('only_logo');
  $logo       = get_theme_mod('custom_logo');
  $logoUrl	  = wp_get_attachment_url( $logo );
  $credit     = get_option('site_footer_credit')              ? get_option('site_footer_credit')           : false ;
  $goToTop    = get_option('site_footer_gototop')             ? get_option('site_footer_gototop')          : false ;
  $shareBtn   = get_option('site_footer_share')               ? get_option('site_footer_share')            : false ;
  $spfooter   = get_option('site_footer_sp_menu')             ? get_option('site_footer_sp_menu')          : false ;
  $menuDesign = get_option('site_footer_sp_menu_design')      ? get_option('site_footer_sp_menu_design')   : 'value1' ;
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
    <div class="footerArea">
      <footer id="footer" class="footer page-footer">
        <div class="footer_container">
          <?php // フッターウィジェット
            if(
              is_active_sidebar('footer_left_widget')||
              is_active_sidebar('footer_center_widget')||
              is_active_sidebar('footer_right_widget')) :
          ?>
            <div class="footer_widgets_wrap">
              <?php if(is_active_sidebar('footer_left_widget')):?>
                <div>
                  <?php dynamic_sidebar('footer_left_widget'); ?>
                </div>
              <?php endif; ?>
              <?php if(is_active_sidebar('footer_center_widget')):?>
                <div>
                  <?php dynamic_sidebar('footer_center_widget'); ?>
                </div>
              <?php endif; ?>
              <?php if(is_active_sidebar('footer_right_widget')):?>
                <div>
                  <?php dynamic_sidebar('footer_right_widget'); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; //END フッターウィジェット ?>
          <a href="<?php echo home_url(); ?>" class="tohomelink" aria-label="サイト名">
            <?php if(has_custom_logo()): ?>
              <img src="<?php echo $logoUrl ?>" alt="ロゴ" class="custom-logo fadeinimg lazyload">
            <?php endif; ?>
            <?php if ($onlyLogo == false) { bloginfo('name'); } ?>
          </a>
          <?php // フッターメニュー
            wp_nav_menu(array(
              'theme_location'  => 'nav_footer',
              'container'       => 'nav',
              'container_id'    => 'nav_footer',
              'container_class' => 'nav_footer',
              'fallback_cb'     => '',
            ));
          ?>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <span>© <?php echo date('Y'); ?></span><span> <?php echo bloginfo('name'); ?></span>
            <?php if ($credit == false) : ?>
              <a class="right" href="https://withdiv.com/12hitoe" target="_blank" rel="noopener noreferrer">
                👘CreatedBy十二単
              </a>
            <?php endif; ?>
          </div>
        </div>
      </footer>
      <?php // TOPへ戻るボタン ?>
      <?php if ($goToTop == true) : ?>
        <a href="#" class="btn-floating btn-large waves-effect gototop acc__color" aria-label="トップへ戻るボタン">
          <i class="fas fa-angle-up"></i>
        </a>
      <?php endif; //END TOPへ戻るボタン ?>
      <?php // SHAREボタン ?>
      <?php if ($shareBtn == true) : ?>
        <div class="fixed-action-btn">
        <a class="btn-floating btn-large sub__color" aria-label="シェアボタン">
          <i class="fas fa-share-alt"></i>
        </a>
        <ul>
          <li>
            <a class="btn-floating footer_share_tw" href="http://twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&amp;<?php echo urlencode(get_permalink()); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noreferrer" title="Twitterで共有" aria-label="Twitterで共有">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li>
            <a class="btn-floating footer_share_fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&t=<?php the_title() ?>" target="blank" rel="nofollow noopener noreferrer" aria-label="Facebookで共有">
              <i class="fab fa-facebook"></i>
            </a>
          </li>
          <li>
            <a class="btn-floating footer_share_hb" href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" rel="nofollow noopener noreferrer" data-hatena-bookmark-title="<?php the_permalink(); ?>" title="このエントリーをはてなブックマークに追加" aria-label="はてブで共有">
              B!
            </a>
          </li>
          <li>
            <a class="btn-floating footer_share_ln" href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noreferrer" title="Lineで共有" aria-label="LINEで共有">
              <i class="fab fa-line"></i>
            </a>
          </li>
        </ul>
      </div>
    <?php endif; //END SHAREボタン ?>
      <?php // オリジナルSPフッターメニュー ?>
      <?php if ($spfooter == true && wp_is_mobile()) : ?>
        <div class="navbar-fixed">
          <nav class="footer_sp_menu">
            <?php if($menuDesign == 'value1') : //オリジナルフッターメニューデザイン1 ?>
              <?php get_template_part('parts/footer/footer_sp_menu1') ?>
            <?php endif; //END $menuDesign == value1 ?>
            <?php if($menuDesign == 'value2') : //オリジナルフッターメニューデザイン2 ?>
            <ul>
              <?php if ($li1icon != null) : ?>
                <li>
                  <a href="<?php echo $li1uri ?>" class="waves-effect footer_sp_menu_li">
                    <?php echo $li1icon ?>
                    <span><?php echo $li1text ?></span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($li2icon != null) : ?>
                <li>
                  <a href="<?php echo $li2uri ?>" class="waves-effect footer_sp_menu_li">
                    <?php echo $li2icon ?>
                    <span><?php echo $li2text ?></span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($li3icon != null) : ?>
                <li>
                  <a href="<?php echo $li3uri ?>" class="waves-effect footer_sp_menu_li">
                    <?php echo $li3icon ?>
                    <span><?php echo $li3text ?></span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($li4icon != null) : ?>
                <li>
                  <a href="<?php echo $li4uri ?>" class="waves-effect footer_sp_menu_li">
                    <?php echo $li4icon ?>
                    <span><?php echo $li4text ?></span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($li5icon != null) : ?>
                <li>
                  <a href="<?php echo $li5uri ?>" class="waves-effect footer_sp_menu_li">
                    <?php echo $li5icon ?>
                    <span><?php echo $li5text ?></span>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          <?php endif; //END $menuDesign == value2  ?>
          </nav>
        </div>
      <?php endif; //END オリジナルSPフッターメニュー ?>
    </div>
    <?php get_template_part('parts/footer/link_js') ?>
    <?php wp_footer(); ?>
  </body>
</html>
