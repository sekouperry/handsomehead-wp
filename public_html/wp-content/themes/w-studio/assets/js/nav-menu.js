(function($){
    $( document ).ready( function(){
        $( document ).on( 'mouseleave', '.menu-item-bar', function( event, ui ){
            if( ! $( event.target ).is( 'a' ) ){
                setTimeout( checkMegamenu(), 30000 );
            }
        });
        
        function checkMegamenu(){
            menuItems   = $( '.menu-item' );
            
            menuItems.each( function(){
                if( $( this ).hasClass( 'menu-item-depth-0' ) ){
                    $( this ).addClass( 'w-mega-menu-item' );
                }else{
                    if( $( this ).hasClass( 'w-mega-menu-item' ) ){
                        $( this ).removeClass( 'w-mega-menu-item' );
                        $( this ).find( '.w-mega-menu-input' ).prop( 'checked', false );
                    }
                }
            });
        }
    });
})( jQuery );