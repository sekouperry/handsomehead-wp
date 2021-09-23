<?php 
	//Redux global variable 
	$w_studio_optionValues = get_option( 'w_studio' );
	
	//Inline style script
	wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
	$w_studio_custom_inline_style = '';
	
	$w_studio_page_title_section = esc_attr( get_post_meta( $post->ID , 'w-hide-page-title' , true ) );
	$w_studio_page_title_alignmemt = esc_attr( get_post_meta( $post->ID, 'w-page-title-alignment', true) );
	if( $w_studio_page_title_section != 'show' ) {
		if( $w_studio_page_title_alignmemt == 'default' ) {
			$w_studio_page_title_alignmemt = isset($w_studio_optionValues['w-page-title-alignment']) ? $w_studio_optionValues['w-page-title-alignment'] : 'left';
		}
		$w_studio_custom_inline_style .= '.wl-page-title-alignment { text-align:'.$w_studio_page_title_alignmemt.';}';
	}
	
	$w_studio_title_bg = isset( $w_studio_optionValues[ 'w-page-title-background-select' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-background-select' ] ) : '';
	if( $w_studio_title_bg == 'background-image' ) {
		$w_studio_title_bg_image = isset( $w_studio_optionValues[ 'w-page-title-background-image' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-background-image' ][ 'background-image' ] ) : '';
		$w_studio_custom_inline_style .= '.wl-page-title-container { background: url('.$w_studio_title_bg_image.'); }';
		
		
		$w_studio_title_OC = isset( $w_studio_optionValues[ 'w-page-title-background-overlay-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-background-overlay-color' ] ) : '';
		$w_studio_title_Opcity = isset( $w_studio_optionValues[ 'w-page-title-background-opacity' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-background-opacity' ] ) : '';
		
		list( $r , $g , $b ) = sscanf( $w_studio_title_OC , "#%02x%02x%02x" );
		$w_studio_custom_inline_style .= '.wl-page-title-overlay { background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ', ' . $w_studio_title_Opcity . ' ); }';
	}
	
	$w_studio_page_title_height_select = isset( $w_studio_optionValues[ 'w-page-title-background-height-select' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-background-height-select' ] ) : '';
	if( $w_studio_page_title_height_select == 'custom-height' ) {
		$w_studio_page_title_height = isset( $w_studio_optionValues[ 'w-page-title-background-height' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-background-height' ] ) : '';
		$w_studio_custom_inline_style .= '.wl-page-title-container { height: '.$w_studio_page_title_height.'px}';
	}
	//add inline style script
	wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style );
?>
<div class="relative wl-page-title-container">
	<div class="absolute display-table wl-page-title-overlay">
		<div class="vertical-middle-title">
			<div class="container">
				<div class="wl-page-heading wl-page-title-alignment">
					<h1 class="wl-margintopzero wl-page-title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>