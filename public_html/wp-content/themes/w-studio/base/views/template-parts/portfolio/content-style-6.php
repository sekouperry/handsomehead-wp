<?php

	$w_studio_counter = 0;

	if( have_posts() ) : ?>

<!-- Main content start -->

<div class="wl-main-content">

		<div id="template-portfolio-masonary-2" <?php post_class(); ?>>

<?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>

	<div class="container wl-row4">

				<div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">

					

					<?php while ( have_posts() ) : the_post(); ?>

					<?php 

						$w_studio_image_width = '';

						$w_studio_image_height = '';

						$w_studio_image_size = '';

						if( $w_studio_counter == 10 ) {

							$w_studio_counter = 0;

						} 

						if( $w_studio_counter == 0 || $w_studio_counter == 7 ) {

							$w_studio_image_width = 570;

							$w_studio_image_height = 570;

							$w_studio_image_size = 'w_studio_image_570x570';

						} else {

							$w_studio_image_width = 270;

							$w_studio_image_height = 270;

							$w_studio_image_size = 'w_studio_image_270x270';

						}

						$w_studio_counter++;

						$w_studio_category = get_the_terms ( $post->ID, 'portfolio-category');

						$w_studio_terms = '';

						for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ){

							$w_studio_terms  .= $w_studio_category[$w_studio_count]->slug. ' ';

						}

					?>

					 <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?> wrapper-padding">

					<div class="cbp-caption">

						<div class="cbp-caption-defaultWrap">

							<img  data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID, $w_studio_image_size ); ?>" alt="" width="<?php echo esc_attr($w_studio_image_width); ?>" height="<?php echo esc_attr($w_studio_image_height); ?>" />

						</div>

						<div class="cbp-caption-activeWrap effect1 hover-effect-1">

							<div class="cbp-l-caption-alignCenter">

								<div class="cbp-l-caption-body">

									<div class="cbp-l-caption-title profile-links">

										<a data-icon=&#x30; href="<?php the_permalink(); ?>"></a>

										<a data-icon=&#x54; href="<?php echo get_the_post_thumbnail_url($post->ID,'large'); ?>" class="cbp-lightbox"></a>

									</div>

								</div>

							</div>

							<div class="hover-text">

								<h5 class="wl-color1 top-zero"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>

								<span class="wl-color1"><?php

									for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ) {

										if($w_studio_count != ( count( $w_studio_category ) - 1 )) { ?>

										<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ) ?>">

										<?php echo esc_attr($w_studio_category[$w_studio_count]->name). ', '; ?></a>

										<?php } else { ?>

										<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ) ?>">

										<?php echo esc_attr($w_studio_category[$w_studio_count]->name); ?></a>

										<?php } }

									?></span>

							</div>

						</div>

					</div>

				</div>	                                 

				<?php endwhile; ?>                 

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