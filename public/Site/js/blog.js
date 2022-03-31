var marginTop = 0;
var classNameBoxFixed = 'fa-fixed';
$(window).scroll(function() {
	var windowsize = $(window).width();
	if (windowsize > 991) {
		var hH    = $('.child-fixed').outerHeight(),
		wH    = $(window).height(),
		wS    = $(this).scrollTop(),
		hT    = $(`.${classNameBoxFixed}`).offset().top + 150,
		hBody = $('body').height();

    if (wS < hBody - 1600) {
			if (wS > hT){
				marginTop = wS - hT;
			} else {
				marginTop = 0;
			}
		}
	} else {
		marginTop = 0;
	}

	$('.child-fixed').css('margin-top', marginTop);
});
