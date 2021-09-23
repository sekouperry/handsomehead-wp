<?php 
	$w_studio_optionValues = get_option( 'w_studio' );
	$w_studio_social_media = isset( $w_studio_optionValues[ 'w-portfolio-single-social-media' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-single-social-media' ] ) : '';
?>

<?php if( isset( $w_studio_optionValues[ 'w-portfolio-single-title-font-size' ][ 'font-size' ] ) ) {
    $w_studio_custom_inline_style = 'h1 {font-size: '.esc_attr( $w_studio_optionValues[
    'w-portfolio-single-title-font-size' ][ 'font-size' ] ).' px;}';
}

if( isset( $w_studio_optionValues[ 'w-portfolio-single-title-font-size' ][ 'font-size' ] ) ) {
    $w_studio_custom_inline_style .= '.wl-home-items p  {
		font-size: '.esc_attr( $w_studio_optionValues[ 'w-portfolio-single-content-font-size' ][ 'font-size' ] ).'px;
	}';
}

if( $w_studio_social_media != '1' ) {
	$w_studio_custom_inline_style .= '.wl-home-items h1.margin-top-0 { margin-top: 0; line-height: 45px; }';
}
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style ); ?>

<!-- Home start -->
<div class="wl-home-style2  wl-paralax wl-home-bg3 wl-relative">
	<div class="wl-overlay">
		<div class="container wl-home-items wl-regular-text">
			 <div class="wl-middle-content text-center">
				<div class="container">
					<h1 class="margin-top-0"><?php the_title(); ?></h1>
					<?php the_content();
					// Call Share Div
					if( $w_studio_social_media == '1' ) {
						get_template_part( 'base/views/template-parts/share' ); 
					} ?>
				</div>
			</div>
		</div>		
	</div>
</div>
<!-- Home end -->