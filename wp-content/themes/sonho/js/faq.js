(function($) {

	$(document).ready(function () {
	
		$('.faq_box a').click(function (e) {
			e.preventDefault();

			if($(this).siblings('.faq_content').hasClass('active')) {
				$(this).removeClass('active');
				$(this).siblings('.faq_content').slideUp().removeClass('active');
			} else {
				$('.faq_box a').removeClass('active');
				$('.faq_content').slideUp().removeClass('active');
				$(this).addClass('active');
				$(this).siblings('.faq_content').addClass('active').slideDown();
			}

		})

	});
	
})(jQuery);
