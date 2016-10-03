$('#right-menu').on('click', function() {
  $('.side-layout').addClass('active');
  $('.side-container').addClass('bounceInLeft');
  $('.side-container').removeClass('bounceOutLeft');
});
$('.side-layout').on('click', function() {
  setTimeout(() => $('.side-layout').removeClass('active'), 800);
  $('.side-container').removeClass('bounceInLeft');
  $('.side-container').addClass('bounceOutLeft');
});
