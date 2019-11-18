<?php
  $title = get_option('site_feature_section_ttl');
  $description = get_option('site_feature_section_description');
  $fadein = get_option('site_feature_section_animation');
  $item1Icn = get_option('site_feature_section_item1_icon');
  $item1Ttl = get_option('site_feature_section_item1_ttl');
  $item1Dsc = get_option('site_feature_section_item1_description');
  $item2Icn = get_option('site_feature_section_item2_icon');
  $item2Ttl = get_option('site_feature_section_item2_ttl');
  $item2Dsc = get_option('site_feature_section_item2_description');
  $item3Icn = get_option('site_feature_section_item3_icon');
  $item3Ttl = get_option('site_feature_section_item3_ttl');
  $item3Dsc = get_option('site_feature_section_item3_description');

?>


<section class="features">
  <h2 <?php if ($fadein == true){echo 'class="fadein"';} ?>>
    <?php echo $title ?>
  </h2>
  <p><?php echo $description ?></p>
  <div class="f_items">
    <div class="f_item<?php if ($fadein == true){echo ' fadein';} ?>">
      <?php if($item1Icn != null){ echo $item1Icn; } ?>
      <?php if($item1Ttl != null){ echo "<h3>${item1Ttl}</h3>"; } ?>
      <?php if($item1Dsc != null){ echo "<p>${item1Dsc}</p>"; } ?>
    </div>
    <?php if($item2Ttl != null): ?>
      <div class="f_item<?php if ($fadein == true){echo ' fadein';} ?>">
        <?php if($item2Icn != null){ echo $item2Icn; } ?>
        <?php if($item2Ttl != null){ echo "<h3>${item2Ttl}</h3>"; } ?>
        <?php if($item2Dsc != null){ echo "<p>${item2Dsc}</p>"; } ?>
      </div>
    <?php endif; ?>
    <?php if($item3Ttl != null): ?>
      <div class="f_item<?php if ($fadein == true){echo ' fadein';} ?>">
        <?php if($item3Icn != null){ echo $item3Icn; } ?>
        <?php if($item3Ttl != null){ echo "<h3>${item3Ttl}</h3>"; } ?>
        <?php if($item3Dsc != null){ echo "<p>${item3Dsc}</p>"; } ?>
      </div>
    <?php endif; ?>
  </div>
</section>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/lib/js/fadein.js"></script>
