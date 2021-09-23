(function ($) {

//jQuery('body').on("click" , "#click_button" , function() {
//    var input_html = '<div class="vc_col-xs-12 wpb_el_type_textfield vc_wrapper-param-type-textfield vc_shortcode-param vc_column" data-vc-ui-element="panel-shortcode-param" data-vc-shortcode-param-name="tab_heading" data-param_type="textfield" data-param_settings="{&quot;type&quot;:&quot;textfield&quot;,&quot;holder&quot;:&quot;div&quot;,&quot;class&quot;:&quot;&quot;,&quot;heading&quot;:&quot;Icon Box Title&quot;,&quot;param_name&quot;:&quot;iconbox_title&quot;,&quot;value&quot;:&quot;&quot;,&quot;description&quot;:&quot;&quot;,&quot;vc_single_param_edit_holder_class&quot;:[&quot;vc_col-xs-12&quot;,&quot;wpb_el_type_textfield&quot;,&quot;vc_wrapper-param-type-textfield&quot;,&quot;vc_shortcode-param&quot;,&quot;vc_column&quot;]}">' +
//        '<div class="wpb_element_label">Tab Heading</div>' +
//        '<div class="edit_form_line">' +
//            '<input name="tab_heading" class="wpb_vc_param_value wpb-textinput iconbox_title textfield" value="" type="text">' +
//                '<span class="vc_description vc_clearfix"></span>' +
//            '</div>' +
//        '</div>';
//
//    jQuery('#click_button').parent().parent().before(input_html);
//});

    jQuery('.select2Class').select2({multiple: true , placeholder: "Select Category"});
    jQuery('body').on('click' , '.select2-selection__rendered' , function() {
        jQuery('.select2-container').css("z-index","999999");
    });



})(jQuery);



