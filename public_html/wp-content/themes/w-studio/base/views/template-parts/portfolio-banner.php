<?php

$w_studio_optionValues = get_post_meta( $post->ID, '', true );

$w_studio_custom_inline_style = '';

if( isset( $w_studio_optionValues['w-title-font-size'][0] ) ) {

    if( $w_studio_optionValues[ 'w-title-font-size' ][0] ) {

        $w_studio_custom_inline_style = '.wl-home-heading h1 { font-size: '. esc_attr( $w_studio_optionValues['w-title-font-size'][0] ).'px; }';

    }

    if( isset( $w_studio_optionValues[ 'w-page-header-bg-image' ] ) ){

        $w_studio_image = esc_attr( $w_studio_optionValues[ 'w-page-header-bg-image' ] );

    }else{

        $w_studio_image = '';

    }

}

        

if( isset( $w_studio_image ) ) {

    $imgUrl = isset( $w_studio_image[0] ) ? esc_url( $w_studio_image[0] ) : '';

    $w_studio_custom_inline_style .= '.wl-home-bg3 { background-position: 50% 16px; background: transparent url( '.$imgUrl.' ) no-repeat fixed 0 0; background-size: cover; }';

}

wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style ); ?>



<!-- Home start -->

<div class="wl-home-style3  wl-paralax wl-home-bg3">

	<div class="wl-overlay">

		<div class="container">

			<div class="wl-home-items wl-section-marginboth">

				<div class="wl-home-heading">

					<h1>

                    <?php

					if( is_archive() ) {

						the_archive_title();

					} else {

						if( isset( $w_studio_optionValues[ 'w-page-title' ][0] ) ) {

							echo esc_attr( $w_studio_optionValues[ 'w-page-title' ][0] );

						} else {

							echo esc_html__( 'W Studio Banner', 'w-studio' );

						}

					}

                    ?>

                    </h1>

				</div>

			</div>

		</div>

	</div>

</div>

<!-- Home end -->