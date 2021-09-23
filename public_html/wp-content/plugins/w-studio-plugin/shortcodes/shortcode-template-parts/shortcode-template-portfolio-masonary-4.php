<?php 

	extract( shortcode_atts( array( 'portfolio_style' => '' , 'posts_per_page' => '' , 'order' => '' , 'order_by' => '' , 'is_filter' => '' , 'is_loadmore' => '' , 'load_more_text' => '' , 'hover_style' => '' ) , $atts ) );
    global $post;
    
    $args = array( 'post_type' => 'portfolio' , 'posts_per_page' => $posts_per_page , 'taxonomy' => 'portfolio-category' , 'order' => $order , 'orderby' => $order_by );
    $query = new WP_Query( $args );

	if( $w_studio_hover_style ) {

		$w_studio_hoverStyle = 'hover-effect-'.$w_studio_hover_style;

		if( $w_studio_hover_style == 3  ) {

			$w_studio_hoverParentClass = 'hover-parent-'.$w_studio_hover_style;

			$w_studio_imageStyle = 'hover-img-'.$w_studio_hover_style;

		}

		if( $w_studio_hover_style == 4 ) {

			$w_studio_hoverBorderClass = 'icon-border';

		}

		if( $w_studio_hover_style == 6 || $w_studio_hover_style == 9 || $w_studio_hover_style == 5 || $w_studio_hover_style == 8 ) {

			$w_studio_hoverStyle = 'hover-effect-1';

		}

		if( $w_studio_hover_style == 7 ) {

			$w_studio_imageStyle = 'hover-effect-7';

		}

                if($w_studio_hover_style == 'default') {

                       $w_studio_hoverStyle = 'hover-effect-1';

	        }

	}

?>



<div class="row">

	<div id="js-grid-mosaic2" class="cbp cbp-l-grid-mosaic">						

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<?php 	

			$w_studio_image_width = '';

			$w_studio_image_height = '';

			$w_studio_image_size = '';

			if( $w_studio_counter == 9 ) {

				$w_studio_counter = 0;

			} 

			if( $w_studio_counter == 0 || $w_studio_counter == 3 || $w_studio_counter == 6 ) {

				$w_studio_image_width = 370;

				$w_studio_image_height = 570;

				$w_studio_image_size = 'w_studio_image_370x570';

				$w_studio_image_height_class = 'image-height';

			}

			if( $w_studio_counter == 1 || $w_studio_counter == 5 || $w_studio_counter == 7 ) {

				$w_studio_image_width = 370;

				$w_studio_image_height = 370;

				$w_studio_image_size = 'w_studio_image_370x370';

				$w_studio_image_height_class = 'image-height-2';

			}

			if( $w_studio_counter == 2 || $w_studio_counter == 4 || $w_studio_counter == 8 ) {

				$w_studio_image_width = 370;

				$w_studio_image_height = 270;

				$w_studio_image_size = 'w_studio_image_370x270';

				$w_studio_image_height_class = 'image-height-3';

			}

			$w_studio_counter++;

			$w_studio_category = get_the_terms ( $post->ID, 'portfolio-category');

			$w_studio_terms = '';

			$portfolio_category = '';

			for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ) {

				$w_studio_terms  .= $w_studio_category[$w_studio_count]->slug. ' ';

				if($w_studio_count != ( count( $w_studio_category ) - 1 )) {

					$portfolio_category .= $w_studio_category[$w_studio_count]->name. ', ';

				} else {

					$portfolio_category .= $w_studio_category[$w_studio_count]->name;

				}

			}

		?>

		<div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">

			<div class="cbp-caption">

				<div class="cbp-caption-defaultWrap <?php echo esc_attr($w_studio_hoverParentClass); if ( $w_studio_hover_style == 7 ) { echo esc_attr($w_studio_hoverStyle); }  ?>">

					<img  data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID, $w_studio_image_size ); ?>" alt="" width="<?php echo esc_attr($w_studio_image_width); ?>" height="<?php echo esc_attr($w_studio_image_height); ?>" />

					<?php if ( $w_studio_hover_style != 7 ) { ?>

					<div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">

						<div class="hover-inner">

							<a data-icon="0" class="wl-color1" href="#"></a>

						</div>

					</div>

					<?php } ?>			                			                    	 

				</div>		                    

			</div>

			<div class="wl-title-mosic">

				<h5 class="wl-color1 top-zero"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>

				<p class="wl-regular-text">

					<?php

					for( $w_studio_count = 0; $w_studio_count < count( $w_studio_category ); $w_studio_count++ ) {

						if($w_studio_count != ( count( $w_studio_category ) - 1 )) { ?>

							<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[$w_studio_count]->name). ', '; ?></a>

						<?php

						} else { ?>

							<a href="<?php echo get_term_link( $w_studio_category[$w_studio_count]->term_id, 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[$w_studio_count]->name); ?></a>

						<?php

						}

					}

					?>

				</p>

			</div>

		</div>

		

	<?php endwhile;

        wp_reset_postdata();

        ?>



	</div>

</div>











