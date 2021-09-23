<?php
/**
 * Clients shortcode
 */
extract( shortcode_atts( array( 
    'size' => '', 
    'color' => '', 
    'hover_color' => '', 
    'position' => '',
    'facebook' => '',
    'twitter' => '',
    'google_plus' => '',
    'pinterest' => '',
    'tumblr' => '',
    'delicious' => '',
    'rss' => '' ) , $atts ) 
);

$facebook = vc_build_link($facebook);
$twitter = vc_build_link($twitter);
$google_plus = vc_build_link($google_plus);
$pinterest = vc_build_link($pinterest);
$tumblr = vc_build_link($tumblr);
$delicious = vc_build_link($delicious);
$rss = vc_build_link($rss);

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

if($position == '' || $position == 'left') {
	$position = 'text-left';
} else if($position == 'center') {
	$position = 'text-center';
} else if($position == 'right') {
	$position = 'text-right';
}

$w_studio_custom_inline_style = '';
$w_studio_custom_inline_style .= '.wl-blog-media .wl-media-plot .'.$className.' a span {font-size: '.$size.'px; color: '.$color.';}';
$w_studio_custom_inline_style .= '.wl-blog-media .wl-media-plot .'.$className.' a:hover span {color: '.$hover_color.';}';
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

?>

<div class="wl-media-icons wl-blog-media">
	<div class="wl-media-plot  row">
		<div class="wl-media-share <?php echo esc_attr($className).' '.$position; ?>">	
			<?php if( $facebook['url'] != '' ) { ?>
				<a href="<?php echo esc_url($facebook['url']); ?>" target="_blank"><span data-icon=&#xe093;></span></a>
			<?php } if( $twitter['url'] != '' ) { ?>
				<a href="<?php echo esc_url($twitter['url']); ?>" target="_blank"><span data-icon=&#xe094;></span></a>
			<?php } if( $google_plus['url'] != '' ) { ?>
				<a href="<?php echo esc_url($google_plus['url']); ?>" target="_blank"><span data-icon=&#xe096;></span></a>
			<?php } if( $pinterest['url'] != '' ) { ?>
				<a href="<?php echo esc_url($pinterest['url']); ?>" target="_blank"><span data-icon=&#xe095;></span></a>
			<?php } if( $tumblr['url'] != '' ) { ?>
				<a href="<?php echo esc_url($tumblr['url']); ?>" target="_blank"><span data-icon=&#xe097;></span></a>
			<?php } if( $delicious['url'] != '' ) { ?>
				<a href="<?php echo esc_url($delicious['url']); ?>" target="_blank"><span data-icon=&#xe0a9;></span></a>
			<?php } if( $rss['url'] != '' ) { ?>
				<a href="<?php echo esc_url($rss['url']); ?>" target="_blank"><span data-icon=&#xe09e;></span></a>
			<?php } ?>
		</div>
	</div>
</div>