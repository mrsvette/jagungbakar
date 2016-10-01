(function($) {
	"use strict";
	/* ieViewportFix - fixes viewport problem in IE 10 SnapMode and IE Mobile 10 */
	function ieViewportFix() {
		var msViewportStyle = document.createElement("style");
		msViewportStyle.appendChild(
			document.createTextNode(
				"@-ms-viewport { width: device-width; }"
			)
		);
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
			msViewportStyle.appendChild(
				document.createTextNode(
					"@-ms-viewport { width: auto !important; }"
				)
			);
		}
		document.getElementsByTagName("head")[0].
				appendChild(msViewportStyle);
	}
/* exists - Check if an element exists */		
	function exists(e) {
		return $(e).length > 0;
	}
/* isTouchDevice - return true if it is a touch device */
	function isTouchDevice() {
		return !!('ontouchstart' in window) || ( !! ('onmsgesturechange' in window) && !! window.navigator.maxTouchPoints);
	}
/* handleBackToTop */
   function handleBackToTop() {
		$('#back-to-top').on("click", function(){
			$('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});
   }	
/* showHidebackToTop */	
	function showHidebackToTop() {
		if ($(window).scrollTop() > $(window).height() / 2 ) {
			$("#back-to-top").removeClass('gone').addClass('visible');
		} else {
			$("#back-to-top").removeClass('visible').addClass('gone');
		}
	}
/* handleStickyHeader */	 
	var stickyHeader = true;
	var stickypoint = 500;
	if ($('body').hasClass('sticky-header')){
		stickyHeader = true;
	}
	stickypoint = $(".navbar-default").outerHeight() + 15;
	function handleStickyHeader() {
		var b = document.documentElement,
        	e = false;
		function f() {
			window.addEventListener("scroll", function (h) {	
				if (!e) {
					e = true;
					setTimeout(d, 250);
				}
			}, false);
			window.addEventListener("load", function (h) {
				if (!e) {
					e = true;
					setTimeout(d, 250);
				}
			}, false);
		}
		function d() {
			var h = c();
			if (h >= stickypoint) {
				$('.navbar-default').addClass("navbar-fixed-top");
				$('.bg-header').addClass("bg-header-fixed-top");
			} else {
				$('.navbar-default').removeClass("navbar-fixed-top");
				$('.bg-header').removeClass("bg-header-fixed-top");
			}
			e = false;
		}
		function c() {
			return window.pageYOffset || b.scrollTop;
		}
		f();
	}	
/* When document is ready, do */
	$(document).ready(function() {			   
		handleBackToTop();
		showHidebackToTop();
		if(stickyHeader && ($(window).width() >= 360)){ 
			handleStickyHeader();
		}
	});
	$(function(){
		$('button.anchor').click(function(){
			var href = $(this).attr('href');
			if(href.length){
				window.location.href = href;
			}
		});
	});
})(jQuery);
