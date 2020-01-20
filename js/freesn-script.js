jQuery(document).ready(function($) {

  $('a.vec').on('click', function(e) {
    e.preventDefault();
    $('.calendar-workshop-more').css('display', 'none');
    $target = $(this).data('target');
    var class_target = '.' + $target;
    $(class_target).slideToggle(700);
  });

  $('.menu-mob').click(function() {
    $('.menu-freesn-container').toggleClass('open');
  });

  $('.slider-partnerji').slick({
    slidesToShow: 4,
    dots: true,
    arrows: false,
    autoplay: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });

})
