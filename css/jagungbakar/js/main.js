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
		var base = token.split('/main.js');
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
	/* Loading Script */
	$(window).load(function(){
		$('#loader').fadeOut("slow");
	});

	/* Flickr Carousel */
	$('#flickr_slider').jflickrfeed({
		limit: 14, // number of images to show
		qstrings: {
		    id: '13547802@N05' // id of flickr gallery (use idgettr.com to get flickr gallery id)
		},
		itemTemplate: '<a href="{{image_b}}" target="_blank"><img src="{{image}}" class="img-responsive" alt="" /></a>'
	}, function(data) {
		$('#dc_flickr_slider div').hide();

		var owl = $("#flickr_slider");
		owl.owlCarousel({
		    itemsCustom: [
		        [0, 1],
		        [480, 3],
		        [600, 3],
		        [700, 3],
		        [1000, 2],
		        [1200, 2],
		        [1201, 3],
		        [1400, 3],
		        [1600, 3]
		    ],
		    navigation: true,
		    pagination: false
		});

	});

	/* Responsive Menu */
	(function($) {

		$.fn.menumaker = function(options) {

		    var nav_menu = $(this),
		        settings = $.extend({
		            title: "Menu",
		            format: "dropdown",
		            sticky: false
		        }, options);

		    return this.each(function() {
		        nav_menu.prepend('<div id="menu-button">' + settings.title + '</div>');
		        $(this).find("#menu-button").on('click', function() {
		            $(this).toggleClass('menu-opened');
		            var mainmenu = $(this).next('ul');
		            if (mainmenu.hasClass('open')) {
		                mainmenu.hide().removeClass('open');
		            } else {
		                mainmenu.show().addClass('open');
		                if (settings.format === "dropdown") {
		                    mainmenu.find('ul').show();
		                }
		            }
		        });

		        nav_menu.find('li ul').parent().addClass('has-sub');

		        multiTg = function() {
		            nav_menu.find(".has-sub").prepend('<span class="submenu-button"></span>');
		            nav_menu.find('.submenu-button').on('click', function() {
		                $(this).toggleClass('submenu-opened');
		                if ($(this).siblings('ul').hasClass('open')) {
		                    $(this).siblings('ul').removeClass('open').hide();
		                } else {
		                    $(this).siblings('ul').addClass('open').show();
		                }
		            });
		        };

		        if (settings.format === 'multitoggle') multiTg();
		        else nav_menu.addClass('dropdown');

		        if (settings.sticky === true) nav_menu.css('position', 'fixed');

		        resizeFix = function() {
		            if ($(window).width() > 1050) {
		                nav_menu.find('ul').show();
		            }

		            if ($(window).width() <= 1050) {
		                nav_menu.find('ul').hide().removeClass('open');
		            }
		        };
		        resizeFix();
		        return $(window).on('resize', resizeFix);

		    });
		};

		$("#nav_menu").menumaker({
		    title: "Menu",
		    format: "multitoggle"
		});
	})(jQuery);

	$(document).ready(function() {
		$("#tweetfeed").owlCarousel({
		    autoPlay: 3000,
		    stopOnHover: true,
		    navigation: true,
		    pagination: false,
		    goToFirstSpeed: 2000,
		    singleItem: true,
		    autoHeight: true,
		    transitionStyle: "fade"
		});

		$('#tabs li a').click(function(e) {
		    $('#tabs li, #content, .current').removeClass('current');
		    $('#content p').removeClass('fadeInLeft animated');
		    $(this).parent().addClass('current');
		    var currentTab = $(this).attr('href');
		    $(currentTab).addClass('current');
		    $('#content p').addClass('fadeInLeft animated');
		    e.preventDefault();
		});

		$("html").niceScroll();

		$('#toggle-view li').click(function() {
		    var text = $(this).children('div.panel');
		    if (text.is(':hidden')) {
		        text.slideDown('200');
		        $(this).children('span').addClass('minus-ico');
		        $(this).children('span').removeClass('plus-ico');
		    } else {
		        text.slideUp('200');
		        $(this).children('span').addClass('plus-ico');
		        $(this).children('span').removeClass('minus-ico');
		    }
		});

	});

	/* Animation */
	$('[data-animated]').each(function() {
		$(this).addClass('animated-out');
	});

	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		var height = $(window).height();
		$('.animated-out[data-animated]').each(function() {
		    var $this = $(this);
		    if (scroll + height >= $this.offset().top) {
		        var delay = parseInt($this.attr('data-animated'));
		        if (isNaN(delay) || 0 === delay) {
		            $this.removeClass('animated-out').addClass('animated-in');
		        } else {
		            setTimeout(function() {
		                $this.removeClass('animated-out').addClass('animated-in');
		            }, delay);
		        }
		    }
		});
	});
} /** end of init function */
