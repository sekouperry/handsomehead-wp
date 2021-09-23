<?php get_header();
/**
 * Template Name: Portfolio Masonary One Template
 */

$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_post_number = ($w_studio_optionValues['w-portfolio-post-number'] != '') ? $w_studio_optionValues['w-portfolio-post-number'] : '10';
$w_studio_args = array( 'post_type' => 'portfolio' , 'posts_per_page' => $w_studio_post_number , );
$w_studio_query = new WP_Query( $w_studio_args );
$w_studio_counter = 0;
if( $w_studio_query->have_posts() ) : ?>
    <section>
        <?php do_action( 'w_studio_studio_header' ); ?>
        <input type="hidden" name="fileName" value="template-portfolio-masonary-1">
        <!-- Main content start -->
        <div class="wl-main-content">
            <div id="template-portfolio-masonary-1" <?php post_class(); ?>>
                <?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>
                <div class="container wl-row4">
                    <?php get_template_part( 'base/views/template-parts/portfolio-filter' ); ?>
                    <div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">
                        <?php while( $w_studio_query->have_posts() ) : $w_studio_query->the_post(); ?>
                            <?php
                            $w_studio_image_width = '';
                            $w_studio_image_height = '';
                            $w_studio_image_size = '';
                            if( $w_studio_counter == 10 ) {
                                $w_studio_counter = 0;
                            }
                            if( $w_studio_counter == 0 || $w_studio_counter == 8 ) {
                                $w_studio_image_width = 570;
                                $w_studio_image_height = 570;
                                $w_studio_image_size = 'w_studio_image_570x570';
                            }
                            if( $w_studio_counter == 1 || $w_studio_counter == 3 || $w_studio_counter == 5 || $w_studio_counter == 7 ) {
                                $w_studio_image_width = 270;
                                $w_studio_image_height = 570;
                                $w_studio_image_size = 'w_studio_image_270x570';
                            }
                            if( $w_studio_counter == 2 || $w_studio_counter == 4 || $w_studio_counter == 6 || $w_studio_counter == 9 ) {
                                $w_studio_image_width = 270;
                                $w_studio_image_height = 270;
                                $w_studio_image_size = 'w_studio_image_270x270';
                            }
                            $w_studio_counter++;
                            $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                            $w_studio_terms = '';
                            for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                $w_studio_terms .= esc_attr( $w_studio_category[ $w_studio_count ]->slug ) . ' ';
                            }
                            ?>
                            <div class="cbp-item <?php echo esc_attr( $w_studio_terms ); ?> wrapper-padding">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img
                                            src="data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                            data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID , $w_studio_image_size ); ?>"
                                            alt="" width="<?php echo esc_attr( $w_studio_image_width ); ?>"
                                            height="<?php echo esc_attr( $w_studio_image_height ); ?>"/>
                                    </div>
                                    <div class="cbp-caption-activeWrap hover-effect-1">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title profile-links">
                                                    <a data-icon=&#x30; href="<?php the_permalink(); ?>"></a>
                                                    <a data-icon=&#x54;
                                                       href="<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>"
                                                       class="cbp-lightbox"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hover-text">
                                            <h5 class="wl-color1 top-zero"><a
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	                                <div class="wl-color1"><?php
                                        for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                            if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>">
                                                    <?php echo esc_attr( $w_studio_category[ $w_studio_count ]->name ) . ', '; ?></a>
                                            <?php } else { ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>">
                                                    <?php echo esc_attr( $w_studio_category[ $w_studio_count ]->name ); ?></a>
                                            <?php
                                            }
                                        }
                                        ?></div>
                                        </div>
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