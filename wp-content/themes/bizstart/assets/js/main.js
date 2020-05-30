/*
 * Title:   BIZSTART | Multipurpose HTML Template
 * Author: BizStart
 */
/*
[Start contents]
1 preloader js
2 scroll to top js
3 wow js
4 top slider
5 toggle search
6 Isotop And Masonry Active
7 client-slider
8 deal-slider
9 circular progress bar
10 number counter
11 project-slider
[End  contents]
*/
(function ($) {
	"use strict";

	var $main_window = $(window);
	/*====================================
	preloader js
	======================================*/
	$main_window.on('load',function(){
		$('#preloader').fadeOut('slow');
	});
	/*====================================
	scroll to top js
	======================================*/
	$main_window.on('scroll', function () {
		if ($(this).scrollTop() > 250) {
			$('#myBtn').fadeIn(200);
		} else {
			$('#myBtn').fadeOut(200);
		}
	});
	$("#myBtn").on("click", function () {
		$("html, body").animate({
			scrollTop: 0
		}, "slow");
		return false;
	});
	/*====================================
         Sticky js
     ======================================*/
	 var nav = $('.navbar');
	 var scrolled = false;
	$main_window.on('scroll', function () {
		 if (200 < $main_window.scrollTop() && !scrolled) {
			 nav.addClass('sticky_menu animated fadeInDown').animate({
				 'margin-top': '0px'
			 });
			 scrolled = true;
		 }
		 if (200 > $main_window.scrollTop() && scrolled) {
			 nav.removeClass('sticky_menu animated fadeInDown').css('margin-top', '0px');
			 scrolled = false;
		 }
	 });
 
	/*====================================
	wow js
	======================================*/
	new WOW().init();

	/*====================================
	top slider
	======================================*/
	var mainslider = $('#slider');
	mainslider.owlCarousel({
		loop: true,
		margin: 0,
		items: 1,
		nav: true, // Show next and prev buttons
		lazyLoad: false,
		stopOnHover: false,
		transitionStyle: "fade",
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		slideSpeed: 2000,
		autoplay: 500,
		responsiveClass: true,
		responsive: {
			0: {
				dots: false,
				nav: false,
			},
			992: {
				dots: true,
				nav: true,
			}
		},
	});
	// add animate.css class(es) to the elements to be animated
	function setAnimation(_elem, _InOut) {
		// Store all animationend event name in a string.
		// cf animate.css documentation
		var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		_elem.each(function () {
			var $elem = $(this);
			var $animationType = 'animated ' + $elem.data('animation-' + _InOut);
			$elem.addClass($animationType).one(animationEndEvent, function () {
				$elem.removeClass($animationType); // remove animate.css Class at the end of the animations
			});
		});
	}
	// Fired before current slide change
	mainslider.on('change.owl.carousel', function (event) {
		var $currentItem = $('.owl-item', mainslider).eq(event.item.index);
		var $elemsToanim = $currentItem.find("[data-animation-out]");
		setAnimation($elemsToanim, 'out');
	});
	// Fired after current slide has been changed
	mainslider.on('changed.owl.carousel', function (event) {
		var $currentItem = $('.owl-item', mainslider).eq(event.item.index);
		var $elemsToanim = $currentItem.find("[data-animation-in]");
		setAnimation($elemsToanim, 'in');
	});
	
	
})(jQuery);