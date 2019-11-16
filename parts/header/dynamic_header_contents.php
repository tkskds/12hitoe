<?php
    $txt = get_option('site_dyheader_text');
    $txtAnime = get_option('site_dyheader_text_animation');
    $btn = get_option('site_dyheader_button');
    $btnLink = get_option('site_dyheader_button_link');
    $btn2 = get_option('site_dyheader_button2');
    $btn2Link = get_option('site_dyheader_button2_link');
    $img = get_option('site_dyheader_img');
    $nothome = get_option('site_dyheader_notTop');
?>

<?php if ($nothome == false && !is_single() && is_home() || $nothome == false && !is_page() && is_front_page() ) : ?>
<?php if ($nothome == true && is_single() || $nothome == true && is_page() ) : ?>

<div id="dynamicHeader" class="dyheader">
  <div class="dyheader_container">
      <div class="dyheader_textArea">
        <p<?php
         if ($txtAnime == 'value2'){
          echo 'class="animation1"';
        }elseif($txtAnime == 'value3'){
          echo 'class="animation2"';
        }elseif($txtAnime == 'value4'){
          echo 'class="animation3"';
        }elseif($txtAnime == 'value5'){
          echo 'class="animation4"';
        }
        ?>><?php echo $txt ?></p>
        <?php if ($btn != null ): ?>
          <a href="<?php echo $btnLink ?>" class="waves-effect waves-light btn"><?php echo $btn ?></a>
        <?php endif; ?>
        <?php if ($btn2 != null ): ?>
          <a href="<?php echo $btn2Link ?>" class="waves-effect waves-light btn"><?php echo $btn2 ?></a>
        <?php endif; ?>
      </div>
      <?php if ($img != null) : ?>
        <div class="dyheader_imgArea">
          <img src="<?php echo $img; ?>" alt="ヘッダー画像">
        </div>
      <?php endif; ?>
  </div>
</div>

<?php endif; ?>
<?php endif; ?>
