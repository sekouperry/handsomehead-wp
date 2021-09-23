jQuery( document ).ready(function() {

    setTimeout(function() {
    paddingLeft = jQuery( '.wl-vc-overlay' ).parent().css('padding-left');
    paddingRight= jQuery( '.wl-vc-overlay' ).parent().css('padding-right');
    rowWidth= jQuery( '.wl-vc-overlay' ).parent().css('width');
    minHight= jQuery( '.wl-vc-overlay' ).parent().css('min-height');
    
    jQuery( '.wl-vc-overlay' ).css('margin-left', '-'+paddingLeft);
    jQuery( '.wl-vc-overlay' ).css('margin-right', '-'+paddingRight);
    
    jQuery( '.wl-vc-overlay' ).css('padding-left', paddingLeft);
    jQuery( '.wl-vc-overlay' ).css('padding-right', paddingRight);
    jQuery( '.wl-vc-overlay' ).css('min-height', minHight);
    jQuery( '.wl-vc-overlay' ).css('width', rowWidth);
    },1000);
});