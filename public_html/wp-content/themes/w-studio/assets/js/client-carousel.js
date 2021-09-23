(function($){
  "use strict";

  var client_count = w_studio_client_number.client_number;

  jQuery("#client-curousel").owlCarousel({
		loop: true,
		items: client_count,
		itemsDesktop : [1370, client_count ],
		itemsDesktopSmall : [1092, client_count],
		itemsTablet : [768, client_count],
		itemsMobile : [479,1],
		autoPlay: 5000,
		slideSpeed : 1000,
		stopOnHover : true,
		pagination:true,
		navigation: false,
		//afterAction : syncPosition,
		//navigationText: ['<span data-icon=&#x34;></span>','<span data-icon=&#x35;></span>']
	});

})(jQuery);