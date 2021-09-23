<?php 
	$w_studio_optionValues = get_option( 'w_studio' );
	$w_studio_project_options = isset( $w_studio_optionValues[ 'w-portfolio-single-meta-section' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-single-meta-section' ] ) : '';
	$w_studio_metaData	= get_post_meta( $post->ID, '', false ); 
	$w_studio_category_meta = get_post_meta( $post->ID, 'w-hide-portfolio-category', true );
	$w_studio_margin_top = isset( $w_studio_optionValues[ 'w-portfolio-single-banner-bottom-margin' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-single-banner-bottom-margin' ] ) : '';
	
	//enqueue inline style css
	wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
	$w_studio_custom_inline_style = '';
	if( $w_studio_project_options != '1' ) {
		$w_studio_custom_inline_style .= '.wl-margin-portfolio-top {  margin-top: '. $w_studio_margin_top .'px;}';
	}
	wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );
?>

<?php if( $w_studio_project_options == '1' ) { ?>
<div class="row wl-section-smallmargin2">
	<?php if( isset( $w_studio_metaData['w-portfolio-project-date'] ) && $w_studio_metaData['w-portfolio-project-date'][0] != '' ) { ?>
	<div class="col-sm-3">
		<h5><a href="#"><?php esc_html_e( 'Project Date', 'w-studio' ); ?></a></h5>
		<p class="wl-regular-text">
			<?php echo esc_attr( $w_studio_metaData['w-portfolio-project-date'][0] ); ?>
		</p>
	</div>
	<?php }?>
	
	<?php if( isset( $w_studio_metaData['w-portfolio-project-client'] ) && $w_studio_metaData['w-portfolio-project-client'][0] != '' ) {?>
	<div class="col-sm-3">
		<h5><a href="#"><?php esc_html_e( 'client', 'w-studio' ); ?></a></h5>
		<p class="wl-regular-text">
			<?php echo esc_attr( $w_studio_metaData['w-portfolio-project-client'][0] ); ?>
		</p>
	</div>
	<?php }?>

	<?php if( $w_studio_category_meta != 'on' ) { ?>
	<div class="col-sm-3">
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
	<div class="col-sm-3">
		<h5><a href="#"><?php esc_html_e( 'Project Link', 'w-studio' ); ?></a></h5>
		<p class="wl-regular-text">
			<a href="<?php echo esc_url( $w_studio_metaData['w-portfolio-project-link'][0] ); ?>"><?php echo esc_url( $w_studio_metaData['w-portfolio-project-link'][0] ); ?></a>
		</p>
	</div>
	<?php }?>
</div>
<?php } else { ?>
<div class="wl-margin-portfolio-top"></div>
<?php } ?>

<?php if( isset( $w_studio_metaData['w-portfolio-images'] ) ) { ?>
<!-- portfolio main content start -->
<?php $w_studio_images = unserialize( $w_studio_metaData['w-portfolio-images'][0] ); ?>
<div class="row wl-section-slider">
	<div class="col-md-12">
		<!-- carousel start -->
		<div id="owl-1" class="owl-carousel owl-theme">
			<div class="item wl-portfolio-img-big">
				<?php the_post_thumbnail( 'w_studio_image_1170x570' ); ?>
			</div>
			<?php foreach( $w_studio_images as $w_studio_image ) : ?>
			<div class="item wl-portfolio-img-big">
				<?php echo wp_get_attachment_image( $w_studio_image, 'w_studio_image_1170x570' ); ?>
			</div>
			<?php endforeach; ?>
		</div>
		<!-- carousel end -->							
	</div>
</div>

<!-- portfolio main content end -->	

<?php } ?>