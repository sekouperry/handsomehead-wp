<?php
get_header();
$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_custom_inline_style = '';
if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 2 ) {
    $w_studio_custom_inline_style .= '.wl-blog-sidebar { padding-left: 0; padding-right: 60px; }';
}
wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style );
?>
<?php 
if( isset($w_studio_optionValues['w-blog-banner-on-off'] ) && $w_studio_optionValues['w-blog-banner-on-off'] == '1' ) {
    get_template_part( 'base/views/template-parts/blog-banner' ); 
}
?>
    <div class="wl-main-content post <?php echo (!esc_attr($w_studio_optionValues[ 'w-blog-filter'])) ? 'wl-section-margintop4' : ''; ?> <?php echo ( isset($w_studio_optionValues['w-blog-banner-on-off'] ) && $w_studio_optionValues['w-blog-banner-on-off'] == '1' ) ? '' : 'wl-margin-top90'; ?>">
        <div class="container">
            <?php
            if( esc_attr( $w_studio_optionValues[ 'w-blog-filter' ] ) && esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 1 ) {
                get_template_part( 'base/views/template-parts/blog-filter' );
            } 
            if ( ! class_exists( 'Redux' ) && !isset($w_studio_optionValues[ 'w-blog-filter' ]) ) {
				get_template_part( 'base/views/template-parts/blog-filter' );
			}
            if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) ) {
                $w_studio_style = '-style-' . esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] );
            } else {
                $w_studio_style = '-style-1';
            }
            if( isset( $post ) ) {
                if( get_post_format( $post->ID ) ) {
                    $w_studio_format = get_post_format( $post->ID ) . $w_studio_style;
                } else {
                    $w_studio_format = 'standard' . $w_studio_style;
                }
            }

            if( esc_attr( isset( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) ) ) {
                if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 1 ) {
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) != 3 ) {
                        ?>
                        <div>
                            <div class="wl-nomalmargin-bottom <?php
                            if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) == 2 ) {
                                echo 'column-2';
                            }
                            ?>" id="blogpostload">
                                <?php
                                while( have_posts() ) : the_post();
                                    get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                                endwhile; ?>
                            </div>
                        </div>
                    <?php
                    } else {
                        get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                    }
                    get_template_part( 'base/views/template-parts/pagination' );
                } else {
                    echo '<div class="row">';
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 2 ) {
                        get_sidebar();
                    }
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) != 3 ) {
                        ?>
                        <div
                            class="wl-nomalmargin-bottom col-md-8 <?php if( !esc_attr( $w_studio_optionValues[ 'w-blog-filter' ] ) ) {
                                echo 'wl-section-margintop';
                            }
                            if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) == 2 ) {
                                echo 'column-2';
                            }
                            ?>">
                            <?php
                            if( esc_attr( $w_studio_optionValues[ 'w-blog-filter' ] ) && esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) != 1 ) {
                                get_template_part( 'base/views/template-parts/blog-filter' );
                            } ?>
                            <?php
                            while( have_posts() ) : the_post();
                                get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                            endwhile;
                            ?>
                            <div id="blogpostload"></div>
                            <?php get_template_part( 'base/views/template-parts/pagination' ); ?>
                        </div>
                    <?php
                    } else {
                        ?>
                        <div class="col-md-8 <?php if( !esc_attr( $w_studio_optionValues[ 'w-blog-filter' ] ) ) {
                            echo 'wl-section-margintop';
                        } ?>">
                            <!-- Main content start -->
                            <div class="wl-main-content">
                                <?php
                                if( esc_attr( $w_studio_optionValues[ 'w-blog-filter' ] ) && esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) != 1 ) {
                                    get_template_part( 'base/views/template-parts/blog-filter' );
                                }
                                get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                                ?>
                                <?php get_template_part( 'base/views/template-parts/pagination' ); ?>
                            </div>
                        </div>
                    <?php
                    }
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 3 ) {
                        get_sidebar();
                    }
                    echo '</div>';
                }
            } else {
                if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) != 3 ) {
                    ?>
                    <div>
                        <div class="wl-nomalmargin-bottom <?php
                        if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) == 2 ) {
                            echo 'column-2';
                        }
                        ?>" id="blogpostload">
                            <?php
                            while( have_posts() ) : the_post();
                                get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                            endwhile; ?>
                        </div>
                    </div>
                <?php
                } else {
                    get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                }                
            }
			
			if ( ! class_exists( 'Redux' ) && !isset($w_studio_optionValues['w-blog-pagination']) ) {
						the_posts_pagination( array(

						'prev_text'          => esc_html__( 'Previous', 'w-studio' ),

						'next_text'          => esc_html__( 'Next', 'w-studio' ),

						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( '', 'w-studio' ) . ' </span>',

				) );
			}
            ?>
        </div>
    </div>
<?php get_footer(); ?>