<?php get_header();
/**
 * Template Name: Portfolio Column One Template
 */
?>
<?php
$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_post_number = ($w_studio_optionValues['w-portfolio-post-number'] != '') ? $w_studio_optionValues['w-portfolio-post-number'] : '10';
$w_studio_args = array( 'post_type' => 'portfolio' , 'posts_per_page' => $w_studio_post_number , 'taxonomy' => 'portfolio-category' );
$w_studio_query = new WP_Query( $w_studio_args );
$w_studio_counter = 1;
$w_studio_class = '';
$w_studio_hoverStyle = '';
if( esc_attr( isset( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) ) ) {
    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) ) {
        if( esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) == 2 ) {
            $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
        } else {
            $w_studio_hoverStyle = 'hover-effect-' . 1;
        }
    }
} else {
    $w_studio_hoverStyle = 'hover-effect-' . 1;
}
if( $w_studio_query->have_posts() ) : ?>
    <section>
        <?php do_action( 'w_studio_studio_header' ); ?>
        <input type="hidden" name="fileName" value="template-portfolio-col-1">
        <!-- Main content start -->
        <div class="wl-main-content">
            <div id="template-portfolio-col-1" <?php post_class(); ?>>
                <?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>
                <div class="container wl-row4">
                    <?php get_template_part( 'base/views/template-parts/portfolio-filter' ); ?>
                    <!-- portfolio main content start -->
                    <div class="wl-box-marginbottom row">
                        <div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic">
                            <?php
                            while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                                if( $w_studio_counter % 2 == 1 ) {
                                    $w_studio_class = 'wl-align-left';
                                    $w_studio_iconClass = 'bottom-icon-right';
                                    $icon_code = '&#x2e;';
                                } else {
                                    $w_studio_class = 'wl-align-right';
                                    $w_studio_iconClass = 'bottom-icon-left';
                                    $icon_code = '&#x2d;';
                                }
                                $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                                $w_studio_terms = '';
                                for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                    $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                                }
                                ?>
                                <div class="cbp-item <?php echo esc_attr( $w_studio_terms );
                                echo esc_attr( $w_studio_counter ); ?>">
                                    <div class="<?php echo esc_attr( $w_studio_class ); ?> wl-nomalmargin-bottom wl-relative">
                                        <div class="wl-style-img-big blog-overlay-hover">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_1170x570' ); ?></a>
                                            <div
                                                class="col-sm-4 col-xs-12 wl-overlay-black wl-overlay-absolute wl-content-withbg">
                                                <a class="wl-color4" href="<?php the_permalink(); ?>">
                                                    <h5><?php the_title(); ?></h5></a>
                                                <div><?php
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
                                                    ?></div>
                                            </div>
                                        </div>
                                        <div class="<?php echo esc_attr( $w_studio_hoverStyle ); ?>">
                                            <div class="hover-inner">
                                                <a href="<?php the_permalink(); ?>"></a>
                                            </div>
                                            <div class="<?php echo esc_attr( $w_studio_iconClass ); ?>">
                                                <a class="wl-color1" data-icon="<?php echo esc_attr($icon_code); ?>" href="<?php the_permalink(); ?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $w_studio_counter++;
                            endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php 
                    if( $w_studio_post_number != '-1') {
                        get_template_part( 'base/views/template-parts/load-more' ); 
                    } 
                    ?>
                </div>
            </div>
        </div>
        <!-- Main content end -->
    </section>
<?php
endif;
get_footer();?>