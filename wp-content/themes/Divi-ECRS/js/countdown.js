jQuery(document).ready(function($) {
	var softCutoff = jQuery("div.c-calculation-date[data-field='SoftCutoff'] .c-content").text();
	
  // Add DOM elements
	jQuery(".c-calculation-singleline:first-of-type .c-content").append("<div class='counter'</div>");
	jQuery(".c-calculation-singleline:last-of-type .c-content").append("<div class='counter'</div>");
	
	var counter =
  countdown(
  	function(ts) {
      jQuery('.counter').html(ts.toHTML());
    },
    new Date(softCutoff),
    countdown.DAYS |
    countdown.HOURS |
    countdown.MINUTES |
    countdown.SECONDS,4);
});