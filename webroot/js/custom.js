$(document).ready(function() {
	jQuery.ajaxSetup({
		cache: false,
		beforeSend :function(){
			jQuery("#busy-indicator").fadeIn();
		}
	});
	jQuery(document).ajaxComplete(function(){
		jQuery("#busy-indicator").fadeOut();
	});

	$('.helptext').tooltipster({
		 animation: 'fade',
	   delay: 200,
	   theme: 'tooltipster-punk',
	   trigger: 'click'
	});
});