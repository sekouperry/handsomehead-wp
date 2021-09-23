jQuery( document ).ready( function() {
    var pagedNumber = parseInt( getValue() );  
    jQuery( '#w-load-more' ).on( 'click', function() {		
        pagedNumber = parseInt( getValue() )
        var postType = jQuery( this ).attr( 'data-value' );
        var msg = jQuery( this).text();
        jQuery( this).text('LOADING...');
        ajaxLoadPost( postType, pagedNumber, msg );
		jQuery("html, body").animate({ scrollTop: jQuery(document).height() }, "slow");
    });
});

function getValue() {
    var pagedNumber = jQuery( '#initialPageValue' ).html();
    return pagedNumber;
}

function ajaxLoadPost( postType, pagedNumber, msg ) {
    jQuery.ajax({
        type: 'post',
        url: w_studio_loadmorepost.ajaxurl,
        data: { 
            action: 'w_studio_ajaxloader',
            postType: postType, 
            pagedNumber: pagedNumber,
            style: w_studio_loadmorepost.style,
            limit: w_studio_loadmorepost.limit,
            meta: w_studio_loadmorepost.meta,
            meta_info: w_studio_loadmorepost.meta_info,
            social_icon: w_studio_loadmorepost.social_icon
        },
        success: function( data ) {
			var el = jQuery( data );			
			jQuery( '#blogpostload' ).append( el );
			
            var pagedNumber = parseInt( getValue() );
            pagedNumber++;
            jQuery( '#initialPageValue' ).html( pagedNumber );
            jQuery( '#w-load-more' ).text(msg);
            if( !data) {
                jQuery( '#w-load-more' ).text('NO MORE POST');
            }
        },
        error: function() {            
        }
    });
}