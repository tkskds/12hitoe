// materializeJS
document.addEventListener('DOMContentLoaded', function() {
  var sideNav            = document.querySelectorAll('.sidenav');
  var fixedBtn           = document.querySelectorAll('.fixed-action-btn');
  var modal              = document.querySelectorAll('.modal');
  var collapsible        = document.querySelectorAll('.collapsible');
  var carousel           = document.querySelectorAll('.carousel');
  var carousel2          = document.querySelectorAll('.carousel-slider');
  var instancesNav       = M.Sidenav.init(sideNav);
  var instancesFixedBtn  = M.FloatingActionButton.init(fixedBtn);
  var instancesModal     = M.Modal.init(modal);
  var instancesCollaps   = M.Collapsible.init(collapsible);
  var instancesCarousel  = M.Carousel.init(carousel);
  var instancesCarousel2 = M.Carousel.init(carousel2,{fullWidth:true});

});
