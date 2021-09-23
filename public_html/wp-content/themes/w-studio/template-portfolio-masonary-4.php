<?php get_header();
/**
 * Template Name: Portfolio Masonary Four Template
 */

$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_post_number = ($w_studio_optionValues['w-portfolio-post-number'] != '') ? $w_studio_optionValues['w-portfolio-post-number'] : '10';
$w_studio_args = array( 'post_type' => 'portfolio' , 'posts_per_page' => $w_studio_post_number );
$w_studio_query = new WP_Query( $w_studio_args );

$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_hoverStyle = '';
$w_studio_hoverParentClass = '';
$w_studio_hoverBorderClass = '';
$w_studio_overflow = '';
$w_studio_imageStyle = '';
$w_studio_relative = 'wl-relative';
if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) ) {
    $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 3 ) {
        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
    }
    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 4 ) {
        $w_studio_hoverBorderClass = 'icon-border';
    }
    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 6 || esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 9 || esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 5 || esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 8 ) {
        $w_studio_hoverStyle = 'hover-effect-1';
    }
    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 7 ) {
        $w_studio_imageStyle = 'hover-effect-7';
    }
}

$w_studio_counter = 0;
if( $w_studio_query->have_posts() ) : ?>
    <section>
        <?php do_action( 'w_studio_studio_header' ); ?>
        <input type="hidden" name="fileName" value="template-portfolio-masonary-4">
        <!-- Main content start -->
        <div class="wl-main-content">
            <div id="template-portfolio-masonary-4" <?php post_class(); ?>>
                <?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>
                <div class="container wl-row4">
                    <?php get_template_part( 'base/views/template-parts/portfolio-filter' ); ?>
                    <div id="js-grid-mosaic2" class="cbp cbp-l-grid-mosaic">
                        <?php while( $w_studio_query->have_posts() ) : $w_studio_query->the_post(); ?>
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
                            $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                            $w_studio_terms = '';
                            $portfolio_category = '';
                            for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                                if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                    $portfolio_category .= esc_attr( $w_studio_category[ $w_studio_count ]->name ) . ', ';
                                } else {
                                    $portfolio_category .= esc_attr( $w_studio_category[ $w_studio_count ]->name );
                                }
                            }
                            ?>
                            <div class="cbp-item <?php echo esc_attr( $w_studio_terms ); ?> wrapper-padding">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap <?php echo esc_attr( $w_studio_hoverParentClass );
                                    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 7 ) {
                                        echo esc_attr( $w_studio_hoverStyle );
                                    } ?>">
                                        <img
                                            src="data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                            data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID , $w_studio_image_size ); ?>"
                                            alt="" width="<?php echo esc_attr( $w_studio_image_width ); ?>"
                                            height="<?php echo esc_attr( $w_studio_image_height ); ?>"/>
                                        <?php if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) != 7 ) { ?>
                                            <div class="<?php echo esc_attr( $w_studio_hoverStyle ); ?>">
                                                <div class="hover-inner">
                                                    <a data-icon="0" class="wl-color1"
                                                       href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="wl-title-mosic">
                                    <h5 class="top-zero">
                                        <a class="wl-color4" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                                    <div class="wl-regular-text">
                                        <?php
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
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php 
                    if( $w_studio_post_number != '-1') {
                        get_template_part( 'base/views/template-parts/load-more' ); 
                    } 
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
get_footer(); ?>