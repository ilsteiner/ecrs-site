jQuery(document).ready(function() {
	jQuery(".c-calculation-singleline:first-of-type").prepend("<div class=\"clock\"></div>");

	var clock = $('.clock').FlipClock(5619571, {
			clockFace: 'DailyCounter',
			countdown: true
	});
});