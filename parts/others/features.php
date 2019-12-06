<?php
  $anmHook      = ' data-delighter="start:0.95"';
  $sec1anime    = get_option('site_feature_section_animation')          ? get_option('site_feature_section_animation')  : 'value0' ;
  $title        = get_option('site_feature_section_ttl');
  $description  = get_option('site_feature_section_description');
  $item1Icn     = get_option('site_feature_section_item1_icon')         ? get_option('site_feature_section_item1_icon') : '<i class="fas fa-shield-alt"></i>';
  $item1Ttl     = get_option('site_feature_section_item1_ttl');
  $item1Dsc     = get_option('site_feature_section_item1_description');
  $item2Icn     = get_option('site_feature_section_item2_icon')         ? get_option('site_feature_section_item2_icon') : '<i class="fas fa-heartbeat"></i>';
  $item2Ttl     = get_option('site_feature_section_item2_ttl');
  $item2Dsc     = get_option('site_feature_section_item2_description');
  $item3Icn     = get_option('site_feature_section_item3_icon')         ? get_option('site_feature_section_item3_icon') : '<i class="fas fa-coins"></i>';
  $item3Ttl     = get_option('site_feature_section_item3_ttl');
  $item3Dsc     = get_option('site_feature_section_item3_description');
  $sec2anime    = get_option('site_feature_section2_animation')         ? get_option('site_feature_section2_animation') : 'value0' ;
  $sec2ttl      = get_option('site_feature_section2_ttl');
  $sec2dsc      = get_option('site_feature_section2_description');
  $sec2bkImg    = get_option('site_feature_section2_bk_img');
  $sec2bkColor  = get_option('site_feature_section2_bk_color');
  $sec3anime    = get_option('site_feature_section3_animation')         ? get_option('site_feature_section3_animation') : 'value0' ;
  $sec3ttl      = get_option('site_feature_section3_ttl');
  $sec3dsc      = get_option('site_feature_section3_description');
  $sec3bkImg    = get_option('site_feature_section3_bk_img');
  $sec3bkColor  = get_option('site_feature_section3_bk_color');
  $sec4anime    = get_option('site_feature_section4_animation')         ? get_option('site_feature_section4_animation') : 'value0' ;
  $sec4q1       = get_option('site_feature_q1');
  $sec4a1       = get_option('site_feature_a1');
  $sec4q2       = get_option('site_feature_q2');
  $sec4a2       = get_option('site_feature_a2');
  $sec4q3       = get_option('site_feature_q3');
  $sec4a3       = get_option('site_feature_a3');
  $sec4q4       = get_option('site_feature_q4');
  $sec4a4       = get_option('site_feature_a4');
  $sec4q5       = get_option('site_feature_q5');
  $sec4a5       = get_option('site_feature_a5');
  $sec5anime    = get_option('site_feature_section5_animation')         ? get_option('site_feature_section5_animation') : 'value0' ;
  $sec5info     = get_option('site_feature_section5_info');
  $sec5map      = get_option('site_feature_section5_map');
  $sec6anime    = get_option('site_feature_section6_animation')         ? get_option('site_feature_section6_animation') : 'value0' ;
  $sec6dsc      = get_option('site_feature_section6_description');
  $sec6bkImg    = get_option('site_feature_section6_bk_img');
  $sec6bkColor  = get_option('site_feature_section6_bk_color');

  function addAnimeClass($e){
    switch ($e) :
      case 'value1' : echo 'class="d_anime1"' ; break ;
      case 'value2' : echo 'class="d_anime2"' ; break ;
      case 'value3' : echo 'class="d_anime3"' ; break ;
      case 'value4' : echo 'class="d_anime4"' ; break ;
      case 'value5' : echo 'class="d_anime5"' ; break ;
      case 'value6' : echo 'class="d_anime6"' ; break ;
      case 'value7' : echo 'class="d_anime7"' ; break ;
      case 'value8' : echo 'class="d_anime8"' ; break ;
    endswitch;
  }

?>

<div class="features">

  <section id="feature1"<?php addAnimeClass($sec1anime); ?>>
    <div class="container featureContainer">
      <div class="f_ttl"<?php if($sec1anime != 'value0') echo $anmHook ?>>
        <h2><?php echo $title ?></h2>
        <p><?php echo $description ?></p>
      </div>
      <?php if($item1Ttl != null || $item1Dsc != null): ?>
      <div class="f_items"<?php if($sec1anime != 'value0') echo $anmHook ?>>
        <div class="f_item">
          <?php if($item1Icn != null){ echo $item1Icn; } ?>
          <?php if($item1Ttl != null){ echo "<p>${item1Ttl}</p>"; } ?>
          <?php if($item1Dsc != null){ echo "<span>${item1Dsc}</span>"; } ?>
        </div>
        <?php if($item2Ttl != null || $item2Dsc != null): ?>
          <div class="f_item"<?php if($sec1anime != 'value0') echo $anmHook ?>>
            <?php if($item2Icn != null){ echo $item2Icn; } ?>
            <?php if($item2Ttl != null){ echo "<p>${item2Ttl}</p>"; } ?>
            <?php if($item2Dsc != null){ echo "<span>${item2Dsc}</span>"; } ?>
          </div>
        <?php endif; ?>
        <?php if($item3Ttl != null || $item3Dsc != null): ?>
          <div class="f_item"<?php if($sec1anime != 'value0') echo $anmHook ?>>
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
  <section id="feature2"<?php addAnimeClass($sec2anime); ?>>
    <div class="container featureContainer">
      <?php if($sec2ttl!=null): ?>
        <h2<?php if($sec2anime != 'value0') echo $anmHook ?>><?php echo $sec2ttl ?></h2>
      <?php endif; ?>
      <?php if($sec2dsc!=null): ?>
        <p<?php if($sec2anime != 'value0') echo $anmHook ?>><?php echo $sec2dsc ?></p>
      <?php endif; ?>
    </div>
  </section>
<?php endif; //END sec2 ?>

  <?php if($sec3ttl!=null || $sec3dsc!=null): ?>
  <section id="feature3"<?php addAnimeClass($sec3anime); ?>>
    <div class="container featureContainer">
      <?php if($sec3ttl!=null): ?>
        <h2<?php if($sec3anime != 'value0') echo $anmHook ?>><?php echo $sec3ttl ?></h2>
      <?php endif; //END sec3ttl ?>
      <?php if($sec3dsc!=null): ?>
        <p<?php if($sec3anime != 'value0') echo $anmHook ?>><?php echo $sec3dsc ?></p>
      <?php endif; //END sec3dec ?>
    </div>
  </section>
<?php endif; //END sec3 ?>

  <?php if($sec4q1 != null): ?>
    <section id="feature4"<?php addAnimeClass($sec4anime); ?>>
      <div class="container featureContainer">
        <h2>よくある質問</h2>
        <ul class="collapsible"<?php if($sec4anime != 'value0') echo $anmHook ?>>
            <li>
              <div class="collapsible-header">
                <i class="fas fa-question-circle"></i>
                <span><?php echo $sec4q1 ?></span>
              </div>
              <div class="collapsible-body">
                <span><?php echo $sec4a1 ?></span>
              </div>
            </li>
          <?php if($sec4q2 != null): ?>
            <li>
              <div class="collapsible-header">
                <i class="fas fa-question-circle"></i>
                <span><?php echo $sec4q2 ?></span>
              </div>
              <div class="collapsible-body">
                <span><?php echo $sec4a2 ?></span>
              </div>
            </li>
          <?php endif; //END Q2 ?>
          <?php if($sec4q3 != null): ?>
            <li>
              <div class="collapsible-header">
                <i class="fas fa-question-circle"></i>
                <span><?php echo $sec4q3 ?></span>
              </div>
              <div class="collapsible-body">
                <span><?php echo $sec4a3 ?></span>
              </div>
            </li>
          <?php endif; //END Q3 ?>
          <?php if($sec4q4 != null): ?>
            <li>
              <div class="collapsible-header">
                <i class="fas fa-question-circle"></i>
                <span><?php echo $sec4q4 ?></span>
              </div>
              <div class="collapsible-body">
                <span><?php echo $sec4a4 ?></span>
              </div>
            </li>
          <?php endif; //END Q4 ?>
          <?php if($sec4q5 != null): ?>
            <li>
              <div class="collapsible-header">
                <i class="fas fa-question-circle"></i>
                <span><?php echo $sec4q5 ?></span>
              </div>
              <div class="collapsible-body">
                <span><?php echo $sec4a5 ?></span>
              </div>
            </li>
          <?php endif; //END Q5 ?>
        </ul>
      </div>
    </section>
  <?php endif; //END sec4 ?>

  <?php if($sec5info != null || $sec5map != null): ?>
    <section id="feature5"<?php addAnimeClass($sec5anime); ?>>
      <div class="container featureContainer">
      <?php if($sec5info != null): ?>
        <div<?php if($sec5anime != 'value0') echo $anmHook ?>>
          <h2>INFO</h2>
          <?php echo $sec5info ?>
        </div>
      <?php endif; ?>
      <?php if($sec5map != null): ?>
        <div class="feature_map"<?php if($sec5anime != 'value0') echo $anmHook ?>>
        <h2>MAP</h2>
          <?php echo $sec5map ?>
        </div>
      <?php endif; ?>
      </div>
    </section>
  <?php endif; //END sec5 ?>

  <?php if($sec6dsc!=null): ?>
  <section id="feature6"<?php addAnimeClass($sec6anime); ?>>
    <div class="container featureContainer">
      <div<?php if($sec1anime != 'value4') echo $anmHook ?>>
        <?php echo $sec6dsc ?>
      </div>
    </div>
  </section>
<?php endif; //END sec6 ?>

</div>
