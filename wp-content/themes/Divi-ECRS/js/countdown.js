jQuery(document).ready(function($) {
	var softCutoff = jQuery("div.c-calculation-date[data-field='SoftCutoff'] .c-content").text();
	
	var counter = countdown(null,new Date(softCutoff),null,3);
	
	jQuery(".c-calculation-singleline:first-of-type .c-content").append("<div>"
	  + counter.toString()
	  + "</div>");
});