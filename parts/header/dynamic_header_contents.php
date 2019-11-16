<?php
    $txt = get_option('site_dyheader_text');
    $txtAnime = get_option('site_dyheader_text_animation');
    $btn = get_option('site_dyheader_button');
    $btnLink = get_option('site_dyheader_button_link');
    $btn2 = get_option('site_dyheader_button2');
    $btn2Link = get_option('site_dyheader_button2_link');
?>

<div id="dynamicHeader" class="dyheader">
  <div class="dyheader_container">
      <div>
        <p class="<?php
         if ($txtAnime == 'value2'){
          echo 'animation1';
        }elseif($txtAnime == 'value3'){
          echo 'animation2';
        }elseif($txtAnime == 'value4'){
          echo 'animation3';
        }elseif($txtAnime == 'value5'){
          echo 'animation4';
        }
        ?>"><?php echo $txt ?></p>
        <?php if ($btn != null ): ?>
          <a href="<?php echo $btnLink ?>"><?php echo $btn ?></a>
        <?php endif; ?>
        <?php if ($btn2 != null ): ?>
          <a href="<?php echo $btn2Link ?>"><?php echo $btn2 ?></a>
        <?php endif; ?>
      </div>
  </div>
</div>
