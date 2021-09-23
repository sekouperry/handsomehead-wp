jQuery(document).ready(function() {

	var value1 = jQuery("input[name=widget-ws_twitter_widget\\[2\\]\\[update_count\\]]").val();
    if (value1>15) {
    	jQuery("input[name=widget-ws_twitter_widget\\[2\\]\\[update_count\\]]").siblings('.wl-display-switch').css('display','block');
    } else {
    	jQuery("input[name=widget-ws_twitter_widget\\[2\\]\\[update_count\\]]").siblings('.wl-display-switch').css('display','none');
    }

	//twitter widget count limit
	jQuery('body').on('change', 'input[name=widget-ws_twitter_widget\\[2\\]\\[update_count\\]]', function() {

	    var value = jQuery("input[name=widget-ws_twitter_widget\\[2\\]\\[update_count\\]]").val();
	    if (value>15) {
	    	jQuery(this).siblings('.wl-display-switch').css('display','block');
	    } else {
	    	jQuery(this).siblings('.wl-display-switch').css('display','none');
	    }
	});
});