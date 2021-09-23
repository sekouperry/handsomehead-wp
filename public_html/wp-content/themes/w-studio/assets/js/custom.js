(function($){
  "use strict";

	$('.side.wl-main-nav ul li > a').on('click', function(){
		$(this).addClass('active');
	});

	/*jQuery MeanMenu
	--------------------- */
	jQuery('header nav').meanmenu();
	jQuery('.wl-menu-lower nav').meanmenu();
        
        $( "#main-menu li" ).click(function ( event ) {
		$(this).find( 'ul li.wl-mega-menu-none ul').css( "display", "block" );
	});

    //burger menu
    jQuery('body').on('click', '.menu-item-has-children i', function() {
		if(jQuery(this).next('ul.burger-sub').hasClass('active')) {
			jQuery(this).next('ul.burger-sub').removeClass('active');
			jQuery(this).next('ul.burger-sub').slideUp(400);
			jQuery(this).removeClass('icon-up arrow_carrot-up').addClass('icon-down arrow_carrot-down');
		} else {
			jQuery(this).next('ul.burger-sub').addClass('active');
			jQuery(this).next('ul.burger-sub').slideDown(400);
			jQuery(this).removeClass('icon-down arrow_carrot-down').addClass('icon-up arrow_carrot-up');
		}	
	});
	jQuery(document).ready(function() {
		if (jQuery('.menu-item').hasClass('wl-mega-menu-none')) {
			jQuery('.wl-mega-menu-none').children('span.mega-menu-heading').hide();
			jQuery('.wl-mega-menu-none').children('i').hide();
			jQuery('.wl-mega-menu-none').children('ul.burger-sub').show();
		}
	});
	
	/* sticky manu header top
	----------------------*/
	var topOffset;
	if($('body').find('#main-menu').length > 0 ) {
		var topOffset = $("#main-menu").offset();
	} else {
		topOffset = 0;
	}
	$("#main-menu").addClass( 'menu-bg' );
	var top2 = $(window).innerHeight();
	var cond = false;
	$(window).on("scroll",function() {
		if($(window).innerWidth() > 991) {
			if($("#main-menu").hasClass("wl-bg-colored")) {
				if($(window).scrollTop() > (topOffset.top+100)) {
					$("#main-menu").addClass("navbar-fixed-top fadeInDown");
					$("#main-menu").removeClass( 'menu-bg' );
				} else {
					$("#main-menu").removeClass("navbar-fixed-top fadeInDown");
					$("#main-menu").addClass( 'menu-bg' );
					if(cond) {
						$("#main-menu").removeClass("wl-bg-colored");
					}
				}

			} 
			else if($("#main-menu").hasClass("wl-menu-lower")) {
				if($(window).scrollTop() > (topOffset.top+100)) {
					$("#main-menu").addClass("navbar-fixed-top fadeInDown");
				} else {
					$("#main-menu").removeClass("navbar-fixed-top fadeInDown");
					if(cond) {
						$("#main-menu").removeClass("wl-bg-colored");
					}
				}
			}
			else {
				cond = true;
				if($(window).scrollTop() > (topOffset.top+100)) {
					$("#main-menu").addClass("navbar-fixed-top fadeInDown wl-bg-colored");					
				} else {
					$("#main-menu").removeClass("navbar-fixed-top fadeInDown");
				}
			}
		}	
	});

	/* Feature carousel
	--------------------- */
	$("#feature-owl").owlCarousel({
		loop: true,
		items: 1,
		itemsDesktop : [1092,1],
	    itemsDesktopSmall : [980,1],
	    itemsTablet: [768,1],
	    itemsTabletSmall: false,
	    itemsMobile : [479,1],
	});
	$(".wl-feature-navigation .feature-next").on("click",function(){
		$("#feature-owl").trigger("owl.next");
	});
	$(".wl-feature-navigation .feature-prev").on("click",function(){
		$("#feature-owl").trigger("owl.prev");
	});	

	/* clinets carousel
	--------------------- */
	var sync1 = $(".text-owl");
	var sync2 = $(".img-owl");
	$(".text-owl").owlCarousel({
		loop: true,
		items: 1,
		itemsDesktop : [1092,1],
		itemsDesktopSmall : [768,1],
		itemsTablet: [768,1],
		slideSpeed : 1000,
		stopOnHover : true,
		pagination:false,
		navigation: true,
		afterAction : syncPosition,
		navigationText: ['<span data-icon=&#x34;></span>','<span data-icon=&#x35;></span>']
	});
		
	$(".img-owl").owlCarousel({
		items: 1,
		itemsDesktop : [1092,1],
		itemsDesktopSmall : [768,1],
		itemsTablet: [768,1],
		pagination:false,
		mouseDrag: false,
		slideSpeed : 1000,
		afterInit : function(el){
	    	el.find(".owl-item").eq(0).addClass("synced");
	    }
	});

	function syncPosition(el){
		var current = this.currentItem;
			$(".img-owl")
			.find(".owl-item")
			.removeClass("synced")
			.eq(current)
			.addClass("synced")
			if($(".img-owl").data("owlCarousel") !== undefined){
			center(current)
		}
	}
 
	$(".img-owl").on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo",number);
	});
    function center(number){
	    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	    var num = number;
	    var found = false;
	    for(var i in sync2visible){
	      if(num === sync2visible[i]){
	        var found = true;
	      }
	    }
	 
	    if(found===false){
	      if(num>sync2visible[sync2visible.length-1]){
	        sync2.trigger("owl.goTo", num - sync2visible.length+1)
	      }else{
	        if(num - 1 === -1){
	          num = 0;
	        }
	        sync2.trigger("owl.goTo", num);
	      }
	    } else if(num === sync2visible[sync2visible.length-1]){
	      sync2.trigger("owl.goTo", sync2visible[1])
	    } else if(num === sync2visible[0]){
	      sync2.trigger("owl.goTo", num-1)
	    }
	}

	// Icon rotate
	$(".panel-group .panel .panel-heading .panel-title a").on("click", function() {
		if(!$(this).children("span").children("i").hasClass("icon-rotate")) {
			$(this).children("span").children("i").addClass("icon-rotate");
			$(this).parent().parent().parent().siblings(".panel").children().children().children("a").children().children("i").removeClass("icon-rotate");
		} else {
			$(this).children("span").children("i").removeClass("icon-rotate");
		}
	})

	// Icon rotate
	$(".panel-group .panel .panel-heading .panel-title a span").on("click", function() {
		if(!$(this).children("span").children("i").hasClass("icon-rotate")) {
			$(this).children("span").children("i").addClass("icon-rotate");
		} else {
			$(this).children("span").children("i").removeClass("icon-rotate");
		}
	})
	
	/*jquery countTo
	--------------------- */
	jQuery(".count").appear(function(){
		jQuery('.count').each(function(){
			var count = $(this).attr('data-to');
			jQuery(this).find('.count-number').delay(6000).countTo({
				from: 50,
				to: count,
				speed: 3000,
				refreshInterval: 50,  
			});  
		});
	});

	/*Scroll to top
	--------------------- */
        $(".scroll-top").removeClass("scroll-top-active");
	$(window).on("scroll",function() {
		if($(this).scrollTop() >= $(window).innerHeight()) {
			$(".scroll-top").addClass("scroll-top-active");
		} else {
			$(".scroll-top").removeClass("scroll-top-active");
		}
	});
	$(".scroll-top span").on("click",function(){
    	$('html, body').animate({scrollTop : 0},1200);
    return false;
   });

	/*jQuery parallax
	--------------------*/
	var windowSize = $(window).width();
	if(windowSize < 992){
		$(".wl-paralax").parallax("50%",0.0);
		$(".wl-paralax-2").parallax("50%",0.00);
		$(".wl-paralax-3").parallax("50%",0.00);
		$(".wl-paralax-4").parallax("50%",0.00);
    }
    else{
    	$(".wl-paralax").parallax("50%",0.2);
		$(".wl-paralax-2").parallax("50%",0.2);
		$(".wl-paralax-3").parallax("50%",0.2);
		$(".wl-paralax-4").parallax("50%",0.1);
    }

	/* Befor sibling hover
	----------------------*/
	$(".hover-sibling-1").hover(function() {
	  $(this).siblings(".hover-sibling-2").addClass("wl-hover-sibling");
	 }, function() {
	  $(this).siblings(".hover-sibling-2").removeClass("wl-hover-sibling");
	 })
	$(".wl-bottom-title").hover(function() {
	  $(this).closest(".hover-sibling-1").siblings(".hover-sibling-2").addClass("wl-hover-sibling2");
	 }, function() {
	  $(this).closest(".hover-sibling-1").siblings(".hover-sibling-2").removeClass("wl-hover-sibling2");
	 });
	
	jQuery("#owl-1").owlCarousel({
		loop: true,
		items: 1,
		itemsDesktop : [1370,1],
		itemsDesktopSmall : [1092,1],
		itemsTablet : [768,1],
		autoPlay: 5000,
		stopOnHover : true,
		navigation: true,
		slideSpeed : 1000,
		lazyEffect : "ease-out",
		navigationText: ['<span data-icon=&#x34;></span>','<span data-icon=&#x35;></span>']
	});
	
	var grid = jQuery(".grid-column-2").masonry({
		itemSelector: ".wl-grid-column-2",
		columnWidth: ".wl-grid-column-sizer-2",
		percentPosition: true
	});

	var grid = jQuery(".grid").masonry({
		itemSelector: ".wl-grid-item-2",
		columnWidth: ".wl-grid-sizer-2",				
		percentPosition: true
	});

	// WoW 
	new WOW().init();

    //Unique margin
   if($('.contact-map2').length > 0){  $(".wl-blank-header").addClass("wl-blank-header2");  }
   if($('.contact-map2').length > 0){  $(".page").addClass("wl-contact-page");  }

   $(document).ready(function(){
		$("area[rel^='prettyPhoto']").prettyPhoto();
		$(".wl-gallery-inner:first a[rel^='prettyPhoto']").prettyPhoto({
			animation_speed:'normal',
			theme:'dark_rounded',
			slideshow:4000, 
			autoplay_slideshow: false,
			social_tools:false,
			show_title: true,
			allow_resize: true,
			overlay_gallery: true,
			autoplay: true,
			opacity: 1,
			horizontal_padding: 5,
		});
		$(".wl-gallery-inner:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
			animation_speed:'normal',
			slideshow:50000, 
			hideflash: false
		});
	});
	
	$( '#social_icon_SH' ).click( function(){
		$( '.W_studio_social_widget' ).toggleClass( 'social_active' );
	});
	
})(jQuery);

