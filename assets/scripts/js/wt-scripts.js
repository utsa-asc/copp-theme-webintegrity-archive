(function($){
$(document).ready(function() {
    var time = $("#getting-started").data('time');

    $("#getting-started").countdown(time, function(event) {
        var $this = $(this).html(event.strftime(''
            + '<div class="auto cell text-center time-span"><span>%D</span><br> day%!D</div> '
            + '<div class="auto cell text-center time-span"><span>%H</span><br> hour%!H</div> '
            + '<div class="auto cell text-center time-span"><span>%M</span><br> min</div> '
            + '<div class="auto cell text-center time-span"><span>%S</span><br> sec</div> '));
        });

        $('.responsive').not('.slick-initialized').slick({
          settings: "unslick",
          //slidesToShow: 2,
            responsive: [
              {
                breakpoint: 768,
                settings: "unslick",
              },
              {
                breakpoint: 639,
                settings: {
                  dots: true,
                  infinite: false,
                  speed: 1000,
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  autoplay: true,
                  autoplaySpeed: 4000
                }
              }
            ]
          });
});
})(jQuery);
