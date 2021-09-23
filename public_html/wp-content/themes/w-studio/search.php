<?php get_header(); ?>

    <section class="wl-search-item-head">
        <?php $w_studio_optionValues = get_option( 'w_studio' );
        $w_studio_custom_inline_style = '';
        $w_studio_image['url'] = '';
        if( isset ( $w_studio_optionValues[ 'w-blog-archive-font-size' ] ) ) {
            $w_studio_custom_inline_style .= '.wl-home-heading h1 { font-size:'.esc_attr( $w_studio_optionValues['w-blog-archive-font-size'] ).'px;}';
        }
        if( isset ( $w_studio_optionValues[ 'w-blog-archive-banner-image' ] ) && !empty( $w_studio_optionValues[ 'w-blog-archive-banner-image' ]['url'] ) ){
            $w_studio_image =  $w_studio_optionValues[ 'w-blog-archive-banner-image' ];
        }
        if( $w_studio_image[ 'url' ] ) {
            $w_studio_custom_inline_style .= '.wl-home-bg3 { background-position: 50% 16px; background: transparent
             url( '. esc_url( $w_studio_image[ 'url' ] ).' ) no-repeat fixed 0 0; background-size: cover;}';
        }
        wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style ); ?>

        <div class="wl-home-style3 wl-paralax wl-home-bg3">
            <div class="wl-overlay">
                <div class="container">
                    <div class="wl-home-items wl-search-item wl-section-marginboth">
                        <div class="wl-home-heading">
                            <h1>
                            <?php printf( esc_html__( 'Search Results for: %s' , 'w-studio' ) , '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">

                <?php $w_studio_count = $wp_query->found_posts; ?>

                    <!-- Main content start -->

                    <div class="wl-main-content wl-search-margin">

                        <?php if( have_posts() ) { ?>

                            <?php while( have_posts() ) : the_post(); ?>

                                <div class="row blog-sidebar-col-2">

                                    <div class="col-sm-12">

                                        <h4 class="text-uppercase wl-color4">

                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                        </h4>
                                        <?php $w_studio_archive_year  = get_the_time('Y');
                                        $w_studio_archive_month = get_the_time('m');
                                        $w_studio_archive_day   = get_the_time('d'); ?>

                                        <p>
                                            <?php echo the_time('F j, Y'); ?>
                                        </p>

                                    </div>

                                </div>
                                <hr/>

                            <?php endwhile;

                            the_posts_pagination( array( 'prev_text' => esc_html__( 'Previous' , 'w-studio' ) , 'next_text' => esc_html__( 'Next' , 'w-studio' ) , 'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( '' , 'w-studio' ) . ' </span>' , ) );

                            ?>

                            <?php get_template_part( 'template-parts/content/loadmore' ); ?>

                        <?php } else { ?>
                            <div class="wl-no-result text-center wl-full-width">
                                <p>
                                <?php printf( esc_html__( 'No Search Result Found for: %s' , 'w-studio' ) , '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
                                </p>
                                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <label>   
                                        <input type="search" class="search-field wl-standard-marginbottom" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'w-studio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'w-studio' ); ?>" />
                                    </label>   
                                </form>
                            </div>
                        <?php } ?>

                    </div>

                    <!-- Main content end -->

                <?php get_template_part( 'template-parts/content/blog-sidebar' ); ?>

            </div>

        </div>

    </section>

<?php get_footer(); ?>