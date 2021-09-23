<?php 

	$w_studio_optionValues = get_option( 'w_studio' );

	$w_studio_counter = 1;

	$w_studio_class = '';

	$w_studio_hoverStyle = '';

	if( isset( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) ){

		if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {

			if ( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 2) {

				$w_studio_hoverStyle = 'hover-effect-'.$w_studio_optionValues[ 'w-portfolio-hover-style' ];

			} else {

				$w_studio_hoverStyle = 'hover-effect-' . 1;

			}

			

		}

	}else{

		$w_studio_hoverStyle = 'hover-effect-' . 1;

	}

?>

<?php if( have_posts() ): ?>

<!-- Main content start -->

<div class="wl-main-content">

		<div id="template-portfolio-col-1" <?php post_class(); ?>>

		<?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>

		<div class="container wl-row4">		

			<!-- portfolio main content start -->

			<div class="wl-box-marginbottom row">

				<div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic">

					<?php 						

						while ( have_posts() ) : the_post();

						if( $w_studio_counter % 2 == 1 ) {

							$w_studio_class = 'wl-align-left';

								$w_studio_iconClass = 'bottom-icon-right';

						} else { 

							$w_studio_class = 'wl-align-right';

							$w_studio_iconClass = 'bottom-icon-left';

						} 	

						$w_studio_category = get_the_terms ( $post->ID, 'portfolio-category');

						$w_studio_terms = '';

						for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ){

							$w_studio_terms  .= $w_studio_category[$w_studio_count]->slug. ' ';

						}

						?>

					<div class="cbp-item <?php echo esc_attr($w_studio_terms); echo esc_attr($w_studio_counter); ?>">

						<div class="<?php echo esc_attr($w_studio_class); ?> wl-nomalmargin-bottom wl-relative">

							<div class="wl-style-img-big blog-overlay-hover">

								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_1170x570' );?></a>

								<div class="col-sm-4 col-xs-12 wl-overlay-black wl-overlay-absolute wl-content-withbg">

									<a class="wl-color4" href="<?php the_permalink(); ?>"><h5><?php the_title();?></h5></a>

									<p><?php

									for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ) {

										if($w_studio_count != ( count( $w_studio_category ) - 1 )) { ?>

											<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[$w_studio_count]->name). ', '; ?></a>

										<?php

										} else { ?>

											<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[$w_studio_count]->name); ?></a>

										<?php

										}

									}

									?></p>

								</div>

							</div>

							<div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">

								<div class="hover-inner">

									<a href="<?php the_permalink(); ?>"></a>

								</div>

								<div class="<?php echo esc_attr($w_studio_iconClass);?>">

									<a class="wl-color1" data-icon="0" href="<?php the_permalink(); ?>"></a>

								</div>

							</div>

						</div>

					</div>					

					<?php $w_studio_counter++; endwhile; ?>

				</div>

			</div>

			<?php

                if(!is_tax()) {

                    get_template_part( 'base/views/template-parts/load-more' );

                }

            ?>

		</div>

	</div>

</div>

<!-- Main content end -->

<?php endif; ?>