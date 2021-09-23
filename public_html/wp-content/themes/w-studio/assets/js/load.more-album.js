jQuery( document ).ready( function() {
    var pagedNumber = parseInt( getValue() );  
    jQuery( '#w-load-more' ).on( 'click', function() {
        pagedNumber = parseInt( getValue() )
        var postType = jQuery( this ).attr( 'data-value' );
        ajaxLoadPost( postType, pagedNumber );
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
            pagedNumber: pagedNumber,
            random: w_studio_loadmorepost.random,
            icon: w_studio_loadmorepost.icon,
            limit: w_studio_loadmorepost.limit,
            style: w_studio_loadmorepost.style,
        },
        success: function( data ) {
			if( postType == 'album' ) {
				jQuery( '#albumpostload' ).append( data );
			}
            var pagedNumber = parseInt( getValue() );
            pagedNumber++;
            jQuery( '#initialPageValue' ).html( pagedNumber );
            if( !data) {
                jQuery( '#w-load-more' ).text('NO MORE ALBUM');
            }
        },
        error: function() {            
        }
    });
}