<?php

function w_studio_team_excerpt($limit) {
$excerpt = explode(' ', get_the_content(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

	$w_studio_optionValues = get_option( 'w_studio' );

	$w_studio_hoverStyle = '';

	$w_studio_hoverParentClass = '';

	$w_studio_hoverBorderClass = '';

	$w_studio_overflow = '';

	$w_studio_imageStyle = '';

	$w_studio_relative = 'wl-relative';

	if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {

		$w_studio_hoverStyle = 'hover-effect-'.esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );

		if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {

			$w_studio_hoverParentClass = 'hover-parent-'.esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );

			$w_studio_imageStyle = 'hover-img-'.esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );

		}

		if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 4 ) {

			$w_studio_hoverBorderClass = 'icon-border';

		}

		if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 ) {

			$w_studio_hoverStyle = 'hover-effect-1';

		}

		if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 ) {

			$w_studio_imageStyle = 'hover-effect-7';

		}

		if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {

			$w_studio_relative = '';

		}

	}

	if( have_posts() ) : ?>

<!-- Main content start -->

<div class="wl-main-content">

		<div id="template-portfolio-style-3" <?php post_class(); ?>>

<?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>

	<div class="container wl-row4">

		<!-- portfolio main content start -->

		<div class="row">

			<div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic wl-cbp-no-padding">

				<?php 

					while ( have_posts() ) : the_post(); 

					$w_studio_category = get_the_terms ( $post->ID, 'portfolio-category');

					$w_studio_terms = '';

					for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ){

						$w_studio_terms  .= $w_studio_category[$w_studio_count]->slug. ' ';

					}

				?>

				<div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">

					<div class="wl-nomalmargin-bottom blog-sidebar-col-2">

						<div class="col-md-4 col-xs-12 wl-sibling-hover-1">

							<div class="wl-height1 wl-full-width style-6-left">

								<div class="style-6-left-text">

									<a href="<?php the_permalink(); ?>"><h5><?php the_title();?></h5></a>

									<div class="wl-regular-text">

									<?php

									for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ) {

										if($w_studio_count != ( count( $w_studio_category ) - 1 )) { ?>

										<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ); ?>">

										<?php echo esc_attr($w_studio_category[$w_studio_count]->name). ', '; ?></a>

										<?php } else { ?>

										<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ); ?>">

										<?php echo esc_attr($w_studio_category[$w_studio_count]->name); ?></a>

										<?php } }

									?>

									</div>

								</div>

								<div class="style-6-left-icon hidden-xs hidden-sm">

									<a href="<?php the_permalink(); ?>" data-icon=&#x24;></a>

								</div>

							</div>

						</div>

						<div class="col-md-3 col-xs-12 wl-sibling-hover-1 wl-height1 wl-relative">
                            <div class="wl-absolute wl-div-table">
								<div class="wl-middle-content wl-text-left">
									<?php echo w_studio_team_excerpt(30); ?>
								</div>
                            </div>
                        </div>					

						<div class="col-md-5 col-xs-12 wl-sibling-hover-2">

							<div class="<?php echo esc_attr($w_studio_relative).' '.esc_attr($w_studio_hoverParentClass).' '.esc_attr($w_studio_overflow); ?> wl-inline-block">

							<?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>

							<div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height">

								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_470x570' );?></a>

							</div>

							<?php } else { ?>

							<div class="image-height">

								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_470x570' );?></a>

							</div>

							<?php } if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>

							<div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">

								<?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) { ?>

									<div class="hover-text">

										<h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>

										<span class="wl-color1">

											<?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>

										</span>

									</div>

									<div class="hover-inner">

										<a href="<?php the_permalink(); ?>" class="wl-color1" data-icon=&#x30;></a>

									</div>									

								<?php } else { ?>

									<div class="hover-inner">

										<?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 ) { ?>

										<h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>

										<span class="wl-color1">

											<?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>

										</span>

										<?php } else if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>

											<div class="hover-text">

												<h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>

												<span class="wl-color1">

													<?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>

												</span>

											</div>

											<div class="hover-icon">

												<a data-icon=&#x30; class="pull-right wl-color1" href="#"></a>

											</div>

										<?php } else { ?>

											<a href="<?php the_permalink(); ?>" class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>" data-icon=&#x30;></a>

										<?php } ?>

									</div>

								<?php } ?>

							</div>

							<?php } ?>

						</div>

						</div>

					</div>

				</div>

				<?php endwhile; ?>

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

<?php endif; ?>