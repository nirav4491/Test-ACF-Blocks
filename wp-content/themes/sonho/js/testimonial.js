(function($) {

	$(document).ready(function () {
	
		$('.testimonial_slider').slick({
			centerPadding: '30px',
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			arrows: false,
			dots: true,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					centerPadding: '0px',
					slidesToShow: 1,
					slidesToScroll: 1,
					adaptiveHeight: true
				  }
				}
			  ]
		});

		$('.arrow_btn.prev').click(function (e) {
			e.preventDefault();
			$('.testimonial_slider').slick('slickPrev');
		  })
		  
		  $('.arrow_btn.next').click(function (e) {
			e.preventDefault();
			$('.testimonial_slider').slick('slickNext');
		  })

	});
	
})(jQuery);
