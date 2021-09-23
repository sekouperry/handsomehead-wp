<?php
get_header();
$w_studio_optionValues = get_option( 'w_studio' );
// Header type not default
if( esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-style' ] ) == '1' ) {
    // Get background color
    $w_studio_bgColor = isset( $w_studio_optionValues[ 'w-portfolio-banner-bg-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-bg-color' ] ) : '';

} else if( esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-style' ] ) == '2' || esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-style' ] ) == '3' ) {
    // Get header bg image url
    $w_studio_bgImgUrl = isset( $w_studio_optionValues[ 'w-portfolio-banner-img' ] ) ? $w_studio_optionValues[ 'w-portfolio-banner-img' ] : '';

    // Get overlay color
    $w_studio_bgOverlayColor = isset( $w_studio_optionValues[ 'w-portfolio-banner-overlay-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-overlay-color' ] ) : '';

    // Get Opacity
    $w_studio_bgOpacity = isset( $w_studio_optionValues[ 'w-portfolio-banner-opacity' ] ) ? esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-opacity' ] ) : '';

    if( esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-style' ] ) == '2' ) {
        // Get parallax transition speed
        $w_studio_bgTransition = esc_attr( $w_studio_optionValues[ 'w-portfolio-banner-transition' ] );
    }
}
if( isset( $w_studio_bgImgUrl ) ) {
    $imgUrl = isset( $w_studio_bgImgUrl[ 'url' ] ) ? esc_url( $w_studio_bgImgUrl[ 'url' ] ) : '';
    list( $r , $g , $b ) = sscanf( $w_studio_bgOverlayColor , "#%02x%02x%02x" );
    $w_studio_custom_inline_style = '.wl-overlay { background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ',' . $w_studio_bgOpacity . ' ); }';
    $w_studio_custom_inline_style .= '.wl-home-bg3 { background: url( ' . $imgUrl . ' ) no-repeat fixed 0 0;background-size : cover; }';
} else {
    $w_studio_custom_inline_style = '.wl-overlay{ background-color: if( isset( $bgcolor ) ){ ' . $w_studio_bgColor . '; }';
}
wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style ); ?>
    <section>
        <?php
        $w_studio_portfolioStyle = esc_attr( get_post_meta( $post->ID , 'w-single-portfolio-style' , true ) );

        if( isset( $w_studio_portfolioStyle ) && !empty( $w_studio_portfolioStyle ) ) {
            // This will override theme options selection
        } else {
            // Loading theme options selection
            $w_studio_portfolioStyle = esc_attr( $w_studio_optionValues[ 'w-portfolio-single-layout' ] );
        }
        if( isset( $w_studio_portfolioStyle ) ) {
            if( $w_studio_portfolioStyle == 1 || $w_studio_portfolioStyle == 2 || $w_studio_portfolioStyle == 5 ) {
                while( have_posts() ) : the_post();
                    get_template_part( 'base/views/template-parts/portfolio-single/banner-content' );
                endwhile;
            }
        } else {
            while( have_posts() ) : the_post();
                get_template_part( 'base/views/template-parts/portfolio-single/banner-content' );
            endwhile;
            $w_studio_portfolioStyle = 1;
        }
        ?>
        <div class="row wl-main-content">
            <?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>
            <div class="container wl-adjustmargin-bottom">
                <?php
                while( have_posts() ) : the_post();

                    if(isset($w_studio_optionValues['w-portfolio-next-prev-position']) && $w_studio_optionValues['w-portfolio-next-prev-position'] == 'top') {
                        // Previous/next post navigation.
                        the_post_navigation( array( 'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Next' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x24;"></span>' , 'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x23;"></span>' . '<span class="screen-reader-text">' . esc_html__( 'Previous' , 'w-studio' ) . '</span> ' ,

                        ) );
                    }

                    get_template_part( 'base/views/template-parts/portfolio-single/content-portfolio-style-' . $w_studio_portfolioStyle );

                    if(isset($w_studio_optionValues['w-portfolio-next-prev-position']) && $w_studio_optionValues['w-portfolio-next-prev-position'] != 'top' || !isset($w_studio_optionValues['w-portfolio-next-prev-position'])) {
                        // Previous/next post navigation.
                        the_post_navigation( array( 'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Next' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x24;"></span>' , 'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x23;"></span>' . '<span class="screen-reader-text">' . esc_html__( 'Previous' , 'w-studio' ) . '</span> ' ,

                        ) );
                    }
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php get_footer();