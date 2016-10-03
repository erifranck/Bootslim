$('#right-menu').on('click', function() {
  $('.side-layout').addClass('active');
  $('.side-container').addClass('slideInLeft');
  $('.side-container').removeClass('slideOutLeft');
});
$('.side-layout').on('click', function() {
  setTimeout(() => $('.side-layout').removeClass('active'), 800);
  $('.side-container').removeClass('slideInLeft');
  $('.side-container').addClass('slideOutLeft');
});
