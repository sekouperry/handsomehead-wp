jQuery(window).load(function(){
	jQuery('.flexslider').flexslider({
		animation: "slide",
		controlNav: false,
		start: function(slider){
		jQuery('body').removeClass('loading');
		}
	});
});