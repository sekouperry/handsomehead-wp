jQuery( document ).ready( function() {
    var pagedNumber = parseInt( getValue() );  

    jQuery( '#load_more_team' ).on( 'click', function(e) {
        e.preventDefault();
        pagedNumber = parseInt( getValue() )		
        var postType = jQuery( this ).attr( 'data-value' );
        var msg = jQuery( this).text();
        jQuery( this).text('LOADING...');

        jQuery.ajax({
            type: 'post',
            url: w_studio_loadmoreteam.ajaxurl,
            data: {
                action: 'w_studio_ajaxloader',
                postType: postType,
                pagedNumber: pagedNumber,
                limit: w_studio_loadmoreteam.limit,
                team_style: w_studio_loadmoreteam.fileName
            },
            success: function( data ) {
                jQuery( '.addMoreTeam' ).append( data );
                jQuery( '#load_more_team' ).text(msg);
                var pagedNumber = parseInt( getValue() );
                pagedNumber++;
                jQuery( '#initialPageValue' ).html( pagedNumber );
                if( !data) {
                    jQuery( '#load_more_team' ).text('NO MORE MEMBER');
                }
            },
            error: function() {

            }
        });
    });
});

function getValue() {
    var pagedNumber = jQuery( '#initialPageValue' ).html();
    return pagedNumber;
}