<?php
/**
 * Button shortcode
 */
extract( shortcode_atts( array( 
    'button_size' => '', 
    'button_align' => '',
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
    'border_hover_color' => ''  ) , $atts ) 
);

if( $google_fonts !== "" ) {
    $processing_google_font_data = explode( '|' , rawurldecode( $atts[ 'google_fonts' ] ) );

    $processing_google_font_data[ 'font-family' ] = ltrim( $processing_google_font_data[ '0' ] , 'font_family:' );
    $processing_google_font_data[ 'font-style' ] = ltrim( $processing_google_font_data[ '1' ] , 'font_style:' );
    $font_family = $processing_google_font_data[ 'font-family' ];
    $font_style = $processing_google_font_data[ 'font-style' ];
    $font_family_name = explode( ':' , $font_family );
    $font_style_name = explode( ' ' , $font_style );
    wp_enqueue_style( 'style_icon' , '//fonts.googleapis.com/css?family=' . $processing_google_font_data[ 'font-family' ] );

}

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

if( !function_exists( 'w_studio_random_number' ) ) {
        function w_studio_random_number() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }

$className = w_studio_random_number();

$w_studio_custom_inline_style = '';
$w_studio_custom_inline_style .= '.w-button.'.$className.' button.f-btn {background-color: '.$background_color.'; border: 2px solid '.$border_color.'; color: '.$text_color.'; font-size: '.$font_size.'px; font-family: '.$font_family_name[ 0 ].'; font-weight: '.$font_style_name[ 0 ].'; text-transform: '.$text_transform.';}';
$w_studio_custom_inline_style .= '.w-button.'.$className.' button.f-btn {border-radius: '.$border_radius.'px;}';
$w_studio_custom_inline_style .= '.w-button.'.$className.' button.f-btn:hover {background-color: '.$background_hover_color.'; border: 2px solid '.$border_hover_color.'; color: '.$text_hover_color.';}';
$w_studio_custom_inline_style .= '.w-button.'.$className.' button.f-btn i {color: '.$icon_color.';}';
$w_studio_custom_inline_style .= '.w-button.'.$className.' button.f-btn:hover i {color: '.$icon_hover_color.';}';
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

?>
<div class="w-button <?php echo $button_position.' '.$className ?>">
    <a href="<?php echo esc_url($btn_link);?>">
    	<button class="f-btn bg <?php echo esc_attr($button_class); ?>">
    		<?php if($icon != '') { ?>
    			<i class="<?php echo esc_attr($icon); ?>"></i>
    		<?php } ?>
    		<?php echo $text; ?>
    	</button>
    </a>
</div>

