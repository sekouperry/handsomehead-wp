<?php
/* Get Theme Option Values */
$w_studio_optionValues   = get_option( 'w_studio' );

//Title content *************
add_action( 'vc_before_init', 'w_studio_title_content_vc' );
function w_studio_title_content_vc(){
   vc_map( array(
    "name" => esc_html__("Title With Content", "w-studio-plugin"),
    "base" => "w_studio_title_content",
    "class" => "w_studio_vc_map",
    "category" => esc_html__( "W Studio", "w-studio-plugin"),
    "content_element" => true,
    "show_settings_on_create" => true,
    "description" => esc_html__( "Title with content", "w-studio-plugin" ),
    "params" => array(
        array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Alignment", "w-studio-plugin" ),
                "param_name" => "title_content",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "Align Left" => "style-1",
                    "Align Right" => "style-2",
                     "Align Center" => "style-3"
                )
            ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title", "w-studio-plugin" ),
            "param_name" => "title",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "You can use <br> for line break", "w-studio-plugin" )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title font size", "w-studio-plugin" ),
            "param_name" => "font_size",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "(px)", "w-studio-plugin" )
        ),
         array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Title color", "w-studio-plugin" ),
             "param_name" => "title_color",
             "value" => esc_html__( "#222222", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
         ),
        array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Title border color", "w-studio-plugin" ),
             "param_name" => "title_border_color",
             "value" => esc_html__( "#222222", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
          ),
        array(
               "type" => "checkbox",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Hide title border", "w-studio-plugin" ),
               "param_name" => "hide_title_border",
               "value" => esc_html__( "", "w-studio-plugin" ),
            ), 
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "", "w-studio-plugin" ),
            "param_name" => "content",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "Description", "w-studio-plugin" )
         )
           
    )
    ) ); 
}
// only Title *************
add_action( 'vc_before_init', 'w_studio_title_vc' );
function w_studio_title_vc(){
   vc_map( array(
    "name" => esc_html__("Title", "w-studio-plugin"),
    "base" => "w_studio_titles",
    "class" => "w_studio_vc_map",
    "category" => esc_html__( "W Studio", "w-studio-plugin"),
    "content_element" => true,
    "show_settings_on_create" => true,
    "description" => esc_html__( "Title style", "w-studio-plugin" ),
    "params" => array(
        array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select element tag", "w-studio-plugin" ),
                "param_name" => "title_heading",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "Select" => "0",
                    "H1" => "h1",
                    "H2" => "h2",
                    "H3" => "h3",
                    "H4" => "h4",
                    "H5" => "h5",
                    "H6" => "h6",
                )
            ),
         array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Alignment", "w-studio-plugin" ),
                "param_name" => "title_content",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "Align Left" => "style-1",
                    "Align Right" => "style-2",
                    "Align Center" => "style-3"
                )
            ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title", "w-studio-plugin" ),
            "param_name" => "title",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "You can use <br> for line break", "w-studio-plugin" )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title font size", "w-studio-plugin" ),
            "param_name" => "font_size",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "(px)", "w-studio-plugin" )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title line height", "w-studio-plugin" ),
            "param_name" => "line_height",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "(px)", "w-studio-plugin" )
        ),
         array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Title color", "w-studio-plugin" ),
             "param_name" => "title_color",
             "value" => esc_html__( "#222222", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
         ),
        array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Title border color", "w-studio-plugin" ),
             "param_name" => "title_border_color",
             "value" => esc_html__( "#222222", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
          ),
        array(
               "type" => "checkbox",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Hide title border", "w-studio-plugin" ),
               "param_name" => "hide_title_border",
               "value" => esc_html__( "", "w-studio-plugin" ),
            )
           
    )
    ) ); 
}
//Button content *************
add_action( 'vc_before_init', 'w_studio_button_vc' );
function w_studio_button_vc() {
   vc_map( array(
    "name" => esc_html__("Button", "w-studio-plugin"),
    "base" => "w_studio_button",
    "class" => "w_studio_vc_map",
    "category" => esc_html__( "W Studio", "w-studio-plugin"),
    "content_element" => true,
    "show_settings_on_create" => true,
    "description" => esc_html__( "Button style", "w-studio-plugin" ),
    "params" => array(
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button size", "w-studio-plugin" ),
          "param_name" => "button_size",
          "value" => esc_html__("", "w-studio-plugin"),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "value" => array(
              "Small" => "small",
              "Medium" => "medium",
               "Large" => "large"
          )
      ),
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button position", "w-studio-plugin" ),
          "param_name" => "button_align",
          "value" => esc_html__("", "w-studio-plugin"),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "value" => array(
              "Center" => "center",
              "Left" => "left",
               "Right" => "right"
          )
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Show icon", "w-studio-plugin" ),
         "param_name" => "is_icon",
         "value" => esc_html__( "", "w-studio-plugin" ),
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Icon class", "w-studio-plugin" ),
          "param_name" => "icon",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
          "dependency" => array(
            "element" => "is_icon",
            "not_empty" => true,
          )
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
         "param_name" => "icon_color",
         "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_icon",
            "not_empty" => true,
          )
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Icon hover color", "w-studio-plugin" ),
         "param_name" => "icon_hover_color",
         "value" => esc_html__( "#222222", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_icon",
            "not_empty" => true,
          )
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button text", "w-studio-plugin" ),
          "param_name" => "text",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => esc_html__( "", "w-studio-plugin" )
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button link", "w-studio-plugin" ),
          "param_name" => "btn_link",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => esc_html__( "", "w-studio-plugin" )
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Button text color", "w-studio-plugin" ),
         "param_name" => "text_color",
         "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" )
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Button text hover color", "w-studio-plugin" ),
         "param_name" => "text_hover_color",
         "value" => esc_html__( "#222222", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" )
      ),
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button text transform", "w-studio-plugin" ),
          "param_name" => "text_transform",
          "value" => esc_html__("Uppercase", "w-studio-plugin"),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "value" => array(
              "Default" => "default",
              "Capitalize" => "capitalize",
              "Lowercase" => "lowercase",
              "Uppercase" => "uppercase"
          )
      ),
      array(
            'type' => 'checkbox',
            'heading' => __( 'Use theme default font family?', 'js_composer' ),
            'param_name' => 'use_theme_fonts',
            'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
            'description' => __( 'Use font family from the theme.', 'js_composer' ),
        ),
        array(
            'type' => 'google_fonts',
            'param_name' => 'google_fonts',
            'value' => '',
            'settings' => array(
                    'fields' => array(
                            'font_family_description' => __( 'Select font family.', 'js_composer' ),
                            'font_style_description' => __( 'Select font styling.', 'js_composer' ),
                    ),
            ),
            'dependency' => array(
                    'element' => 'use_theme_fonts',
                    'value_not_equal_to' => 'yes',
            ),
        ),
        array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Font size", "w-studio-plugin" ),
          "param_name" => "font_size",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => esc_html__( "(px)", "w-studio-plugin" )
        ),
        array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Button background color", "w-studio-plugin" ),
             "param_name" => "background_color",
             "value" => esc_html__( "#111111", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
        ),
        array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Button border color", "w-studio-plugin" ),
             "param_name" => "border_color",
             "value" => esc_html__( "#111111", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
        ),
		array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__( "Button border radius", "w-studio-plugin" ),
           "param_name" => "border_radius",
           "value" => esc_html__( "", "w-studio-plugin" ),
           "description" => esc_html__( "(px)", "w-studio-plugin" ),
        ), 
        array(
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__( "Button background hover color", "w-studio-plugin" ),
           "param_name" => "background_hover_color",
           "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
        ), 
        array(
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__( "Button border hover color", "w-studio-plugin" ),
           "param_name" => "border_hover_color",
           "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
        ),          
    )
    ) ); 
}

//cta box content *************
add_action( 'vc_before_init', 'w_studio_cta_box_vc' );
function w_studio_cta_box_vc() {
   vc_map( array(
    "name" => esc_html__("CTA Box", "w-studio-plugin"),
    "base" => "w_studio_cta_box",
    "class" => "w_studio_vc_map",
    "category" => esc_html__( "W Studio", "w-studio-plugin"),
    "content_element" => true,
    "show_settings_on_create" => true,
    "description" => esc_html__( "Call to action", "w-studio-plugin" ),
    "params" => array(
      array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Title", "wll_mishuk" ),
            "param_name"    => "title",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "Title here", "wll_mishuk" )
        ),
         array(
            "type"              => "colorpicker",
            "holder"            => "div",
            "class"             => "",
            "heading"           => __( "Title color", "wll_mishuk" ),
            "param_name"        => "title_color",
            "value"             => __( "#e5e5e5", "wll_mishuk" ),
            "description"       => __( "", "wll_mishuk" )
        ),
        array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Title font size", "wll_mishuk" ),
            "param_name"    => "title_font_size",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "(px)", "wll_mishuk" )
        ),
        array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Title line height", "wll_mishuk" ),
            "param_name"    => "title_line_height",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "(px)", "wll_mishuk" )
        ),
        array(
            "type"          => "textarea",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Description", "wll_mishuk" ),
            "param_name"    => "description",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "", "wll_mishuk" )
        ),
         array(
            "type"              => "colorpicker",
            "holder"            => "div",
            "class"             => "",
            "heading"           => __( "Description color", "wll_mishuk" ),
            "param_name"        => "description_color",
            "value"             => __( "#e5e5e5", "wll_mishuk" ),
            "description"       => __( "", "wll_mishuk" )
        ),
        array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Description font size", "wll_mishuk" ),
            "param_name"    => "description_font_size",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "(px)", "wll_mishuk" )
        ),
        array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Description line height", "wll_mishuk" ),
            "param_name"    => "description_line_height",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "(px)", "wll_mishuk" )
        ),
      array(
            'type' => 'checkbox',
            'heading' => __( 'Use theme default font family?', 'js_composer' ),
            'param_name' => 'use_theme_fonts',
            'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
            'description' => __( 'Use font family from the theme.', 'js_composer' ),
      ),
      array(
          'type' => 'google_fonts',
          'param_name' => 'google_fonts',
          'value' => '',
          'settings' => array(
                  'fields' => array(
                          'font_family_description' => __( 'Select Title font family.', 'js_composer' ),
                          'font_style_description' => __( 'Select Title font styling.', 'js_composer' ),
                  ),
          ),
          'dependency' => array(
                  'element' => 'use_theme_fonts',
                  'value_not_equal_to' => 'yes',
          ),
      ),
      array(
            "type"              => "attach_image",
            "holder"            => "div",
            "class"             => "",
            "heading"           => __( "Add background image", "wll_mishuk" ),
            "param_name"        => "background_image",
            "value"             => __( "", "wll_mishuk" ),
            "description"       => __( "", "wll_mishuk" ),
        ),
       array(
            "type"              => "colorpicker",
            "holder"            => "div",
            "class"             => "",
            "heading"           => __( "Background overlay color", "wll_mishuk" ),
            "param_name"        => "overlay_color",
            "value"             => __( "", "wll_mishuk" ),
            "description"       => __( "", "wll_mishuk" )
        ),
       array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Top bottom padding", "wll_mishuk" ),
            "param_name"    => "padding",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "(%)", "wll_mishuk" )
        ),
       array(
            "type"          => "textfield",
            "holder"        => "div",
            "class"         => "",
            "heading"       => __( "Left right padding", "wll_mishuk" ),
            "param_name"    => "padding_left",
            "value"         => __( "", "wll_mishuk" ),
            "description"   => __( "(%)", "wll_mishuk" )
        ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Show button", "w-studio-plugin" ),
         "param_name" => "is_button",
         "value" => esc_html__( "", "w-studio-plugin" ),
         "group" => "Button Style"
      ),
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Select button size", "w-studio-plugin" ),
          "param_name" => "button_size",
          "value" => esc_html__("", "w-studio-plugin"),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "value" => array(
              "Small" => "small",
              "Medium" => "medium",
               "Large" => "large"
          ),
          "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Select button position", "w-studio-plugin" ),
          "param_name" => "button_align",
          "value" => esc_html__("", "w-studio-plugin"),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "value" => array(
              "Center" => "center",
              "Left" => "left",
               "Right" => "right"
          ),
          "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button top margin", "w-studio-plugin" ),
          "param_name" => "button_top_margin",
          "value" => esc_html__( "23", "w-studio-plugin" ),
          "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Show icon", "w-studio-plugin" ),
         "param_name" => "is_icon",
         "value" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
         "group" => "Button Style"
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Icon class", "w-studio-plugin" ),
          "param_name" => "icon",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
          "dependency" => array(
            "element" => "is_icon",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
         "param_name" => "icon_color",
         "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_icon",
            "not_empty" => true,
          ),
         "group" => "Button Style"
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Icon hover color", "w-studio-plugin" ),
         "param_name" => "icon_hover_color",
         "value" => esc_html__( "#222222", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_icon",
            "not_empty" => true,
          ),
         "group" => "Button Style"
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button text", "w-studio-plugin" ),
          "param_name" => "text",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button link", "w-studio-plugin" ),
          "param_name" => "btn_link",
          "value" => esc_html__( "", "w-studio-plugin" ),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Button text color", "w-studio-plugin" ),
         "param_name" => "text_color",
         "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
         "group" => "Button Style"
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => esc_html__( "Button text hover color", "w-studio-plugin" ),
         "param_name" => "text_hover_color",
         "value" => esc_html__( "#222222", "w-studio-plugin" ),
         "description" => esc_html__( "", "w-studio-plugin" ),
         "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
         "group" => "Button Style"
      ),
      array(
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_html__( "Button text transform", "w-studio-plugin" ),
          "param_name" => "text_transform",
          "value" => esc_html__("Uppercase", "w-studio-plugin"),
          "description" => esc_html__( "", "w-studio-plugin" ),
          "value" => array(
              "Default" => "default",
              "Capitalize" => "capitalize",
              "Lowercase" => "lowercase",
              "Uppercase" => "uppercase"
          ),
          "dependency" => array(
            "element" => "is_button",
            "not_empty" => true,
          ),
          "group" => "Button Style"
      ),
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => esc_html__( "Font size", "w-studio-plugin" ),
        "param_name" => "font_size",
        "value" => esc_html__( "", "w-studio-plugin" ),
        "description" => esc_html__( "(px)", "w-studio-plugin" ),
        "dependency" => array(
          "element" => "is_button",
          "not_empty" => true,
        ),
        "group" => "Button Style"
      ),
      array(
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__( "Background color", "w-studio-plugin" ),
           "param_name" => "background_color",
           "value" => esc_html__( "#111111", "w-studio-plugin" ),
           "description" => esc_html__( "", "w-studio-plugin" ),
           "dependency" => array(
              "element" => "is_button",
              "not_empty" => true,
            ),
           "group" => "Button Style"
        ),
        array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Border color", "w-studio-plugin" ),
             "param_name" => "border_color",
             "value" => esc_html__( "#111111", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" ),
             "dependency" => array(
                "element" => "is_button",
                "not_empty" => true,
              ),
             "group" => "Button Style"
        ),
        array(
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__( "Background hover color", "w-studio-plugin" ),
           "param_name" => "background_hover_color",
           "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
           "dependency" => array(
              "element" => "is_button",
              "not_empty" => true,
            ),
           "group" => "Button Style"
        ), 
        array(
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_html__( "Border hover color", "w-studio-plugin" ),
           "param_name" => "border_hover_color",
           "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
           "dependency" => array(
              "element" => "is_button",
              "not_empty" => true,
            ),
           "group" => "Button Style"
        ),          
    )
    ) ); 
}

//Icon box 
add_action( 'vc_before_init', 'w_studio_service_vc' );
function w_studio_service_vc() {
   vc_map( array(
      "name" => esc_html__( "Icon Box", "w-studio-plugin" ),
      "base" => "w_studio_service",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "description" => esc_html__( "Icon box style", "w-studio-plugin" ),
      "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Style", "w-studio-plugin" ),
            "param_name" => "service_style",
            "value" => array(
                    "Style One" => "style-1",
                    "Style Two" => "style-2",
                    "Style Three" => "style-3"
                )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title", "w-studio-plugin" ),
            "param_name" => "title",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "", "w-studio-plugin" )
        ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Title link", "w-studio-plugin" ),
              "param_name" => "title_link",
              "value" => esc_html__( "", "w-studio-plugin" ),
              "description" => esc_html__( "", "w-studio-plugin" )
        ),
        array(
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_html__( "Title color", "w-studio-plugin" ),
             "param_name" => "title_color",
             "value" => esc_html__( "#666666", "w-studio-plugin" ),
             "description" => esc_html__( "", "w-studio-plugin" )
          ),
          array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Title font size", "w-studio-plugin" ),
            "param_name" => "font_size",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "(px)", "w-studio-plugin" )
         ),
         array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Set icon class", "w-studio-plugin" ),
            "param_name" => "icon",
           "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
        ),
        array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
               "param_name" => "icon_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Icon size", "w-studio-plugin" ),
            "param_name" => "icon_size",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "(px)", "w-studio-plugin" )
         ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Content", "w-studio-plugin" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "description" => esc_html__( "Enter your content.", "w-studio-plugin" ),
            "dependency" => array(
                    "element" => "service_style",
                    "value" => array('style-1', 'style-3')
                )
         )
      )
   ) );

}

// Image Slider 
add_action( 'vc_before_init', 'w_studio_ft_image_vc' );
function w_studio_ft_image_vc() {
   vc_map( array(
      "name" => esc_html__( "Image Slider", "w-studio-plugin" ),
      "base" => "w_studio_ft_image",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
       "description" => esc_html__( "Image slider", "w-studio-plugin" ),
      "params" => array(
         array(
            "type" => "attach_images",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__( "Attach image", "w-studio-plugin" ),
            "param_name" => "imageurl",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__( "Attach images", "w-studio-plugin" )
         )
      )
   ) );

}

//Featured portfolio 
add_action( 'vc_before_init', 'w_studio_ft_portfolio_vc' );
function w_studio_ft_portfolio_vc() {
   vc_map( array(
        "name" => esc_html__( "Featured Portfolio", "w-studio-plugin" ),
       "base" => "w_studio_ft_portfolio",
       "class" => "w_studio_vc_map",
       "category" => esc_html__( "W Studio", "w-studio-plugin"),
        "description" => esc_html__( "This shortcode works only 2/3 column", "w-studio-plugin" ),
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Portfolio items title show/hide", "w-studio-plugin" ),
                "param_name" => "hide_title",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "Show Title" => "default",
                    "Hide Title" => "hide"
                )
            ),
			 array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Select hover style", "w-studio-plugin"),
            "param_name" => "hover_style",
            "value" => array(
              "Hover Style One" => "hover-effect-1",
              "Hover Style Two" => "hover-effect-2",
              "Hover Style Three" => "hover-effect-3",
              "Hover Style Four" => "hover-effect-4",
              "Hover Style Five" => "hover-effect-5",
              "Hover Style Six" => "hover-effect-6",
              "Hover Style Seven" => "hover-effect-7",
              "Hover Style Eight" => "hover-effect-8",
              "Hover Style Nine" => "hover-effect-9",
            ),
            "description" => esc_html__("","w-studio-plugin")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Portfolio category", "w-studio-plugin"),
            "param_name" => "portfolio_category",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__("Enter portfolio category slug (one category only)","w-studio-plugin")
        ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number of portfolio", "w-studio-plugin"),
            "param_name" => "post_to_show",
            "value" => esc_html__( "", "w-studio-plugin" ),
            "description" => esc_html__("","w-studio-plugin")
        )
      )
   ) );

}

//conter 
add_action( 'vc_before_init', 'w_studio_counter_in_vc' );
function w_studio_counter_in_vc() {
   vc_map( array(
      "name" => esc_html__( "Counter", "w-studio-plugin" ),
      "base" => "w_studio_counter_in",
     "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
       "description" => esc_html__( "Counter", "w-studio-plugin" ),
       "params" => array(
           array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select style", "w-studio-plugin" ),
                "param_name" => "transparent_counter",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "With icon" => "style-1",
                    "Without icon" => "style-2"
                )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title font size", "w-studio-plugin" ),
               "param_name" => "font_size",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "(px)", "w-studio-plugin" )
            ),
               array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Starting number", "w-studio-plugin" ),
               "param_name" => "start",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "Counter start number", "w-studio-plugin" )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Ending number", "w-studio-plugin" ),
               "param_name" => "end",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "Counter end number", "w-studio-plugin" )
            ),
           array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Number font size", "w-studio-plugin" ),
               "param_name" => "disits_font_size",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "(px)", "w-studio-plugin" )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon class", "w-studio-plugin" ),
               "param_name" => "icon",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
               "dependency" => array(
                    "element" => "transparent_counter",
                    "value" => "style-1" 
                )
            ),
           array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon size", "w-studio-plugin" ),
               "param_name" => "icon_size",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "(px)", "w-studio-plugin" ),
               "dependency" => array(
                    "element" => "transparent_counter",
                    "value" => "style-1" 
                )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title color", "w-studio-plugin" ),
               "param_name" => "title_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
               "param_name" => "icon_color",
               "value" => esc_html__( "#ddddde", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "dependency" => array(
                    "element" => "transparent_counter",
                    "value" => "style-1" 
                )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Number color", "w-studio-plugin" ),
               "param_name" => "digits_color",
               "value" => esc_html__( "#222222", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Background color", "w-studio-plugin" ),
               "param_name" => "bg_color",
               "value" => esc_html__( "#f0f0f1", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "dependency" => array(
                    "element" => "transparent_counter",
                    "value" => "style-1" 
                )
            )
      )
   ) );
}

// Image content
add_action( 'vc_before_init', 'w_studio_service2_contents_vc' );
function w_studio_service2_contents_vc() {
   vc_map( array(
      "name" => esc_html__( "Image Content", "w-studio-plugin" ),
      "base" => "w_studio_service2_contents",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
       "description" => esc_html__( "Image content", "w-studio-plugin" ),
       "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "You can use <br> for line break", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title color", "w-studio-plugin" ),
               "param_name" => "title_color",
               "value" => esc_html__( "#fff", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
           ),
           array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title font size", "w-studio-plugin" ),
               "param_name" => "font_size",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "(px)", "w-studio-plugin" )
           ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title border color", "w-studio-plugin" ),
               "param_name" => "title_border_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
           ),
           array(
               "type" => "checkbox",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Hide title border", "w-studio-plugin" ),
               "param_name" => "hide_title_border",
               "value" => esc_html__( "", "w-studio-plugin" ),
           ),
           array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Select background style", "w-studio-plugin" ),
               "param_name" => "background_style",
               "value" => esc_html__("", "w-studio-plugin"),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "value" => array(
                   "Use Background Color" => "background-color",
                   "Use Background Image" => "background-image"
               )
           ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Background Color", "w-studio-plugin" ),
               "param_name" => "background_color",
               "value" => esc_html__( "#000000", "w-studio-plugin" ),
               "description" => esc_html__( "Choose overlay color and opacity/alpha", "w-studio-plugin" ),
               "dependency" => array(
                   "element" => "background_style",
                   "value" => "background-color"
               )
           ),
           array(
               "type" => "attach_image",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Attach image", "w-studio-plugin" ),
               "param_name" => "imageurl",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "dependency" => array(
                   "element" => "background_style",
                   "value" => "background-image"
               )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Overlay color", "w-studio-plugin" ),
               "param_name" => "overlay_color",
               "value" => esc_html__( "#000000", "w-studio-plugin" ),
               "description" => esc_html__( "Choose overlay color and opacity/alpha", "w-studio-plugin" ),
               "dependency" => array(
                   "element" => "background_style",
                   "value" => "background-image"
               )
           ),
           array(
               "type" => "textarea_html",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "", "w-studio-plugin" ),
               "param_name" => "content",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            )
      )
   ) );
}

// Team 
add_action( 'vc_before_init', 'w_studio_team_1_vc' );
function w_studio_team_1_vc() {
   vc_map( array(
        "name" => esc_html__( "Team", "w-studio-plugin" ),
        "base" => "w_studio_team_1",
       "class" => "w_studio_vc_map",
        "is_container" => true,
        "category" => esc_html__( "W Studio", "w-studio-plugin"),
        "content_element" => true,
        "show_settings_on_create" => true,
        "is_container" => true,
        "description" => esc_html__( "Team", "w-studio-plugin" ),
        "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Members to show", "w-studio-plugin" ),
               "param_name" => "post_limit",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Select style", "w-studio-plugin" ),
               "param_name" => "team_style",
               "value" => array(
                    "Style One" => "style-1",
                    "Style Two" => "style-2",
                    "Style Three" => "style-3"
                )
            ),
            array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Order", "w-studio-plugin" ),
               "param_name" => "team_order",
               "value" => array(
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                )
            ),
            array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Order By", "w-studio-plugin" ),
               "param_name" => "team_order_by",
               "value" => array(
                    "Name" => "name",
                    "Title" => "title",
                    "Menu order" => "menu_order",
                    "Date" => "date",
                    "ID" => "ID",
                    "Random" => "rand",
                )
            ),
	    array(
               "type" => "checkbox",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Hide load more", "w-studio-plugin" ),
               "param_name" => "load_more_show",
               "value" => esc_html__( "", "w-studio-plugin" ),
            ),        
      )
   ) );
}

// Progress 
add_action( 'vc_before_init', 'w_studio_abt_skill_bar_vc' );
function w_studio_abt_skill_bar_vc() {
   vc_map( array(
      "name" => esc_html__( "Progress Bar", "w-studio-plugin" ),
      "base" => "w_studio_abt_skill_bar",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
       "description" => esc_html__( "Progress Bar", "w-studio-plugin" ),
       "params" => array(
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Progress bar style", "w-studio-plugin" ),
                "param_name" => "bar_style",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "Vertical" => "default",
                    "Horizontal" => "hori"
                )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Number", "w-studio-plugin" ),
               "param_name" => "value",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "Value should be within 1 to 100", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title color", "w-studio-plugin" ),
               "param_name" => "title_color",
               "value" => esc_html__( "#222222", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Number color", "w-studio-plugin" ),
               "param_name" => "number_color",
               "value" => esc_html__( "#000000", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Bar Background color", "w-studio-plugin" ),
               "param_name" => "bg_color",
               "value" => esc_html__( "#d9d9d9", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
           array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Bar fill color", "w-studio-plugin" ),
               "param_name" => "fill_color",
               "value" => esc_html__( "#b3b3b3", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
      )
   ) );
}

// Single image
add_action( 'vc_before_init', 'w_studio_onepage_service_image_vc' );
function w_studio_onepage_service_image_vc() {
   vc_map( array(
      "name" => esc_html__( "Single image", "w-studio-plugin" ),
      "base" => "w_studio_onepage_service_image",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
       "description" => esc_html__( "Attach image", "w-studio-plugin" ),
       "params" => array(
            array(
               "type" => "attach_image",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Add image", "w-studio-plugin" ),
               "param_name" => "imageurl",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
                
            ),
             array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Image size", "w-studio-plugin" ),
               "param_name" => "image_size",
               "description" => esc_html__( "", "w-studio-plugin" ),
               "value" => array(
                    "270 X 370" => "w_studio_image_270x370",
                    "570 X 370" => "w_studio_image_570x370",
                    "570 X 730" => "w_studio_image_570x730",
                )
            ),
           
      )
   ) );
}

// Pricing table
add_action( 'vc_before_init', 'w_studio_onepage_price_content_vc' );
function w_studio_onepage_price_content_vc() {
   vc_map( array(
      "name" => esc_html__( "Pricing Table", "w-studio-plugin" ),
      "base" => "w_studio_onepage_price_content",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_parent" => array('only' => 'w_studio_price_items'),
      "description" => esc_html__( "Pricing table", "w-studio-plugin" ),
      "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "Pricing table title", "w-studio-plugin" )
            ),
            array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "Price", "w-studio-plugin" ),
                 "param_name" => "price",
                 "value" => esc_html__( "", "w-studio-plugin" ),
                 "description" => esc_html__( "", "w-studio-plugin" )
              ),
             array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "Currency symbol icon", "w-studio-plugin" ),
                 "param_name" => "currency_symbol_icon",
                 "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => __( "", "w-studio-plugin" ),
              ),
            array(
                 "type" => "textfield",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "Suffix", "w-studio-plugin" ),
                 "param_name" => "time",
                 "value" => esc_html__( "", "w-studio-plugin" ),
                 "description" => esc_html__( "For example, month", "w-studio-plugin" )
              ),
            array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__( "Button text", "w-studio-plugin" ),
                   "param_name" => "action",
                   "value" => esc_html__( "", "w-studio-plugin" ),
                   "description" => esc_html__( "", "w-studio-plugin" )
                ),
             array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__( "Button font size", "w-studio-plugin" ),
                   "param_name" => "action_font_size",
                   "value" => esc_html__( "", "w-studio-plugin" ),
                   "description" => esc_html__( "(px)", "w-studio-plugin" )
                ),
            
            array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__( "Button link", "w-studio-plugin" ),
                   "param_name" => "button_link",
                   "value" => esc_html__( "", "w-studio-plugin" ),
                   "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "title color", "w-studio-plugin" ),
               "param_name" => "title_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Price color", "w-studio-plugin" ),
               "param_name" => "price_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Suffix color", "w-studio-plugin" ),
               "param_name" => "suffix_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Button text color", "w-studio-plugin" ),
               "param_name" => "text_color",
               "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Table background color", "w-studio-plugin" ),
               "param_name" => "table_bg_color",
               "value" => esc_html__( "#f0f0f1", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Table background hover color", "w-studio-plugin" ),
               "param_name" => "table_bg_hover_color",
               "value" => esc_html__( "#ffffff", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
             array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Button background color", "w-studio-plugin" ),
               "param_name" => "button_bg_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Border color", "w-studio-plugin" ),
               "param_name" => "border_color",
               "value" => esc_html__( "#222222", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
            ),
        ),
        "js_view" => 'VcColumnView'
   ) );
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_w_studio_onepage_price_content extends WPBakeryShortCodesContainer {
    }
}

// Pricing table content
add_action( 'vc_before_init', 'w_studio_price_items_vc' );
function w_studio_price_items_vc() {
   vc_map( array(
      "name" => esc_html__( "Pricing table content", "w-studio-plugin" ),
      "base" => "w_studio_price_items",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_child" => array('only' => 'w_studio_onepage_price_content'),
      "description" => esc_html__( "Pricing table content", "w-studio-plugin" ),
      "params" => array(
         array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon class", "w-studio-plugin" ),
               "param_name" => "icon1",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
            ),
            array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__( "Item text", "w-studio-plugin" ),
                   "param_name" => "title",
                   "value" => esc_html__( "", "w-studio-plugin" ),
                   "description" => esc_html__( "", "w-studio-plugin" )
                ),
              array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon class", "w-studio-plugin" ),
               "param_name" => "icon2",
               "value" => esc_html__( "", "w-studio-plugin" ),
              "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
            ),
            array(
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_html__( "Item text", "w-studio-plugin" ),
                   "param_name" => "title2",
                   "value" => esc_html__( "", "w-studio-plugin" ),
                   "description" => esc_html__( "", "w-studio-plugin" )
          ),
          array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Text color", "w-studio-plugin" ),
               "param_name" => "icon_text_color",
               "value" => esc_html__( "#222222", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
          ),
          array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
               "param_name" => "icon_color",
               "value" => esc_html__( "#666666", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
          ),
          array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Inner border color", "w-studio-plugin" ),
               "param_name" => "inner_border_color",
               "value" => esc_html__( "#cecece", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
               "group" => "Color options"
          ),
      )
   ) );
}

//contact-form-7
add_action( 'vc_before_init', 'contact_form_7_vc' );
function contact_form_7_vc() {
   vc_map( array(
      "name" => esc_html__( "Contact Form 7", "w-studio-plugin" ),
      "base" => "contact-form-7",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_child" => array('except' => 'abc'),
      "description" => esc_html__( "Contact form 7", "w-studio-plugin" ),
      "params" => array(
          array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "Contact form title", "w-studio-plugin" )
            ),
          array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "ID", "w-studio-plugin" ),
               "param_name" => "id",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "Contact form ID", "w-studio-plugin" )
            )
      )
   ) );
}

// Contact address
add_action( 'vc_before_init', 'w_studio_onepage_contact_address_vc' );
function w_studio_onepage_contact_address_vc() {
   vc_map( array(
      "name" => esc_html__( "Contact Address", "w-studio-plugin" ),
      "base" => "w_studio_onepage_contact_address",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_parent" => array('only' => 'w_studio_onepage_contact_option'),
      "description" => esc_html__( "Contact address", "w-studio-plugin" ),
      "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Adress title", "w-studio-plugin" ),
               "param_name" => "title1",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
          array(
               "type" => "textarea_html",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Address", "w-studio-plugin" ),
               "param_name" => "content",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            )
      )
   ) );
}

// Social media shortcode
add_action( 'vc_before_init', 'w_studio_social_links_vc' );
function w_studio_social_links_vc() {
   vc_map( array(
      "name" => esc_html__( "Social media", "w-studio-plugin" ),
      "base" => "w_studio_social_links",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "description" => esc_html__( "Social media", "w-studio-plugin" ),
      "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon font size", "w-studio-plugin" ),
               "param_name" => "size",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "(px)", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
               "param_name" => "color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon hover color", "w-studio-plugin" ),
               "param_name" => "hover_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "Icons position", "w-studio-plugin" ),
                 "param_name" => "position",
                 "value" => array(
                    "Left Align" => "left",
                    "Center Align" => "center",
                    "Right Align" => "right"

                )
              ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Facebook link", "w-studio-plugin" ),
               "param_name" => "facebook",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Twitter link", "w-studio-plugin" ),
               "param_name" => "twitter",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Google plus link", "w-studio-plugin" ),
               "param_name" => "google_plus",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Pinterest link", "w-studio-plugin" ),
               "param_name" => "pinterest",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Tumblr link", "w-studio-plugin" ),
               "param_name" => "tumblr",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Delicious link", "w-studio-plugin" ),
               "param_name" => "delicious",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "vc_link",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "RSS link", "w-studio-plugin" ),
               "param_name" => "rss",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
      )
   ) );
}


//Contact accordion wraper
add_action( 'vc_before_init', 'w_studio_onepage_contact_accordion_wrapper_vc' );
function w_studio_onepage_contact_accordion_wrapper_vc() {
   vc_map( array(
      "name" => esc_html__( "Accordion", "w-studio-plugin" ),
      "base" => "w_studio_onepage_contact_accordion_wrapper",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "show_settings_on_create" => false,
      "as_parent" => array('only' => 'w_studio_onepage_contact_accordion'),
      "description" => esc_html__( "Accordion", "w-studio-plugin" ),
      "params" => array(
          
      ),
       "js_view" => 'VcColumnView'
   ) );
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_w_studio_onepage_contact_accordion_wrapper extends WPBakeryShortCodesContainer {
    }
}
//Contact toggle wraper
add_action( 'vc_before_init', 'w_studio_onepage_contact_toggle_wrapper_vc' );
function w_studio_onepage_contact_toggle_wrapper_vc() {
   vc_map( array(
      "name" => esc_html__( "Toggle", "w-studio-plugin" ),
      "base" => "w_studio_onepage_contact_toggle_wrapper",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "show_settings_on_create" => false,
      "as_parent" => array('only' => 'w_studio_onepage_contact_toggle'),
      "description" => esc_html__( "Toggle", "w-studio-plugin" ),
      "params" => array(
          
      ),
       "js_view" => 'VcColumnView'
   ) );
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_w_studio_onepage_contact_toggle_wrapper extends WPBakeryShortCodesContainer {
    }
}

// Toggle sidebar
add_action( 'vc_before_init', 'w_studio_onepage_contact_toggle_vc' );
function w_studio_onepage_contact_toggle_vc() {
   vc_map( array(
      "name" => esc_html__( "Toggle Set", "w-studio-plugin" ),
      "base" => "w_studio_onepage_contact_toggle",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_child" => array('only' => 'w_studio_onepage_contact_toggle_wrapper'),
      "description" => esc_html__( "", "w-studio-plugin" ),
      "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "Border", "w-studio-plugin" ),
                 "param_name" => "border",
                 "value" => array(
                    "With border" => "default",
                    "Without border" => "no-border",

                )
              ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title color", "w-studio-plugin" ),
               "param_name" => "title_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
               "param_name" => "icon_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon Background color", "w-studio-plugin" ),
               "param_name" => "bg_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Border color", "w-studio-plugin" ),
               "param_name" => "border_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
                "dependency" => array(
                    "element" => "border",
                    "value" => "default" 
                )
            ),
            array(
                 "type" => "textarea_html",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "", "w-studio-plugin" ),
                 "param_name" => "content",
                 "value" => esc_html__( "", "w-studio-plugin" ),
                 "description" => esc_html__( "", 'w-studio-plugin' )
              )
      )
   ) );
}

// Accordion sidebar
add_action( 'vc_before_init', 'w_studio_onepage_contact_accordion_vc' );
function w_studio_onepage_contact_accordion_vc() {
   vc_map( array(
      "name" => esc_html__( "Accordion Set", "w-studio-plugin" ),
      "base" => "w_studio_onepage_contact_accordion",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_child" => array('only' => 'w_studio_onepage_contact_accordion_wrapper'),
      "description" => esc_html__( "", "w-studio-plugin" ),
      "params" => array(
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title", "w-studio-plugin" ),
               "param_name" => "title",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                 "type" => "dropdown",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "Border", "w-studio-plugin" ),
                 "param_name" => "border",
                 "value" => array(
                    "With border" => "default",
                    "Without border" => "no-border",

                )
              ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Title color", "w-studio-plugin" ),
               "param_name" => "title_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon color", "w-studio-plugin" ),
               "param_name" => "icon_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Icon Background color", "w-studio-plugin" ),
               "param_name" => "bg_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "colorpicker",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Border color", "w-studio-plugin" ),
               "param_name" => "border_color",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" ),
                "dependency" => array(
                    "element" => "border",
                    "value" => "default" 
                )
            ),
            array(
                 "type" => "textarea_html",
                 "holder" => "div",
                 "class" => "",
                 "heading" => esc_html__( "", "w-studio-plugin" ),
                 "param_name" => "content",
                 "value" => esc_html__( "", "w-studio-plugin" ),
                 "description" => esc_html__( "", 'w-studio-plugin' )
              )
      )
   ) );
}

// Google map marker
add_action( 'vc_before_init', 'w_studio_onepage_googlemap_vc' );
function w_studio_onepage_googlemap_vc() {
   vc_map( array(
      "name" => esc_html__( "Google Map", "w-studio-plugin" ),
      "base" => "w_studio_onepage_googlemap",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_parent" => array('only' => 'w_studio_googlemap_data'),
      "description" => esc_html__( "Google map", "w-studio-plugin" ),
      "params" => array(
            array(
               "type" => "attach_image",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Add marker icon image", "w-studio-plugin" ),
               "param_name" => "icon",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            )
      ),
        "js_view" => 'VcColumnView'
   ) );
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_w_studio_onepage_googlemap extends WPBakeryShortCodesContainer {
    }
}
// Google map location set
add_action( 'vc_before_init', 'w_studio_googlemap_data_vc' );
function w_studio_googlemap_data_vc() {
   vc_map( array(
      "name" => esc_html__( "Map Location", "w-studio-plugin" ),
      "base" => "w_studio_googlemap_data",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "as_child" => array('only' => 'w_studio_onepage_googlemap, w_studio_googlemap'),
      "description" => esc_html__( "Map location", "w-studio-plugin" ),
      "params" => array(
			array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Map address", "w-studio-plugin" ),
               "param_name" => "place",
               "value" => esc_html__( "place", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Set latitude", "w-studio-plugin" ),
               "param_name" => "latitude",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            ),
          array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Set longitude", "w-studio-plugin" ),
               "param_name" => "longitude",
               "value" => esc_html__( "", "w-studio-plugin" ),
               "description" => esc_html__( "", "w-studio-plugin" )
            )
      )
   ) );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_w_studio_googlemap extends WPBakeryShortCodesContainer {
    }
}
// Testimonial
add_action( 'vc_before_init', 'add_testimonial');
function add_testimonial() {
    vc_map( array(
        "name"                      => esc_html__( "Testimonial", "w-studio-plugin" ),
        "base"                      => "w_studio_abt_testimonial",
        "class"                     => "w_studio_vc_map",
        "category"                  => esc_html__( "W Studio", "w-studio-plugin" ),
        "content_element"           => true,
        "show_settings_on_create"   => true,
        "is_container"              => true,
        "description"               => esc_html__( "Testimonial", "w-studio-plugin" ),
        "params"                    => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Title", "w-studio-plugin" ),
                "param_name" => "title",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => esc_html__( "You can use <br> for line break", "w-studio-plugin" )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Title font size", "w-studio-plugin" ),
                "param_name" => "font_size",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => esc_html__( "(px)", "w-studio-plugin" )
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Title color", "w-studio-plugin" ),
                "param_name" => "title_color",
                "value" => esc_html__( "#666666", "w-studio-plugin" ),
                "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Title border color", "w-studio-plugin" ),
                "param_name" => "title_border_color",
                "value" => esc_html__( "#666666", "w-studio-plugin" ),
                "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Hide title border", "w-studio-plugin" ),
                "param_name" => "hide_title_border",
                "value" => esc_html__( "", "w-studio-plugin" ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select image alignment", "w-studio-plugin" ),
                "param_name" => "type_of_testimonial",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "--select one--" => "default",
                    "Right Align" => "style-1",
                    "Left Align" => "style-2"
                )
            ),
        )
    ) );
}

// Clients shortcode
add_action('vc_before_init', 'add_client');
function add_client() {
    vc_map( array(
        "name"                      => esc_html__( "Clients", "w-studio-plugin" ),
        "base"                      => "w_studio_abt_client",
        "category"                  => esc_html__( "W Studio", "w-studio-plugin" ),
        "class"                     => "w_studio_vc_map",
        "content_element"           => true,
        "show_settings_on_create"   => true,
        "is_container"              => true,
        "description"               => esc_html__( "Clients", "w-studio-plugin" ),
        "params"                    => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select style", "w-studio-plugin" ),
                "param_name" => "client_style",
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "--select one--" => "default",
                    "Simple style" => "style-1",
                    "Slider style" => "style-2"
                )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Number of clients", "w-studio-plugin" ),
                "param_name" => "number_of_posts",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => esc_html__( "Enter total number of clients to show", "w-studio-plugin" )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Number of clients in a row", "w-studio-plugin" ),
                "param_name" => "number_of_posts_in_row",
                "value" => array(
                    "--select one--" => "default",
                    "Three clients" => "3",
                    "Four clients" => "4",
                    "Six clients" => "6",
                ),
                "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Image height", "w-studio-plugin" ),
                "param_name" => "height",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => esc_html__( "(px)", "w-studio-plugin" )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Order", "w-studio-plugin" ),
                "param_name" => "order_by",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "ASC", "DESC"
                )
            )
        )
    ) );
}

//Portfolio shortcode
vc_add_shortcode_param( 'portfolio-category' , 'portfolio_category' , get_template_directory_uri().'/assets/js/vc-add-field.js' );
function portfolio_category($settings) {
    $categories = get_categories(array( 'taxonomy' => 'portfolio-category' ));
    $option = '';
    foreach($categories as $category) {
        $option .= '<option value="'.strtolower($category->name).'">'.ucfirst($category->name).'</option>';
    }
    return '<select class="select2Class wpb_vc_param_value wpb-input wpb-select content_length_style dropdown full"  id="'.$settings['param_name'].'" name="'.$settings['param_name'].'" data-option="full">
        <option value="all">All</option>'.$option.'</select>';
}
// portfolio template
add_action( 'vc_before_init', 'w_studio_portfolio_style' );
function w_studio_portfolio_style() {
    vc_map( array(
        "name" => esc_html__( "Portfolio", "w-studio-plugin" ),
        "base" => "w_studio_portfolio_template",
        "class" => "w_studio_vc_map",
        "is_container" => true,
        "category" => esc_html__( "W Studio", "w-studio-plugin"),
        "as_parent" => '',
        "content_element" => true,
        "show_settings_on_create" => true,
        "is_container" => true,
        "description" => esc_html__( "Portfolio style", "w-studio-plugin" ),
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select style", "w-studio-plugin" ),
                "param_name" => "portfolio_style",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "--select one--" => "default",
                    "Portfolio Column One" => "portfolio-col-1",
                    "Portfolio Column Two" => "portfolio-col-2",
                    "Portfolio Column Three" => "portfolio-col-3",
                    "Portfolio Masonry One" => "portfolio-masonry-1",
                    "Portfolio Masonry Two" => "portfolio-masonry-2",
                    "Portfolio Masonry Three" => "portfolio-masonry-3",
                    "Portfolio Masonry Four" => "portfolio-masonry-4",
                    "Portfolio Style One" => "portfolio-style-1",
                    "Portfolio Style Two" => "portfolio-style-2",
                    "Portfolio Style Three" => "portfolio-style-3",
                    "Portfolio Style Four" => "portfolio-style-4"
                )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Number of portfolio", "w-studio-plugin" ),
                "param_name" => "posts_per_page",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => esc_html__( "", "w-studio-plugin" )
            ),
            array(
                "type"          => "portfolio-category",
                "holder"        => "div",
                "heading"       => __( "Portfolio category", "wll_mishuk" ),
                "param_name"    => "category_slug_name",
                "description"   => __( "Only selected category items will show", "wll_mishuk" )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Order", "w-studio-plugin" ),
                "param_name" => "order",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "--select one--" => "default",
                    "Ascending" => "ASC",
                    "Descending" => "DESC"
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Order by", "w-studio-plugin" ),
                "param_name" => "order_by",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "--select one--" => "default",
                    "Author" => "author",
                    "Title" => "title",
                    "Type" => "type",
                    "Date" => "date",
                    "Modified" => "modified",
                    "Random" => "rand"
                )
            ),
            array(
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Show filter", "w-studio-plugin" ),
                "param_name" => "is_filter",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" )
            ),
	    array(
                "type" => "checkbox",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Show load more", "w-studio-plugin" ),
                "param_name" => "is_loadmore",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "dependency" => array(
                    "element" => "portfolio_style",
                    "value" => array('portfolio-col-1', 'portfolio-col-2', 'portfolio-col-3', 'portfolio-style-1', 'portfolio-style-2', 'portfolio-style-3', 'portfolio-style-4')
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select hover style", "w-studio-plugin" ),
                "param_name" => "hover_style",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "--select one--" => "default",
                    "Style 1" =>"1",
                    "Style 2" =>"2",
                    "Style 3" =>"3",
                    "Style 4" =>"4",
                    "Style 5" =>"7"
                ),
                "dependency" => array(
                    "element" => "portfolio_style",
                    "value" => array('portfolio-col-1', 'portfolio-col-2', 'portfolio-col-3', 'portfolio-style-1', 'portfolio-style-2', 'portfolio-style-3', 'portfolio-style-4', 'portfolio-masonry-4')
                )
            ),
            array(
               "type" => "textfield",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Load more text", "w-studio-plugin" ),
               "param_name" => "load_more_text",
               "value" => esc_html__( "Load More", "w-studio-plugin" ),
               "description" => esc_html__( "Load More Text", "w-studio-plugin" ),
               "dependency" => array(
                    "element" => "portfolio_style",
                    "value" => array('portfolio-col-1', 'portfolio-col-2', 'portfolio-col-3', 'portfolio-style-1', 'portfolio-style-2', 'portfolio-style-3', 'portfolio-style-4')
                )
            )
        )
    ) );
}

//custom param for blog category
vc_add_shortcode_param( 'blog-category' , 'blog_category' , get_template_directory_uri().'/assets/js/vc-add-field.js' );
function blog_category($settings) {
    $categories = get_categories(array( 'taxonomy' => 'category' ));
    $option = '';
    foreach($categories as $category) {
        $option .= '<option value="'.strtolower($category->name).'">'.ucfirst($category->name).'</option>';
    }
    return '<select class="select2Class wpb_vc_param_value wpb-input wpb-select content_length_style dropdown full"  id="'.$settings['param_name'].'" name="'.$settings['param_name'].'" data-option="full">
        <option value="all">All</option>'.$option.'</select>';
}
// Blog posts shortcode
add_action('vc_before_init', 'w_studio_blog_vc');

function w_studio_blog_vc() {

    vc_map(

        array (
            'name' => esc_html__('Blog posts', 'w-studio-plugin'),
            'base' => 'w_studio_blog',
            'class' => 'w_studio_vc_map',
            'is_container' => true,
            'category' => esc_html__('W Studio', 'w-studio-plugin'),
            'as_parent' => '',
            'content_element' => true,
            'show_settings_on_create' => true,
            'description' => esc_html__('Blog posts', 'w-studio-plugin'),
            'params' => array (
                array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Select style', 'w-studio-plugin'),
                    'param_name' => 'blog_style',
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Blog Style 1' => 'style-1',
                        'Blog Style 2' => 'style-2'
                    )
                ),
                array (
                    'type' => 'blog-category',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Select category', 'w-studio-plugin'),
                    'param_name' => 'category_slug_name',
                    'description' => esc_html__('Only selected category items will show', 'w-studio-plugin'),
                ),
                array (
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Posts per page', 'w-studio-plugin'),
                    'param_name' => 'posts_per_page',
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => esc_html__('', 'w-studio-plugin')
                ),
                array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Blog filter show/hide', 'w-studio-plugin'),
                    'param_name' => 'is_blog_filter',
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Default' => 'default',
                        'Show' => 'show',
                        'Hide' => 'hide'
                    )
                ),
                array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Social media show/hide', 'w-studio-plugin'),
                    'param_name' => 'is_social_link',
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Default' => 'default',
                        'Show' => 'show',
                        'Hide' => 'hide'
                    )
                ),
                array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__(' Blog meta show/hide meta info', 'w-studio-plugin'),
                    'param_name' => 'is_meta_info',
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Default' => 'default',
                        'Show' => 'show',
                        'Hide' => 'hide'
                    )
                ),
                array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Order', 'w-studio-plugin'),
                    'param_name' => 'order',
                    'value' => esc_html__('', 'w-studio-plugin'),
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Ascending' => 'ASC',
                        'Descending' => 'DESC',
                        'Random' => 'RANDOM'
                    )
                ),
                array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Order by', 'w-studio-plugin'),
                    'param_name' => 'order_by',
                    'value' => esc_html__('', 'w-studio-plugin'),
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Default' => 'default',
                        'author' => 'Author',
                        'Title' => 'title',
                        'Type' => 'type',
                        'Date' => 'date',
                        'Modified' => 'modified',
                        'Random' => 'rand'
                    )
                ),
				array (
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Pagination Options', 'w-studio-plugin'),
                    'param_name' => 'loadmore_pagination',
                    'description' => esc_html__('', 'w-studio-plugin'),
                    'value' => array (
                        'Default' => 'default',
                        'Load More' => 'loadmore',
                        'hide' => 'hide',
                    )
                ),
            )
        )
    );
}

add_action( 'vc_before_init', 'vc_add_row_new_fields' );

function vc_add_row_new_fields(){

// Adding Overlay Fields To vc_row shortcode
$attributes = array(
array(
    'type' => 'checkbox',
    'heading' => esc_html__( 'Enable overlay', 'w-studio-plugin' ),
    'param_name' => 'w_overlay',
    'value' => false,
    'description' => esc_html__( 'Set overlay', 'w-studio-plugin' )
),
array(
    'type' => 'colorpicker',
    'heading' => esc_html__( 'Overlay color', 'w-studio-plugin' ),
    'param_name' => 'w_overlay_color',
    'value' => '',
    'description' => esc_html__( 'Overlay color picker', 'w-studio-plugin' ),
    'dependency' => array(
                    'element' => 'w_overlay',
                    'value' => 'true'
                )
),
array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Opacity', 'w-studio-plugin' ),
    'param_name' => 'w_opacity_value',
    'value' => '',
    'description' => esc_html__( 'Opacity value', 'w-studio-plugin' ),
    'dependency' => array(
                    'element' => 'w_overlay',
                    'value' => 'true'
                )
),
array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Padding top', 'w-studio-plugin' ),
    'param_name' => 'w_overlay_padding_top',
    'value' => '',
    'description' => esc_html__( 'Padding top value', 'w-studio-plugin' ),
    'dependency' => array(
                    'element' => 'w_overlay',
                    'value' => 'true'
                )
),
array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Padding bottom', 'w-studio-plugin' ),
    'param_name' => 'w_overlay_padding_bottom',
    'value' => '',
    'description' => esc_html__( 'Padding bottom value', 'w-studio-plugin' ),
    'dependency' => array(
                    'element' => 'w_overlay',
                    'value' => 'true'
                )
)
);

vc_add_params( 'vc_row', $attributes );
}

function craete_category_dropdown() {

    $w_studio_categories = get_categories();

    $return_array = array ('All' => '*');

    foreach ($w_studio_categories as $w_studio_category) {

        $return_array[$w_studio_category->name] = $w_studio_category->slug;
    }

    return $return_array;
}

//Tabs shortcode
add_action( 'vc_before_init', 'w_studio_tab_content_vc' );
function w_studio_tab_content_vc() {
    vc_map(array(
        "name"                       => __("Tabs", "w-studio-plugin"),
        "base"                       => "w_studio_tab_content",
        'class'                       => 'w_studio_vc_map',
        'category' => esc_html__('W Studio', 'w-studio-plugin'),
        "content_element"            => true,
        //'admin_enqueue_js'           => array(get_template_directory_uri().'/assets/js/vc-add-field.js'),
        "show_settings_on_create"    => true,
        "description"                => __( "Tabs", "w-studio-plugin" ),
        "params"                     => array(
            array(
                "type"              => "param_group",
                'heading' => esc_html__('Tab items', 'w-studio-plugin'),
                "holder"            => "div",
                "class"             => "",
                "param_name"        => "tab_value",
                "value"             => __("", "w-studio-plugin"),
                "params"            => array(
                    array(
                        "type"              => "textfield",
                        "holder"            => "div",
                        "class"             => "",
                        "param_name"        => "tab_title",
                        "value"             => __("", "w-studio-plugin"),
                        "heading"           => __( "Tab title", "w-studio-plugin" ),
                        "description"       => __( "", "w-studio-plugin" ),
                    ),
                    array(
                       "type" => "checkbox",
                       "holder" => "div",
                       "class" => "",
                       "heading" => esc_html__( "Show icon", "w-studio-plugin" ),
                       "param_name" => "is_icon",
                       "value" => esc_html__( "", "w-studio-plugin" ),
                    ),
                     array(
                        "type"              => "textfield",
                        "holder"            => "div",
                        "class"             => "",
                        "param_name"        => "tab_title_icon",
                        "value"             => __("", "w-studio-plugin"),
                        "heading"           => __( "Title Icon", "w-studio-plugin" ),
                        "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
                        "dependency" => array(
                            "element" => "is_icon",
                            "not_empty" => true,
                          ),
                    ),
                    array(
                        "type"              => "textarea",
                        "holder"            => "div",
                        "class"             => "",
                        "param_name"        => "tab_content",
                        "value"             => __("", "w-studio-plugin"),
                        "heading"           => __( "Tab Content", "w-studio-plugin" ),
                        "description"       => __( "", "w-studio-plugin" ),
                    ),

                )
            ),
            
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => __( "Title color", "w-studio-plugin" ),
                "param_name"        => "title_color",
                "value"             => __( "", "w-studio-plugin" ),
                "description"       => __( "", "w-studio-plugin" ),
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => __( "Icon color", "w-studio-plugin" ),
                "param_name"        => "icon_color",
                "value"             => __( "", "w-studio-plugin" ),
                "description"       => __( "", "w-studio-plugin" ),
            ),
           array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => __( "Border color", "w-studio-plugin" ),
                "param_name"        => "border_color",
                "value"             => __( "", "w-studio-plugin" ),
                "description"       => __( "", "w-studio-plugin" ),
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => __( "Active border color", "w-studio-plugin" ),
                "param_name"        => "active_border_color",
                "value"             => __( "", "w-studio-plugin" ),
                "description"       => __( "", "w-studio-plugin" ),
            ),
            array(
                "type"              => "colorpicker",
                "holder"            => "div",
                "class"             => "",
                "heading"           => __( "Content color", "w-studio-plugin" ),
                "param_name"        => "content_color",
                "value"             => __( "", "w-studio-plugin" ),
                "description"       => __( "", "w-studio-plugin" ),
            ),
             array(
                "type"              => "textfield",
                "holder"            => "div",
                "class"             => "",
                "param_name"        => "title_font_size",
                "value"             => __("", "w-studio-plugin"),
                "heading"           => __( "Title font size", "w-studio-plugin" ),
                "description"       => __( "(px)", "w-studio-plugin" ),
            ),
            
        )
    ) );
}
//Album shortcode
vc_add_shortcode_param( 'album-category' , 'album_category' , get_template_directory_uri().'/assets/js/vc-add-field.js' );
function album_category($settings) {
    $categories = get_categories(array( 'taxonomy' => 'album-category' ));
    $option = '';
    foreach($categories as $category) {
        $option .= '<option value="'.strtolower($category->name).'">'.ucfirst($category->name).'</option>';
    }
    return '<select class="select2Class wpb_vc_param_value wpb-input wpb-select content_length_style dropdown full"  id="'.$settings['param_name'].'" name="'.$settings['param_name'].'" data-option="full">
        <option value="all">All</option>'.$option.'</select>';
}
//Album content *************
add_action( 'vc_before_init', 'w_studio_album_vc' );
function w_studio_album_vc(){
    vc_map( array(
        "name" => esc_html__("Album", "w-studio-plugin"),
        "base" => "w_studio_album",
        "class" => "w_studio_vc_map",
        "category" => esc_html__( "W Studio", "w-studio-plugin"),
        "content_element" => true,
        "show_settings_on_create" => true,
        "description" => esc_html__( "", "w-studio-plugin" ),
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Select style", "w-studio-plugin" ),
                "param_name" => "album_style",
                "value" => esc_html__("", "w-studio-plugin"),
                "description" => esc_html__( "", "w-studio-plugin" ),
                "value" => array(
                    "Two Column" => "column-2",
                    "Three Column" => "column-3"
                )
            ),
            array (
                'type' => 'textfield',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Number of album', 'w-studio-plugin'),
                'param_name' => 'posts_per_page',
                'description' => esc_html__('', 'w-studio-plugin'),
                'value' => esc_html__('', 'w-studio-plugin')
            ),
            array(
                "type"          => "album-category",
                "holder"        => "div",
                "heading"       => __( "Album category", "wll_mishuk" ),
                "param_name"    => "category",
                "description"   => __( "Only selected category items will show", "wll_mishuk" )
            ),
            array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Order", "w-studio-plugin" ),
               "param_name" => "order",
               "value" => array(
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                )
            ),
            array(
               "type" => "dropdown",
               "holder" => "div",
               "class" => "",
               "heading" => esc_html__( "Order By", "w-studio-plugin" ),
               "param_name" => "order_by",
               "value" => array(
                    "Name" => "name",
                    "Title" => "title",
                    "Menu order" => "menu_order",
                    "Date" => "date",
                    "ID" => "ID",
                    "Random" => "rand",
                )
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title color', 'w-studio-plugin' ),
                'param_name' => 'title_color',
                "value" => esc_html__("", "w-studio-plugin"),
                'description' => esc_html__( "", 'w-studio-plugin' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title hover color', 'w-studio-plugin' ),
                'param_name' => 'title_hover_color',
                "value" => esc_html__("", "w-studio-plugin"),
                'description' => esc_html__( "", 'w-studio-plugin' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title background color', 'w-studio-plugin' ),
                'param_name' => 'title_background_color',
                "value" => esc_html__("", "w-studio-plugin"),
                'description' => esc_html__( "", 'w-studio-plugin' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title hover background color', 'w-studio-plugin' ),
                'param_name' => 'title_hover_background_color',
                "value" => esc_html__("", "w-studio-plugin"),
                'description' => esc_html__( "", 'w-studio-plugin' ),
            ),
            array (
                'type' => 'textfield',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Title font size', 'w-studio-plugin'),
                'param_name' => 'font_size',
                'value' => esc_html__('', 'w-studio-plugin'),
                'description' => esc_html__('(px)', 'w-studio-plugin')
            ),
            array(
                'type' => 'checkbox',
                'heading' => __( 'Use theme default font family?', 'js_composer' ),
                'param_name' => 'use_theme_fonts',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
                'description' => __( 'Use font family from the theme.', 'js_composer' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => __( 'Select Title font family.', 'js_composer' ),
                        'font_style_description' => __( 'Select Title font styling.', 'js_composer' ),
                    )
                ),
				'dependency' => array(
                    'element' => 'use_theme_fonts',
                    'value_not_equal_to' => 'yes',
                ),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Icon class", "w-studio-plugin" ),
                "param_name" => "hover_icon",
                "value" => esc_html__( "", "w-studio-plugin" ),
                "description" => __( "Select icon class from <a href='https://www.elegantthemes.com/blog/resources/elegant-icon-font' TARGET='_blank'>Elegant</a> Icon Font. For example, arrow_down.", "w-studio-plugin" ),
            ),
            array (
                'type' => 'textfield',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Icon font size', 'w-studio-plugin'),
                'param_name' => 'hover_icon_size',
                'value' => esc_html__('', 'w-studio-plugin'),
                'description' => esc_html__('(px)', 'w-studio-plugin'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Icon color', 'w-studio-plugin' ),
                'param_name' => 'hover_icon_color',
                "value" => esc_html__("", "w-studio-plugin"),
                'description' => esc_html__( "", 'w-studio-plugin' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Hover overlay color', 'w-studio-plugin' ),
                'param_name' => 'hover_overlay_color',
                "value" => esc_html__("", "w-studio-plugin"),
                'description' => esc_html__( "", 'w-studio-plugin' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => __( 'Show load more', 'js_composer' ),
                'param_name' => 'is_load_more',
                "value" => esc_html__( "", "w-studio-plugin" ),
                'description' => __( '', 'w-studio-plugin' ),
            ),
        )
    ) );
}

//pick a album
vc_add_shortcode_param( 'select-album' , 'select_album' );
function select_album($settings) {
    $args = array(
      'post_type' => 'album',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
    );

    $albums = query_posts($args);

    $option = '<option value="select">Select from album</option>';
    foreach($albums as $album) {
        $option .= '<option value="'.strtolower($album->post_name).'">'.ucfirst($album->post_title).'</option>';
    }
    return '<select class="wpb_vc_param_value wpb-input wpb-select dropdown" id="'.$settings['param_name'].'" name="'.$settings['param_name'].'">'.$option.'</select>';
}
//Galley content *************
add_action( 'vc_before_init', 'w_studio_gallery_vc' );
function w_studio_gallery_vc() {
  vc_map(
    array(
      "name" => esc_html__("Gallery", "w-studio-plugin"),
      "base" => "w_studio_gallery",
      "class" => "w_studio_vc_map",
      "category" => esc_html__( "W Studio", "w-studio-plugin"),
      "content_element" => true,
      "show_settings_on_create" => true,
      "description" => esc_html__( "Show Single Album Gallery", "w-studio-plugin" ),
      "params" => array(
        array(
          "type"          => "select-album",
          "holder"        => "div",
          "heading"       => __( "Select an Album", "wll_mishuk" ),
          "param_name"    => "album_select",
          "description"   => __( "Only selected album gallery will show", "wll_mishuk" )
        ),
      )
    )
  );
}