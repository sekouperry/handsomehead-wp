<?php

add_shortcode( 'w_studio_container' , 'w_studio_container' );
/***
 * Function to load Container
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_container( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' ) , $atts ) );

    $output = '';
    $output .= '<div class="container">';
    $output .= do_shortcode( $content );
    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_columns' , 'w_studio_columns' );
/***
 * Function to load Columns
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_columns( $atts , $content = null ) {
    extract( shortcode_atts( array( 'col_no' => '6' ) , $atts ) );

    $output = '';
    $output .= '<div class="col-sm-' . $col_no . '">';
    $output .= do_shortcode( $content );
    $output .= '</div>';
    return $output;
}

add_shortcode( 'w_studio_row' , 'w_studio_row' );
/***
 * Function to load Row
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_row( $atts , $content = null ) {
    extract( shortcode_atts( array() , $atts ) );

    $output = '';
    $output .= '<div class="row">';
    $output .= do_shortcode( $content );
    $output .= '</div>';
    return $output;
}

add_shortcode( 'w_studio_abt_skill_bar' , 'w_studio_abt_skill_bar' );
/***
 * Function to load progress bar
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_abt_skill_bar( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'value' => '' , 'bar_style' => '' , 'title_color' => '' , 'number_color' => '' , 'fill_color' => '' , 'bg_color' => '' ) , $atts ) );

    if( !function_exists( 'w_studio_random_number' ) ) {
        function w_studio_random_number() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }

    $className = w_studio_random_number();
    $className2 = w_studio_random_number();
    $className3 = w_studio_random_number();

    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    if( $bar_style != 'hori' ) {
        $custom_inline_style = '.' . $className2 . '{ background-color: ' . esc_attr($bg_color) . '!important;}';
        $custom_inline_style .= '.' . $className2 . ' .progress-inner{background-color:' . esc_attr($fill_color) . '; height: ' . esc_attr($value) . '%;}';
        $custom_inline_style .= '.' . $className2 . ' span{ color: ' . $number_color . ';}';
        $custom_inline_style .= '.' . $className3 . '{ color: ' . $title_color . ';}';
    } else {
        $custom_inline_style = '.' . $className2 . '{ background-color: ' . esc_attr($bg_color) . '!important;}';
        $custom_inline_style .= '.' . $className2 . ' .progress-bar{ width: ' . esc_attr($value) . '% ;background-color:' . esc_attr($fill_color) . '}';
        $custom_inline_style .= '.' . $className2 . ' span{ color: ' . $number_color . ';}';
        $custom_inline_style .= '.' . $className3 . '{ color: ' . $title_color . ';}';
    }
    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';
    if( $bar_style != 'hori' ) {
        $output .= '<div class="wl-relative">';
        $output .= '<div class="progress-parent">';
        $output .= '<div class="wl-progress-bar ' . $className2 . ' ">';
        $output .= '<div  class="progress-inner wow fadeInUp" data-progress=" ' . esc_attr($value) . ' %" data-wow-duration="1s" data-wow-delay="0.8s">';
        $output .= '<div class="progress-number">';
        $output .= '<span>' . esc_attr($value) . '%</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div> ';
        $output .= '</div>';
        $output .= '<div class="progress-label ' . $className3 . '">' . $title . ' </div>';
        $output .= '</div>';
    } else {
        $output .= '<div class="wl-progres-parent-hori">';
        $output .= '<div class="progress-label text-left ' . $className3 . '">' . $title . '</div>';
        $output .= '<div class="wl-progres-hori ' . $className2 . ' ">';
        $output .= '<div class="progress-bar wow fadeInLeft" data-progress="' . esc_attr($value) . '%" data-wow-duration="1s" data-wow-delay="0.8s">';
        $output .= '<span>' . esc_attr($value) . '%</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }

    return $output;
}

add_shortcode( 'w_studio_counter_in' , 'w_studio_counter_in' );
/***
 * Function to load Counter
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_counter_in( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'font_size' => '' , 'disits_font_size' => '' , 'start' => '' , 'end' => '' , 'icon' => '' , 'icon_size' => '' , 'transparent_counter' => '' , 'title_color' => '' , 'icon_color' => '' , 'digits_color' => '' , 'bg_color' => '' ) , $atts ) );
    if( $font_size == '' ) {
        $font = 13;
    } else {
        $font = $font_size;
    }
    if( $disits_font_size == '' ) {
        $disits_font = 34;
    } else {
        $disits_font = $disits_font_size;
    }
    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();

    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    if( $transparent_counter == 'style-2' ) {
        $custom_inline_style = '.' . $className . ' h2{ color: ' . $digits_color . '!important;font-size:' . $disits_font . 'px }';
        $custom_inline_style .= '.' . $className2 . '{ color: ' . $title_color . '; font-size:' . $font . 'px }';
    } else {
        $custom_inline_style = '.' . $className . '{ background-color: ' . esc_attr($bg_color) . '!important; font-size:' . $disits_font . 'px }';
        $custom_inline_style .= '.' . $className . ' .count > span{ color: ' . $icon_color . '; font-size:' . $icon_size . 'px }';
        $custom_inline_style .= '.' . $className . ' h2{ color: ' . $digits_color . '; font-size:' . $disits_font . 'px }';
        $custom_inline_style .= '.' . $className2 . '{ color: ' . $title_color . '; font-size:' . $font . 'px }';
    }
    wp_add_inline_style( 'custom-style' , $custom_inline_style );
    $output = '';

    if( $transparent_counter == 'style-2' ) {
        $output .= '<div class="counter-column">';
        $output .= '<div class="wl-counter-transparent">';
        $output .= '<div class="number-div">';
        $output .= '<div class="count" data-to=" ' . $end . ' ">';
        $output .= '<div class="wl-counterdiv ' . $className . ' ">';
        $output .= '<h2 class="count-number"> ' . $start . ' </h2></div>';
        $output .= '<div class=" ' . $className2 . ' "> ' . $title . ' </div>';
        $output .= '</div></div></div></div>';
    } else {
        $output .= '<div class="number-div ' . $className . ' ">';
        $output .= '<div class="count" data-to=" ' . $end . ' ">';
        $output .= '<span class="wl-count-ico ' . $icon . ' "></span>';
        $output .= '<div class="wl-counterdiv">';
        $output .= '<h2 class="count-number"> ' . $start . ' </h2>';
        $output .= '</div>';
        $output .= '<div class=" ' . $className2 . ' "> ' . $title . ' </div>';
        $output .= '</div>';
        $output .= '</div>';
    }
    return $output;
}


add_shortcode( 'w_studio_abt_service1' , 'w_studio_abt_service1' );
/***
 * Function to load content with single image
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_abt_service1( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'imageurl' => '' ) , $atts ) );
    $imageid = wp_get_attachment_image_src( $imageurl , 'full' );
    $output = '';

    $output .= '<div class="hidden-xs hidden-sm">';
    $output .= '<img src=" ' . $imageid[ 0 ] . ' " alt="about-us1.jpg" alt="">';
    $output .= '</div>';
    $output .= '<div class="wl-section-heading wl-section-margintop2 wl-widemargin">';
    $output .= '<h2> ' . $title . ' </h2>';
    $output .= '</div>';
    $output .= '<p> ' . $content . ' </p>';

    return $output;
}

add_shortcode( 'w_studio_abt_service2' , 'w_studio_abt_service2' );
/***
 * Function to load content with duble images
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_abt_service2( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'imageurl_1' => '' , 'imageurl_2' => '' ) , $atts ) );
    $imageid_1 = wp_get_attachment_image_src( $imageurl_1 , 'w_studio_image_270x370' );
    $imageid_2 = wp_get_attachment_image_src( $imageurl_2 , 'w_studio_image_270x370' );
    $output = '';

    $output .= '<div class="wl-section-heading wl-widemargin xs-margin">';
    $output .= '<h2 class="wl-margin-topaligned"> ' . $title . ' </h2>';
    $output .= '</div>';
    $output .= '<p class="wl-section-padding-bottom"> ' . $content . ' </p>';
    $output .= '<div class="row wl-creative-sec">';
    $output .= '<div class="col-sm-6 wl-img-center">';
    $output .= '<img src=" ' . $imageid_1[ 0 ] . ' " alt="about-us1.jpg">';
    $output .= '</div>';
    $output .= '<div class="col-sm-6 wl-img-center">';
    $output .= '<img src=" ' . $imageid_2[ 0 ] . ' " alt="about-us1.jpg">';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}


add_shortcode( 'w_studio_service' , 'w_studio_service' );
/***
 * Function to load service icons
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_service( $atts , $content = null ) {
    extract( shortcode_atts( array(
        'title' => '' ,
        'title_link' => '',
        'icon' => '' ,
        'title_color' => '' ,
        'icon_color' => '' ,
        'font_size' => '' ,
        'icon_size' => '' ,
        'service_style' => '' ) , $atts ) );
    if( $service_style == 'style-3' ) {

        if( $font_size == '' ) {
            $font = 13;
        } else {
            $font = $font_size;
        }
        if( $icon_size == '' ) {
            $icon_font = 64;
        } else {
            $icon_font = $icon_size;
        }
    } elseif( $service_style == 'style-2' ) {
        if( $font_size == '' ) {
            $font = 13;
        } else {
            $font = $font_size;
        }
        if( $icon_size == '' ) {
            $icon_font = 44;
        } else {
            $icon_font = $icon_size;
        }
    } else {
        if( $font_size == '' ) {
            $font = 13;
        } else {
            $font = $font_size;
        }
        if( $icon_size == '' ) {
            $icon_font = 28;
        } else {
            $icon_font = $icon_size;
        }
    }
    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();
    $className3 = w_studio_random_number1();
    $className4 = w_studio_random_number1();

    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    $custom_inline_style = '';
    if( $service_style == 'style-3' ) {
        $custom_inline_style = '.' . $className . ' span{ color: ' . $icon_color . '; font-size:' . $icon_font . 'px}';
        $custom_inline_style .= '.' . $className2 . ' h5 { color: ' . $title_color . '; font-size:' . $font . 'px}';
        $custom_inline_style .= '.' . $className2 . ' h5 a { color: ' . $title_color . '; font-size:' . $font . 'px}';
    } elseif( $service_style == 'style-2' ) {
        $custom_inline_style = '.' . $className3 . ' span{ color: ' . $icon_color . '; font-size:' . $icon_font . 'px}';
        $custom_inline_style .= '.' . $className3 . ' h5 { color: ' . $title_color . '; font-size:' . $font . 'px}';
        $custom_inline_style .= '.' . $className3 . ' h5 a{ color: ' . $title_color . '; font-size:' . $font . 'px}';
    } else {
        $custom_inline_style = '.' . $className4 . ' h5 span{ color: ' . $icon_color . '; font-size:' . $icon_font . 'px}';
        $custom_inline_style .= '.' . $className4 . ' h5 { color: ' . $title_color . '; font-size:' . $font . 'px}';
        $custom_inline_style .= '.' . $className4 . ' h5 a{ color: ' . $title_color . '; font-size:' . $font . 'px}';
    }
    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';
    if( $service_style == 'style-3' ) {

        $output .= '<div class="wl-feature-box wl-full-margin-top">';
        $output .= '<div class="wl-feature-boxicon ' . $className . ' ">';
        $output .= '<a><span class=' . $icon . '></span></a>';
        $output .= '</div>';
        $output .= '<div class="wl-feature-boxinner ' . $className2 . '">';
        $output .= '<h5><a href="'.$title_link.'">' . $title . '</a></h5>';
        $output .= '<p class="wl-mlzero">' . $content . '</p>';
        $output .= '</div>';
        $output .= '</div>';
    } elseif( $service_style == 'style-2' ) {

        $output .= '<div class="creative-content ' . $className3 . ' ">';
        $output .= '<span  class= ' . $icon . ' ></span>';
        $output .= '<h5><a href="'.$title_link.'">' . $title . '</a></h5>';
        $output .= '</div>';
    } else {
        $output .= '<div class="wl-feature-box wl-box-marginbottom ' . $className4 . '">';
        $output .= '<h5><span class= ' . $icon . ' ></span> <a href="'.$title_link.'">' . $title . '</a></h5>';
        $output .= '<p> ' . $content . ' </p>';
        $output .= '</div>';
    }

    return $output;

}

add_shortcode( 'w_studio_ft_image' , 'w_studio_ft_image' );
/***
 * Function to load image slider
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_ft_image( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'imageurl' => '' ) , $atts ) );

    $imageexp = explode( "," , $imageurl );
    $output = '';
    $output .= '<div class="wl-feature-images">';
    $output .= '<div  id="feature-owl"  class="owl-carousel owl-theme">';
    foreach( $imageexp as $images ) {
        $imageid = wp_get_attachment_image_src( $images , 'w_studio_image_370x470' );
        $output .= '<div class="item"><img src=" ' . $imageid[ 0 ] . ' " alt="a.jpg"></div>';
    }

    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="wl-feature-navigation">';
    $output .= '<span class="feature-prev" data-icon=&#x23;></span>';
    $output .= '<span class="feature-next pull-right" data-icon=&#x24;></span>';
    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_title_content' , 'w_studio_title_content' );
/***
 * Function to load Title and contents
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */


function w_studio_title_content( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'title_content' => '' ,'font_size' => '' , 'title_color' => '' , 'title_border_color' => '' , 'hide_title_border' => '' , ) , $atts ) );


    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();
    $className3 = w_studio_random_number1();
    $class = '';
    if( $hide_title_border == true ) {
        $class = $className2;
    } else {
        $class = $className3;
    }
    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );

    $custom_inline_style = '.' . $className . '{ color: ' . $title_color . '; font-size: '.$font_size.'px }';
    $custom_inline_style .= '.' . $class . '::after{ border-top: 0; }';
    $custom_inline_style .= '.' . $className3 . '::after{ border-top: 2px solid ' . $title_border_color . '; }';

    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';

    if( $title_content == 'style-2' ) {
        $output .= '<div class="wl-aligned-right">';
        $output .= '<div class="wl-section-heading ' . $class . ' ">';

        $output .= '<h2 class="wl-margintopzero ' . $className . '" >' . $title . '</h2>';
        $output .= '</div>';
        if( $content == '' ) {
            $output .= '<p class="wl-phide"> ' . $content . ' </p>';
        } else {
            $output .= '<p> ' . $content . ' </p>';
        }
        $output .= '</div>';
    } 
    elseif( $title_content == 'style-3' ) {
        $output .= '<div class="wl-aligned-center">';
        $output .= '<div class="wl-section-heading ' . $class . ' ">';

        $output .= '<h2 class="wl-margintopzero ' . $className . '" >' . $title . '</h2>';
        $output .= '</div>';
        if( $content == '' ) {
            $output .= '<p class="wl-phide"> ' . $content . ' </p>';
        } else {
            $output .= '<p> ' . $content . ' </p>';
        }
        $output .= '</div>';
    }
    else {
        $output .= '<div class="wl-section-heading ' . $class . ' ">';

        $output .= '<h2 class="wl-margintopzero ' . $className . '">' . $title . '</h2>';
        $output .= '</div>';
        if( $content == '' ) {
            $output .= '<p class="wl-phide"> ' . $content . ' </p>';
        } else {
            $output .= '<p> ' . $content . ' </p>';
        }
    }
    return $output;

}

//ft portfolio

add_shortcode( 'w_studio_ft_portfolio' , 'w_studio_ft_portfolio' );
/***
 * Function to load Portfolio section
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_ft_portfolio( $atts , $content = null ) {
    extract( shortcode_atts( array( 'icon' => '&#x2e;' , 'hover_style' => 'hover-effect-1' , 'portfolio_category' => '' , 'hide_title' => '' , 'post_to_show' => '' ) , $atts ) );

    $output = '';

    $output .= '<div class="row">';
    $args2 = array( 'post_type' => 'portfolio' , 'posts_per_page' => $post_to_show , 'tax_query' => array( 'taxonomy' => 'portfolio-category' , 'field' => 'slug' , 'terms' => $portfolio_category ) , );
    $query_content = new WP_Query( $args2 );

	$w_studio_hover_parent = ( $hover_style == "hover-effect-5" ) ? 'hover-parent-5' : '';
    $w_studio_hover_parent .= ( $hover_style == "hover-effect-3" ) ? 'hover-parent-3' : '';
    $w_studio_hover_parent .= ( $hover_style == "hover-effect-9" ) ? 'hover-parent-9' : '';

    while( $query_content->have_posts() ) : $query_content->the_post();

        $output .= '<div class="col-sm-6">';
        $output .= '<div class="wl-featured-portfolio-box '.$w_studio_hover_parent.'">';

        if( $hover_style == "hover-effect-7" ) {
            $output .= '<div class="' . $hover_style . '">';
            $output .= '<a href=" ' . get_permalink() . ' "><img src=" ' . get_the_post_thumbnail_url( get_the_ID() , 'w_studio_image_370x370' ) . ' " alt=""></a>';
            $output .= '</div>';
        } else {

            $output .= '<a href=" ' . get_permalink() . ' "><img src=" ' . get_the_post_thumbnail_url( get_the_ID() , 'w_studio_image_370x370' ) . ' " alt=""></a>';
            $output .= '<div class="' . $hover_style . '">';

            if( $hover_style == "hover-effect-5" ) {
                $output .= '<div class="hover-inner">';
                $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                $output .= '<span class="wl-color1">' . $portfolio_category . '</span>';
                $output .= '</div>';
            } else if( $hover_style == "hover-effect-6" ) {
                $output .= '<div class="hover-inner">';
                $output .= '<div class="wl-inner-rotate">';
                $output .= '<a data-icon=' . htmlspecialchars_decode( $icon ) . ' class="pull-right wl-color1" href="' . get_permalink() . '"></a>';
                $output .= '<div class="wl-hover-text">';
                $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                $output .= '</div></div>';
                $output .= '</div>';
            } else if( $hover_style == "hover-effect-8" ) {
                $output .= '<div class="hover-text">';
                $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                $output .= '<span class="wl-color1">' . $portfolio_category . '</span>';
                $output .= '</div>';
                $output .= '<div class="hover-inner">';
                $output .= '<a data-icon=' . htmlspecialchars_decode( $icon ) . ' class="wl-color1" href="' . get_permalink() . '"></a>';
                $output .= '</div>';
            } else if( $hover_style == "hover-effect-9" ) {
                $output .= '<div class="hover-inner">';
                $output .= '<div class="hover-text">';
                $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                $output .= '<span class="wl-color1">' . $portfolio_category . '</span>';
                $output .= '</div>';
                $output .= '<div class="hover-icon">';
                $output .= '<a data-icon=' . htmlspecialchars_decode( $icon ) . ' class="pull-right wl-color1" href="' . get_permalink() . '"></a>';
                $output .= '</div></div>';
            } else {
                $output .= '<div class="hover-inner">';
                $output .= '<a href=" ' . get_permalink() . ' ">';
                $output .= '<span class="wl-color1" data-icon=' . htmlspecialchars_decode( $icon ) . ' ></span>';
                $output .= '</a>';
                $output .= '</div>';
            }

            $output .= '</div>';
        }

        $output .= '</div>';
        if( $hide_title !== 'hide' ) {
            $output .= '<h5> <a href=" ' . get_permalink() . ' "> ' . get_the_title() . ' </a></h5>';
        }
        $output .= '</div>';

    endwhile;

    wp_reset_postdata();

    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_service2_contents' , 'w_studio_service2_contents' );
/***
 * Function to load Image content
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_service2_contents( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'imageurl' => '' ,  'heading_style' => '', 'font_size' => '', 'title_color' => '', 'title_border_color' => '', 'hide_title_border' => '', 'overlay_color' => '', 'background_color' => '', 'background_style' => ''  ) , $atts ) );
    $imageid = wp_get_attachment_image_src( $imageurl , 'w_studio_image_570x570' );

    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();
    $className3 = w_studio_random_number1();
    $className4 = w_studio_random_number1();
    $class = '';
    if( $hide_title_border == true ) {
        $class = $className2;
    } else {
        $class = $className3;
    }
    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );

    $custom_inline_style = '.' . $className . '{ color: ' . $title_color . '; font-size: '.$font_size.'px }';
    $custom_inline_style .= '.wl-overlay-black  .' . $class . '::after{ border-top: 0; }';
    $custom_inline_style .= '.wl-overlay-black  .' . $className3 . '::after{ border-top: 2px solid ' . $title_border_color . '; }';
    if( $background_style != 'background-image' || $background_style == '' ) {
        $custom_inline_style .= '.wl-overlay-black.' . $className4 . '{ background-color: ' . $background_color . '; }';
    } else {
        $custom_inline_style .= '.wl-overlay-black.' . $className4 . '{ background-color: ' . $overlay_color . '; }';
    }
    if (empty($imageurl)) {
        $custom_inline_style .= '.wl-overlay-black.' . $className4 . '{ position: relative !important; }';
    }
    wp_add_inline_style( 'custom-style' , $custom_inline_style );
    $output = '';
    $output .= '<div class="wl-relative">';
    if( !empty( $imageurl ) ) {
    $output .= '<img src=" ' . $imageid[ 0 ] . ' " alt="square-img-1.jpg">';
    }
    $output .= '<div class="wl-overlay-black wl-sub-margin wl-services-absolute wl-height1 wl-full-width '.$className4.'">';
    $output .= '<div class="wl-content-withbg pull-left">';
    $output .= '<div class="wl-section-heading wl-color1 '.$class.'">';
    $output .= '<h2 class="wl-color1 '.$className.'"> ' . $title . ' </h2>';
    $output .= '</div>';
    $output .= '<p> ' . $content . ' </p>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';


    return $output;
}

add_shortcode( 'w_studio_onepage_service_image' , 'w_studio_onepage_service_image' );
/***
 * Function to load Single image
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_service_image( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'imageurl' => '' , 'image_size' => '' ) , $atts ) );

    if( $image_size == '' ) {
        $image_size = 'w_studio_image_270x370';
    }
    $imageid = wp_get_attachment_image_src( $imageurl , $image_size );
    $output = '';
    $output .= '<img src=" ' . $imageid[ 0 ] . ' " alt="">';

    return $output;
}

function wTeamSocialiconsShortcode( $post_id ) {

    $output = '';
    $isSocialIcons = get_post_meta( $post_id , 'w-team-icons' , true );

    if( $isSocialIcons == 'on' ) {

        // Get Other General Values

        // Facebook Link
        $teamIconFacebook = get_post_meta( $post_id , 'w-team-icon-facebook' , true );

        // Title Link
        $teamIconTwitter = get_post_meta( $post_id , 'w-team-icon-twitter' , true );

        // Twitter Link
        $teamIconGoogleplus = get_post_meta( $post_id , 'w-team-google-plus-link' , true );

        // Pinterest Link
        $teamIconPinterest = get_post_meta( $post_id , 'w-team-pinterest-link' , true );

        // Linkedin Link
        $teamIconLinkedin = get_post_meta( $post_id , 'w-team-linkedin-link' , true );
    }

    if( $isSocialIcons == 'on' ) {

        if( $teamIconFacebook ):
            $output .= '<a href=" ' . $teamIconFacebook . ' "><span data-icon=&#xe093;></span></a>';
        endif;

        if( $teamIconTwitter ):
            $output .= '<a href=" ' . $teamIconTwitter . ' "><span data-icon=&#xe094;></span></a>';
        endif;

        if( $teamIconGoogleplus ):
            $output .= '<a href=" ' . $teamIconGoogleplus . ' "><span data-icon=&#xe096;></span></a>';
        endif;

        if( $teamIconPinterest ):
            $output .= '<a href=" ' . $teamIconPinterest . ' "><span data-icon=&#xe095;></span></a>';
        endif;

        if( $teamIconLinkedin ):
            $output .= '<a href=" ' . $teamIconLinkedin . ' "><span data-icon=&#xe09d;></span></a>';
        endif;
    }
    return $output;
}

//one page about

add_shortcode( 'w_studio_onepage_about_us' , 'w_studio_onepage_about_us' );
/***
 * Function to load Video
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_about_us( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'videolink' => '' ) , $atts ) );

    $video = wp_get_attachment_url( $videolink );
    $output = '';

    $output .= '<video class="wl-studio-video" controls>';
    $output .= '<source src=" ' . $video . ' " type="video/mp4">Your browser does not support the video tag.';
    $output .= '</video>';

    return $output;
}

add_shortcode( 'w_studio_onepage_price_content' , 'w_studio_onepage_price_content' );
/***
 * Function to load Pricing table
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_price_content( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'title_color' => '' , 'action_font_size' => '' , 'table_bg_color' => '', 'table_bg_hover_color'=> '', 'button_bg_color' => '' , 'suffix_color' => '' , 'border_color' => '' , 'price' => '' , 'price_color' => '' , 'currency_symbol_icon' => '$', 'time' => '' , 'button_link' => '' , 'text_color' => '' , 'action' => '' ) , $atts ) );
    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();

    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    $custom_inline_style = '';
    $custom_inline_style = '.' . $className . '{ color: ' . $text_color . '; font-size:'.$action_font_size.'px}';
    $custom_inline_style .= '.' . $className2 . ' label{ color:'.$title_color.';}';
    $custom_inline_style .= '.' . $className2 . ' .wl-price-amount{ color:'.$price_color.';}';
    $custom_inline_style .= '.' . $className2 . ' .wl-price-amount span{ color:'.$suffix_color.';}';
    $custom_inline_style .= '.' . $className2 . '{ background-color:'.$table_bg_color.';}';
    $custom_inline_style .= '.' . $className2 . ' .wl-price-order{ background-color:'.$button_bg_color.';}';
    $custom_inline_style .= '.' . $className2 . ':hover{ border: 2px solid '.$border_color.'; background-color:'.$table_bg_hover_color.';}';

    wp_add_inline_style( 'custom-style' , $custom_inline_style );
    $output = '';
    $output .= '<div class="wl-pricing text-center pull-left '.$className2.'">';
    $output .= '<label class="wl-full-width"> ' . $title . '</label>';
    $output .= '<div class="wl-price-amount wl-common-marginbottom">';
    $output .= $currency_symbol_icon.' ' . $price . '<span>/ ' . $time . ' </span>';
    $output .= '</div>';
    $output .= do_shortcode( $content );
    $output .= '<div class="wl-price-order pull-left wl-full-width">';
    $output .= '<a href=" ' . $button_link . ' "><h5 class="wl-color1 ' . $className . '"> ' . $action . ' </h5></a>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_price_items' , 'w_studio_price_items' );
/***
 * Function to load Pricing inner
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_price_items( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'title2' => '' , 'icon1' => '' , 'icon2' => '', 'icon_text_color' => '' , 'icon_color' => '' , 'inner_border_color' => '', ) , $atts ) );
 if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();


    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    $custom_inline_style = '';
    $custom_inline_style = '.' . $className . '{ border-right: 1px solid '.$inner_border_color.';border-top: 1px solid '.$inner_border_color.';}';
    $custom_inline_style .= '.' . $className2 . '{ border-top: 1px solid '.$inner_border_color.';}';
    $custom_inline_style .= '.' . $className2 . ' span{ color: '.$icon_color.';}';
    $custom_inline_style .= '.' . $className . ' span{ color: '.$icon_color.';}';
    $custom_inline_style .= '.' . $className . ' p{ color: '.$icon_text_color.';}';
    $custom_inline_style .= '.' . $className2 . ' p{ color: '.$icon_text_color.';}';

    wp_add_inline_style( 'custom-style' , $custom_inline_style );
    $output = '';
    $output .= '<div class="wl-pricing-feature wl-pirce-border-both '.$className.'">';
    $output .= '<span class=' . $icon1 . '></span>';
    $output .= '<p class="text-uppercase wl-standard-marginbottom wl-color2"> ' . $title . '</p>';
    $output .= '</div>';
    $output .= '<div class="wl-pricing-feature wl-pirce-border-one '.$className2.'">';
    $output .= '<span class=' . $icon2 . '></span>';
    $output .= '<p class="text-uppercase wl-standard-marginbottom wl-color2"> ' . $title2 . '</p>';
    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_onepage_googlemap' , 'w_studio_onepage_googlemap' );
/***
 * Function to load Google map
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_googlemap( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'icon' => '' ) , $atts ) );
    $imageid = wp_get_attachment_image_src( $icon , 'w_studio_image_70x70' );
    $output = '';
    $output .= '<div class="contact-map2">';
    $output .= '<div id="googleMap" class="map-height2"></div>';
    $output .= '</div>';

    $output .= '<script type="text/javascript">';
    $output .= 'function mapMarker(){';
    $output .= 'var locations = [';
    $output .= do_shortcode( $content );
    $center = explode('"',$content);
    $output .= '];var map = new google.maps.Map(document.getElementById("googleMap"), {
      zoom: 10,
      center: new google.maps.LatLng('.$center[3].', '.$center[5].'),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        icon: " ' . $imageid[ 0 ] . ' ",
        map: map
      });

      google.maps.event.addListener(marker, "click", (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }';
    $output .= '}';

    $output .= '</script><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzy3IzsQZkYm79duNbouVL5HaiukN9N6U&callback=mapMarker"></script>';

    return $output;

}


add_shortcode( 'w_studio_googlemap' , 'w_studio_googlemap' );
/***
 * Function to load Google map full
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_googlemap( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'icon' => '' ) , $atts ) );
    $imageid = wp_get_attachment_image_src( $icon , 'w_studio_image_70x70' );
    $output = '';
    $output .= '<div class="contact-map">';
    $output .= '<div id="map" class="map-height"></div>';
    $output .= '</div>';
    $output .= '<script type="text/javascript">';
    $output .= 'function mapMarker(){';
    $output .= 'var locations = [';
    $output .= do_shortcode( $content );
    $output .= '];var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        icon: " ' . $imageid[ 0 ] . ' ",
        map: map
      });

      google.maps.event.addListener(marker, "click", (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }';
    $output .= '}';

    $output .= '</script><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzy3IzsQZkYm79duNbouVL5HaiukN9N6U&callback=mapMarker"></script>';

    return $output;
}

add_shortcode( 'w_studio_googlemap_data' , 'w_studio_googlemap_data' );
/***
 * Function to load Map location set
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_googlemap_data( $atts , $content = null ) {
    extract( shortcode_atts( array( 'place' => '' , 'latitude' => '' , 'longitude' => '' ) , $atts ) );

    $output = '';
    $output .= '["' . $place . '", ' . $latitude . ', ' . $longitude . '],';
    return $output;
}

add_shortcode( 'w_studio_onepage_contact_address' , 'w_studio_onepage_contact_address' );
/***
 * Function to load Contact address
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_contact_address( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title1' => '' , ) , $atts ) );

    $output = '';
    $output .= '<h5 class="wl-standard-marginbottom"> ' . $title1 . ' </h5>';
    $output .= '<address>';
    $output .= '<div class="para">'.$content.'</div>';
    $output .= '</address>';

    return $output;
}


add_shortcode( 'w_studio_onepage_contact_accordion_wrapper' , 'w_studio_onepage_contact_accordion_wrapper' );
/***
 * Function to load Accordion
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_contact_accordion_wrapper( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' ) , $atts ) );

    $output = '';
    $output .= '<div class="clearfix"></div>';
    $output .= '<div class="panel-group" id="wl-contact-accordion" role="tablist" aria-multiselectable="true">';
    $output .= do_shortcode( $content );
    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_onepage_contact_accordion' , 'w_studio_onepage_contact_accordion' );
/***
 * Function to load Accordion set
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_contact_accordion( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'border' => '' , 'title_color' => '' , 'icon_color' => '' , 'bg_color' => '' , 'border_color' => '' , ) , $atts ) );

    $panel_id = w_studio_random_number();
    $collapse_id = w_studio_random_number();
    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();

    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    if( $border == 'no-border' ) {
        $custom_inline_style = '.' . $className . '{ border-bottom:0!important;}';
    } else {
        $custom_inline_style = '.' . $className . '{ border-color:' . $border_color . '!important;}';
    }

    $custom_inline_style .= '.' . $className2 . ' a span{background-color:' . esc_attr($bg_color) . '!important}';
    $custom_inline_style .= '.' . $className2 . ' a span i{color:' . $icon_color . '!important}';
    $custom_inline_style .= '.' . $className2 . ' a {color:' . $title_color . '!important}';
    //    return $custom_inline_style;
    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';
    if( $border == 'no-border' ) {
        $output .= '<div class="panel panel-default ' . $className . '">';
    } else {
        $output .= '<div   class="panel panel-default  ' . $className . '">';
    }
    $output .= '<div class="panel-heading" role="tab" id="' . $panel_id . '">';
    $output .= '<h5 class="panel-title ' . $className2 . '">';
    $output .= '<a role="button" data-toggle="collapse" data-parent="#wl-contact-accordion" href="#' . $collapse_id . '" aria-expanded="false" aria-controls=" ' . $collapse_id . '">';
    $output .= '<span><i class="pull-left" data-icon=&#x33;></i></span> ' . $title . '</a>';
    $output .= '</h5></div>';
    $output .= '<div id="' . $collapse_id . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="' . $panel_id . '">';
    $output .= '<div class="panel-body"> ' . $content . '</div>';
    $output .= '</div></div>';

    return $output;
}

function w_studio_random_number() {
    $wl_accordion = 'wl-';
    for( $i = 0 ; $i < 5 ; $i++ ) {
        $wl_accordion .= mt_rand( 0 , 9999 );
    }
    return $wl_accordion;
}

add_shortcode( 'w_studio_team_1' , 'w_studio_team_1' );
/***
 * Function to load Team 1 Page
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_team_1( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'post_limit' => '' , 'team_style' => '' , 'team_order' => '' , 'team_order_by' => '' , 'load_more_show' => '' , ) , $atts ) );
	
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
	
    $output = '';

    if( $team_style == 'style-2' ) {

        $args2 = array( 'post_type' => 'team' , 'posts_per_page' => $post_limit , 'order' => $team_order , 'orderby' => $team_order_by );
        $query_content = new WP_Query( $args2 );
        $output .= '<div class="addMoreTeam row">';
        while( $query_content->have_posts() ) : $query_content->the_post();
            global $post;
            $terms = get_the_terms( $post->ID , 'designation' );

            $output .= '<div class="col-md-4 col-sm-6 wl-nomalmargin-bottom">';
            $output .= '<div class="row">';
            $output .= '<div class="col-md-12">';
            $output .= '<a href=" ' . get_the_permalink() . ' "><img src=" ' . get_the_post_thumbnail_url( get_the_ID() , 'w_studio_image_370x370' ) . ' " alt=""></a>';
            $output .= '</div></div></div>';
            $output .= '<div class="col-md-2 col-sm-6 wl-nomalmargin-bottom">';
            $output .= '<div class="row">';
            $output .= '<div class="col-md-12 wl-square-title wl-height4">';
            $output .= '<div class="wl-bottom-title">';
            $output .= '<a href=" ' . get_the_permalink() . ' "><h5>' . get_the_title() . '</h5></a><span class="wl-standard-marginbottom show">'.get_post_meta( $post->ID, 'w-team-member-designation', true).'</span>';

            $output .= '<div class="wl-media-icons wl-media-icons2 pull-left">';
            $output .= '<div class="wl-media-plot row">';

            $isSocialIcons = get_post_meta( $post->ID , 'w-team-icons' , true );

            if( $isSocialIcons == 'on' ):
                // Facebook Link
                $teamIconFacebook = get_post_meta( $post->ID , 'w-team-icon-facebook' , true );
                // Title Link
                $teamIconTwitter = get_post_meta( $post->ID , 'w-team-icon-twitter' , true );
                // Twitter Link
                $teamIconGoogleplus = get_post_meta( $post->ID , 'w-team-google-plus-link' , true );
                // Pinterest Link
                $teamIconPinterest = get_post_meta( $post->ID , 'w-team-pinterest-link' , true );
                // Linkedin Link
                $teamIconLinkedin = get_post_meta( $post->ID , 'w-team-linkedin-link' , true );

            endif;
            if( $isSocialIcons == 'on' ):

                if( $teamIconFacebook ):
                    $output .= '<a href=" ' . $teamIconFacebook . ' "><span data-icon=&#xe093;></span></a>';
                endif;

                if( $teamIconTwitter ):
                    $output .= '<a href=" ' . $teamIconTwitter . ' "><span data-icon=&#xe094;></span></a>';
                endif;

                if( $teamIconGoogleplus ):
                    $output .= '<a href=" ' . $teamIconGoogleplus . ' "><span data-icon=&#xe096;></span></a>';
                endif;

                if( $teamIconPinterest ):
                    $output .= '<a href=" ' . $teamIconPinterest . ' "><span data-icon=&#xe095;></span></a>';
                endif;

                if( $teamIconLinkedin ):
                    $output .= '<a href=" ' . $teamIconLinkedin . ' "><span data-icon=&#xe09d;></span></a>';
                endif;

            endif;
            $output .= '</div></div></div></div></div></div>';
        endwhile;
        wp_reset_postdata();
        $output .= '</div>';
    } elseif( $team_style == 'style-3' ) {
        global $post;
        $optionValues = get_option( 'w_studio' );
        $args2 = array( 'post_type' => 'team' , 'posts_per_page' => $post_limit , 'order' => $team_order , 'orderby' => $team_order_by );
        $query_content = new WP_Query( $args2 );
        $output = '';
        $output .= '<div class="addMoreTeam team-style-3">';
        $i = 0;

        while( $query_content->have_posts() ) : $query_content->the_post();
			global $post;
            if( $i % 4 < 2 ):
                $output .= '<div class="col-md-6 col-sm-12">';
                $output .= '<div class="row wl-xs-row">';
                $output .= '<div class="col-sm-6 wl-paddingzero">';
                $output .= '<a href="' . get_the_permalink() . '"><img src=" ' . get_the_post_thumbnail_url( get_the_ID() , 'w_studio_image_370x370' ) . ' " alt=""></a>';
                $output .= '</div>';
                $output .= '<div class="col-sm-6 wl-paddingzero">';
                $output .= '<div class="wl-team-descript wl-team-3">';
                $output .= '<a href="' . get_the_permalink() . '"><h5 class="wl-section-margintop2"> ' . get_the_title() . '</h5></a><span class="wl-standard-marginbottom show">'.get_post_meta( $post->ID, 'w-team-member-designation', true).'</span>';

                $socialicon = wTeamSocialiconsShortcode( get_the_ID() );

                $output .= '<p class="wl-color2"> ' . w_studio_team_excerpt(16) . '</p>';
                $output .= '<div class="wl-media-icons pull-left">';
                $output .= '<div class="wl-media-plot plot-pading">';
                $output .= $socialicon;
                $output .= '</div></div></div></div></div></div>';
            else:
                $output .= '<div class="col-md-6 col-sm-12">';
                $output .= '<div class="row wl-xs-row">';
                $output .= '<div class="col-sm-6 wl-paddingzero pull-right">';
                $output .= '<a href="#"><img src=" ' . get_the_post_thumbnail_url( get_the_ID() , 'w_studio_image_370x370' ) . ' " alt=""></a>';
                $output .= '</div>';
                $output .= '<div class="col-sm-6 wl-paddingzero text-align-right">';
                $output .= '<div class="wl-team-descript wl-team-3">';
                $output .= '<a href="#"><h5 class="wl-section-margintop2"> ' . get_the_title() . '</h5></a>';
				$output .= '<span class="wl-standard-marginbottom show">'.get_post_meta( $post->ID, 'w-team-member-designation', true).'</span>';

                $output .= '<p class="wl-color2"> ' . w_studio_team_excerpt(16) . '</p>';
                $output .= '<div class="wl-media-icons pull-left">';
                $output .= '<div class="wl-media-plot plot-pading">';
                $output .= $socialicon;
                $output .= '</div></div></div></div></div></div>';

            endif;
            $i++;
        endwhile;
        wp_reset_postdata();
        $output .= '</div>';
    } else {

        $args2 = array( 'post_type' => 'team' , 'posts_per_page' => $post_limit );
        $query_content = new WP_Query( $args2 );

        $output .= '<div class="addMoreTeam">';
        while( $query_content->have_posts() ) : $query_content->the_post();
            global $post;

            $output .= '<div class="col-md-12 wl-floating-odd-parent">';
            $output .= '<div class="col-md-6 col-sm-6 wl-floating-odd text-right">';
            $output .= '<a href=" ' . get_the_permalink() . ' "><img src=" ' . get_the_post_thumbnail_url( get_the_ID() , 'w_studio_image_550x550' ) . ' " alt=""></a>';
            $output .= '</div>';
            $output .= '<div class="col-md-6 col-sm-6 wl-even">';
            $output .= '<div class="wl-team-descript">';
            $output .= '<a href=" ' . get_the_permalink() . ' "><h5 class="wl-section-margintop2">' . get_the_title() . '</h5></a>';
            $output .= '<span class="wl-standard-marginbottom show">'.get_post_meta( $post->ID, 'w-team-member-designation', true).'</span>';
            $output .= '<p class="wl-color2"> ' . w_studio_team_excerpt(36) . ' </p>';
            $output .= '<div class="wl-media-icons pull-left">';
            $output .= '<div class="wl-media-plot">';
            $isSocialIcons = get_post_meta( $post->ID , 'w-team-icons' , true );

            if( $isSocialIcons == 'on' ):
                // Facebook Link
                $teamIconFacebook = get_post_meta( $post->ID , 'w-team-icon-facebook' , true );
                // Title Link
                $teamIconTwitter = get_post_meta( $post->ID , 'w-team-icon-twitter' , true );
                // Twitter Link
                $teamIconGoogleplus = get_post_meta( $post->ID , 'w-team-google-plus-link' , true );
                // Pinterest Link
                $teamIconPinterest = get_post_meta( $post->ID , 'w-team-pinterest-link' , true );
                // Linkedin Link
                $teamIconLinkedin = get_post_meta( $post->ID , 'w-team-linkedin-link' , true );

            endif;
            if( $isSocialIcons == 'on' ):

                if( $teamIconFacebook ):
                    $output .= '<a href=" ' . $teamIconFacebook . ' "><span data-icon=&#xe093;></span></a>';
                endif;

                if( $teamIconTwitter ):
                    $output .= '<a href=" ' . $teamIconTwitter . ' "><span data-icon=&#xe094;></span></a>';
                endif;

                if( $teamIconGoogleplus ):
                    $output .= '<a href=" ' . $teamIconGoogleplus . ' "><span data-icon=&#xe096;></span></a>';
                endif;

                if( $teamIconPinterest ):
                    $output .= '<a href=" ' . $teamIconPinterest . ' "><span data-icon=&#xe095;></span></a>';
                endif;

                if( $teamIconLinkedin ):
                    $output .= '<a href=" ' . $teamIconLinkedin . ' "><span data-icon=&#xe09d;></span></a>';
                endif;

            endif;
            $output .= '</div></div></div></div></div>';

        endwhile;
        wp_reset_postdata();
        $output .= '</div>';
    }

    // load more
    if( !$load_more_show ) {

        $output .= '<div class="wl-sort-link text-center wl-section-marginbottom50">';
        $output .= '<div class="wl-link-to">';
        $output .= '<span class="wl-direction-left" data-icon=&#x45;></span>';
        $output .= '<a href="javascript:void(0);" data-value="team" id="load_more_team">';

        if( isset( $load_more_text ) && !empty( $load_more_text ) ) {
            $output .= $load_more_text;
        } else {
            $output .= 'load more';
        }
        $output .= '</a><span class="wl-direction-right" data-icon=&#x44;></span>';
        $output .= '</div></div>';
        $output .= '<a id="initialPageValue">2</a>';
    }

    wp_register_script( 'teamloadmore' , W_STUDIO_THEME_ASSETS_JS . '/load.more-team.js' , '' , '1.0.0' , true );

    wp_enqueue_script( 'teamloadmore' );

    wp_localize_script( 'teamloadmore' , 'w_studio_loadmoreteam' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) , 'fileName' => $team_style , 'limit' => $post_limit ) );

    wp_reset_postdata();

    return $output;
}

add_shortcode( 'w_studio_abt_testimonial' , 'w_studio_abt_testimonial' );
/***
 * Function to load Testimonial
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_abt_testimonial( $atts , $content = null ) {

    extract( shortcode_atts( array( 'title' => '' , 'type_of_testimonial' => '' , 'style_two_img' => '', 'font_size' => '' , 'title_color' => '', 'title_border_color' => '', 'hide_title_border' => '' ) , $atts ) );

    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();
    $className3 = w_studio_random_number1();
    $class = '';
    if( $hide_title_border == true ) {
        $class = $className2;
    } else {
        $class = $className3;
    }
    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );

    $custom_inline_style = '.' . $className . '{ color: ' . $title_color . '; font-size: '.$font_size.'px }';
    $custom_inline_style .= '.' . $class . '::after{ border-top: 0; }';
    $custom_inline_style .= '.' . $className3 . '::after{ border-top: 2px solid ' . $title_border_color . '; }';

    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';

    $testimonialPosts = new WP_Query( array( 'post_type' => 'testimonial' ) );

    if( $type_of_testimonial == 'style-1' || $type_of_testimonial == '' ) {
        $output .= '<div class="container">';
        $output .= '<div class="row wl-section-slider">';
        $output .= '<div class="col-md-7">';
        $output .= '<div class="wl-clients-testimonial wl-text-slider wl-testimonial-small">';
        $output .= '<div class="wl-section-heading '.$class.'">';
        $output .= '<h2 class="wl-margin-topaligned '.$className.'">' . $title . '</h2>';
        $output .= '</div>';
        $output .= '<div class="text-owl owl-carousel owl-theme">';

        while( $testimonialPosts->have_posts() ) {

            global $post;

            $testimonialPosts->the_post();

            $testimonial_designation = get_post_meta( $post->ID , 'w-testimonial-designation' , true );
            $testimonial_quote = get_post_meta( $post->ID , 'w-testimonial-quote' , true );
            $testimonial_name = get_the_title( $post->ID );

            $output .= '<div class="item">';
            $output .= '<p>' . $testimonial_quote . '</p>';
            $output .= '<h5>-' . $testimonial_name . '</h5>';
            $output .= '<span class="wl-client-designation  wl-client-align">' . $testimonial_designation . '</span>';
            $output .= '</div>';
        }

        $output .= '</div>';
        $output .= do_shortcode( $content );
        $output .= '</div></div>';
        $output .= '<div class="col-md-5">';
        $output .= '<div class="img-owl owl-carousel owl-theme">';

        while( $testimonialPosts->have_posts() ) {

            global $post;

            $testimonialPosts->the_post();

            $testimonial_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'w_studio_image_570x420' );

            $output .= '<div class="item">';
            $output .= '<img alt="' . $testimonial_image[ 0 ] . '" src="' . $testimonial_image[ 0 ] . '">';
            $output .= '</div>';
        }

        $output .= '</div></div></div></div>';

    } else if( $type_of_testimonial == 'style-2' ) {

        $output .= '<div class="row wl-section-slider">';
        $output .= '<div class="col-md-6 pull-right">';
        $output .= '<div class="wl-clients-testimonial wl-text-slider">';
        $output .= '<div class="wl-section-heading '.$class.'">';
        $output .= '<h2 class="wl-margin-topaligned '.$className.'">' . $title . '</h2>';
        $output .= '</div><div class="text-owl owl-carousel owl-theme">';

        while( $testimonialPosts->have_posts() ) {

            global $post;

            $testimonialPosts->the_post();

            $testimonial_designation = get_post_meta( $post->ID , 'w-testimonial-designation' , true );
            $testimonial_quote = get_post_meta( $post->ID , 'w-testimonial-quote' , true );
            $testimonial_name = get_the_title( $post->ID );

            $output .= '<div class="item">';
            $output .= '<p>' . $testimonial_quote . '</p>';
            $output .= '<h5>-' . $testimonial_name . '</h5>';
            $output .= '<span class="wl-client-designation">' . $testimonial_designation . '</span>';
            $output .= '</div>';
        }

        $output .= '</div></div></div>';
        $output .= '<div class="col-md-6">';
        $output .= '<div class="wl-clients">';
        $output .= '<div class="img-owl owl-carousel owl-theme">';

        while( $testimonialPosts->have_posts() ) {

            global $post;

            $testimonialPosts->the_post();

            $testimonial_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'w_studio_image_570x420' );

            $output .= '<div class="item"><img src="' . $testimonial_image[ 0 ] . '" alt="' . $testimonial_image[ 0 ] . '"></div>';
        }

        $output .= '</div></div></div></div>';

    }

    wp_reset_postdata();

    return $output;
}

add_shortcode( 'w_studio_abt_client' , 'w_studio_abt_client' );

/***
 * Function to load Client logo
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_abt_client( $atts , $content = null ) {

    extract( shortcode_atts( array( 
        'client_style' => '', 
        'number_of_posts' => '', 
        'number_of_posts_in_row' => '', 
        'order_by' => 'ASC',
        'height' => '' ) , $atts ) 
    );

    ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/client-content.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode( 'w_studio_button' , 'w_studio_button' );
/***
 * Function to load Button
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_button( $atts , $content = null ) {

    ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/button-content.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode( 'w_studio_cta_box' , 'w_studio_cta_box' );
/***
 * Function to load Button
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_cta_box( $atts , $content = null ) {

    ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/cta-box.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

// portfolio template
add_shortcode( 'w_studio_portfolio_template' , 'w_studio_portfolio_template' );
function w_studio_portfolio_template( $atts , $content = null ) {
    extract( shortcode_atts( array(
        'portfolio_style' => '' ,
        'posts_per_page' => '',
        'category_slug_name' => '' ,
        'order' => '' ,
        'order_by' => '' ,
        'is_filter' => '' ,
        'is_loadmore' => '' ,
        'load_more_text' => '' ,
        'hover_style' => '' ) , $atts ) );

    global $post;
    $output = '';

    if( $portfolio_style == 'portfolio-col-1' || $portfolio_style == 'portfolio-style-1' || $portfolio_style == 'portfolio-style-2' || $portfolio_style == 'portfolio-style-3' ) {
        $portfolioFilterId = "js-filters-col-one";
    } else if( $portfolio_style == 'portfolio-col-2' || $portfolio_style == 'portfolio-style-4' ) {
        $portfolioFilterId = "js-filters-col-two";
    } else if( $portfolio_style == 'portfolio-col-3' ) {
        $portfolioFilterId = "js-filters-col-three";
    } else if( $portfolio_style == 'portfolio-masonry-1' || $portfolio_style == 'portfolio-masonry-2' ) {
        $portfolioFilterId = "js-filters-mosaic";
    } else if( $portfolio_style == 'portfolio-masonry-3' || $portfolio_style == 'portfolio-masonary-4' ) {
        $portfolioFilterId = "js-filters-mosaic2";
    } else {
        $portfolioFilterId = "js-filters-col-one";
    }

    if( $is_filter ) {
        $output .= '<div class="row wl-filter-margin">';
        $output .= '<div class="wl-menu-filter">';
        $output .= '<ul id="' . $portfolioFilterId . '" class="cbp-l-filters-button">';
        $output .= '<li data-filter="*" class="cbp-filter-item-active cbp-filter-item">';
        $output .= 'All <div class="cbp-filter-counter"></div>';
        $output .= '</li>';
        $profolio_post = array( 'type' => 'portfolio' , 'taxonomy' => 'portfolio-category' );
        $categories = get_categories( $profolio_post );
        foreach( $categories as $category ):
            $output .= '<li data-filter=".' . $category->slug . '" class="cbp-filter-item">';
            $output .= $category->name . ' <div class="cbp-filter-counter"></div>';
            $output .= '</li>';
        endforeach;
        $output .= '</ul></div></div>';
    }

    // template design options
    $optionValues = get_option( 'w_studio' );
    $hoverStyle = '';
    $hoverParentClass = '';
    $hoverBorderClass = '';
    $overflow = '';
    $imageStyle = '';
    $wl_relative = 'wl-relative';
    $counter = 0;
    $hoverStyle = 'hover-effect-' . $hover_style;
    if( $hover_style == 3 || $hover_style == 5 || $hover_style == 9 || $hover_style == 'default' ) {
        $hoverParentClass = 'hover-parent-' . $hover_style;
        $imageStyle = 'hover-img-' . $hover_style;
    }
    if( $hover_style == 4 ) {
        $hoverBorderClass = 'icon-border';
    }
    if( $hover_style == 6 || $hover_style == '' ) {
        $hoverStyle = 'hover-effect-1';
    }
    if( $hover_style == 7 ) {
        $imageStyle = 'hover-effect-7';
    }
    if( $hover_style == 9 ) {
        $wl_relative = '';
    }

    if($posts_per_page != '') {
        $post_count = $posts_per_page;
    } else if($optionValues['w-portfolio-post-number'] != '') {
        $post_count = $optionValues['w-portfolio-post-number'];
    } else {
        $post_count = '-1';
    }

    if( $category_slug_name != 'all' ) {
        $category_slug = explode( ',' , $category_slug_name );
    } else {
        $category_slug = get_terms( 'portfolio-category' , array(
            'hide_empty' => 0 ,
            'fields' => 'names'
        ) );
    }

    $args = array(
        'post_type' => 'portfolio' ,
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio-category' ,
                'field' => 'name' ,
                'terms' => $category_slug ,
            ) ,
        ) ,
        'posts_per_page' => $post_count ,
        'taxonomy' => 'portfolio-category' ,
        'order' => $order ,
        'orderby' => $order_by );
    $query = new WP_Query( $args );

    if( $query->have_posts() ) {

        if( $portfolio_style == 'portfolio-col-1' || $portfolio_style == 'default' ) {

            $counter = 1;
            $class = '';
            $hoverStyle = '';
            if( $hover_style == 2 ) {
                $hoverStyle = 'hover-effect-2';
            } else {
                $hoverStyle = 'hover-effect-1';
            }

            $output .= '<div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic">';

            while( $query->have_posts() ) : $query->the_post();
                if( $counter % 2 == 1 ) {
                    $class = 'wl-align-left';
                    $iconClass = 'bottom-icon-right';
                } else {
                    $class = 'wl-align-right';
                    $iconClass = 'bottom-icon-left';
                }
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . ' ' . $counter . '">';
                $output .= '<div class="' . $class . '  wl-relative row">';
                $output .= '<div class="wl-style-img-big blog-overlay-hover">';
                $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_1170x570" ) . '</a>';
                $output .= '<div class="col-sm-4 col-xs-12 wl-overlay-black wl-overlay-absolute wl-content-withbg">';
                $output .= '<a class="wl-color4" href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5></a>';
                $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                $output .= '</div></div>';
                $output .= '<div class="' . $hoverStyle . '">';
                $output .= '<div class="hover-inner">';
                if( $hover_style != 2 ) {
                    $output .= '<a href="' . get_the_permalink() . '"></a>';
                } else {
                    $output .= '<a class="wl-color1" data-icon="0" href="' . get_the_permalink() . '"></a>';
                }
                $output .= '</div>';
                $output .= '<div class="' . $iconClass . '">';
                $output .= '<a class="wl-color1" data-icon="0" href="' . get_the_permalink() . '"></a>';
                $output .= '</div></div></div></div>';
                $counter++;
            endwhile;
            wp_reset_postdata();
            $output .= '</div>';
        } else if( $portfolio_style == 'portfolio-col-2' ) {

            if( $hover_style == 3 ) {
                $hoverParentClass = 'hover-parent-' . $hover_style;
                $imageStyle = 'hover-img-' . $hover_style;
            }
            if( $hover_style == 4 ) {
                $hoverBorderClass = 'icon-border';
            }
            if( $hover_style == 7 ) {
                $imageStyle = 'hover-effect-7';
            }

            $output .= '<div id="js-grid-col-two" class="cbp cbp-l-grid-mosaic portfolio-col-2">';
            while( $query->have_posts() ) : $query->the_post();
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="row">';
                $output .= '<div class="col-md-6 col-sm-6 wl-bg-color1 wl-padding-rightzero wl-height2 wl-col-leftpadding wl-sibling-hover-1 ">';
                $output .= '<a href="' . get_the_permalink() . '"><h5 class="wl-section-margintop2">' . get_the_title() . '</h5></a>';
                $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                $output .= '</div>';
                $output .= '<div class="col-md-6 col-sm-6 wl-paddingzero wl-sibling-hover-2">';
                $output .= '<div class="wl-decrease-small-left ' . $wl_relative . ' ' . $hoverParentClass . ' ' . $overflow . ' wl-inline-block">';
                if( $hover_style == 7 ) {
                    $output .= '<div class="' . $imageStyle . ' image-height-2">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_300x225" ) . '</a>';
                    $output .= '</div>';
                } else {
                    $output .= '<div class="image-height-2">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_300x225" ) . '</a>';
                    $output .= '</div>';
                    $output .= '<div class="' . $hoverStyle . '">';
                    $output .= '<div class="hover-inner">';
                    $output .= '<a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x30;></a>';
                    $output .= '</div></div>';
                }
                $output .= '</div></div></div></div>';

            endwhile;
            wp_reset_postdata();
            $output .= '</div>';
        } else if( $portfolio_style == 'portfolio-col-3' ) {
            $output .= '<div id="js-grid-col-three" class="cbp cbp-l-grid-mosaic">';
            while( $query->have_posts() ) : $query->the_post();
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . ' wrapper-padding">';
                $output .= '<div class="' . $wl_relative . ' ' . $hoverParentClass . ' ' . $overflow . ' hover-sibling-2">';
                if( $hover_style == 7 ) {
                    $output .= '<div class="' . $imageStyle . '">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_300x225" ) . '</a>';
                    $output .= '</div>';
                } else {
                    $output .= '<div class="">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_300x225" ) . '</a>';
                    $output .= '</div>';
                }
                if( $hover_style != 7 ) {
                    $output .= '<div class="' . $hoverStyle . '">';
                    if( $hover_style == 8 ) {
                        $output .= '<div class="hover-text">';
                        $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                        $output .= '<span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span></div>';
                        $output .= '<div class="hover-inner">';
                        $output .= '<a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x30;></a>';
                        $output .= '</div>';
                    } else {

                        $output .= '<div class="hover-inner">';
                        if( $hover_style == 5 ) {
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span>';
                        } else if( $hover_style == 6 ) {
                            $output .= '<div class="wl-inner-rotate">';
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 pull-right" data-icon=&#x30;></a>';
                            $output .= '<div class="wl-hover-text">';
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div></div>';
                        } else if( $hover_style == 9 ) {
                            $output .= '<div class="hover-text">';
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div>';
                            $output .= '<div class="hover-icon">';
                            $output .= '<a data-icon=&#x30; class="pull-right wl-color1" href="#"></a>';
                            $output .= '</div>';
                        } else {
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 ' . $hoverBorderClass . '" data-icon=&#x30;></a>';
                        }
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                $output .= '</div>';
                $output .= '<div class="wl-standard-margin hover-sibling-1">';
                $output .= '<h5><a href="' . get_the_permalink() . '" class="wl-color4">' . get_the_title() . '</a></h5>';
                $output .= '<p class="wl-regular-text">' . $portfolio_category . '</p>';
                $output .= '</div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div>';
        } else if( $portfolio_style == 'portfolio-masonry-1' ) {

            $output .= '<div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">';
            while( $query->have_posts() ) : $query->the_post();
                $width = '';
                $height = '';
                $size = '';
                if( $counter == 10 ) {
                    $counter = 0;
                }
                if( $counter == 0 || $counter == 8 ) {
                    $width = 600;
                    $height = 600;
                    $size = 'w_studio_image_570x570';
                }
                if( $counter == 1 || $counter == 3 || $counter == 5 || $counter == 7 ) {
                    $width = 300;
                    $height = 600;
                    $size = 'w_studio_image_270x570';
                }
                if( $counter == 2 || $counter == 4 || $counter == 6 || $counter == 9 ) {
                    $width = 300;
                    $height = 300;
                    $size = 'w_studio_image_270x270';
                }
                $counter++;
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="cbp-caption">';
                $output .= '<div class="cbp-caption-defaultWrap">';
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" data-cbp-src="' . get_the_post_thumbnail_url( $post->ID , $size ) . '" alt="" width="' . $width . '" height="' . $height . '" />';
                $output .= '</div>';
                $output .= '<div class="cbp-caption-activeWrap hover-effect-1">';
                $output .= '<div class="cbp-l-caption-alignCenter">';
                $output .= '<div class="cbp-l-caption-body">';
                $output .= '<div class="cbp-l-caption-title profile-links">';
                $output .= '<a data-icon=&#x30; href="' . get_the_permalink() . '"></a>';
                $output .= '<a data-icon=&#x54; href="' . get_the_post_thumbnail_url( $post->ID , "large" ) . '" class="cbp-lightbox"></a>';
                $output .= '</div></div></div>';
                $output .= '<div class="hover-text">';
                $output .= '<h5 class="wl-color1 top-zero"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                $output .= '<span class="wl-color1">' . $portfolio_category . '</span>';
                $output .= '</div></div></div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div>';
        } else if( $portfolio_style == 'portfolio-masonry-2' ) {
            $output .= '<div id="js-grid-mosaic" class="cbp cbp-l-grid-mosaic">';
            while( $query->have_posts() ) : $query->the_post();
                $width = '';
                $height = '';
                $size = '';
                if( $counter == 10 ) {
                    $counter = 0;
                }
                if( $counter == 0 || $counter == 7 ) {
                    $width = 600;
                    $height = 600;
                    $size = 'w_studio_image_570x570';
                } else {
                    $width = 300;
                    $height = 300;
                    $size = 'w_studio_image_270x270';
                }
                $counter++;
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="cbp-caption">';
                $output .= '<div class="cbp-caption-defaultWrap">';
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="  data-cbp-src="' . get_the_post_thumbnail_url( $post->ID , $size ) . '" alt="" width="' . $width . '" height="' . $height . '" />';
                $output .= '</div>';
                $output .= '<div class="cbp-caption-activeWrap effect1 hover-effect-1">';
                $output .= '<div class="cbp-l-caption-alignCenter">';
                $output .= '<div class="cbp-l-caption-body">';
                $output .= '<div class="cbp-l-caption-title profile-links">';
                $output .= '<a data-icon=&#x30; href="' . get_the_permalink() . '"></a>';
                $output .= '<a data-icon=&#x54; href="' . get_the_post_thumbnail_url( $post->ID , "large" ) . '" class="cbp-lightbox"></a>';
                $output .= '</div></div></div>';
                $output .= '<div class="hover-text">';
                $output .= '<h5 class="wl-color1 top-zero"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                $output .= '<span class="wl-color1">' . $portfolio_category . '</span>';
                $output .= '</div></div></div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div>';
        } else if( $portfolio_style == 'portfolio-masonry-3' ) {
            $counter = 1;
            $output .= '<div id="js-grid-mosaic2" class="cbp cbp-l-grid-mosaic">';
            while( $query->have_posts() ) : $query->the_post();
                $width = '';
                $height = '';
                $size = '';
                if( $counter == 9 ) {
                    $counter = 0;
                }
                if( $counter == 0 || $counter == 3 || $counter == 6 ) {
                    $width = 400;
                    $height = 600;
                    $size = 'w_studio_image_370x570';
                }
                if( $counter == 1 || $counter == 5 || $counter == 7 ) {
                    $width = 400;
                    $height = 400;
                    $size = 'w_studio_image_370x370';
                }
                if( $counter == 2 || $counter == 4 || $counter == 8 ) {
                    $width = 400;
                    $height = 300;
                    $size = 'w_studio_image_370x270';
                }
                $counter++;
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="cbp-caption">';
                $output .= '<div class="cbp-caption-defaultWrap">';
                $output .= '<img src="data:image/gif;base64,R0lGODlhAQABAPAAAP///////yH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" data-cbp-src="' . get_the_post_thumbnail_url( $post->ID , $size ) . '" alt="" width="' . $width . '" height="' . $height . '" />';
                $output .= '</div>';
                $output .= '<div class="cbp-caption-activeWrap effect1 hover-effect-1">';
                $output .= '<div class="cbp-l-caption-alignCenter">';
                $output .= '<div class="cbp-l-caption-body">';
                $output .= '<div class="cbp-l-caption-title profile-links">';
                $output .= '<a data-icon=&#x30; href="' . get_the_permalink() . '"></a>';
                $output .= '<a data-icon=&#x54; href="' . get_the_post_thumbnail_url( $post->ID , "large" ) . '" class="cbp-lightbox"></a>';
                $output .= '</div></div></div>';
                $output .= '<div class="hover-text">';
                $output .= '<h5 class="wl-color1 top-zero"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                $output .= '<span class="wl-color1">' . $portfolio_category . '</span>';
                $output .= '</div></div></div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div>';
        } else if( $portfolio_style == 'portfolio-masonry-4' ) {

            ob_start();
            set_query_var( 'atts', $atts );

            include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/shortcode-template-portfolio-masonary-4.php' );
            $output .= ob_get_contents();
            ob_end_clean();

        } else if( $portfolio_style == 'portfolio-style-1' ) {
            $counter = 1;
            $output .= '<div class="row">';
            $output .= '<div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic wl-one-col">';
            while( $query->have_posts() ) : $query->the_post();
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                if( $counter % 2 == 0 ) {
                    $align = 'pull-right';
                } else {
                    $align = '';
                }
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="column-2 clearfix row">';
                $output .= '<div class="col-md-4 col-sm-6 col-xs-12 wl-sibling-hover-1 ' . $align . '">';
                $output .= '<div class="wl-height1 wl-full-width style-6-left">';

                if( $counter % 2 != 0 ) {
                    $output .= '<div class="style-6-left-text">';
                    $output .= '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5></a>';
                    $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                    $output .= '</div>';
                    $output .= '<div class="style-6-left-icon hidden-xs">';
                    $output .= '<a href="' . get_the_permalink() . '" data-icon=&#x24;></a>';
                    $output .= '</div>';
                } else {
                    $output .= '<div class="style-6-left-icon hidden-xs">';
                    $output .= '<a href="' . get_the_permalink() . '" data-icon=&#x23;></a>';
                    $output .= '</div>';
                    $output .= '<div class="style-6-left-text text-right">';
                    $output .= '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5></a>';
                    $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                    $output .= '</div>';
                }
                $output .= '</div></div>';
                $output .= '<div class="col-md-8 col-sm-6 col-xs-12 wl-sibling-hover-2">';
                $output .= '<div class="' . $wl_relative . ' ' . $hoverParentClass . ' ' . $overflow . '">';
                if( $hoverStyle == 5 || $hoverStyle == 7 || $hoverStyle == 9 ) {
                    $output .= '<div class="' . $imageStyle . '">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_770x570" ) . '</a>';
                    $output .= '</div>';
                } else {
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_770x570" ) . '</a>';
                }
                $output .= '<div class="' . $hoverStyle . '">';
                if( $hoverStyle == 8 ) {
                    $output .= '<div class="hover-text">';
                    $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                    $output .= '<span class="wl-color1">';
                    if( $terms ) {
                        foreach( $terms as $term ) {
                            $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                            $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                        }
                    }
                    $output .= '</span></div>';
                    $output .= '<div class="hover-inner">';
                    $output .= '<a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x30;></a>';
                    $output .= '</div>';
                } else {
                    $output .= '<div class="hover-inner">';
                    if( $hoverStyle == 5 ) {
                        $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                        $output .= '<span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span>';
                    } else if( $hoverStyle == 6 ) {
                        $output .= '<div class="wl-inner-rotate">';
                        $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 pull-right" data-icon=&#x30;></a>';
                        $output .= '<div class="wl-hover-text">';
                        $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                        $output .= '<span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span></div></div>';
                    } else if( $hoverStyle == 9 ) {
                        $output .= '<div class="hover-text">';
                        $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                        $output .= '<span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span></div>';
                        $output .= '<div class="hover-icon">';
                        $output .= '<a data-icon=&#x30; class="pull-right wl-color1" href="#"></a>';
                        $output .= '</div>';
                    } else {
                        $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 ' . $hoverBorderClass . '" data-icon=&#x30;></a>';
                    }
                    $output .= '</div>';
                }
                $output .= '</div></div></div></div></div>';
                $counter++;
            endwhile;
            wp_reset_postdata();
            $output .= '</div></div>';
        } else if( $portfolio_style == 'portfolio-style-2' ) {
            $output .= '<div class="row">';
            $output .= '<div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic">';
            while( $query->have_posts() ) : $query->the_post();
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="clearfix column-2 row">';
                $output .= '<div class="col-md-4 col-sm-6 col-xs-12 wl-sibling-hover-1">';
                $output .= '<div class="wl-height1 wl-full-width style-6-left">';
                $output .= '<div class="style-6-left-text">';
                $output .= '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5></a>';
                $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                $output .= '</div>';
                $output .= '<div class="style-6-left-icon hidden-xs"><a href="' . get_the_permalink() . '" data-icon=&#x24;></a>';
                $output .= '</div></div></div>';
                $output .= '<div class="col-md-8 col-sm-6 col-xs-12 wl-sibling-hover-2">';
                $output .= '<div class="' . $wl_relative . ' ' . $hoverParentClass . ' ' . $overflow . '">';
                if( $hoverStyle == 5 || $hoverStyle == 7 || $hoverStyle == 9 ) {
                    $output .= '<div class="' . $imageStyle . '">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_770x570" ) . '</a>';
                    $output .= '</div>';
                } else {
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_770x570" ) . '</a>';
                }
                if( $hoverStyle != 7 ) {
                    $output .= '<div class="' . $hoverStyle . '">';
                    if( $hoverStyle == 8 ) {
                        $output .= '<div class="hover-text"><h5 class="wl-color1 top-zero">' . get_the_title() . '</h5><span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span></div>';
                        $output .= '<div class="hover-inner"><a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x30;></a></div>';
                    } else {
                        $output .= '<div class="hover-inner">';
                        if( $hoverStyle == 5 ) {
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span>';
                        } else if( $hoverStyle == 6 ) {
                            $output .= '<div class="wl-inner-rotate">';
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 pull-right" data-icon=&#x30;></a>';
                            $output .= '<div class="wl-hover-text"><h5 class="wl-color1 top-zero">' . get_the_title() . '</h5><span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div></div>';
                        } else if( $hoverStyle == 9 ) {
                            $output .= '<div class="hover-text">';
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div>';
                            $output .= '<div class="hover-icon"><a data-icon=&#x30; class="pull-right wl-color1" href="#"></a></div>';
                        } else {
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 ' . $hoverBorderClass . '" data-icon=&#x30;></a>';
                        }
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                $output .= '</div></div></div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div></div>';
        } else if( $portfolio_style == 'portfolio-style-3' ) {
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
            $output .= '<div class="row">';
            $output .= '<div id="js-grid-col-one" class="cbp cbp-l-grid-mosaic wl-one-col">';
            while( $query->have_posts() ) : $query->the_post();
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="clearfix blog-sidebar-col-2 row">';
                $output .= '<div class="col-md-4 col-xs-12 wl-sibling-hover-1">';
                $output .= '<div class="wl-height1 wl-full-width style-6-left">';
                $output .= '<div class="style-6-left-text">';
                $output .= '<a href="' . get_the_permalink() . '"><h5>' . get_the_title() . '</h5></a>';
                $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                $output .= '</div>';
                $output .= '<div class="style-6-left-icon hidden-xs hidden-sm">';
                $output .= '<a href="' . get_the_permalink() . '" data-icon=&#x24;></a>';
                $output .= '</div></div></div>';
                $output .= '<div class="col-md-3 col-xs-12 wl-sibling-hover-1 wl-height1 wl-relative">';
                $output .= '<div class="wl-absolute wl-div-table">';
                $output .= '<div class="wl-middle-content wl-text-left">';
                $output .= w_studio_team_excerpt( 30);
                $output .= '</div></div></div>';
                $output .= '<div class="col-md-5 col-xs-12 wl-sibling-hover-2">';
                $output .= '<div class="' . $wl_relative . ' ' . $hoverParentClass . ' ' . $overflow . ' wl-inline-block">';
                if( $hoverStyle == 5 || $hoverStyle == 7 || $hoverStyle == 9 ) {
                    $output .= '<div class="' . $imageStyle . '"><a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_470x570" ) . '</a></div>';
                } else {
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_470x570" ) . '</a>';
                }
                if( $hoverStyle != 7 ) {
                    $output .= '<div class="' . $hoverStyle . '">';
                    if( $hoverStyle == 8 ) {
                        $output .= '<div class="hover-text"><h5 class="wl-color1 top-zero">' . get_the_title() . '</h5><span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span></div>';
                        $output .= '<div class="hover-inner"><a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x30;></a></div>';
                    } else {
                        $output .= '<div class="hover-inner">';
                        if( $hoverStyle == 5 ) {
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span>';
                        } else if( $hoverStyle == 6 ) {
                            $output .= '<div class="wl-inner-rotate">';
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 pull-right" data-icon=&#x30;></a>';
                            $output .= '<div class="wl-hover-text"><h5 class="wl-color1 top-zero">' . the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div></div>';
                        } else if( $hoverStyle == 9 ) {
                            $output .= '<div class="hover-text"><h5 class="wl-color1 top-zero">' . get_the_title() . '</h5><span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div>';
                            $output .= '<div class="hover-icon"><a data-icon=&#x30; class="pull-right wl-color1" href="' . get_the_permalink() . '"></a></div>';
                        } else {
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 ' . $hoverBorderClass . '" data-icon=&#x30;></a>';
                        }
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                $output .= '</div></div></div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div></div>';
        } else if( $portfolio_style == 'portfolio-style-4' ) {
            $output .= '<div class="wl-portfolio-columns double-columns">';
            $output .= '<div id="js-grid-col-two" class="cbp cbp-l-grid-mosaic">';
            while( $query->have_posts() ) : $query->the_post();
                $category = get_the_terms( $post->ID , 'portfolio-category' );
                $terms = '';
                $portfolio_category = '';
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    $terms .= $category[ $j ]->slug . ' ';
                    if( $j != ( count( $category ) - 1 ) ) {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>, ';
                    } else {
                        $portfolio_category .= '<a href="' . get_term_link( $category[ $j ]->term_id , 'portfolio-category' ) . '">' . $category[ $j ]->name . '</a>';
                    }
                }
                $output .= '<div class="cbp-item ' . $terms . '">';
                $output .= '<div class="row">';
                $output .= '<div class="col-md-8  hover-sibling-2">';
                $output .= '<div class="row">';
                $output .= '<div class="col-md-12">';
                $output .= '<div class="' . $wl_relative . ' ' . $hoverParentClass . ' ' . $overflow . '">';
                if( $hoverStyle == 7 ) {
                    $output .= '<div class="' . $imageStyle . '">';
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_550x550" ) . '</a>';
                    $output .= '</div>';
                } else {
                    $output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID , "w_studio_image_550x550" ) . '</a>';
                }
                if( $hoverStyle != 7 ) {
                    $output .= '<div class="' . $hoverStyle . '">';
                    if( $hoverStyle == 8 ) {
                        $output .= '<div class="hover-text">';
                        $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                        $output .= '<span class="wl-color1">';
                        if( $terms ) {
                            foreach( $terms as $term ) {
                                $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                            }
                        }
                        $output .= '</span></div>';
                        $output .= '<div class="hover-inner">';
                        $output .= '<a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x30;></a>';
                        $output .= '</div>';
                    } else {
                        $output .= '<div class="hover-inner">';
                        if( $hoverStyle == 5 ) {
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span>';
                        } else if( $hoverStyle == 6 ) {
                            $output .= '<div class="wl-inner-rotate">';
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 pull-right" data-icon=&#x30;></a>';
                            $output .= '<div class="wl-hover-text">';
                            $output .= '<h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div></div>';
                        } else if( $hoverStyle == 9 ) {
                            $output .= '<div class="hover-text"><h5 class="wl-color1 top-zero">' . get_the_title() . '</h5>';
                            $output .= '<span class="wl-color1">';
                            if( $terms ) {
                                foreach( $terms as $term ) {
                                    $termLink = get_term_link( $term->term_id , 'portfolio-category' );
                                    $output .= '<a href="' . $termLink . '">' . $term->name . '</a>';
                                }
                            }
                            $output .= '</span></div>';
                            $output .= '<div class="hover-icon"><a data-icon=&#x30; class="pull-right wl-color1" href="' . get_the_permalink() . '"></a></div>';
                        } else {
                            $output .= '<a href="' . get_the_permalink() . '" class="wl-color1 ' . $hoverBorderClass . '" data-icon=&#x30;></a>';
                        }
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                $output .= '</div></div></div></div>';
                $output .= '<div class="col-md-4 hover-sibling-1">';
                $output .= '<div class="row">';
                $output .= '<div class="col-md-12 wl-square-title wl-height4 xs-load">';
                $output .= '<div class="wl-bottom-title">';
                $output .= '<h5><a href="' . get_the_permalink() . '" class="wl-color4">' . get_the_title() . '</a></h5>';
                $output .= '<p class="category_link">' . $portfolio_category . '</p>';
                $output .= '</div></div></div></div></div></div>';
            endwhile;
            wp_reset_postdata();
            $output .= '</div></div>';
        }
    }
    // load more
    if( $is_loadmore ) {
        global $post;
        if( $optionValues[ 'w-blog-archive-load-more' ] != 2 ) {
            $parent_load = 'wl-section-marginbottom50';
        } else {
            $parent_load = '';
        }
        $output .= '<div class="wl-sort-link text-center ' . $parent_load . '">';
        $output .= '<div class="wl-link-to">';
        if( $optionValues[ 'w-blog-archive-load-more' ] != 2 ) {
            $output .= '<span class="wl-direction-left" data-icon=&#x45;></span>';
            $output .= '<a href="javascript:void(0);" data-value="' . $post->post_type . '" id="w-load-more">';

            if( isset( $load_more_text ) && !empty( $load_more_text ) ) {
                $output .= $load_more_text;
            } else {
                $output .= 'load more';
            }
            $output .= '</a><span class="wl-direction-right" data-icon=&#x44;></span>';
        }
        $output .= '</div></div>';
        $output .= '<a id="initialPageValue">2</a>';
    }

    wp_register_script( 'portfolioloadmore' , W_STUDIO_THEME_ASSETS_JS . '/portfolio-load-more.js' , '' , '1.0.0' , true );

    wp_enqueue_script( 'portfolioloadmore' );

    wp_localize_script( 'portfolioloadmore' , 'w_studio_loadmoreportfolio' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) , 'fileName' => $portfolio_style , 'limit' => $posts_per_page , 'hover' => $hover_style ) );

    return $output;
}

//blog
add_shortcode( 'w_studio_blog' , 'w_studio_blog' );
function w_studio_blog( $atts , $content = null ) {
    extract( shortcode_atts( array(
        'is_blog_filter' => '' ,
        'blog_style' => '' ,
        'is_social_link' => '' ,
        'is_meta_info' => '' ,
        'category_slug_name' => '' ,
        'posts_per_page' => '' ,
        'order_by' => '' ,
        'order' => '' ,
        'hover_style' => '' ,
        'loadmore_pagination' => '' ) , $atts ) );
    
    global $post;
    $output = '';

    $optionValues = get_option( 'w_studio' );

    if( $is_blog_filter == 'show' ) {
        $output .= '<div class="row wl-blog-sc wl-normal-margin text-center">';
        $output .= '<div class="wl-menu-filter wl-blog-aligen">';
        $output .= '<div class="wl-sort-link text-center blog-category">';
        $output .= '<div class="wl-link-to">';
        $output .= '<span class="wl-direction-left" data-icon=&#x45;></span>';
        $output .= '<a href="#">blog categories</a>';
        $output .= '<span class="wl-direction-right" data-icon=&#x44;></span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<ul>';
        $categories = get_categories();
        foreach( $categories as $category ) {
            $output .= '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
        }
        $output .= '</ul>';
        $output .= '</div>';
        $output .= '</div>';
    } else if( $is_blog_filter == 'default' || $is_blog_filter == '' ) {
        if( $optionValues[ 'w-blog-filter' ] && $optionValues[ 'w-blog-sidebar-style' ] != 1 ) {
            $output .= '<div class="row wl-blog-sc wl-normal-margin text-center">';
            $output .= '<div class="wl-menu-filter wl-blog-aligen">';
            $output .= '<div class="wl-sort-link text-center blog-category">';
            $output .= '<div class="wl-link-to">';
            $output .= '<span class="wl-direction-left" data-icon=&#x45;></span>';
            $output .= '<a href="#">blog categories</a>';
            $output .= '<span class="wl-direction-right" data-icon=&#x44;></span>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '<ul>';
            $categories = get_categories();
            foreach( $categories as $category ) {
                $output .= '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
            $output .= '</div>';
        }
    }

    if( $category_slug_name != 'all' ) {
        $category_slug = explode( ',', $category_slug_name );
        $posts_per_page = '-1';
    } else {
        $category_slug = get_terms( 'category', array(
            'hide_empty' => 0,
            'fields' => 'names'
        ) );
    }

    $args = array(
        'post_type' => 'post' ,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category_slug,
            ),
        ),
        'posts_per_page' => $posts_per_page ,
        'category' => 'category' ,
        'order' => $order ,
        'orderby' => $order_by );
    $query = new WP_Query( $args );

    $meta_data = get_post_meta( get_the_ID() , 'w-page-sidebar' , true );

    if( $blog_style == 'style-1' || $blog_style == 'style-2' || $blog_style == '' ) {

        if( $blog_style == 'style-2' ) {
            $output .= '<div class="wl-blog-sc wl-nomalmargin-bottom column-2 " id="blogpostload">';
        } else {
            $output .= '<div class="wl-blog-sc wl-nomalmargin-bottom " id="blogpostload">';
        }
        while( $query->have_posts() ) : $query->the_post();
            if( $blog_style == 'style-1' || $blog_style == '' ) {

				if( $meta_data == 'fullwidth' ) {
                    $size = 'w_studio_image_1170x570';
                    $class = 'col-md-4';
                    $img_size = '1170x570';
                } else if( $meta_data == 'default' ) {
                    if( $optionValues[ 'w-blog-sidebar-style' ] != 1 ) {
                        $class = 'col-md-6';
                        $size = 'w_studio_image_770x570';
                        $img_size = '770x570';
                    } else {
                        $size = 'w_studio_image_1170x570';
                        $class = 'col-md-4';
                        $img_size = '1170x570';
                    }
                } else if( $meta_data == 'left' || $meta_data == 'right' ) {
                    $class = 'col-md-6';
                    $size = 'w_studio_image_770x570';
                    $img_size = '770x570';
                }

                if( has_post_thumbnail() ) {
                    $image = get_the_post_thumbnail( $post->ID , $size );
                } else {
                    $class = 'col-md-12';
                }

                $output .= '<div class="wl-nomalmargin-bottom blog-col-1">';
                $output .= '<div class="wl-relative wl-right-zero wl-full-width wl-height1">';
                if( has_post_thumbnail() ) {
                    $output .= '<a href="' . get_the_permalink() . '">' . $image . '</a>';
                }
                $output .= '<div class="' . $class . ' col-xs-12 wl-overlay-black wl-blog-overlay-absolute wl-both-padding blog-overlay-hover">';
                if(!has_post_thumbnail()) { 
                    $output .=  '<div class="row"><div class="col-md-8 col-md-offset-2 wl-blog-items"><div class="wl-middle-content">';
                }
                $blog_category = '';
                $category = get_the_terms( $post->ID , 'category' );
                
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    if( $j != ( count( $category ) - 1 ) ) {
                        $blog_category .= '<a href="'.get_term_link($category[ $j ]->slug, 'category').'">'.$category[ $j ]->name .'</a>' . ', ';
                    } else {
                        $blog_category .= '<a href="'.get_term_link($category[ $j ]->slug, 'category').'">'.$category[ $j ]->name .'</a>';
                    }
                }
                $output .= '<h5 class="wl-box-margintop">' . $blog_category . '</h5>';
                $output .= '<h4 class="wl-big-top-margin text-uppercase wl-color1">';
                $output .= '<a class="wl-color1" href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                $output .= '</h4>';
                if( $is_meta_info == 'show' ) {
                    $output .= '<div class="wl-blog-detail-menu">';
                    $output .= '<ul>';
                    $output .= '<li><a href="' . get_the_permalink() . '">' . get_the_time( 'F j, Y' , $post->ID ) . '</a></li>';

                    $output .= '<li><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) , get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author() . '</a></li>';
                    $output .= '<li><a href="' . get_comments_link() . '">' . get_comments_number( $post->ID ) . ' comments</a></li>';
                    $output .= '</ul></div>';
                } else if( $is_meta_info == 'default' || $is_meta_info == '' ) {
                    if( $optionValues[ 'w-blog-archive-meta' ] == 1 ) {
                        $output .= '<div class="wl-blog-detail-menu">';
                        $output .= '<ul>';
                        if( $optionValues[ 'w-blog-archive-date' ] ) {
                            $output .= '<li><a href="' . get_the_permalink() . '">' . get_the_time( 'F j, Y' , $post->ID ) . '</a></li>';
                        }
                        if( $optionValues[ 'w-blog-archive-author' ] ) {
                            $output .= '<li><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) , get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author() . '</a></li>';
                        }
                        if( $optionValues[ 'w-blog-archive-comments' ] ) {
                            $output .= '<li><a href="' . get_comments_link() . '">' . get_comments_number( $post->ID ) . ' comments</a></li>';
                        }
                        $output .= '</ul></div>';
                    }
                }
                $output .= '<p class="wl-box-margintop">' . get_the_excerpt() . '</p>';
                if( $is_social_link == 'show' ) {
                    $output .= '<div class="wl-media-icons wl-blog-media">';
                    $output .= '<div class="wl-media-plot  row">';
                    $output .= '<div class="wl-media-share">';
                    if( isset( $optionValues[ 'w-social-share-facebook' ] ) && $optionValues[ 'w-social-share-facebook' ] == 1 ) {
                        $output .= '<a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe093;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-twitter' ] ) && $optionValues[ 'w-social-share-twitter' ] == 1 ) {
                        $output .= '<a href="http://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.rawurlencode(get_the_title()).'" target="_blank"><span data-icon=&#xe094;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-google-plus' ] ) && $optionValues[ 'w-social-share-google-plus' ] == 1 ) {
                        $output .= '<a href="https://plus.google.com/share?url=' . get_the_permalink() . '"><span data-icon=&#xe096;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-pinterest' ] ) && $optionValues[ 'w-social-share-pinterest' ] == 1 ) {
                        $output .= '<a href="http://pinterest.com/pin/create/bookmarklet/?media=MEDIA&url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe095;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-tumblr' ] ) && $optionValues[ 'w-social-share-tumblr' ] == 1 ) {
                        $output .= '<a href="http://www.tumblr.com/share?v=3&u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe097;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-delicious' ] ) && $optionValues[ 'w-social-share-delicious' ] == 1 ) {
                        $output .= '<a href="http://del.icio.us/post?url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe0a9;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-rss' ] ) && $optionValues[ 'w-social-share-rss' ] == 1 ) {
                        $output .= '<a href="' . $optionValues[ 'w-social-share-rss' ] . '"><span data-icon=&#xe0b5;></span></a>';
                    }
                    $output .= '</div></div></div>';
                } else if( $is_social_link == 'default' || $is_social_link == '' ) {
                    if( isset($optionValues[ 'w-social-network-header' ]) && $optionValues[ 'w-social-network-header' ] == 1 ) {
                        $output .= '<div class="wl-media-icons wl-blog-media">';
                        $output .= '<div class="wl-media-plot  row">';
                        $output .= '<div class="wl-media-share">';
                        if( isset( $optionValues[ 'w-social-share-facebook' ] ) && $optionValues[ 'w-social-share-facebook' ] == 1 ) {
                            $output .= '<a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe093;></span></a>';
                        }
                        if( isset( $optionValues[ 'w-social-share-twitter' ] ) && $optionValues[ 'w-social-share-twitter' ] == 1 ) {
                            $output .= '<a href="http://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.rawurlencode(get_the_title()).'" target="_blank"><span data-icon=&#xe094;></span></a>';
                        }
                        if( isset( $optionValues[ 'w-social-share-google-plus' ] ) && $optionValues[ 'w-social-share-google-plus' ] == 1 ) {
                            $output .= '<a href="https://plus.google.com/share?url=' . get_the_permalink() . '"><span data-icon=&#xe096;></span></a>';
                        }
                        if( isset( $optionValues[ 'w-social-share-pinterest' ] ) && $optionValues[ 'w-social-share-pinterest' ] == 1 ) {
                            $output .= '<a href="http://pinterest.com/pin/create/bookmarklet/?media=MEDIA&url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe095;></span></a>';
                        }
                        if( isset( $optionValues[ 'w-social-share-tumblr' ] ) && $optionValues[ 'w-social-share-tumblr' ] == 1 ) {
                            $output .= '<a href="http://www.tumblr.com/share?v=3&u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe097;></span></a>';
                        }
                        if( isset( $optionValues[ 'w-social-share-delicious' ] ) && $optionValues[ 'w-social-share-delicious' ] == 1 ) {
                            $output .= '<a href="http://del.icio.us/post?url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe0a9;></span></a>';
                        }
                        $output .= '</div></div></div>';
                    }
                }
                $output .= '</div>';
                if(!has_post_thumbnail()) {
                    $output .= '</div></div></div>';
                }
                $output .= '<div class="hover-effect-1">';
                $output .= '<div class="hover-inner">';
                $output .= '<a href="' . get_the_permalink() . '"></a>';
                $output .= '</div>';
                $output .= '<div class="bottom-icon-left">';
                $output .= '<a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x2d;></a>';
                $output .= '</div>';
                $output .= '<div class="bottom-icon-right">';
                $output .= '<a href="' . get_the_permalink() . '" class="wl-color1" data-icon=&#x2e;></a>';
                $output .= '</div></div></div></div>';
            } else if( $blog_style == 'style-2' ) {

                if( $meta_data == 'default' ) {
                    if( $optionValues[ 'w-blog-sidebar-style' ] != 1 ) {
                        $classTop = 'col-sm-6';
                        $classBottom = 'col-sm-6';
                        $size = 'w_studio_image_370x570';
                        $img_size = '370x570';
                    } else {
                        $classTop = 'col-md-4 col-sm-6 ';
                        $classBottom = 'col-md-8 col-sm-6 ';
                        $size = 'w_studio_image_770x570';
                        $img_size = '770x570';
                    }
                } else if( $meta_data == 'fullwidth' ) {
                    $classTop = 'col-md-4 col-sm-6 ';
                    $classBottom = 'col-md-8 col-sm-6 ';
                    $size = 'w_studio_image_770x570';
                    $img_size = '770x570';
                } else {
                    $classTop = 'col-sm-6';
                    $classBottom = 'col-sm-6';
                    $size = 'w_studio_image_370x570';
                    $img_size = '370x570';
                }

                if( ! has_post_thumbnail()) {
                    $classTop = 'col-md-12';
                }

                $output .= '<div class="row wl-nomalmargin-bottom column-2">';
                $output .= '<div class="' . $classTop . ' col-xs-12 pull-left wl-sibling-hover-1">';
                $output .= '<div class="wl-height1 wl-full-width wl-bg-color2 pull-left wl-both-padding wl-relative">';
                if(!has_post_thumbnail()) { 
                    $output .= '<div class="row"><div class="col-md-8 col-md-offset-2 wl-blog-items"><div class="wl-middle-content">';
                }
                $blog_category = '';
                $category = get_the_terms( $post->ID , 'category' );
                for( $j = 0 ; $j < count( $category ) ; $j++ ) {
                    if( $j != ( count( $category ) - 1 ) ) {
                        $blog_category .= '<a href="'.get_term_link($category[ $j ]->slug, 'category').'">'.$category[ $j ]->name .'</a>' . ', ';
                    } else {
                        $blog_category .= '<a href="'.get_term_link($category[ $j ]->slug, 'category').'">'.$category[ $j ]->name .'</a>';
                    }
                }
                $output .= '<h5 class="wl-box-margintop">' . $blog_category . '</h5>';
                $output .= '<h4 class="wl-big-top-margin text-uppercase wl-color4">';
                $output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                $output .= '</h4>';
                if( $is_meta_info == 'show' ) {
                    $output .= '<div class="wl-blog-detail-menu">';
                    $output .= '<ul>';
                    $output .= '<li><a href="' . get_the_permalink() . '">' . get_the_time( 'F j, Y' , $post->ID ) . '</a></li>';
                    $output .= '<li><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) , get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author() . '</a></li>';
                    $output .= '<li><a href="' . get_comments_link() . '">' . get_comments_number( $post->ID ) . ' comments</a></li>';
                    $output .= '</ul></div>';
                } else if( $is_meta_info == 'default' || $is_meta_info == '' ) {
                    if( $optionValues[ 'w-blog-archive-meta' ] == 1 ) {
                        $output .= '<div class="wl-blog-detail-menu">';
                        $output .= '<ul>';
                        if( $optionValues[ 'w-blog-archive-date' ] ) {
                            $output .= '<li><a href="' . get_the_permalink() . '">' . get_the_time( 'F j, Y' , $post->ID ) . '</a></li>';
                        }
                        if( $optionValues[ 'w-blog-archive-author' ] ) {
                            $output .= '<li><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) , get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author() . '</a></li>';
                        }
                        if( $optionValues[ 'w-blog-archive-comments' ] ) {
                            $output .= '<li><a href="' . get_comments_link() . '">' . get_comments_number( $post->ID ) . ' comments</a></li>';
                        }
                        $output .= '</ul></div>';
                    }
                }
                $output .= '<p class="wl-box-margintop">' . get_the_excerpt() . '</p>';
                if( $is_social_link == 'show' ) {
                    $output .= '<div class="wl-media-icons wl-blog-media">';
                    $output .= '<div class="wl-media-plot  row">';
                    $output .= '<div class="wl-media-share">';
                    if( isset( $optionValues[ 'w-social-share-facebook' ] ) && $optionValues[ 'w-social-share-facebook' ] ) {
                        $output .= '<a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe093;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-twitter' ] ) && $optionValues[ 'w-social-share-twitter' ] ) {
                        $output .= '<a href="http://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.rawurlencode(get_the_title()).'" target="_blank"><span data-icon=&#xe094;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-google-plus' ] ) && $optionValues[ 'w-social-share-google-plus' ] ) {
                        $output .= '<a href="https://plus.google.com/share?url=' . get_the_permalink() . '"><span data-icon=&#xe096;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-pinterest' ] ) && $optionValues[ 'w-social-share-pinterest' ] ) {
                        $output .= '<a href="http://pinterest.com/pin/create/bookmarklet/?media=MEDIA&url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe095;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-tumblr' ] ) && $optionValues[ 'w-social-share-tumblr' ] ) {
                        $output .= '<a href="http://www.tumblr.com/share?v=3&u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe097;></span></a>';
                    }
                    if( isset( $optionValues[ 'w-social-share-delicious' ] ) && $optionValues[ 'w-social-share-delicious' ] ) {
                        $output .= '<a href="http://del.icio.us/post?url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe0a9;></span></a>';
                    }
                    $output .= '</div></div></div>';
                } else if( $is_social_link == 'default' || $is_social_link == '' ) {
                    if( $optionValues[ 'w-social-network-header' ] == 1 ) {
                        $output .= '<div class="wl-media-icons wl-blog-media">';
                        $output .= '<div class="wl-media-plot  row">';
                        $output .= '<div class="wl-media-share">';
                        if( $optionValues[ 'w-social-share-facebook' ] ) {
                            $output .= '<a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe093;></span></a>';
                        }
                        if( $optionValues[ 'w-social-share-twitter' ] ) {
                            $output .= '<a href="http://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.rawurlencode(get_the_title()).'" target="_blank"><span data-icon=&#xe094;></span></a>';
                        }
                        if( $optionValues[ 'w-social-share-google-plus' ] ) {
                            $output .= '<a href="https://plus.google.com/share?url=' . get_the_permalink() . '"><span data-icon=&#xe096;></span></a>';
                        }
                        if( $optionValues[ 'w-social-share-pinterest' ] ) {
                            $output .= '<a href="http://pinterest.com/pin/create/bookmarklet/?media=MEDIA&url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe095;></span></a>';
                        }
                        if( $optionValues[ 'w-social-share-tumblr' ] ) {
                            $output .= '<a href="http://www.tumblr.com/share?v=3&u='.get_the_permalink().'" target="_blank"><span data-icon=&#xe097;></span></a>';
                        }
                        if( $optionValues[ 'w-social-share-delicious' ] ) {
                            $output .= '<a href="http://del.icio.us/post?url='.get_the_permalink().'" target="_blank"><span data-icon=&#xe0a9;></span></a>';
                        }
                        $output .= '</div></div></div>';
                    }
                }
                if(!has_post_thumbnail()) { 
                    $output .= '</div></div></div>';
                }
                $output .= '</div></div>';
                if(has_post_thumbnail()) {
                    $output .= '<div class="' . $classBottom . ' col-xs-12 pull-right wl-sibling-hover-2 mobile-margintop">';
                    $output .= '<div class="wl-relative">';
                    if( has_post_thumbnail() ) {
                        $image = get_the_post_thumbnail( $post->ID , $size );
                    } else {
                        $image = '<img src="' . get_template_directory_uri() . '/assets/images/bg/blank-' . $img_size . '.jpg" alt="" />';
                    }
                    $output .= '<a href="' . get_the_permalink() . '">' . $image . '</a>';
                    $output .= '<div class="hover-effect-1">';
                    $output .= '<div class="hover-inner blog-hover-inner">';
                    $output .= '<a href="' . get_the_permalink() . '" class="wl-color1">';
                    $output .= '<span>Read More</span>';
                    $output .= '</a>';
                    $output .= '</div></div></div></div>';
                }
                $output .= '</div>';
            }
        endwhile;
        wp_reset_postdata();
        $output .= '</div>';
    }
	
    if( $loadmore_pagination == 'pagination' ) {
		global $post;
		the_posts_pagination( array( 'prev_text' => esc_html__( 'Previous' , 'w-studio-plugin' ) , 'next_text' => esc_html__( 'Next' , 'w-studio-plugin' ) , 'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( '' , 'w-studio-plugin' ) . ' </span>' , ) );
    } else if( $loadmore_pagination == 'loadmore' ) {
        global $post;
        $output .= '<div class="wl-sort-link text-center wl-section-marginbottom50">';
        $output .= '<div class="wl-link-to wl-blog-sc-loadmore">';
        $output .= '<span class="wl-direction-left" data-icon=&#x45;></span>';
        $output .= '<a href="javascript:void(0);" data-value="post" id="w-load-more">';
        $output .= 'load more</a>';
        $output .= '<span class="wl-direction-right" data-icon=&#x44;></span>';
        $output .= '</div></div>';
        $output .= '<a id="initialPageValue">2</a>';
    } else if( $loadmore_pagination == 'default' || $loadmore_pagination == '' ) {
        if( $optionValues[ 'w-blog-pagination' ] ) {
            if( $optionValues[ 'w-blog-archive-load-more' ] == 1 ) {
                the_posts_pagination( array( 'prev_text' => esc_html__( 'Previous' , 'w-studio-plugin' ) , 'next_text' => esc_html__( 'Next' , 'w-studio-plugin' ) , 'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( '' , 'w-studio-plugin' ) . ' </span>' , ) );
            } else {
                global $post;
                $output .= '<div class="wl-sort-link text-center wl-section-marginbottom50">';
                $output .= '<div class="wl-link-to">';
                $output .= '<span class="wl-direction-left" data-icon=&#x45;></span>';
                $output .= '<a href="javascript:void(0);" data-value="' . $post->post_type . '" id="w-load-more">';
                $output .= 'load more</a>';
                $output .= '<span class="wl-direction-right" data-icon=&#x44;></span>';
                $output .= '</div></div>';
                $output .= '<a id="initialPageValue">2</a>';
            }
        }
    }

    if( !$blog_style ) {
        $blog_style = 'style-1';
    }
    if( !$meta_data ) {
        if( $optionValues[ 'w-blog-sidebar-style' ] == 1 ) {
            $meta = 'fullwidth';
        } else {
            $meta = 'sidebar';
        }
    } else if( $meta_data == 'fullwidth' ) {
        $meta = 'fullwidth';
    } else {
        $meta = 'sidebar';
    }

    if( !$is_meta_info ) {
        if( $optionValues[ 'w-blog-archive-meta' ] == 1 ) {
            $meta_info = 'show';
        } else {
            $meta_info = 'hide';
        }
    } else if( $is_meta_info == 'show' ) {
        $meta_info = 'show';
    } else {
        $meta_info = 'hide';
    }

    if( $is_social_link == 'default' || $is_social_link == '' ) {
        if( $optionValues[ 'w-social-network-header' ] == 1 ) {
            $social = 'show';
        } else {
            $social = 'hide';
        }
    } else if( $is_social_link == 'show' ) {
        $social = 'show';
    } else {
        $social = 'hide';
    }

    wp_register_script( 'blogloadmore' , W_STUDIO_THEME_ASSETS_JS . '/load.more-click.js' , '' , '1.0.0' , true );

    wp_enqueue_script( 'blogloadmore' );

    wp_localize_script( 'blogloadmore' , 'w_studio_loadmorepost' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) , 'style' => $blog_style , 'limit' => $posts_per_page , 'meta' => $meta , 'meta_info' => $meta_info , 'social_icon' => $social ) );

    wp_reset_postdata();

    return $output;
}

add_shortcode( 'w_studio_social_links' , 'w_studio_social_links' );
/***
 * Function to load Social links
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_social_links( $atts , $content = null ) {

    extract( shortcode_atts( array( 
        'size' => '', 
        'color' => '', 
        'hover_color' => '', 
        'facebook' => '',
        'twitter' => '',
        'google_plus' => '',
        'pinterest' => '',
        'tumblr' => '',
        'delicious' => '',
        'rss' => '' ) , $atts ) 
    );

    ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/social-content.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode( 'w_studio_titles' , 'w_studio_titles' );
/***
 * Function to load Title and contents
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */


function w_studio_titles( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'title_heading' => 'h2', 'title_content' => '' , 'line_height' => '', 'font_size' => '' , 'title_color' => '' , 'title_border_color' => '' , 'hide_title_border' => '' , ) , $atts ) );


    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();
    $className3 = w_studio_random_number1();
    $class = '';
    if( $hide_title_border == true ) {
        $class = $className2;
    } else {
        $class = $className3;
    }
    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );

    $custom_inline_style = '.' . $className . '{ color: ' . $title_color . '; font-size: '.$font_size.'px; line-height:'.$line_height.'px }';
    $custom_inline_style .= '.' . $class . '::after{ border-top: 0; }';
    $custom_inline_style .= '.' . $className3 . '::after{ border-top: 2px solid ' . $title_border_color . '; }';

    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';

    if( $title_content == 'style-2' ) {
        $output .= '<div class="wl-aligned-right">';
        $output .= '<div class="wl-section-heading ' . $class . ' ">';
            if($title_heading == 'h1'){
                  $output .= '<h1 class="wl-margintopzero ' . $className . '" >' . $title . '</h1>';
            }
            elseif($title_heading == 'h3'){
                  $output .= '<h3 class="wl-margintopzero ' . $className . '" >' . $title . '</h3>';
            }
            elseif($title_heading == 'h4'){
                  $output .= '<h4 class="wl-margintopzero ' . $className . '" >' . $title . '</h4>';
            }
            elseif($title_heading == 'h5'){
                  $output .= '<h5 class="wl-margintopzero ' . $className . '" >' . $title . '</h5>';
            }
            elseif($title_heading == 'h6'){
                  $output .= '<h6 class="wl-margintopzero ' . $className . '" >' . $title . '</h6>';
            }
            else{
                  $output .= '<h2 class="wl-margintopzero ' . $className . '" >' . $title . '</h2>';
            }
        $output .= '</div>';
        $output .= '</div>';
    } 
    elseif( $title_content == 'style-3' ) {
        $output .= '<div class="wl-aligned-center">';
        $output .= '<div class="wl-section-heading ' . $class . ' ">';
       if($title_heading == 'h1'){
                  $output .= '<h1 class="wl-margintopzero ' . $className . '" >' . $title . '</h1>';
            }
            elseif($title_heading == 'h3'){
                  $output .= '<h3 class="wl-margintopzero ' . $className . '" >' . $title . '</h3>';
            }
            elseif($title_heading == 'h4'){
                  $output .= '<h4 class="wl-margintopzero ' . $className . '" >' . $title . '</h4>';
            }
            elseif($title_heading == 'h5'){
                  $output .= '<h5 class="wl-margintopzero ' . $className . '" >' . $title . '</h5>';
            }
            elseif($title_heading == 'h6'){
                  $output .= '<h6 class="wl-margintopzero ' . $className . '" >' . $title . '</h6>';
            }
            else{
                  $output .= '<h2 class="wl-margintopzero ' . $className . '" >' . $title . '</h2>';
            }
        $output .= '</div>';
        $output .= '</div>';
    }
    else {
        $output .= '<div class="wl-section-heading ' . $class . ' ">';
        if($title_heading == 'h1'){
                  $output .= '<h1 class="wl-margintopzero ' . $className . '" >' . $title . '</h1>';
            }
            elseif($title_heading == 'h3'){
                  $output .= '<h3 class="wl-margintopzero ' . $className . '" >' . $title . '</h3>';
            }
            elseif($title_heading == 'h4'){
                  $output .= '<h4 class="wl-margintopzero ' . $className . '" >' . $title . '</h4>';
            }
            elseif($title_heading == 'h5'){
                  $output .= '<h5 class="wl-margintopzero ' . $className . '" >' . $title . '</h5>';
            }
            elseif($title_heading == 'h6'){
                  $output .= '<h6 class="wl-margintopzero ' . $className . '" >' . $title . '</h6>';
            }
            else{
                  $output .= '<h2 class="wl-margintopzero ' . $className . '" >' . $title . '</h2>';
            }
        $output .= '</div>';
    }
    return $output;

}
add_shortcode( 'w_studio_tab_content', 'w_studio_tab_content' );
/***
 * Function to load Social links
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_tab_content( $atts, $content = null ){
     ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/tab-content.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;

}
add_shortcode( 'w_studio_album' , 'w_studio_album' );
/***
 * Function to load Album
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_album( $atts , $content = null ) {

    ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/album-content.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

add_shortcode( 'w_studio_onepage_contact_toggle_wrapper' , 'w_studio_onepage_contact_accordion_wrapper' );
/***
 * Function to load Accordion
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_contact_toggle_wrapper( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' ) , $atts ) );

    $output = '';
    $output .= '<div class="clearfix"></div>';
    $output .= '<div class="panel-group" id="wl-contact-accordion" role="tablist" aria-multiselectable="true">';
    $output .= do_shortcode( $content );
    $output .= '</div>';

    return $output;
}

add_shortcode( 'w_studio_onepage_contact_toggle' , 'w_studio_onepage_contact_toggle' );
/***
 * Function to load Toggle set
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_onepage_contact_toggle( $atts , $content = null ) {
    extract( shortcode_atts( array( 'title' => '' , 'border' => '' , 'title_color' => '' , 'icon_color' => '' , 'bg_color' => '' , 'border_color' => '' , ) , $atts ) );

    $panel_id = w_studio_random_number();
    $collapse_id = w_studio_random_number();
    if( !function_exists( 'w_studio_random_number1' ) ) {
        function w_studio_random_number1() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number1();
    $className2 = w_studio_random_number1();

    wp_enqueue_style( 'custom-style' , get_template_directory_uri() . '/assets/css/custom-style.css' );
    if( $border == 'no-border' ) {
        $custom_inline_style = '.' . $className . '{ border-bottom:0!important;}';
    } else {
        $custom_inline_style = '.' . $className . '{ border-color:' . $border_color . '!important;}';
    }

    $custom_inline_style .= '.' . $className2 . ' a span{background-color:' . esc_attr($bg_color) . '!important}';
    $custom_inline_style .= '.' . $className2 . ' a span i{color:' . $icon_color . '!important}';
    $custom_inline_style .= '.' . $className2 . ' a {color:' . $title_color . '!important}';
    //    return $custom_inline_style;
    wp_add_inline_style( 'custom-style' , $custom_inline_style );

    $output = '';
    if( $border == 'no-border' ) {
        $output .= '<div class="panel panel-default ' . $className . '">';
    } else {
        $output .= '<div   class="panel panel-default  ' . $className . '">';
    }
    $output .= '<div class="panel-heading" role="tab">';
    $output .= '<h5 class="panel-title ' . $className2 . '">';
    $output .= '<span>';
    $output .= '<a role="button" data-toggle="collapse" href="#' . $collapse_id . '" aria-expanded="false" aria-controls=" ' . $collapse_id . '">';
    $output .= '<span><i class="pull-left" data-icon=&#x33;></i></span> ' . $title . '</a>';
    $output .= '</span></h5></div>';
    $output .= '<div id="' . $collapse_id . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="' . $panel_id . '">';
    $output .= '<div class="panel-body"> ' . $content . '</div>';
    $output .= '</div></div>';

    return $output;
}

add_shortcode( 'w_studio_gallery' , 'w_studio_gallery' );
/***
 * Function to load Album
 *
 * @param array - $atts
 * @param string - $content
 *
 * @return string   - $output
 */
function w_studio_gallery( $atts , $content = null ) {

    ob_start();
    set_query_var( 'atts', $atts );
    include( plugin_dir_path( __FILE__ ).'shortcode-template-parts/gallery-content.php' );
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}