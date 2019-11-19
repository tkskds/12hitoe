<?php
  $title = get_option('site_feature_section_ttl');
  $description = get_option('site_feature_section_description');
  $fadein = get_option('site_feature_section_animation');
  $item1Icn = get_option('site_feature_section_item1_icon') ? get_option('site_feature_section_item1_icon') : '<i class="fas fa-shield-alt"></i>';
  $item1Ttl = get_option('site_feature_section_item1_ttl');
  $item1Dsc = get_option('site_feature_section_item1_description');
  $item2Icn = get_option('site_feature_section_item2_icon') ? get_option('site_feature_section_item2_icon') : '<i class="fas fa-heartbeat"></i>';
  $item2Ttl = get_option('site_feature_section_item2_ttl');
  $item2Dsc = get_option('site_feature_section_item2_description');
  $item3Icn = get_option('site_feature_section_item3_icon') ? get_option('site_feature_section_item3_icon') : '<i class="fas fa-coins"></i>';
  $item3Ttl = get_option('site_feature_section_item3_ttl');
  $item3Dsc = get_option('site_feature_section_item3_description');
  $sec2ttl = get_option('site_feature_section2_ttl');
  $sec2dsc = get_option('site_feature_section2_description');
  $sec2bkImg = get_option('site_feature_section2_bk_img');
  $sec2bkColor = get_option('site_feature_section2_bk_color');
  $sec3ttl = get_option('site_feature_section3_ttl');
  $sec3dsc = get_option('site_feature_section3_description');
  $sec3bkImg = get_option('site_feature_section3_bk_img');
  $sec3bkColor = get_option('site_feature_section3_bk_color');

?>

<div class="features">

  <section class="feature1">
    <div class="container">
      <div class="f_ttl <?php if ($fadein == true){echo 'fadein';}?>">
        <h2><?php echo $title ?></h2>
        <p><?php echo $description ?></p>
      </div>
      <?php if($item1Ttl != null || $item1Dsc != null): ?>
      <div class="f_items">
        <div class="f_item<?php if ($fadein == true){echo ' fadein';} ?>">
          <?php if($item1Icn != null){ echo $item1Icn; } ?>
          <?php if($item1Ttl != null){ echo "<p>${item1Ttl}</p>"; } ?>
          <?php if($item1Dsc != null){ echo "<span>${item1Dsc}</span>"; } ?>
        </div>
        <?php if($item2Ttl != null || $item2Dsc != null): ?>
          <div class="f_item<?php if ($fadein == true){echo ' fadein';} ?>">
            <?php if($item2Icn != null){ echo $item2Icn; } ?>
            <?php if($item2Ttl != null){ echo "<p>${item2Ttl}</p>"; } ?>
            <?php if($item2Dsc != null){ echo "<span>${item2Dsc}</span>"; } ?>
          </div>
        <?php endif; ?>
        <?php if($item3Ttl != null || $item3Dsc != null): ?>
          <div class="f_item<?php if ($fadein == true){echo ' fadein';} ?>">
            <?php if($item3Icn != null){ echo $item3Icn; } ?>
            <?php if($item3Ttl != null){ echo "<p>${item3Ttl}</p>"; } ?>
            <?php if($item3Dsc != null){ echo "<span>${item3Dsc}</span>"; } ?>
          </div>
        <?php endif; ?>
      </div><?php // .f_items ?>
    <?php endif; //END アイテム1の有無 ?>
  </div><?php // .container ?>
  </section>

  <?php if($sec2ttl!=null || $sec2dsc!=null): ?>
  <section class="feature2">
    <div class="container">
      <?php if($sec2ttl!=null): ?>
        <h2<?php if ($fadein == true){echo ' class="fadein"';} ?>><?php echo $sec2ttl ?></h2>
      <?php endif; ?>
      <?php if($sec2dsc!=null): ?>
        <p<?php if ($fadein == true){echo ' class="fadein"';} ?>><?php echo $sec2dsc ?></p>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if($sec3ttl!=null || $sec3dsc!=null): ?>
  <section class="feature3">
    <div class="container">
      <?php if($sec3ttl!=null): ?>
        <h2<?php if ($fadein == true){echo ' class="fadein"';} ?>><?php echo $sec3ttl ?></h2>
      <?php endif; ?>
      <?php if($sec3dsc!=null): ?>
        <p<?php if ($fadein == true){echo ' class="fadein"';} ?>><?php echo $sec3dsc ?></p>
      <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/fadein.js"></script>
