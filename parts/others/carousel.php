<?php

  $carouselType = get_option('site_carousel_on');
  $carItem1Imag = get_option('site_carousel_item1_img');
  $carItem1Link = get_option('site_carousel_item1_link');
  $carItem2Imag = get_option('site_carousel_item2_img');
  $carItem2Link = get_option('site_carousel_item2_link');
  $carItem3Imag = get_option('site_carousel_item3_img');
  $carItem3Link = get_option('site_carousel_item3_link');
  $carItem4Imag = get_option('site_carousel_item4_img');
  $carItem4Link = get_option('site_carousel_item4_link');
  $carItem5Imag = get_option('site_carousel_item5_img');
  $carItem5Link = get_option('site_carousel_item5_link');

?>

<div class="carousel<?php if($carouselType=='value3'){echo' carousel-slider';} ?>">

  <?php if($carItem1Imag!=null): ?>
    <a class="carousel-item" href="<?php echo $carItem1Link ?>">
      <img data-src="<?php echo $carItem1Imag ?>" class="lazyload">
    </a>
  <?php endif; ?>
  <?php if($carItem2Imag!=null): ?>
  <a class="carousel-item" href="<?php echo $carItem2Link ?>">
    <img data-src="<?php echo $carItem2Imag ?>" class="lazyload">
  </a>
  <?php endif; ?>
  <?php if($carItem3Imag!=null): ?>
  <a class="carousel-item" href="<?php echo $carItem3Link ?>">
    <img data-src="<?php echo $carItem3Imag ?>" class="lazyload">
  </a>
  <?php endif; ?>
  <?php if($carItem4Imag!=null): ?>
  <a class="carousel-item" href="<?php echo $carItem4Link ?>">
    <img data-src="<?php echo $carItem4Imag ?>" class="lazyload">
  </a>
  <?php endif; ?>
  <?php if($carItem5Imag!=null): ?>
  <a class="carousel-item" href="<?php echo $carItem5Link ?>">
    <img data-src="<?php echo $carItem5Imag ?>" class="lazyload">
  </a>
  <?php endif; ?>

</div>
