<?php

	$w_studio_optionValues = get_option( 'w_studio' );
	$w_studio_project_options = isset( $w_studio_optionValues[ 'w-portfolio-single-meta-section' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-single-meta-section' ] ) : '';
	$w_studio_social_media = isset( $w_studio_optionValues[ 'w-portfolio-single-social-media' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-single-social-media' ] ) : '';
	$w_studio_category_meta = get_post_meta( $post->ID, 'w-hide-portfolio-category', true );
    
	// Header type not default
    if( $w_studio_optionValues[ 'w-portfolio-banner-style' ] == '1' ) {
        // Get background color
        $w_studio_bgColor    = isset( $w_studio_optionValues[ 'w-portfolio-banner-bg-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-bg-color' ] ) : '';
    } else if( $w_studio_optionValues[ 'w-portfolio-banner-style' ] == '2' || $w_studio_optionValues[ 'w-portfolio-banner-style' ] == '3' ) {
        // Get header bg image url
        $w_studio_bgImgUrl   = isset( $w_studio_optionValues[ 'w-portfolio-banner-img' ] ) ? $w_studio_optionValues[ 'w-portfolio-banner-img' ] : '';
        // Get overlay color
        $w_studio_bgOverlayColor = isset( $w_studio_optionValues[ 'w-portfolio-banner-overlay-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-overlay-color' ] ) : '';
        // Get Opacity
        $w_studio_bgOpacity      = isset( $w_studio_optionValues[ 'w-portfolio-banner-opacity' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-opacity' ] ) : '';
        if( $w_studio_optionValues[ 'w-portfolio-banner-style' ] == '2' ){
            // Get parallax transition speed
            $w_studio_bgTransition   = esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-transition' ] );
        }
    }   

if( isset( $w_studio_bgImgUrl ) ) {
		list($r, $g, $b) = sscanf($w_studio_bgOpacity, "#%02x%02x%02x");
		$w_studio_custom_inline_style = '.wl-overlay {
			background-color: rgba( '.$r.', '.$g.', '.$b.', '.$w_studio_bgOpacity.' ) !important;
		}';
		$imgUrl = isset( $w_studio_bgImgUrl['url'] ) ? esc_url( $w_studio_bgImgUrl['url'] ) : '';
		$w_studio_custom_inline_style .= '.wl-cover-bg3 {
			background: url( '.$imgUrl.' ) no-repeat fixed 0 0;
			background-size : cover;
		}';
    } else {
    $w_studio_custom_inline_style = '.wl-overlay {
        background-color: '.$w_studio_bgColor.';
    }';
}
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

$w_studio_metaData	= get_post_meta( $post->ID, '', false );  ?>

<div class="wl-portfolio-margin-top80">
<div class="wl-joint-sections">
	<div class="wl-bgcolor4 wl-width-fix">
		<div class="col-md-6 right-sm">
			<div class="wl-cover-bg3 wl-margin-left-15">
				<div class="wl-overlay wl-portfolio-title wl-content-withbg pull-left wl-social-padding0">
					<div class="wl-section-heading wl-heading-incover">
						<h1 class="wl-color1"><?php the_title(); ?></h1>
					</div>
					<?php the_content(); ?>
					<?php 
						if( $w_studio_social_media == '1' ) {
							get_template_part( 'base/views/template-parts/share' ); 
						}
					?>
				</div>
			</div>
		</div>

		<div class="xs-clearfix"></div>
		
		<?php if( $w_studio_project_options == '1' ) { ?>
		<div class="col-md-6 wl-section-smallmargintop">
			<div class="row wl-section-marginboth">
				<?php if( isset( $w_studio_metaData['w-portfolio-project-date'] ) && $w_studio_metaData['w-portfolio-project-date'][0] != '' ) {?>
				<div class="col-sm-6 text-center">
					<h5><a href="#"><?php esc_html_e( 'Project Date', 'w-studio' ); ?></a></h5>
					<p class="wl-regular-text">
						<?php echo esc_attr( $w_studio_metaData['w-portfolio-project-date'][0] ); ?>
					</p>
				</div>
				<?php }?>
				
				<?php if( isset( $w_studio_metaData['w-portfolio-project-client'] ) && $w_studio_metaData['w-portfolio-project-client'][0] != '' ) {?>
				<div class="col-sm-6 text-center">
					<h5><a href="#"><?php esc_html_e( 'client', 'w-studio' ); ?></a></h5>
					<p class="wl-regular-text">
						<?php echo esc_attr( $w_studio_metaData['w-portfolio-project-client'][0] ); ?>
					</p>
				</div>
				<?php } ?>
			</div>

			<div class="row wl-section-marginboth xs-load-nutral">
				<?php if( $w_studio_category_meta != 'on' ) { ?>
				<div class="col-sm-6 text-center">
					<h5><a href="#"><?php esc_html_e( 'Category', 'w-studio' ); ?></a></h5>
					<p class="wl-regular-text">
						<?php
						$w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
			            $w_studio_terms = '';
			            for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
			                $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
			            }
						if( $w_studio_terms ) {
							for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
			                    if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
			                        ?>
			                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>"><?php echo esc_attr( $w_studio_category[ $w_studio_count ]->name ) . ', '; ?></a>
			                    <?php
			                    } else {
			                        ?>
			                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>"><?php echo esc_attr( $w_studio_category[ $w_studio_count ]->name ); ?></a>
			                    <?php
			                    }
			                }
						} ?>
					</p>
				</div>
				<?php } ?>
				
				<?php if( isset( $w_studio_metaData['w-portfolio-project-link'] ) && $w_studio_metaData['w-portfolio-project-link'][0] != '' ){ ?>
				<div class="col-sm-6 text-center">
					<h5><a href="#"><?php esc_html_e( 'Project Link', 'w-studio' ); ?></a></h5>
					<p class="wl-regular-text">
						<a href="<?php echo esc_url( $w_studio_metaData['w-portfolio-project-link'][0] ); ?>" target="_blank"><?php echo esc_url( $w_studio_metaData['w-portfolio-project-link'][0] ); ?></a>
					</p>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>

</div>

<div class="row">
	<div class="col-md-12">
		<div class="wl-relative wl-overflow hover-scale-1">
			<a href="<?php get_the_post_thumbnail( 'w_studio_image_1170x570' ); ?>"><?php the_post_thumbnail( 'w_studio_image_1170x570' ); ?></a>
			<div class="hover-effect-1">
				<div class="hover-inner">
					<a data-icon=&#x54; href="<?php if( has_post_thumbnail() ) {
							the_post_thumbnail_url();
						} else {
							echo '#';
						}; ?>" class="cbp-lightbox wl-color1 font-no-scale"></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if( isset( $w_studio_metaData['w-portfolio-images'] ) ) { ?>
<!-- portfolio main content start -->
<?php $w_studio_images = unserialize( $w_studio_metaData['w-portfolio-images'][0] ); ?>
<div class="row">
	<div id="js-grid-mosaic2" class="wl-item-width cbp cbp-l-grid-mosaic wl-mosic2-col">
		<?php $w_studio_counts = 0; foreach( $w_studio_images as $w_studio_image ) : ?>
		<div class="cbp-item <?php if( $w_studio_counts == 1 || $w_studio_counts == 2 ) { echo 'wl-mosic2-lg'; } ?>">
			<div class="cbp-caption">
				<div class="cbp-caption-defaultWrap">
					<?php 					

							$w_studio_image_width  = '';

							if( $w_studio_counts == 0 ) {

								$w_studio_image_size = 'w_studio_image_400x470';

								$w_studio_image_width = 400;							}

							if( $w_studio_counts == 1 ) {

								$w_studio_image_size = 'w_studio_image_770x470';

								$w_studio_image_width = 770;

							}	

							if( $w_studio_counts == 2 ) {

								$w_studio_image_size = 'w_studio_image_770x470';

								$w_studio_image_width = 770;

							}	

							if( $w_studio_counts == 3 ) {

								$w_studio_image_size = 'w_studio_image_400x470';

								$w_studio_image_width = 400;

							}						

							$url = wp_get_attachment_image_src( $w_studio_image, $w_studio_image_size );

							?>

						<img src="data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" data-cbp-src="<?php echo esc_url( $url[0] ); ?>" width="<?php echo esc_attr($w_studio_image_width); ?>" height="470"  alt="" />

						<?php	

							$w_studio_counts++;

							if( $w_studio_counts == 4 ) {

								$w_studio_counts = 0;

							}

						?>

				</div>

				<div class="cbp-caption-activeWrap effect1">

					<div class="cbp-l-caption-alignCenter">

						<div class="cbp-l-caption-body">

							<div class="cbp-l-caption-title profile-links">

								<?php $fancy = wp_get_attachment_image_src( $w_studio_image, 'full' ); ?>

								<a data-icon=&#x54; href="<?php echo esc_url( $fancy[0] ); ?>" class="cbp-lightbox"></a>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php endforeach; ?>  

	</div>

</div>
</div>

<!-- portfolio main content end -->	

<?php } ?>