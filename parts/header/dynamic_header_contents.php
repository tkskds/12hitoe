<?php
    $dyheaderBkImg    = get_option('site_dyheader_bkimg');
    $dyheaderBkImgFil = get_option('site_dyheader_bkimg_filter')   ? get_option('site_dyheader_bkimg_filter')   : 'value1' ;
    $txt              = get_option('site_dyheader_text')           ? get_option('site_dyheader_text')           : "Let's enjoy self-expression!";
    $txtAnime         = get_option('site_dyheader_text_animation') ? get_option('site_dyheader_text_animation') : 'value0' ;
    $btn              = get_option('site_dyheader_button');
    $btnLink          = get_option('site_dyheader_button_link');
    $btn2             = get_option('site_dyheader_button2');
    $btn2Link         = get_option('site_dyheader_button2_link');
    $img              = get_option('site_dyheader_img');
?>


<div id="dynamicHeader" class="dyheader
<?php if($dyheaderBkImg != null) :
        switch ($dyheaderBkImgFil) :
          case 'value2': echo' dyheaderBkImgFil1' ; break ;
          case 'value3': echo' dyheaderBkImgFil2' ; break ;
          case 'value4': echo' dyheaderBkImgFil3' ; break ;
          case 'value5': echo' dyheaderBkImgFil4' ; break ;
          case 'value6': echo' dyheaderBkImgFil5' ; break ;
          case 'value7': echo' dyheaderBkImgFil6' ; break ;
        endswitch;
      endif;
?>">

  <div class="dyheader_container">
      <div class="dyheader_textArea">
        <p
        <?php
        switch ($txtAnime) :
          case 'value1': echo ' class="dyHeaderTextMotion1"' ; break ;
          case 'value2': echo ' class="dyHeaderTextMotion2"' ; break ;
          case 'value3': echo ' class="dyHeaderTextMotion3"' ; break ;
          case 'value4': echo ' class="dyHeaderTextMotion4"' ; break ;
        endswitch;
        ?>><?php echo $txt ?></p>
        <?php if ($btn != null ): ?>
          <a href="<?php echo $btnLink ?>" class="waves-effect btn-large"><?php echo $btn ?></a>
        <?php endif; ?>
        <?php if ($btn2 != null ): ?>
          <a href="<?php echo $btn2Link ?>" class="waves-effect btn-large"><?php echo $btn2 ?></a>
        <?php endif; ?>
      </div>
      <?php if ($img != null) : ?>
        <div class="dyheader_imgArea">
          <img src="<?php echo $img; ?>" alt="ヘッダー画像" class="lazyload">
        </div>
      <?php endif; ?>
  </div>
</div>
