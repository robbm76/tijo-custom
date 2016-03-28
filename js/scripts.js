jQuery(document).ready(function($) {
//jquery-ui-accordion
	$(".gb-accordion").accordion( {
		collapsible: true,
		active: false,
		header: ".gb-accordion-trigger"
	});

	$( ".tabs" ).tabs();
})
