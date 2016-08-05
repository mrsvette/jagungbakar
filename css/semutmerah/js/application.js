if (window.addEventListener){ // W3C standard
	window.addEventListener('loadJquery', initFunction, false);
	window.addEventListener('load', initFunction, false); // NB **not** 'onload'
}else if (window.attachEvent){ // Microsoft
	window.attachEvent('loadJquery', initFunction);
	window.attachEvent('onload', initFunction);
}
function loadJquery(){
	if(typeof jQuery=='undefined'){
		var token = document.querySelector('script[id="app-js"]').getAttribute('src');
		var base = token.split('/application.js');
		(function(){
			var scr = document.createElement("script");
			scr.type = "text/javascript";
			scr.src = base[0]+'/jquery-1.11.1.min.js';
			//scr.setAttribute('async', 'true');
			((document.getElementsByTagName('head') || [null])[0] || document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
		}());
	}
}
function initFunction(){
(function($) {
 	"use strict"
	// Back to top
 	jQuery(window).scroll(function(){
	if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({bottom:"25px"});
		} else {
			jQuery('.dmtop').css({bottom:"-100px"});
		}
	});
	jQuery('.dmtop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	// DM Menu
	jQuery('.navbar').affix({
		offset: { top: $('.navbar').offset().top }
	});
	// Menu drop down effect
	$('.dropdown-toggle').dropdownHover().dropdown();
		$(document).on('click', '.fhmm .dropdown-menu', function(e) {
		  e.stopPropagation()
	})
	// Search
	var $ctsearch = $( '#dmsearch' ),
		$ctsearchinput = $ctsearch.find('input.dmsearch-input'),
		$body = $('html,body'),
		openSearch = function() {
			$ctsearch.data('open',true).addClass('dmsearch-open');
			$ctsearchinput.focus();
			return false;
		},
		closeSearch = function() {
			$ctsearch.data('open',false).removeClass('dmsearch-open');
		};

	$ctsearchinput.on('click',function(e) { e.stopPropagation(); $ctsearch.data('open',true); });

	$ctsearch.on('click',function(e) {
		e.stopPropagation();
		if( !$ctsearch.data('open') ) {

			openSearch();

			$body.off( 'click' ).on( 'click', function(e) {
				closeSearch();
			} );

		}
		else {
			if( $ctsearchinput.val() === '' ) {
				closeSearch();
				return false;
			}
		}
	});
 })(jQuery);
}
