jQuery(window).load(function() {
   // Page Preloader
   jQuery('#status').fadeOut();
   jQuery('#preloader').delay(350).fadeOut(function(){
      jQuery('body').delay(350).css({'overflow':'visible'});
   });
});
$(function(){
	/*	Fixed Navigation
	/*----------------------------------------------------*/	
	$(window).scroll(function(){
		if ($(this).scrollTop() > 10) {
			$('.main-menu').parent().addClass('navbar-fixed-top');
			$('.main-menu').parent().removeClass('navbar-static-top');
			$('.logo-main').find('.normal').hide();
			$('.logo-main').find('.small').show();
			$('.header-top').addClass('header-top-static');
			$('.header-top-static').removeClass('header-top');
			//$('.logo-main-small').find('.img-responsive').show();
		} else {
			$('.main-menu').parent().addClass('navbar-static-top');
			$('.main-menu').parent().removeClass('navbar-fixed-top');
			$('.logo-main').find('.normal').show();
			$('.logo-main').find('.small').hide();
			$('.header-top-static').addClass('header-top');
			$('.header-top').removeClass('header-top-static');
			//$('.logo-main-small').find('.img-responsive').hide();
		}
	});
});
