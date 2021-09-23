<?php 
$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_custom_inline_style = '';
$w_studio_image['url'] = '';

$w_studio_bg_type = isset( $w_studio_optionValues[ 'w-blog-category-background-select' ] ) ? $w_studio_optionValues[ 'w-blog-category-background-select' ] : '';
if( $w_studio_bg_type == 'bg-image' ) {
	if( isset ( $w_studio_optionValues[ 'w-blog-category-banner-image' ] ) && !empty( $w_studio_optionValues[ 'w-blog-category-banner-image' ]['url'] ) ){
		$w_studio_image =  $w_studio_optionValues[ 'w-blog-category-banner-image' ];
	}
	if( $w_studio_image[ 'url' ] ) {
		$w_studio_custom_inline_style .= '.wl-home-bg3 { background-position: 50% 0; background: transparent
		 url( '. esc_url( $w_studio_image[ 'url' ] ).' ) no-repeat fixed 0 0; background-size: cover;}';

		$w_studio_bg_overly = isset( $w_studio_optionValues['w-blog-category-banner-overlay-color'] ) ? esc_attr( $w_studio_optionValues['w-blog-category-banner-overlay-color'] ) : '';
		$w_studio_bg_opacity = isset( $w_studio_optionValues['w-blog-category-banner-opacity'] ) ? esc_attr( $w_studio_optionValues['w-blog-category-banner-opacity'] ) : '';
		$w_studio_bg_transition = isset( $w_studio_optionValues['w-blog-category-banner-transition'] ) ? esc_attr( $w_studio_optionValues['w-blog-category-banner-transition'] ) : '';

		list( $r , $g , $b ) = sscanf( $w_studio_bg_overly , "#%02x%02x%02x" );
		$w_studio_custom_inline_style .= '.wl-overlay {
			background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ', ' . $w_studio_bg_opacity . ' ); transition: '.$w_studio_bg_transition.'s; }';
		}
} else if( $w_studio_bg_type == 'bg-color' ) {
	$w_studio_custom_inline_style .= '.wl-overlay { background-color: inherit; }';
}
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style ); ?>

<div class="wl-blog-category-banner-bg wl-home-style3 wl-home-bg3 wl-blog-height">
    <div class="wl-overlay">
        <div class="container">
            <div class="wl-home-items">
                <div class="wl-middle-content">
					<div class="container">
						<div class="wl-home-heading">
							<h1><?php the_archive_title(); ?></h1>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>