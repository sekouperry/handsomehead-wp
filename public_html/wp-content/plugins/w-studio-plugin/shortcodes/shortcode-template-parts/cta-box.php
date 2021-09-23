 <?php   extract( shortcode_atts( array(
    'title' => '',
    'title_color' => '',
    'title_font_size' => '',
    'title_line_height' => '',
    'google_fonts' => '',
    'description' => '',
    'description_color' => '',
    'description_font_size' => '',
    'description_line_height' => '',
    'background_image' => '',
    'overlay_color' => '',
    'padding' => '',
    'padding_left' => '',
    'is_button' => '',
    'button_size' => '', 
    'button_align' => '',
    'button_top_margin' => '23',
    'icon' => '',
    'icon_color' => '',
    'icon_hover_color' => '',
    'text' => '',
    'btn_link' => '',
    'text_color' => '',
    'text_hover_color' => '',
    'text_transform' => '',
    'google_fonts' => '',
    'font_size' => '',
    'background_color' => '',
    'border_color' => '',
	'border_radius' => '',
    'background_hover_color' => '',
    'border_hover_color' => ''
    ), $atts ) );

$font_family_name[0] = '';
$font_style_name[0] = '';
if($google_fonts !==""){
    $processing_google_font_data = explode( '|', rawurldecode( $atts['google_fonts'] ) );

    $processing_google_font_data['font-family']    = ltrim( $processing_google_font_data['0'], 'font_family:' );
    $processing_google_font_data['font-style']     = ltrim( $processing_google_font_data['1'], 'font_style:' );
    $font_family = $processing_google_font_data['font-family'];
    $font_style = $processing_google_font_data['font-style'];
    
    $font_family_name = explode(':',$font_family);
    $font_style_name = explode(' ',$font_style);
    
    wp_enqueue_style('style_icon' , '//fonts.googleapis.com/css?family=' . $processing_google_font_data['font-family'] );

}

if (!function_exists ('random_number')) {
    function random_number() {
        $class_btn = 'wll-';
        for ($i = 0; $i<10; $i++) {
            $class_btn .= mt_rand(0,9999);
        }
        return $class_btn;
    }
}
$classBtn = random_number(); 

list( $r , $g , $b ) = sscanf( $overlay_color , "#%02x%02x%02x" );

$w_studio_custom_inline_style = '';
$w_studio_custom_inline_style .= '.wl-cta-background {background-image: url('.wp_get_attachment_image_src($background_image,'large')[0].'); background-repeat: no-repeat; background-size: cover; display: inline-block; position: relative; width: 100%; height: 100%;}';
$w_studio_custom_inline_style .= '.wl-cta-overlay {background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ', 0.7 ); padding: '.$padding.'% '.$padding_left.'%; float: left; height: 100%; width: 100%;}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .cta-desc h2 {font-family: '.$font_family_name[0].',sans-serif; font-weight: '.$font_style_name[ 0 ].'; color: '.$title_color.'; font-size: '.$title_font_size.'px; line-height: '.$title_line_height.'px}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .cta-desc p { color: '.$description_color.'; font-size: '.$description_font_size.'px; line-height: '.$description_line_height.'px}';

if($button_size == 'small' || $button_size == '') {
    $button_class = 'sm';
} else if($button_size == 'medium') {
    $button_class = 'md';
} else if($button_size == 'large') {
    $button_class = 'lg';
}

if($button_align == 'center' || $button_align == '') {
    $button_position = 'text-center';
} else if($button_align == 'left') {
    $button_position = 'text-left';
} else {
    $button_position = 'text-right';
}

if($text_transform == '') {
    $text_transform = 'uppercase';
}
if($button_top_margin == '') {
    $button_top_margin = '23';
}
$w_studio_custom_inline_style .= '.'.$classBtn.' .w-button {margin-top: '.$button_top_margin.'px;}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .w-button button.f-btn {border-radius: '.$border_radius.'px;}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .w-button button.f-btn {background-color: '.$background_color.'; border: 2px solid '.$border_color.'; color: '.$text_color.'; font-size: '.$font_size.'px; font-family: '.$font_family_name[ 0 ].'; font-weight: '.$font_style_name[ 0 ].'; text-transform: '.$text_transform.';}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .w-button button.f-btn:hover {background-color: '.$background_hover_color.'; border: 2px solid '.$border_hover_color.'; color: '.$text_hover_color.';}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .w-button button.f-btn i {color: '.$icon_color.';}';
$w_studio_custom_inline_style .= '.'.$classBtn.' .w-button button.f-btn:hover i {color: '.$icon_hover_color.';}';
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

if($is_button) {
    $class = 'col-lg-9 col-md-9 col-sm-8';
} else {
    $class = 'col-lg-12 col-md-12 col-sm-12';
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="wl-cta-background">
            <div class="wl-cta-overlay">
                <div class="<?php echo esc_attr($classBtn).' '.$class; ?>">
                    <div class="cta-desc">      
                        <h2><?php echo $title;?></h2>
                        <p><?php echo $description ?></p>
                    </div>
                </div>
                <?php if($is_button) { ?>
                <div class="col-lg-3 col-md-3 col-sm-4 <?php echo esc_attr($classBtn); ?>">
                    <div class="w-button <?php echo esc_attr($button_position); ?>">
                        <a href="<?php echo esc_url($btn_link);?>">
                            <button class="f-btn bg <?php echo esc_attr($button_class); ?>">
                                <?php if($icon != '') { ?>
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                <?php } ?>
                                <?php echo ($text != '') ? $text : 'Buy Now'; ?>
                            </button>
                        </a>
                    </div>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>