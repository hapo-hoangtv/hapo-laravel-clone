require('./bootstrap');
$(document).ready(function(){
    $('#header-button').click(function() {
        $('#icon').toggleClass('fa-times');
        $('#icon').toggleClass('fa-bars');
    });

    $('.feedback-detail').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      adaptiveHeight: false,
      autoplay: true,
      autoplaySpeed : 3000,
      pauseOnFocus: true,
      pauseOnHover: true,
      prevArrow: $('.next-left'),
      nextArrow: $('.next-right'),
    
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });
    

});

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})


