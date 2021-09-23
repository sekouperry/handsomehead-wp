<?php

// Adding function to w_studio_studio_header hook
add_action( 'w_studio_studio_header' , 'wStudioHeader' );

/*
 * Function To Load Header
 */

function wStudioHeader() {
    global $post;
	$w_studio_custom_inline_style = '';
	// Header Height
    $w_studio_headerHeight = esc_attr( get_post_meta( $post->ID , 'w-page-header-height' , true ) );

    $w_studio_optionValues = get_option( 'w_studio' );
    
    $w_studio_isPageHeader = esc_attr( get_post_meta( $post->ID , 'w-page-header' , true ) );

    if( $w_studio_isPageHeader == 'on' ) {
		$w_studio_custom_inline_style .= '#home { height: '.$w_studio_headerHeight.'px; }';
		
        $w_studio_headerType = esc_attr( get_post_meta( $post->ID , 'w-header-type' , true ) );
        $w_studio_bgColor = '';
        $w_studio_video_url = '';

        // Header type not default
        if( $w_studio_headerType == '1' ) {

            // Get background color
            $w_studio_bgColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-bg-color' , true ) );
        } else if( $w_studio_headerType == '2' || $w_studio_headerType == '3' ) {

            // Get header bg image url
            $w_studio_bgImgUrl = esc_attr( get_post_meta( $post->ID , 'w-page-header-bg-image' , true ) );

            // Get overlay color
            $w_studio_bgOverlayColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-overlay-color' , true ) );

            // Get Opacity
            $w_studio_bgOpacity = esc_attr( get_post_meta( $post->ID , 'w-page-header-opacity' , true ) );

            if( $w_studio_headerType == '2' ) {

                // Get parallax transition speed
                $w_studio_bgTransition = esc_attr( get_post_meta( $post->ID , 'w-page-header-transition-speed' , true ) );
            }
        } else if( $w_studio_headerType == '4' ) {

            $w_studio_video_url = get_post_meta( $post->ID , 'w-youtube-url' , true );
            $w_studio_video_sound = get_post_meta( $post->ID , 'w-bg-video-sound' , true );
            $w_studio_video_sound = ($w_studio_video_sound == '') ? 50 : $w_studio_video_sound;
            if ($w_studio_video_sound == 0) {
                $w_studio_video_mute = 'true';
            } else {
                $w_studio_video_mute = 'false';
            }
            // Get overlay color
            $w_studio_bgOverlayColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-overlay-color' , true ) );

            // Get Opacity
            $w_studio_bgOpacity = esc_attr( get_post_meta( $post->ID , 'w-page-header-opacity' , true ) );
        }

        // Get Other General Values        

        // Header full

        $w_studio_fullHeight = esc_attr( get_post_meta( $post->ID , 'w-page-header-full' , true ) );

        if( $w_studio_fullHeight == 'on' ) {
			$w_studio_custom_inline_style .= '#home {top: 0;}';
			$w_studio_custom_inline_style .= '.wl-header { position: absolute; top: 0; left: 0; }';
		}

        // Title
        $w_studio_headerTitle = wp_kses( get_post_meta( $post->ID , 'w-page-title' , true ), array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) );

        // Sub Title
        $w_studio_headerSubTitle = wp_kses( get_post_meta( $post->ID , 'w-page-sub-title' , true ) , array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) );

        // Sub Title Alignment
        $w_studio_headerTextAlignment = esc_attr( get_post_meta( $post->ID , 'w-title-sub-title-alignment' , true ) );

        // Title Font Size
        $w_studio_titleFontSize = esc_attr( get_post_meta( $post->ID , 'w-title-font-size' , true ) );

        // Sub Title Font Size
        $w_studio_subTitleFontSize = esc_attr( get_post_meta( $post->ID , 'w-sub-title-font-size' , true ) );

        //  Title Font color
        $w_studio_headerFontColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-font-color' , true ) );

        // Sub Title Font color 
        $w_studio_headerSubtitleColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-subtitle-color' , true ) );

        //  Header Navigationlink Show/Hide 
        $w_studio_headerNavigation = esc_attr( get_post_meta( $post->ID , 'w-header-navigation' , true ) );

        //  Header Navigationlink Text
        $w_studio_headerNavigationText = esc_attr( get_post_meta( $post->ID , 'w-header-navigation-text' , true ) );

        //  Header Navigationlink Link 
        $w_studio_headerNavigationLink = esc_attr( get_post_meta( $post->ID , 'w-header-navigation-link' , true ) );

        //  Short nav link color 
        $w_studio_headerNavlinkColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-Navigationlink-color' , true ) );

        //  Short nav Icon color 
        $w_studio_headerNavIconColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-NavigationIcon-color' , true ) );

        //  Short nav link Hover color 
        $w_studio_headerNavlinkHoverColor = esc_attr( get_post_meta( $post->ID , 'w-page-header-Navigationlink-hover-color' , true ) );
    }
	
	//banner logo position
    $w_studio_bannerLogoPosition = esc_attr( get_post_meta( $post->ID , 'w-page-banner-logo-position' , true ) );
	
	if( $w_studio_headerTextAlignment == 'left' ) {
		$w_studio_custom_inline_style .= '.banner-logo { float: left; }';
	} else if( $w_studio_headerTextAlignment == 'center' ) {
		$w_studio_custom_inline_style .= '.banner-logo img { margin: 0 auto; }';
	} else if( $w_studio_headerTextAlignment == 'right' ) {
		$w_studio_custom_inline_style .= '.banner-logo { float: right; }';
	}
	if( $w_studio_bannerLogoPosition == 'titleup' ) {
		$w_studio_custom_inline_style .= '.banner-logo {margin-bottom: 30px; }';
	} else if( $w_studio_bannerLogoPosition == 'titledown' ) {
		$w_studio_custom_inline_style .= '.banner-logo {margin-top: 55px; }';
	}

    if( $w_studio_isPageHeader == 'on' ) {

        $height = ( null != $w_studio_headerHeight ) ? $w_studio_headerHeight : '';
        $w_studio_custom_inline_style .= '.wl-banner-container {
            height: ' . $height . 'px;
            background-color: ' . $w_studio_bgColor . ' !important;
        }';
        if( null != $w_studio_headerHeight ) {
            $w_studio_custom_inline_style .= '.wl-banner-container {position: relative;}';
        }

        if( $w_studio_headerType == '1' ) {
			if( $w_studio_bgColor != '' ) {
				$w_studio_custom_inline_style .= '#home {background: '.$w_studio_bgColor.'; }';
				$w_studio_custom_inline_style .= '.wl-overlay {background: none }';
			}
			$w_studio_custom_inline_style .= '#home {height: '.$height.'px; }';
            $w_studio_custom_inline_style .= '.page .wl-home-heading .wl-header-align-text {text-align:'.$w_studio_headerTextAlignment.'; color:'.$w_studio_headerFontColor.'; font-size: '.$w_studio_titleFontSize.'px }';
            $w_studio_custom_inline_style .= '.page p.wl-header-sub {text-align:'.$w_studio_headerTextAlignment.'; color:'.$w_studio_headerSubtitleColor.'; font-size: '.$w_studio_subTitleFontSize.'px }';
            $w_studio_custom_inline_style .= '.page .wl-banner-button {text-align:'.$w_studio_headerTextAlignment.'; }';
            ?>
			
            <div id="home" class="wl-home-style3 wl-paralax <?php if($w_studio_fullHeight == 'on' ) { echo 'wl-home'; } ?>">
                <div class="wl-overlay">
                    <div class="container">
                        <div class="wl-home-items">
							<div class="wl-middle-content">
								<div class="container">
									<?php if( $w_studio_bannerLogoPosition == 'titleup' ) { w_studio_banner_logo(); } ?>
									<div class="wl-home-heading">
										<h1 class="wl-header-align-text" ><?php if( $w_studio_headerTitle != null ) { echo wp_kses( $w_studio_headerTitle, array( 'br' => array(), 'span' => array( 'class' => array() ), 'strong' => array(), 'em' => array(), 'small' => array() ) ); } else { the_title(); } ?></h1>
									</div>
									<p class="wl-header-sub">
										<?php isset( $w_studio_headerSubTitle ) ? $w_studio_headerSubTitle : '';
										echo wp_kses($w_studio_headerSubTitle, array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) ); ?>
									</p>
									<?php if( $w_studio_bannerLogoPosition == 'titledown' ) { w_studio_banner_logo(); } ?>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        <?php
        } else {
            ?>

            <div id="home" <?php if($w_studio_headerType == '4' && $w_studio_video_url != '') { echo "data-property=\"{videoURL: '$w_studio_video_url',containment:'self',autoPlay:true, mute: $w_studio_video_mute, startAt:0, stopAt: 0, opacity:1, showControls:false, loop: true, vol: $w_studio_video_sound}\""; } ?> class="<?php if($w_studio_fullHeight == 'on' ) { echo 'wl-home '; } if( $w_studio_headerType == '2' ) {
                echo 'wl-paralax';
            } ?> wl-home-bg1">

                <?php
                list( $r , $g , $b ) = sscanf( $w_studio_bgOverlayColor , "#%02x%02x%02x" );
                $w_studio_custom_inline_style .= '.wl-overlay {
                background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ', ' . $w_studio_bgOpacity . ' );
             }';
                isset( $w_studio_bgImgUrl ) ? $w_studio_bgImgUrl : '';
                $w_studio_custom_inline_style .= '.wl-home-bg1 {
                background: transparent url( ' . $w_studio_bgImgUrl . ' ) no-repeat fixed 0 0;
                background-size : cover;
            }';

                $w_studio_NavlinkColor = isset( $w_studio_headerNavlinkColor ) ? $w_studio_headerNavlinkColor : '';
                $w_studio_custom_inline_style .= '.wl-link-to a { color: ' . $w_studio_NavlinkColor . '; }';

                $w_studio_NavIconColor = isset( $w_studio_headerNavIconColor ) ? $w_studio_headerNavIconColor : '';
                $w_studio_custom_inline_style .= '.wl-link-to span {
                color: ' . $w_studio_NavIconColor . ';
            }';

                $w_studio_NavlinkHoverColor = isset( $w_studio_headerNavlinkHoverColor ) ? $w_studio_headerNavlinkHoverColor : '';
                $w_studio_custom_inline_style .= '.wl-link-to:hover a {
                color: ' . $w_studio_headerNavlinkHoverColor . ';
                opacity: 1;
            }';

                $w_studio_h_height = ( null != $w_studio_headerHeight ) ? $w_studio_headerHeight : '';
                if( $w_studio_fullHeight != 'on' ) {
                    $w_studio_custom_inline_style .= '#home { height: '.$w_studio_h_height.'px; position: relative; }';
                }
                $w_studio_custom_inline_style .= '.wl-header-align-text {text-align:'.$w_studio_headerTextAlignment.'; color:'.$w_studio_headerFontColor.'; font-size: '.$w_studio_titleFontSize.'px }';
                $w_studio_custom_inline_style .= 'p.wl-header-sub {text-align:'.$w_studio_headerTextAlignment.'; color:'.$w_studio_headerSubtitleColor.'; font-size: '.$w_studio_subTitleFontSize.'px }';
                $w_studio_custom_inline_style .= '.wl-banner-button {text-align:'.$w_studio_headerTextAlignment.'; }';
				?>

                <div class="wl-overlay">
                    <div class="container">
						<div class="wl-home-items">
							<div class="wl-middle-content">
								<div class="container">
									<?php if( $w_studio_bannerLogoPosition == 'titleup' ) { w_studio_banner_logo(); } ?>
									<div class="wl-home-heading">
										<h1 class="wl-header-align-text"><?php if( $w_studio_headerTitle != null ) {
												echo wp_kses( $w_studio_headerTitle , array( 'br' => array(), 'span' => array( 'class' => array() ), 'strong' => array(), 'em' => array(), 'small' => array() ) );
											} else {
												the_title();
											} ?></h1>
									</div>
									<p class="wl-header-sub">

										<?php isset( $w_studio_headerSubTitle ) ? $w_studio_headerSubTitle : '';
										echo wp_kses( $w_studio_headerSubTitle , array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) ); ?>
									</p>
									<?php
									if( $w_studio_fullHeight == 'on' ) {
										if( $w_studio_headerNavigation == 'on' ) {
											if( $w_studio_headerNavigationText ) {
												?>
												<div class="wl-sort-link wl-banner-button">
													<div class="wl-link-to">
														<span class="wl-direction-left" data-icon=&#x45;></span>
														<a href="<?php if( $w_studio_headerNavigationLink ) echo esc_attr( $w_studio_headerNavigationLink ); ?>"><?php if( $w_studio_headerNavigationText ) echo esc_attr( $w_studio_headerNavigationText ); ?></a>
														<span class="wl-direction-right" data-icon=&#x44;></span>
													</div>
												</div>
											<?php
											}
										}
									} ?>
								</div>
								<?php if( $w_studio_bannerLogoPosition == 'titledown' ) { w_studio_banner_logo(); } ?>
							</div>
						</div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else if( is_page() ) {
        get_template_part( 'base/views/template-parts/blog-banner' );
        $w_studio_custom_inline_style .= '.wl-home-bg3 { margin-bottom: 60px; }';
    }
    
    wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style );
	
    // Check if menu is to loaded after header section
    $w_studio_checkMenu = esc_attr( get_post_meta( $post->ID , 'w-page-menu-position' , true ) );
	
	//Load Page Below Menu
    if( $w_studio_checkMenu == 'on' ) {
       get_template_part( 'base/menu/menu' );
    }
}
if( ! function_exists( 'w_studio_banner_logo' ) ) {
	function w_studio_banner_logo() {
		global $post;
		$w_studio_banner_logo_target = '_blank';
		$w_studio_banner_logo = esc_url( get_post_meta( $post->ID, 'w-page-header-bg-logo', true ) );
		$w_studio_banner_logo_link = esc_url( get_post_meta( $post->ID, 'w-banner-logo-link', true ) );
		$w_studio_banner_logo_link_open = esc_attr( get_post_meta( $post->ID, 'w-banner-logo-link-open', true ) );
		if( $w_studio_banner_logo != '' ) {
			if( $w_studio_banner_logo_link_open == 'on' ) {
				$w_studio_banner_logo_target = '_blank';
			}
			echo '<a class="banner-logo" target="'.$w_studio_banner_logo_target.'" href="'.$w_studio_banner_logo_link.'"><img src="'.$w_studio_banner_logo.'" /></a>';
		}
	}
}
?>