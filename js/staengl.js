// custom JS for staengl site
$(function($) {

});

$('.hero-slideshow').bxSlider({
  // adaptiveHeight: true,
  mode: 'fade',
  captions: true,
  controls: false,
  pagerCustom: '#hero-pager'
});

$('.project-slideshow').bxSlider({
  adaptiveHeight: true,
  mode: 'fade',
  pager: false
});

$('.projects-filmstrip').bxSlider({
  minSlides: 3,
  maxSlides: 22,
  slideWidth: 99,
  slideMargin: 0,
  pager: false
});
