/*
 Field Color (color)
 */

/*global jQuery, document, redux_change, redux*/

Color.prototype.toString = function( flag ) {

    // If our no-alpha flag has been passed in, output RGBa value with 100% opacity.
    // This is used to set the background color on the opacity slider during color changes.
    if ( 'no-alpha' == flag ) {
        return this.toCSS( 'rgba', '1' ).replace( /\s+/g, '' );
    }

    // If we have a proper opacity value, output RGBa.
    if ( 1 > this._alpha ) {
        return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
    }

    // Proceed with stock color.js hex output.
    var hex = parseInt( this._color, 10 ).toString( 16 );
    if ( this.error ) { return ''; }
    if ( hex.length < 6 ) {
        for ( var i = 6 - hex.length - 1; i >= 0; i-- ) {
            hex = '0' + hex;
        }
    }

    return '#' + hex;
};

;(function( $ ) {
    'use strict';
    redux.field_objects = redux.field_objects || {};
    redux.field_objects.color_alpha = redux.field_objects.color_alpha || {};

    $( document ).ready(
        function() {

        }
    );

    redux.field_objects.color_alpha.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( ".redux-group-tab:visible" ).find( '.redux-container-color_alpha:visible' );
        }

        $( selector ).each(
            function() {

                var el = $( this );
                var parent = el;

                if ( !el.hasClass( 'redux-field-container' ) ) {
                    parent = el.parents( '.redux-field-container:first' );
                }
                if ( parent.is( ":hidden" ) ) { // Skip hidden fields
                    return;
                }
                if ( parent.hasClass( 'redux-field-init' ) ) {
                    parent.removeClass( 'redux-field-init' );
                } else {
                    return;
                }
             var $control = el.find( '.redux-color-init' ),
                                       
                 value = $control.val().replace( /\s+/g, '' ),
                 alpha_val = 100,
                 $alpha, $alpha_output;
                               //console.log($control);
             if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
                 alpha_val = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[ 1 ] ) * 100;
             }
                el.find( '.redux-color-init' ).wpColorPicker(
                    {
                        change: function( e, ui ) {
                            $( this ).val( ui.color.toString() );
                            redux_change( $( this ) );
                            el.find( '#' + e.target.getAttribute( 'data-id' ) + '-transparency' ).removeAttr( 'checked' );
                        },
                        clear: function( e, ui ) {
                            $( this ).val( '' );
                            redux_change( $( this ).parent().find( '.redux-color-init' ) );
                        }
                    }
                );
             $( '<div class="redux-alpha-container">'
             + '<label>Alpha: <output class="rangevalue">' + alpha_val + '%</output></label>'
             + '<input type="range" min="1" max="100" value="' + alpha_val + '" name="alpha" class="wbc-color-alpha-field">'
             + '</div>' ).appendTo( $control.parents( '.wp-picker-container:first' ).addClass( 'wbc-color-alpha-picker' ).find( '.iris-picker' ) );
             $alpha = $control.parents( '.wp-picker-container:first' ).find( '.wbc-color-alpha-field' );
                               //console.log($alpha);
             $alpha_output = $control.parents( '.wp-picker-container:first' ).find( '.redux-alpha-container output' );
             $alpha.bind( 'change keyup', function () {
                 var alpha_val = parseFloat( $alpha.val() ),
                     iris = $control.data( 'a8cIris' ),
                     color_picker = $control.data( 'wp-wpColorPicker' );
                                               //console.log(alpha_val);
                 $alpha_output.val( $alpha.val() + '%' );
                                       
                 iris._color._alpha = parseFloat(alpha_val / 100.0);
                                       
                 //$control.val( iris._color.toString() );
                                       el.find( '.redux-color-init' ).wpColorPicker( 'color', iris._color.toString() );
                                       //console.log($control.val());
                 //color_picker.toggler.css( { backgroundColor: $control.val() } );
             } ).val( alpha_val ).trigger( 'change' );                                

                // el.find( '.redux-color' ).on(
                //     'focus', function() {
                //      // alert("DID");
                //         $( this ).data( 'oldcolor', $( this ).val() );
                //     }
                // );

                // el.find( '.redux-color' ).on(
                //     'keyup', function() {
                //      // alert("DID");
                //         var value = $( this ).val();
                //         var color = value;
                //         var id = '#' + $( this ).attr( 'id' );

                //         if ( value === "transparent" ) {
                //             $( this ).parent().parent().find( '.wp-color-result' ).css(
                //                 'background-color', 'transparent'
                //             );

                //             el.find( id + '-transparency' ).attr( 'checked', 'checked' );
                //         } else {
                //             el.find( id + '-transparency' ).removeAttr( 'checked' );

                //             if ( color && color !== $( this ).val() ) {
                //                 $( this ).val( color );

                //             }
                //         }
                //     }
                // );

                // // Replace and validate field on blur
                // el.find( '.redux-color' ).on(
                //     'blur', function() {
                //         var value = $( this ).val();
                //         var id = '#' + $( this ).attr( 'id' ),
                //         new_alpha = $control.data( 'a8cIris' )._color._alpha;

                //         if(new_alpha && new_alpha < 1){

                //          $alpha.val(parseFloat( new_alpha ));
                //          $alpha_output.val( new_alpha / 100.0 + '%' );
                //         }
                //         // if ( value === "transparent" ) {
                //         //     $( this ).parent().parent().find( '.wp-color-result' ).css(
                //         //         'background-color', 'transparent'
                //         //     );

                //         //     el.find( id + '-transparency' ).attr( 'checked', 'checked' );
                //         // } else {
                            
                //         //     $( this ).val( $( this ).data( 'oldcolor' ) );

                //         //     el.find( id + '-transparency' ).removeAttr( 'checked' );
                //         // }
                //     }
                // );

                // Store the old valid color on keydown
                el.find( '.redux-color' ).on(
                    'keydown', function() {
                        $( this ).data( 'oldkeypress', $( this ).val() );
                    }
                );

                // When transparency checkbox is clicked
                el.find( '.color-transparency' ).on(
                    'click', function() {
                        if ( $( this ).is( ":checked" ) ) {
                            el.find( '.redux-saved-color' ).val( $( '#' + $( this ).data( 'id' ) ).val() );
                            el.find( '#' + $( this ).data( 'id' ) ).val( 'transparent' );
                            el.find( '#' + $( this ).data( 'id' ) ).parent().parent().find( '.wp-color-result' ).css(
                                'background-color', 'transparent'
                            );
                        } else {
                            if ( el.find( '#' + $( this ).data( 'id' ) ).val() === 'transparent' ) {
                                var prevColor = $( '.redux-saved-color' ).val();

                                if ( prevColor === '' ) {
                                    prevColor = $( '#' + $( this ).data( 'id' ) ).data( 'default-color' );
                                }

                                el.find( '#' + $( this ).data( 'id' ) ).parent().parent().find( '.wp-color-result' ).css(
                                    'background-color', prevColor
                                );

                                el.find( '#' + $( this ).data( 'id' ) ).val( prevColor );
                            }
                        }
                        redux_change( $( this ) );
                    }
                );
            }
        );
    };
})( jQuery );