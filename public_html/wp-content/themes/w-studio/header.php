<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage W_Studio
 * @since W Studio 1.0.1
 */
$w_studio_optionValues = get_option( 'w_studio' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <?php wp_head(); ?>
    </head>
	
<body <?php body_class(); ?>>
<div class="wl-body-wraper">

	<?php
	global $wp_query;

	$w_studio_headerOptions = isset( $w_studio_optionValues['w-enable-header'] ) ? esc_attr($w_studio_optionValues['w-enable-header']) : '';
	
	if( is_page() ) {
		$w_studio_headerTO = esc_attr( get_post_meta( $wp_query->post->ID, 'w-page-header-show-hide', true ) );
	} else {
		$w_studio_headerTO = '';
	}
	if ( ! class_exists( 'Redux' ) ) {	
		w_studio_headerShowHide($w_studio_optionValues, $wp_query );
	} else {
		if( is_page() ) {
			if( $w_studio_headerTO != 'hide' && $w_studio_headerTO != 'show' ) {
				if( $w_studio_headerOptions == '1' ) {
					w_studio_headerShowHide($w_studio_optionValues, $wp_query );
				}
			} else if( $w_studio_headerTO == 'show' ) {
				w_studio_headerShowHide($w_studio_optionValues, $wp_query );
			}
		} else {
			w_studio_headerShowHide($w_studio_optionValues, $wp_query );
		}
	}

	//enqueue inline style css
	wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
	$w_studio_custom_inline_style = '';
	
	$w_studio_meta_border_color = isset( $w_studio_optionValues[ 'w-blog-post-meta-border-color' ] ) ? $w_studio_optionValues[ 'w-blog-post-meta-border-color' ] : '';
	$w_studio_custom_inline_style .= '.wl-blog-detail-menu ul li a, .wl-blog-detail-menu ul li a { border-color: '.$w_studio_meta_border_color.'; }';
	
	//banner height set
	$w_studio_blog_banner_height = isset( $w_studio_optionValues[ 'w-blog-banner-height-set' ] ) ? esc_attr( $w_studio_optionValues[ 'w-blog-banner-height-set' ] ) : '';
	if( $w_studio_blog_banner_height != '' ) {
		$w_studio_custom_inline_style .= '.wl-blog-height { height: '.$w_studio_blog_banner_height.'px; }';
	}
	
	if( is_page() ) {
		if( $w_studio_headerTO == 'default' ) {
			if( $w_studio_headerOptions == '0' ) {				
				$w_studio_custom_inline_style .= '#home { top: 0; }';
			}
		} else if( $w_studio_headerTO == 'hide' ) {
			$w_studio_custom_inline_style .= '#home { top: 0; }';
		}
	}
	wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );
	?>

	<?php function w_studio_headerShowHide($w_studio_optionValues, $wp_query ) { 
		global $post;
		if( is_page() ) {
			$w_studio_menuStyle_meta    = esc_attr(get_post_meta( $post->ID, 'w-page-menu-styles', true ));
			$w_studio_standard_menu_position = esc_attr( get_post_meta( $post->ID, 'w-page-standard-menu-position', true ) );
		} else {
			$w_studio_menuStyle_meta = '';
			$w_studio_standard_menu_position = '';
		}
   		
   		$w_studio_menuStyle_redux = isset($w_studio_optionValues['w-menu-style']) ? $w_studio_optionValues['w-menu-style'] : 'standard';
		
		?>
    <!-- Header start -->
    <header class="wl-header">
        <?php
		$w_studio_onePage = '';
		$w_studio_custom_inline_style = '';
		//enqueue inline style css
		wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
		
		if( $w_studio_menuStyle_meta == 'standard' && $w_studio_standard_menu_position == 'left' ) {
			$w_studio_custom_inline_style = 'nav.wl-main-nav ul li.mega-menu-2 > .mega-menu { left: 0; margin-left: 0; }';
		}

		// Home Top Menu background color
		$w_studio_homeTopMenuBackgroundColor = esc_attr(isset($w_studio_optionValues[ 'w-home-top-menu-background-color' ])) ? esc_attr($w_studio_optionValues[ 'w-home-top-menu-background-color' ]) : '';

		//  Below Menu background color
		$w_studio_belowMenuBackgroundColor = isset( $w_studio_optionValues[ 'w-below-menu-background-color' ] ) ? esc_attr($w_studio_optionValues[ 'w-below-menu-background-color' ]) : '';

		//  Sticky Menu background color
		$w_studio_stickyMenuBackgroundColor = isset( $w_studio_optionValues[ 'w-sticky-menu-background-color' ] ) ? esc_attr($w_studio_optionValues[ 'w-sticky-menu-background-color' ]) : '';

		// page title seperator
		$w_studio_titleSeperator = esc_attr(isset($w_studio_optionValues[ 'w-page-title-seperator' ])) ? esc_attr($w_studio_optionValues[ 'w-page-title-seperator' ]) : '';

		if ( isset($w_studio_titleSeperator) && $w_studio_titleSeperator == 0 ) {
			$w_studio_custom_inline_style .= '.wl-page-heading::after {  border-top: 2px solid none; display: none; margin-top: 0; }';
		} 

        if ( is_page() ) {
            $w_studio_postId = $wp_query->post->ID;
            $w_studio_checkMenu = esc_attr(get_post_meta( $w_studio_postId, 'w-page-menu-position', true ));
        } else {
            $w_studio_checkMenu = '';
        }
        if ( $w_studio_checkMenu != 'on' ) {
			//Top header background color
		    $w_studio_custom_inline_style .= '.wl-top-menu { background: '.$w_studio_homeTopMenuBackgroundColor.';}';
			
			//Below header background color
		    $w_studio_custom_inline_style .= '.wl-menu-lower { background: '.$w_studio_belowMenuBackgroundColor.';}';
		    
			//Sticky header background color
		    $w_studio_custom_inline_style .= '.navbar-fixed-top { background: '.$w_studio_stickyMenuBackgroundColor.';}';

            if( esc_attr($w_studio_optionValues[ 'w-search-form-header' ]) ) {
                $w_studio_custom_inline_style .= '.wl-main-nav { padding-right: 200px; }';
            } 
			
			if ( esc_url($w_studio_optionValues[ 'w-sticky-header-logo' ][ 'url' ] )) {
				$w_studio_custom_inline_style .= '.navbar-fixed-top .custom-logo-link {  display: none; }';
				$w_studio_custom_inline_style .= '.navbar-fixed-top .wl-main-logo {  display: none; }';
				$w_studio_custom_inline_style .= '.navbar-fixed-top span.wl-logo-text {  display: none; }';
			}
			
			
			if ( $w_studio_onePage != 'on' ) {
				if( is_page() ) {
				$w_studio_page_sticky_menu = esc_attr( get_post_meta( $wp_query->post->ID, 'w-page-sticky-menu', true ) );
				} else {
					$w_studio_page_sticky_menu = isset($w_studio_optionValues[ 'w-sticky-menu-header-on-off' ]) ? esc_attr( $w_studio_optionValues[ 'w-sticky-menu-header-on-off' ] ) : '';
					if( $w_studio_page_sticky_menu != '1' ) {
						$w_studio_custom_inline_style .= '.navbar-fixed-top, .navbar-fixed-bottom {  position: inherit; }';
						$w_studio_custom_inline_style .= '.navbar-fixed-top, .navbar-fixed-bottom {  position: inherit; }';
					}
				}
				if( $w_studio_page_sticky_menu == 'default' ) {
					if ( esc_attr(isset($w_studio_optionValues[ 'w-sticky-menu-header-on-off' ])) && esc_attr($w_studio_optionValues[ 'w-sticky-menu-header-on-off' ]) != '1' ) {
						$w_studio_custom_inline_style .= '.navbar-fixed-top, .navbar-fixed-bottom {  position: inherit; }';
						$w_studio_custom_inline_style .= '.navbar-fixed-top, .navbar-fixed-bottom {  position: inherit; }';
					}
				} else if( $w_studio_page_sticky_menu == 'disable' ) {	
						$w_studio_custom_inline_style .= '.navbar-fixed-top, .navbar-fixed-bottom {  position: inherit; }';
					}
				}
				wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );
				
           		if( is_page() ) {
					if ($w_studio_menuStyle_meta == 'standard' || ( $w_studio_menuStyle_meta == 'default' && $w_studio_menuStyle_redux == 'standard' ) ) {
						//Load Page Top Menu
						get_template_part( 'base/menu/menu' ); 
						echo '</header>';
					} else if ( ($w_studio_menuStyle_meta == 'default' && !class_exists('Redux') ) || ($w_studio_menuStyle_meta == '' && class_exists('Redux')) ) {
						//Load Page Top Menu
						get_template_part( 'base/menu/menu' ); 
						echo '</header>';
					} else if($w_studio_menuStyle_meta != 'standard' || ( $w_studio_menuStyle_meta == 'default' && $w_studio_menuStyle_redux != 'standard' )) {
						get_template_part('base/menu/burger');
					}
				} else {
					if( $w_studio_menuStyle_redux == 'standard' ) {
						get_template_part( 'base/menu/menu' ); 
						echo '</header>';
					} else {
						get_template_part('base/menu/burger');
					}
				}
		}  ?>
    
<!-- Header end -->
<?php } ?>