jQuery( document ).ready( function() {
    
    jQuery(window).scroll(function() {
       if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
           var postType = jQuery( '#w-load-more' ).attr( 'value' );
           pagedNumber = parseInt( getValue() )
                    ajaxLoadPost( postType, pagedNumber );
       }
    });	
});

function getValue() {
    var pagedNumber = jQuery( '#initialPageValue' ).html();
    return pagedNumber;
}

function ajaxLoadPost( postType, pagedNumber ) {
    jQuery.ajax({
        type: 'post',
        url: w_studio_loadmorepost.ajaxurl,
        data: { 
            action: 'w_studio_ajaxloader',
            postType: postType, 
            pagedNumber: pagedNumber 
        },
        success: function( data ) {
			var el = jQuery( data );
			if( postType == 'post' ) {
				jQuery( '#blogpostload' ).append( el ).masonry( 'appended', el, true );
			}
            var pagedNumber = parseInt( getValue() );
            pagedNumber++;
            jQuery( '#initialPageValue' ).html( pagedNumber );			
        },
        error: function() {            
        }
    });
}