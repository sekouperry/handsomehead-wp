<?php

add_action( 'wp_ajax_nopriv_w_studio_ajaxloader' , 'w_studio_ajaxloader' );
add_action( 'wp_ajax_w_studio_ajaxloader' , 'w_studio_ajaxloader' );

/**
 * Ajax Loader Call Back Function
 * Responses To Ajax Requests
 *
 */
function w_studio_ajaxloader() {
    global $wpdb;

    $w_studio_postType = esc_attr( $_POST[ 'postType' ] );
    $w_studio_pagedNumber = esc_attr( $_POST[ 'pagedNumber' ] );
    $w_studio_limit_post = esc_attr( $_POST[ 'limit' ] );
    $w_studio_team_style = esc_attr( $_POST[ 'team_style' ] );
    $w_studio_meta = esc_attr( $_POST[ 'meta' ] );
    $w_studio_meta_info = esc_attr( $_POST[ 'meta_info' ] );
    $w_studio_social_icon = esc_attr( $_POST[ 'social_icon' ] );
    $w_studio_random = esc_attr( $_POST[ 'random' ] );
    $w_studio_icon = esc_attr( $_POST[ 'icon' ] );

    if( isset( $_POST[ 'style' ] ) ) {
        $w_studio_blog_style = esc_attr( $_POST[ 'style' ] );
    } else {
        $w_studio_blog_style = '';
    }

    $w_studio_args = array( 'post_type' => $w_studio_postType , 'posts_per_page' => $w_studio_limit_post , 'paged' => $w_studio_pagedNumber );

    $w_studio_post_item = new WP_Query( $w_studio_args );

    if( $w_studio_postType == 'post' ) {
        w_studio_load_blog_content( $w_studio_post_item , $w_studio_postType , $w_studio_blog_style , $w_studio_meta , $w_studio_meta_info , $w_studio_social_icon );
    }

    if( $w_studio_postType == 'team' ) {
        if( $w_studio_team_style == '' ) {
            $w_studio_team_style = 'style-1';
        }
        w_studio_load_team_content( $w_studio_post_item , $w_studio_team_style , $w_studio_pagedNumber , $w_studio_limit_post );
    }

    if($w_studio_postType == 'album') {

        w_studio_load_album( $w_studio_post_item, $w_studio_album_style , $w_studio_pagedNumber , $w_studio_limit_post, $w_studio_random, $w_studio_icon );
    }

    wp_reset_postdata();

    wp_die();
}

function w_studio_load_album($w_studio_post_item, $w_studio_album_style , $w_studio_pagedNumber , $w_studio_limit_post, $w_studio_random, $w_studio_icon ) {

    if($w_studio_album_style == 'column-2' ) {
        $w_studio_album_style = 'column-2';
        $column_class = 'col-lg-6 col-md-6 col-sm-6';
        $w_studio_image_size = 'w_studio_image_570x370';
    } else {
        $w_studio_album_style = 'column-3';
        $column_class = 'col-lg-4 col-md-4 col-sm-6';
        $w_studio_image_size = 'w_studio_image_370x270';
    }

    while($w_studio_post_item->have_posts()) : $w_studio_post_item->the_post();
    ?>
    <div class="<?php echo esc_attr($column_class); ?>">                            
        <div class="album-sin <?php echo esc_attr($w_studio_random); ?>">     
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url($post->ID,$w_studio_image_size); ?>" alt="" />  
                <span class="<?php echo esc_attr($w_studio_icon); ?>" href="<?php the_permalink(); ?>"></span>
            </a>
            <div class="album-btn">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>                                      
        </div>                          
    </div>
    <?php 
    endwhile;
}

/**
 * Function To Load Content For Specific Query
 *
 * @param   WP_Query Object - $w_studio_post_item
 *
 */
 function w_studio_blog_excerpt($limit, $content) {
$excerpt = explode(' ', $content, $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'[...]';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function w_studio_load_blog_content( $w_studio_post_item , $w_studio_postType , $w_studio_blog_style , $w_studio_meta , $w_studio_meta_info , $w_studio_social_icon ) {
    $w_studio_optionValues = get_option( 'w_studio' );
    if( $w_studio_blog_style == '' ) {
        if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) ) {
            $w_studio_style = '-style-' . esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] );
        } else {
            $w_studio_style = '-style-1';
        }
    } else {
        $w_studio_style = '-' . $w_studio_blog_style;
    }
    if( get_post_format( $post->ID ) ) {
        $w_studio_format = get_post_format( $post->ID ) . $w_studio_style;
    } else {
        $w_studio_format = 'standard' . $w_studio_style;
    }
    if( $w_studio_blog_style == '' ) {
        if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) != 3 ) {
            while( $w_studio_post_item->have_posts() ) : $w_studio_post_item->the_post();
                get_template_part( 'base/views/template-parts/content' , $w_studio_format );
            endwhile;
        } else {
            $w_studio_count = 0;
            while( $w_studio_post_item->have_posts() ) : $w_studio_post_item->the_post();
                if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 1 ) {
                    ?>
                    <div class="wl-grid-item wl-grid-item-2 text-center">
                <?php } else { ?>
                    <div class="wl-grid-item wl-grid-column-2 text-center">
                <?php } ?>
                <div class="wl-overflow hover-parent-5">
                    <div class="hover-img-5">
                        <?php
                        if( $w_studio_count == 3 ) {
                            $w_studio_count = 0;
                        }
                        if( has_post_thumbnail() ) {
                            $w_studio_image_size = '';
                            if( $w_studio_count == 0 ) {
                                $w_studio_image_size = 'w_studio_image_370x570';
                            }
                            if( $w_studio_count == 1 ) {
                                $w_studio_image_size = 'w_studio_image_370x370';
                            }
                            if( $w_studio_count == 2 ) {
                                $w_studio_image_size = 'w_studio_image_370x270';
                            }
                        }
                        $w_studio_count++;
                        ?>
                        <?php if( has_post_thumbnail() ) { ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( $w_studio_image_size ); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="hover-effect-5">
                        <div class="hover-inner wl-full-width">
                            <a href="<?php the_permalink(); ?>"><h5
                                    class="wl-color1 top-zero"><?php esc_html_e( 'view post' , 'w-studio' ); ?></h5></a>
                        </div>
                    </div>
                </div>
                <div class="wl-full-width wl-bg-color2 pull-left wl-masonry-blog">
                    <h5 class="wl-color3"><?php the_category( ', ' , $post->ID ); ?></h5>
                    <h4 class="text-uppercase wl-color4">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <?php get_template_part( 'base/views/template-parts/blog-time-comments' ); ?>
                    <p class=""><?php echo w_studio_blog_excerpt(30, get_the_content()); ?></p>
                    <?php
                    if( $w_studio_optionValues[ 'w-social-network-header' ] ) {
                        get_template_part( 'base/views/template-parts/share-blog' );
                    }
                    ?>
                </div>
                </div>
            <?php endwhile; ?>
            </div>
            </div>
        <?php
        }
    } else {
        if( $w_studio_blog_style != 'style-3' ) {
            while( $w_studio_post_item->have_posts() ) : $w_studio_post_item->the_post();
                if( $w_studio_blog_style == 'style-1' ) {
                    if( $w_studio_meta == 'default' ) {
                        if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) != 1 ) {
                            $w_studio_class = 'col-md-6';
                            $w_studio_image_size = 'w_studio_image_770x570';
                            $w_studio_custom_image_size = '770x570';
                        } else {
                            $w_studio_image_size = 'w_studio_image_1170x570';
                            $w_studio_class = 'col-md-4';
                            $w_studio_custom_image_size = '1170x570';
                        }
                    } else if( $w_studio_meta == 'fullwidth' ) {
                        $w_studio_image_size = 'w_studio_image_1170x570';
                        $w_studio_class = 'col-md-4';
                        $w_studio_custom_image_size = '1170x570';
                    } else {
                        $w_studio_class = 'col-md-6';
                        $w_studio_image_size = 'w_studio_image_770x570';
                        $w_studio_custom_image_size = '770x570';
                    }
                    ?>
                    <div class="wl-nomalmargin-bottom blog-col-1">
                        <div class="wl-relative wl-right-zero">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if( has_post_thumbnail() ) {
                                    the_post_thumbnail( $w_studio_image_size );
                                } else {
                                    ?>
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/bg/blank-<?php echo esc_attr( $w_studio_custom_image_size ); ?>.jpg"/>
                                <?php } ?>
                            </a>

                            <div
                                class="<?php echo esc_attr( $w_studio_class ); ?> col-xs-12 wl-overlay-black wl-blog-overlay-absolute wl-both-padding blog-overlay-hover">
                                <?php if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-category' ] ) ) { ?>
                                    <h5 class="wl-box-margintop"><?php the_category( ', ' , $post->ID ); ?></h5>
                                <?php } ?>
                                <h4 class="wl-big-top-margin text-uppercase wl-color1">
                                    <a class="wl-color1" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <?php if( $w_studio_meta_info == 'show' ) {
                                    get_template_part( 'base/views/template-parts/blog-time-comments' );
                                } ?>
                                <p class="wl-box-margintop"><?php echo w_studio_blog_excerpt(30, get_the_content()); ?></p>
                                <?php
                                if( $w_studio_social_icon == 'show' ) {
                                    get_template_part( 'base/views/template-parts/share-blog' );
                                }
                                ?>
                            </div>
                            <div class="hover-effect-1">
                                <div class="hover-inner">
                                    <a href="<?php the_permalink(); ?>"></a>
                                </div>
                                <div class="bottom-icon-left">
                                    <a href="<?php the_permalink(); ?>" class="wl-color1" data-icon=&#x2d;></a>
                                </div>
                                <div class="bottom-icon-right">
                                    <a href="<?php the_permalink(); ?>" class="wl-color1" data-icon=&#x2e;></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else if( $w_studio_blog_style == 'style-2' ) {
                    if( !$w_studio_meta ) {
                        if( $w_studio_optionValues[ 'w-blog-sidebar-style' ] != 1 ) {
                            $w_studio_classTop = 'col-sm-6';
                            $w_studio_classBottom = 'col-sm-6';
                            $w_studio_image_size = 'w_studio_image_370x570';
                            $w_studio_custom_image_size = '370x570';
                        } else {
                            $w_studio_classTop = 'col-md-4 col-sm-6 ';
                            $w_studio_classBottom = 'col-md-8 col-sm-6 ';
                            $w_studio_image_size = 'w_studio_image_770x570';
                            $w_studio_custom_image_size = '770x570';
                        }
                    } else if( $w_studio_meta == 'no-sidebar' ) {
                        $w_studio_classTop = 'col-md-4 col-sm-6 ';
                        $w_studio_classBottom = 'col-md-8 col-sm-6 ';
                        $w_studio_image_size = 'w_studio_image_770x570';
                        $w_studio_custom_image_size = '770x570';
                    } else {
                        $w_studio_classTop = 'col-sm-6';
                        $w_studio_classBottom = 'col-sm-6';
                        $w_studio_image_size = 'w_studio_image_370x570';
                        $w_studio_custom_image_size = '370x570';
                    }
                    ?>
                    <div class="row wl-nomalmargin-bottom column-2">
                        <div class="<?php echo esc_attr( $w_studio_classTop ); ?> col-xs-12 pull-left wl-sibling-hover-1">
                            <div class="wl-height1 wl-full-width wl-bg-color2 pull-left wl-both-padding">
                                <?php if( $w_studio_optionValues[ 'w-blog-archive-category' ] ) { ?>
                                    <h5 class="wl-box-margintop wl-color3 hidden-sm"><?php the_category( ', ' , $post->ID ); ?></h5>
                                <?php } ?>
                                <h4 class="wl-big-top-margin text-uppercase wl-color4">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <?php if( $w_studio_meta_info == 'show' ) {
                                    get_template_part( 'base/views/template-parts/blog-time-comments' );
                                } ?>
                                <p class="wl-box-margintop"><?php echo w_studio_blog_excerpt(30, get_the_content()); ?></p>
                                <?php
                                if( $w_studio_social_icon == 'show' ) {
                                    get_template_part( 'base/views/template-parts/share-blog' );
                                }
                                ?>
                            </div>
                        </div>
                        <div
                            class="<?php echo esc_attr( $w_studio_classBottom ); ?> col-xs-12 pull-right wl-sibling-hover-2 mobile-margintop">
                            <div class="wl-relative">
                                <?php
                                if( has_post_thumbnail() ) {
                                    the_post_thumbnail( $w_studio_image_size );
                                } else {
                                    ?>
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/bg/blank-<?php echo esc_attr( $w_studio_custom_image_size ); ?>.jpg"/>
                                <?php } ?>
                                <div class="hover-effect-1">
                                    <div class="hover-inner blog-hover-inner">
                                        <a href="<?php the_permalink(); ?>" class="wl-color1">
                                            <span><?php esc_html_e( 'Read More' , 'w-studio' ); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            endwhile;
        } else {
            $w_studio_count = 0;
            while( $w_studio_post_item->have_posts() ) : $w_studio_post_item->the_post();
                if( $w_studio_meta == 'no-sidebar' ) {
                    ?>
                    <div class="wl-grid-item wl-grid-item-2 text-center">
                <?php } else { ?>
                    <div class="wl-grid-item wl-grid-column-2 text-center">
                <?php } ?>
                <div class="wl-overflow hover-parent-5">
                    <div class="hover-img-5">
                        <?php
                        if( $w_studio_count == 3 ) {
                            $w_studio_count = 0;
                        }
                        if( has_post_thumbnail() ) {
                            $w_studio_image_size = '';
                            if( $w_studio_count == 0 ) {
                                $w_studio_image_size = 'w_studio_image_370x570';
                            }
                            if( $w_studio_count == 1 ) {
                                $w_studio_image_size = 'w_studio_image_370x370';
                            }
                            if( $w_studio_count == 2 ) {
                                $w_studio_image_size = 'w_studio_image_370x270';
                            }
                        }
                        $w_studio_count++;
                        ?>
                        <?php if( has_post_thumbnail() ) { ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( $w_studio_image_size ); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="hover-effect-5">
                        <div class="hover-inner wl-full-width">
                            <a href="<?php the_permalink(); ?>"><h5
                                    class="wl-color1 top-zero"><?php esc_html_e( 'view post' , 'w-studio' ); ?></h5></a>
                        </div>
                    </div>
                </div>
                <div class="wl-full-width wl-bg-color2 pull-left wl-masonry-blog">
                    <h5 class="wl-color3"><?php the_category( ', ' , $post->ID ); ?></h5>
                    <h4 class="text-uppercase wl-color4">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <?php get_template_part( 'base/views/template-parts/blog-time-comments' ); ?>
                    <p class=""><?php echo w_studio_blog_excerpt(30, get_the_content()); ?></p>
                    <?php
                    if( $w_studio_optionValues[ 'w-social-network-header' ] ) {
                        get_template_part( 'base/views/template-parts/share-blog' );
                    }
                    ?>
                </div>
                </div>
            <?php endwhile; ?>
            </div>
            </div>
        <?php
        }
    }
}

/**
 * Function To Load Content For Team Content
 *
 * @param   WP_Query Object - $w_studio_post_item
 *
 */
function w_studio_load_team_content( $w_studio_post_item , $w_studio_team_style , $w_studio_pagedNumber , $w_studio_limit_post ) {

    if( $w_studio_team_style == 'style-3' ) {

        $w_studio_counts = ( $w_studio_pagedNumber - 1 ) * $w_studio_limit_post;
        while( $w_studio_post_item->have_posts() ) : $w_studio_post_item->the_post();
            if( $w_studio_counts % 4 < 2 ) {
                $w_studio_class = '';
            } else {
                $w_studio_class = 'pull-right';
            }
            ?>
            <div class="col-md-6 col-sm-12">
            <div class="row wl-xs-row">
        <div class="col-sm-6 wl-paddingzero <?php echo esc_attr( $w_studio_class ); ?>">
            <?php
            get_template_part( 'base/views/template-parts/team/' . $w_studio_team_style );
            $w_studio_counts++;
        endwhile;
    } else {
        while( $w_studio_post_item->have_posts() ) : $w_studio_post_item->the_post();
            $w_studio_team_limit = $w_studio_limit_post + 1;
            set_query_var( 'w_studio_count', $w_studio_team_limit );
            get_template_part( 'base/views/template-parts/team/' . $w_studio_team_style );
            $w_studio_team_limit++;
        endwhile;

    }

}

// Ajax Responder For Portfolio Load More /
add_action( 'wp_ajax_nopriv_w_studio_portfolio_ajaxloader' , 'w_studio_portfolio_ajaxloader' );
add_action( 'wp_ajax_w_studio_portfolio_ajaxloader' , 'w_studio_portfolio_ajaxloader' );

function w_studio_portfolio_ajaxloader() {

    $w_studio_page_template = esc_attr( $_POST[ 'template' ] );
    $w_studio_start_point = esc_attr( $_POST[ 'click' ] );
    $w_studio_hover = esc_attr( $_POST[ 'hover' ] );
    $w_studio_limit = esc_attr( $_POST[ 'limit' ] );

    require_once W_STUDIO_THEME_DIR . '/base/views/template-parts/ajax-load-more.php';

    $w_studio_load_more = new Load_more( $w_studio_page_template , $w_studio_start_point , $w_studio_limit , $w_studio_hover );

    $w_studio_load_more->load_content();

    wp_reset_postdata();

    wp_die();
}

// Ajax Responder For Portfolio Template Load More /
add_action( 'wp_ajax_nopriv_w_studio_portfolio_template_ajaxloader' , 'w_studio_portfolio_template_ajaxloader' );
add_action( 'wp_ajax_w_studio_portfolio_template_ajaxloader' , 'w_studio_portfolio_template_ajaxloader' );

function w_studio_portfolio_template_ajaxloader() {

    $w_studio_page_template = esc_attr( $_POST[ 'template' ] );
    $w_studio_start_point = esc_attr( $_POST[ 'click' ] );
    $w_studio_optionValues = get_option( 'w_studio' );
    $w_studio_limit = $w_studio_optionValues['w-portfolio-post-number'];
    require_once W_STUDIO_THEME_DIR . '/base/views/template-parts/ajax-load-more-for-template.php';

    $w_studio_load_more = new Load_more( $w_studio_page_template , $w_studio_start_point , $w_studio_limit );

    $w_studio_load_more->load_content();

    wp_reset_postdata();

    wp_die();
}