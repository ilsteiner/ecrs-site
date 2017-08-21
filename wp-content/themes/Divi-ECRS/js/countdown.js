jQuery(document).ready(function($) {
	var softCutoff = jQuery("div.c-calculation-date[data-field='SoftCutoff'] .c-content").text();
	jQuery(".c-calculation-singleline:first-of-type .c-content").append("<div>"
	  + countdown(new Date(softCutoff)).toString()
	  + "</div>");
});