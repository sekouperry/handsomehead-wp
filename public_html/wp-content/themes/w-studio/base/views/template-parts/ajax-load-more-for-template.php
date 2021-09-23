<?php

class Load_more {

    public $w_studio_template_name;

    public $w_studio_start_point;

    public $w_studio_limit;

    public function __construct( $w_studio_template_name , $w_studio_start_point , $w_studio_limit ) {
        $this->w_studio_limit = $w_studio_limit;
        $this->w_studio_template_name = $w_studio_template_name;
        $this->w_studio_start_point = $w_studio_start_point * $w_studio_limit;
    }

    public function load_content() {

        $w_studio_optionValues = get_option( 'w_studio' );
        $w_studio_hoverStyle = '';
        $w_studio_hoverParentClass = '';
        $w_studio_hoverBorderClass = '';
        $w_studio_overflow = '';
        $w_studio_imageStyle = '';
        $w_studio_relative = 'wl-relative';
        if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
            $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
            }
            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 4 ) {
                $w_studio_hoverBorderClass = 'icon-border';
            }
            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 ) {
                $w_studio_overflow = 'wl-overflow';
            }
            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 ) {
                $w_studio_imageStyle = 'hover-effect-7';
            }
            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                $w_studio_relative = '';
            }
        }
        $w_studio_counter = 1;

        $w_studio_args = array( 'post_type' => 'portfolio' , 'posts_per_page' => $this->w_studio_limit , 'taxonomy' => 'portfolio-category' , 'offset' => $this->w_studio_start_point );

        $w_studio_query = new WP_Query( $w_studio_args );

        if( $w_studio_query->have_posts() ) {
            ?>

            <div class="cbp-loadMore-block">
            <?php if( $this->w_studio_template_name == 'template-portfolio-col-1' ) {
                $w_studio_counter = 1;
                $w_studio_class = '';
                $w_studio_hoverStyle = '';
                if( isset( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) ) {
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                        if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 2 ) {
                            $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        } else {
                            $w_studio_hoverStyle = 'hover-effect-' . 1;
                        }

                    }
                } else {
                    $w_studio_hoverStyle = 'hover-effect-' . 1;
                }
                $w_studio_counter = $this->w_studio_start_point;
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    if( $w_studio_counter % 2 != 1 ) {
                        $w_studio_class = 'wl-align-left';
                        $w_studio_iconClass = 'bottom-icon-right';
                    } else {
                        $w_studio_class = 'wl-align-right';
                        $w_studio_iconClass = 'bottom-icon-left';
                    }
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms);
                    echo esc_attr($w_studio_counter); ?>">
                        <div class="<?php echo esc_attr($w_studio_class); ?> wl-nomalmargin-bottom wl-relative">
                            <div class="wl-style-img-big blog-overlay-hover">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_1170x570' ); ?></a>

                                <div class="col-sm-4 col-xs-12 wl-overlay-black wl-overlay-absolute wl-content-withbg">
                                    <a class="wl-color4" href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5>
                                    </a>

                                    <p><?php
                                        for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                            if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                            <?php
                                            } else {
                                                ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                            <?php
                                            }
                                        }
                                        ?></p>
                                </div>
                            </div>
                            <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                <div class="hover-inner">
                                    <a href="<?php the_permalink(); ?>"></a>
                                </div>
                                <div class="<?php echo esc_attr($w_studio_iconClass); ?>">
                                    <a class="wl-color1" data-icon="0" href="<?php the_permalink(); ?>"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $w_studio_counter++;
                endwhile; ?>
            <?php
            } else if( $this->w_studio_template_name == 'template-portfolio-col-2' ) {

                $w_studio_hoverStyle = '';
                $w_studio_hoverParentClass = '';
                $w_studio_hoverBorderClass = '';
                $w_studio_overflow = '';
                $w_studio_imageStyle = '';
                $w_studio_relative = 'wl-relative';
                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                    $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 ) {
                        $w_studio_hoverStyle = 'hover-effect-1';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 4 ) {
                        $w_studio_hoverBorderClass = 'icon-border';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 ) {
                        $w_studio_imageStyle = 'hover-effect-7';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_relative = '';
                    }
                }

                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    }
                    ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">
                        <div class="">
                            <div
                                class="col-md-6 col-sm-6 wl-bg-color1 wl-padding-rightzero wl-height2 wl-col-leftpadding wl-sibling-hover-1 ">
                                <a href="<?php the_permalink(); ?>">
                                    <h5 class="wl-section-margintop2"><?php the_title(); ?></h5>
                                </a>

                                <p class="wl-regular-text">
                                    <?php
                                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                        if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                            ?>
                                            <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                        <?php } else { ?>
                                            <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                        <?php
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6 col-sm-6 wl-paddingzero wl-sibling-hover-2 image-height-2">
                                <div
                                    class="wl-decrease-small-left <?php echo esc_attr($w_studio_relative) . ' ' . esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_overflow); ?> wl-inline-block">
                                    <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height-2">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_300x225' ); ?></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="image-height-2">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_300x225' ); ?></a>
                                        </div>
                                    <?php }
                                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                            <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) { ?>
                                                <div class="hover-text">
                                                    <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                            <span class="wl-color1">
                                                <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                            </span>
                                                </div>
                                                <div class="hover-inner">
                                                    <a href="<?php the_permalink(); ?>" class="wl-color1"
                                                       data-icon=&#x30;></a>
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
                                                            <a data-icon=&#x30; class="pull-right wl-color1"
                                                               href="#"></a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <a href="<?php the_permalink(); ?>"
                                                           class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>"
                                                           data-icon=&#x30;></a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-col-3' ) {

                $w_studio_hoverStyle = '';
                $w_studio_hoverParentClass = '';
                $w_studio_hoverBorderClass = '';
                $w_studio_overflow = '';
                $w_studio_imageStyle = '';
                $w_studio_relative = 'wl-relative';
                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                    $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 ) {
                        $w_studio_hoverStyle = 'hover-effect-1';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 4 ) {
                        $w_studio_hoverBorderClass = 'icon-border';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 ) {
                        $w_studio_imageStyle = 'hover-effect-7';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_relative = '';
                    }
                }
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    }
                    ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">
                        <div
                            class="<?php echo esc_attr($w_studio_relative) . ' ' . esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_overflow); ?> hover-sibling-2">
                            <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                <div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height-3">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_770x570' ); ?></a>
                                </div>
                            <?php } else { ?>
                                <div class="image-height-3">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_770x570' ); ?></a>
                                </div>
                            <?php }
                            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>
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
                                                <a href="<?php the_permalink(); ?>"
                                                   class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>"
                                                   data-icon=&#x30;></a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="wl-standard-margin hover-sibling-1">
                            <h5><a href="<?php the_permalink(); ?>" class="wl-color4"><?php the_title(); ?></a></h5>
                            <p class="wl-regular-text">
                                <?php
                                for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                    if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                        ?>
                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                    <?php } else { ?>
                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                    <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                <?php
                endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-masonary-1' ) {
                $w_studio_counter = 0;
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
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
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    }
                    ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?> wrapper-padding">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img
                                    data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID , $w_studio_image_size ); ?>"
                                    alt="" width="<?php echo esc_attr($w_studio_image_width); ?>"
                                    height="<?php echo esc_attr($w_studio_image_height); ?>"/>
                            </div>
                            <div class="cbp-caption-activeWrap hover-effect-1">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title profile-links">
                                            <a data-icon=&#x30; href="<?php the_permalink(); ?>"></a>
                                            <a data-icon=&#x54;
                                               href="<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>"
                                               data-title="<?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?> <br> by <?php the_author(); ?>"
                                               class="cbp-lightbox"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="hover-text">
                                    <h5 class="wl-color1 top-zero"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <span class="wl-color1"><?php
                                        for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                            if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                    <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                            <?php } else { ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                    <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                            <?php
                                            }
                                        } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-masonary-2' ) {
                $w_studio_counter = $this->w_studio_start_point;
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
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
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?> wrapper-padding">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img
                                    data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID , $w_studio_image_size ); ?>"
                                    alt="" width="<?php echo esc_attr($w_studio_image_width); ?>"
                                    height="<?php echo esc_attr($w_studio_image_height); ?>"/>
                            </div>
                            <div class="cbp-caption-activeWrap effect1 hover-effect-1">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title profile-links">
                                            <a data-icon=&#x30; href="<?php the_permalink(); ?>"></a>
                                            <a data-icon=&#x54;
                                               href="<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>"
                                               data-title="<?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?> <br> by <?php the_author(); ?>"
                                               class="cbp-lightbox"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="hover-text">
                                    <h5 class="wl-color1 top-zero"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <span class="wl-color1"><?php
                                        for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                            if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                    <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                            <?php } else { ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                    <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                            <?php
                                            }
                                        } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-masonary-3' ) {
                $w_studio_counter = $this->w_studio_start_point;
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_image_width = '';
                    $w_studio_image_height = '';
                    $w_studio_image_size = '';

                    if( $w_studio_counter >= 9  ) {
                        $w_studio_counter = $w_studio_counter%9;
                    }
                    if( $w_studio_counter == 0 || $w_studio_counter == 3 || $w_studio_counter == 6 ) {
                        $w_studio_image_width = 370;
                        $w_studio_image_height = 570;
                        $w_studio_image_size = 'w_studio_image_370x570';
                    }
                    if( $w_studio_counter == 1 || $w_studio_counter == 5 || $w_studio_counter == 7 ) {
                        $w_studio_image_width = 370;
                        $w_studio_image_height = 370;
                        $w_studio_image_size = 'w_studio_image_370x370';
                    }
                    if( $w_studio_counter == 2 || $w_studio_counter == 4 || $w_studio_counter == 8 ) {
                        $w_studio_image_width = 370;
                        $w_studio_image_height = 270;
                        $w_studio_image_size = 'w_studio_image_370x270';
                    }
                    $w_studio_counter++;
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?> wrapper-padding">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img
                                    data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID , $w_studio_image_size ); ?>"
                                    alt="" width="<?php echo esc_attr($w_studio_image_width); ?>"
                                    height="<?php echo esc_attr($w_studio_image_height); ?>"/>
                            </div>
                            <div class="cbp-caption-activeWrap effect1 hover-effect-1">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title profile-links">
                                            <a data-icon=&#x30; href="<?php the_permalink(); ?>"></a>
                                            <a data-icon=&#x54;
                                               href="<?php echo get_the_post_thumbnail_url( $post->ID , 'large' ); ?>"
                                               data-title="<?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?> <br> by <?php the_author(); ?>"
                                               class="cbp-lightbox"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="hover-text">
                                    <h5 class="wl-color1 top-zero"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <span class="wl-color1"><?php
                                        for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                            if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                    <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                            <?php } else { ?>
                                                <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                    <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                            <?php
                                            }
                                        } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-masonary-4' ) {
                $w_studio_hoverStyle = '';
                $w_studio_hoverParentClass = '';
                $w_studio_hoverBorderClass = '';
                $w_studio_overflow = '';
                $w_studio_imageStyle = '';
                $w_studio_relative = 'wl-relative';
                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                    $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 ) {
                        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 4 ) {
                        $w_studio_hoverBorderClass = 'icon-border';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) {
                        $w_studio_hoverStyle = 'hover-effect-1';
                    }
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 ) {
                        $w_studio_imageStyle = 'hover-effect-7';
                    }
                }
                $w_studio_counter = $this->w_studio_start_point;
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_image_width = '';
                    $w_studio_image_height = '';
                    $w_studio_image_size = '';
                    if( $w_studio_counter >= 9  ) {
                        $w_studio_counter = $w_studio_counter%9;
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
                            $portfolio_category .= $w_studio_category[ $w_studio_count ]->name . ', ';
                        } else {
                            $portfolio_category .= $w_studio_category[ $w_studio_count ]->name;
                        }
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?> wrapper-padding">
                        <div class="cbp-caption">
                            <div
                                class="cbp-caption-defaultWrap <?php echo esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_image_height_class) . ' ';
                                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 ) {
                                    echo esc_attr($w_studio_hoverStyle);
                                } ?>">
                                <img
                                    data-cbp-src="<?php echo get_the_post_thumbnail_url( $post->ID , $w_studio_image_size ); ?>"
                                    alt="" width="370" height="<?php echo esc_attr($w_studio_image_height); ?>"/>
                                <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>
                                    <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                        <div class="hover-inner">
                                            <a data-icon="0" class="wl-color1" href="<?php the_permalink(); ?>"></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="wl-title-mosic">
                            <h5 class="top-zero">
                                <a class="wl-color4" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>

                            <p class="wl-regular-text">
                                <?php
                                for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                    if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                        ?>
                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                    <?php
                                    } else {
                                        ?>
                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>"><?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                    <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div> <?php endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-style-1' ) {
                $w_studio_hoverStyle = '';
                $w_studio_hoverParentClass = '';
                $w_studio_hoverBorderClass = '';
                $w_studio_overflow = '';
                $w_studio_imageStyle = '';
                $w_studio_relative = 'wl-relative';
                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                    $w_studio_hoverStyle = 'hover-effect-' . $w_studio_optionValues[ 'w-portfolio-hover-style' ];
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
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
                $w_studio_counter = $this->w_studio_start_point + 1;
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count <= count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    }
                    ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">
                        <div class="wl-nomalmargin-bottom column-2">
                            <div
                                class="col-md-4 col-sm-6 col-xs-12 wl-sibling-hover-1 <?php if( $w_studio_counter % 2 == 0 ) {
                                    echo 'pull-right';
                                } ?>">
                                <div class="wl-height1 wl-full-width style-6-left">
                                    <?php if( $w_studio_counter % 2 != 0 ) { ?>
                                        <div class="style-6-left-text">
                                            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>

                                            <div class="wl-regular-text">
                                                <?php
                                                for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                                    if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                        ?>
                                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>">
                                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>">
                                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="style-6-left-icon hidden-xs">
                                            <a href="<?php the_permalink(); ?>" data-icon=&#x24;></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="style-6-left-icon hidden-xs">
                                            <a href="<?php the_permalink(); ?>" data-icon=&#x23;></a>
                                        </div>
                                        <div class="style-6-left-text text-right">
                                            <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>

                                            <div class="wl-regular-text">
                                                <?php
                                                for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                                    if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                        ?>
                                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 wl-sibling-hover-2">
                                <div
                                    class="<?php echo esc_attr($w_studio_relative) . ' ' . esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_overflow); ?>">
                                    <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_770x570' ); ?></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_770x570' ); ?></a>
                                        </div>
                                    <?php } ?>
                                    <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                        <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) { ?>
                                            <div class="hover-text">
                                                <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                                <span class="wl-color1">
                                                    <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                                </span>
                                            </div>
                                            <div class="hover-inner">
                                                <a href="<?php the_permalink(); ?>" class="wl-color1"
                                                   data-icon=&#x30;></a>
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
                                                    <a href="<?php the_permalink(); ?>"
                                                       class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>"
                                                       data-icon=&#x30;></a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $w_studio_counter++;
                endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-style-2' ) {
                $w_studio_hoverStyle = '';
                $w_studio_hoverParentClass = '';
                $w_studio_hoverBorderClass = '';
                $w_studio_overflow = '';
                $w_studio_imageStyle = '';
                $w_studio_relative = 'wl-relative';
                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                    $w_studio_hoverStyle = 'hover-effect-' . $w_studio_optionValues[ 'w-portfolio-hover-style' ];
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
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
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">
                        <div class="wl-nomalmargin-bottom column-2 row">
                            <div class="col-md-4 col-sm-6 col-xs-12 wl-sibling-hover-1">
                                <div class="wl-height1 wl-full-width style-6-left">
                                    <div class="style-6-left-text">
                                        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                                        <div class="wl-regular-text">
                                            <?php
                                            for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                                if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                    ?>
                                                    <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                        <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                        <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="style-6-left-icon hidden-xs">
                                        <a href="<?php the_permalink(); ?>" data-icon=&#x24;></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 wl-sibling-hover-2">
                                <div class="<?php echo esc_attr($w_studio_relative) . ' ' . esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_overflow); ?>">
                                    <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_770x570' ); ?></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_770x570' ); ?></a>
                                        </div>
                                    <?php }
                                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                            <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) { ?>
                                                <div class="hover-text">
                                                    <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                            <span class="wl-color1">
                                                <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                            </span>
                                                </div>
                                                <div class="hover-inner">
                                                    <a href="<?php the_permalink(); ?>" class="wl-color1"
                                                       data-icon=&#x30;></a>
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
                                                            <a data-icon=&#x30; class="pull-right wl-color1"
                                                               href="#"></a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <a href="<?php the_permalink(); ?>"
                                                           class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>"
                                                           data-icon=&#x30;></a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-style-3' ) {
                $w_studio_hoverStyle = '';
                $w_studio_hoverParentClass = '';
                $w_studio_hoverBorderClass = '';
                $w_studio_overflow = '';
                $w_studio_imageStyle = '';
                $w_studio_relative = 'wl-relative';
                if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] ) {
                    $w_studio_hoverStyle = 'hover-effect-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 3 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) {
                        $w_studio_hoverParentClass = 'hover-parent-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
                        $w_studio_imageStyle = 'hover-img-' . esc_attr( $w_studio_optionValues[ 'w-portfolio-hover-style' ] );
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
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count <= count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">
                        <div class="wl-nomalmargin-bottom blog-sidebar-col-2">
                            <div class="col-md-4 col-xs-12 wl-sibling-hover-1">
                                <div class="wl-height1 wl-full-width style-6-left">
                                    <div class="style-6-left-text">
                                        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>

                                        <div class="wl-regular-text">
                                            <?php
                                            for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                                if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                    ?>
                                                    <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                        <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ); ?>">
                                                        <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="style-6-left-icon hidden-xs hidden-sm">
                                        <a href="<?php the_permalink(); ?>" data-icon=&#x24;></a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            if(!function_exists(w_studio_team_excerpt)){
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
                                }
                            ?>
                            <div class="col-md-3 col-xs-12 wl-sibling-hover-1 wl-height1 wl-relative">
                                <div class="wl-absolute wl-div-table">
                                    <div class="wl-middle-content wl-text-left">
                                        <?php echo w_studio_team_excerpt(30); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-xs-12 wl-sibling-hover-2">
                                <div
                                    class="<?php echo esc_attr($w_studio_relative) . ' ' . esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_overflow); ?> wl-inline-block">
                                    <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_470x570' ); ?></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="image-height">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_470x570' ); ?></a>
                                        </div>
                                    <?php }
                                    if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>
                                        <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                            <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) { ?>
                                                <div class="hover-text">
                                                    <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                            <span class="wl-color1">
                                                <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                            </span>
                                                </div>
                                                <div class="hover-inner">
                                                    <a href="<?php the_permalink(); ?>" class="wl-color1"
                                                       data-icon=&#x30;></a>
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
                                                            <a data-icon=&#x30; class="pull-right wl-color1"
                                                               href="#"></a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <a href="<?php the_permalink(); ?>"
                                                           class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>"
                                                           data-icon=&#x30;></a>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            } else if( $this->w_studio_template_name == 'template-portfolio-style-4' ) {
                while( $w_studio_query->have_posts() ) : $w_studio_query->the_post();
                    $w_studio_category = get_the_terms( $post->ID , 'portfolio-category' );
                    $w_studio_terms = '';
                    for( $w_studio_count = 0 ; $w_studio_count <= count( $w_studio_category ) ; $w_studio_count++ ) {
                        $w_studio_terms .= $w_studio_category[ $w_studio_count ]->slug . ' ';
                    } ?>
                    <div class="cbp-item <?php echo esc_attr($w_studio_terms); ?>">
                        <div class="row">
                            <div class="col-md-8 hover-sibling-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div
                                            class="<?php echo esc_attr($w_studio_relative) . ' ' . esc_attr($w_studio_hoverParentClass) . ' ' . esc_attr($w_studio_overflow); ?>">
                                            <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 7 || $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                                <div class="<?php echo esc_attr($w_studio_imageStyle); ?> image-height-1">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_550x550' ); ?></a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="image-height-1">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_550x550' ); ?></a>
                                                </div>
                                            <?php }
                                            if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] != 7 ) { ?>
                                                <div class="<?php echo esc_attr($w_studio_hoverStyle); ?>">
                                                    <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 8 ) { ?>
                                                        <div class="hover-text">
                                                            <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                                        <span class="wl-color1">
                                                            <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                                        </span>
                                                        </div>
                                                        <div class="hover-inner">
                                                            <a href="<?php the_permalink(); ?>" class="wl-color1"
                                                               data-icon=&#x30;></a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="hover-inner">
                                                            <?php if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 5 ) { ?>
                                                                <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                                                <span class="wl-color1">
                                                            <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                                        </span>
                                                            <?php } else if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 6 ) { ?>
                                                                <div class="wl-inner-rotate">
                                                                    <a href="<?php the_permalink(); ?>"
                                                                       class="wl-color1 pull-right"
                                                                       data-icon=&#x30;></a>

                                                                    <div class="wl-hover-text">
                                                                        <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                                                <span class="wl-color1">
                                                                    <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                                                </span>
                                                                    </div>
                                                                </div>
                                                            <?php } else if( $w_studio_optionValues[ 'w-portfolio-hover-style' ] == 9 ) { ?>
                                                                <div class="hover-text">
                                                                    <h5 class="wl-color1 top-zero"><?php the_title(); ?></h5>
                                                                <span class="wl-color1">
                                                                    <?php get_template_part( 'base/views/template-parts/portfolio-category' ); ?>
                                                                </span>
                                                                </div>
                                                                <div class="hover-icon">
                                                                    <a data-icon=&#x30; class="pull-right wl-color1"
                                                                       href="#"></a>
                                                                </div>
                                                            <?php } else { ?>
                                                                <a href="<?php the_permalink(); ?>"
                                                                   class="wl-color1 <?php echo esc_attr($w_studio_hoverBorderClass); ?>"
                                                                   data-icon=&#x30;></a>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 hover-sibling-1">
                                <div class="row">
                                    <div class="col-md-12 wl-square-title wl-height4 xs-load">
                                        <div class="wl-bottom-title">
                                            <h5><a href="<?php the_permalink(); ?>"
                                                   class="wl-color4"><?php the_title(); ?></a></h5>

                                            <p class="wl-regular-text">
                                                <?php
                                                for( $w_studio_count = 0 ; $w_studio_count < count( $w_studio_category ) ; $w_studio_count++ ) {
                                                    if( $w_studio_count != ( count( $w_studio_category ) - 1 ) ) {
                                                        ?>
                                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>">
                                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name) . ', '; ?></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo get_term_link( $w_studio_category[ $w_studio_count ]->term_id , 'portfolio-category' ) ?>">
                                                            <?php echo esc_attr($w_studio_category[ $w_studio_count ]->name); ?></a>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            } ?>
            </div>
        <?php
        }
    }
}