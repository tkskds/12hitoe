<?php $d = get_option('site_widgets_design') ? get_option('site_widgets_design') : 'value1' ?>

<aside id="aside" class="aside col l3<?php if($d == 'value1'){echo' sideType1' ;}elseif($d == 'value2'){echo' sideType2';}elseif($d=='value3'){echo' sideType3';} ?>">
  <div class="aside__container">
    <?php if(is_active_sidebar('side_widget')) :?>
      <?php dynamic_sidebar('side_widget'); ?>
    <?php endif; ?>
    <?php if(is_active_sidebar('fixed_side_widget')) :?>
      <div class="fixed_side_widget_wrap">
         <?php dynamic_sidebar('fixed_side_widget'); ?>
      </div>
    <?php endif; ?>
  </div>
</aside>
