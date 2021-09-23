<?php
//WP global variable
global $post;

//Redux global variable
$w_studio_optionValues = get_option( 'w_studio' );

//Inline style script & inline style variable initialize
wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
$w_studio_custom_inline_style = '';

$w_studio_standard_menu_position = 'default';
if( is_page() ) {
	$w_studio_standard_menu_position = esc_attr( get_post_meta( $post->ID, 'w-page-standard-menu-position', true ) );
}

if( $w_studio_standard_menu_position == 'default' ) {
	$w_studio_menu_position = isset( $w_studio_optionValues[ 'w-standard-menu-position' ] ) ? esc_attr( $w_studio_optionValues[ 'w-standard-menu-position' ] ) : 'right';
} else {
	$w_studio_menu_position = $w_studio_standard_menu_position;
}

/* menu options from w-page-header */

//  Sticky Menu Text color
$w_studio_stickyMenuTextColor = isset( $w_studio_optionValues[ 'w-sticky-menu-text-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-sticky-menu-text-color' ] ) : '';

//  Below Menu background color
$w_studio_belowMenuBackgroundColor = isset( $w_studio_optionValues[ 'w-below-menu-background-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-below-menu-background-color' ] ) : '';

//  Sticky Menu background color
$w_studio_stickyMenuBackgroundColor = isset( $w_studio_optionValues[ 'w-sticky-menu-background-color' ] ) ? esc_attr( $w_studio_optionValues[ 'w-sticky-menu-background-color' ] ) : '';

if( is_page() ) {
	//  Menu color
	$w_studio_menuTextColor = esc_attr( get_post_meta( $post->ID , 'w-page-menu-color' , true ) );
	//  Menu Top
	$w_studio_menuTop = esc_attr( get_post_meta( $post->ID , 'w-page-menu-height' , true ) );
}



if( isset( $w_studio_menuTextColor ) && $w_studio_menuTextColor != '' ) {
	$w_studio_custom_inline_style .= '.home .wl-main-nav ul li a, .wl-main-nav ul li a, #menu-one-page-menu a { color: ' . $w_studio_menuTextColor . '}';
}

$w_studio_kyMenuTextColor = isset( $w_studio_stickyMenuTextColor ) ? $w_studio_stickyMenuTextColor : '';
$w_studio_custom_inline_style .= '.navbar-fixed-top .wl-main-nav ul li a { color: ' . $w_studio_kyMenuTextColor . '; }';

$w_studio_lowMenuBackgroundColor = isset( $w_studio_belowMenuBackgroundColor ) ? $w_studio_belowMenuBackgroundColor : '';
$w_studio_custom_inline_style .= '.wl-menu-lower {background: ' . $w_studio_belowMenuBackgroundColor . ';}';

$w_studio_lowMenuBackgroundColor = isset( $w_studio_belowMenuBackgroundColor ) ? $w_studio_stickyMenuBackgroundColor : '';
$w_studio_custom_inline_style .= '.navbar-fixed-top {background: ' . $w_studio_lowMenuBackgroundColor . ';}';

if( isset( $w_studio_menuTop ) && $w_studio_menuTop != '' ) {
	$w_studio_custom_inline_style .= '.wl-header {top: ' . $w_studio_menuTop . 'px !important;}';
}

if ( esc_url($w_studio_optionValues[ 'w-sticky-header-logo' ][ 'url' ] )) {
	$w_studio_custom_inline_style .= '.navbar-fixed-top .custom-logo-link {  display: none; }';
	$w_studio_custom_inline_style .= '.navbar-fixed-top .wl-main-logo {  display: none; }';
}
//menu style
$w_studio_menu_style_TO = isset( $w_studio_optionValues[ 'w-menu-style' ] ) ? esc_attr( $w_studio_optionValues[ 'w-menu-style' ] ) : '';
$w_studio_menuStyle = 'default';
if( is_page() ) {
	$w_studio_menuStyle    = esc_attr(get_post_meta( $post->ID, 'w-page-menu-styles', true ));
}

if( $w_studio_menuStyle == 'default' ) {
	$w_studio_menuStyle = $w_studio_menu_style_TO;
}

if( $w_studio_menu_position == 'left' && $w_studio_menuStyle == 'standard' ) {
	$w_studio_custom_inline_style .= 'nav.wl-main-nav ul li.mega-menu-2 > .mega-menu { left: 0; margin-left: 0; }';
}

$w_studio_custom_inline_style .= '.wl-main-nav { float: '.$w_studio_menu_position.'}';

wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

$w_studio_below_header = '';
if( is_page() ) {
	$w_studio_below_header  = esc_attr( get_post_meta( $post->ID, 'w-page-menu-position', true ) );
}
?>
<!-- Main Menu -->
<div id="main-menu" class="wl-full-width wl-no-header <?php if( $w_studio_below_header == 'on' ) { echo 'wl-menu-lower'; } else { echo 'wl-top-menu'; } ?>">
	<div class="container">
		<div class="wl-header-wrap wl-marginzero wl-relative">
			<?php 
			$w_studio_Logo_enable = ''; 
			if( is_page() ) { 
				$w_studio_Logo_enable = get_post_meta( $post->ID, 'w-page-header-logo-enable', true ); 
			}
			if($w_studio_Logo_enable != 'on') {
				$w_studio_logo_link = '';
				$w_studio_logo_open = '';
				if( is_page() ) {
					$w_studio_logo_link = esc_url( get_post_meta( $post->ID, 'w-page-logo-link', true ) );
					if( esc_attr( get_post_meta( $post->ID, 'w-logo-link-open-new-tab', true ) ) == 'on' ) {
						$w_studio_logo_open = '_blank';
					}
				}
				
			?>
			<div class="wl-logo wl-logo-head">
				<a class="wl-img" href="<?php if( $w_studio_logo_link != '' ) { echo esc_url( $w_studio_logo_link ); } else { echo esc_url( home_url( '/' ) ); } ?>" target="<?php echo esc_attr( $w_studio_logo_open ); ?>">
					<?php if ( esc_url($w_studio_optionValues[ 'w-sticky-header-logo' ][ 'url' ] )) { ?>
						<img class = "wl-sticky-logo" src="<?php echo esc_url($w_studio_optionValues[ 'w-sticky-header-logo' ][ 'url' ]); ?>" alt="<?php _e('logo', 'w-studio'); ?>"/>
					<?php } ?>
					<?php 
						$w_studio_pageLogo = '';
						if( is_page() ) {
							$w_studio_pageLogo = esc_url(get_post_meta( $wp_query->post->ID, 'w-page-header-logo-image', true ));
						}
						if( $w_studio_pageLogo ) { ?>
						<img class="wl-main-logo" src="<?php echo esc_url( $w_studio_pageLogo ); ?>" alt="<?php _e('logo', 'w-studio'); ?>"/>
						<?php 
						} else {
							if ( function_exists('has_custom_logo') AND has_custom_logo() ) { 
								the_custom_logo();
							} else if(isset($w_studio_optionValues['w-logo-option']) && $w_studio_optionValues['w-logo-option'] == 'image') {

								if ( $w_studio_optionValues[ 'w-logo' ][ 'url' ] ) { 
									?>
									<img class="wl-main-logo" src="<?php echo esc_url($w_studio_optionValues[ 'w-logo' ][ 'url' ]); ?>" alt="<?php _e('logo', 'w-studio'); ?>"/>
								<?php } else { ?>
									<img class="wl-main-logo" src="<?php echo W_STUDIO_THEME_ASSETS; ?>/images/wstudioblogo.png" alt="<?php _e('logo', 'w-studio'); ?>"/>
								<?php } 
							} else if(isset($w_studio_optionValues['w-logo-option']) && $w_studio_optionValues['w-logo-option'] == 'text') { 
								if (isset($w_studio_optionValues['w-logo-text']) && $w_studio_optionValues['w-logo-text'] != '') {
									echo '<span class="wl-logo-text wl-main-logo">'.esc_attr($w_studio_optionValues['w-logo-text']).'</span>';
								} else { ?>
									<img class="wl-main-logo" src="<?php echo W_STUDIO_THEME_ASSETS; ?>/images/wstudioblogo.png" alt="<?php _e('logo', 'w-studio'); ?>"/>
								<?php }								
							}
						} ?>
				</a>
			</div>
			<?php } ?>
			
			<!-- Top Widget Area -->
			<?php if( is_active_sidebar( 'top_widgets' ) ) { ?>
				<a id="social_icon_SH" href="#"><span data-icon="&#xe0a0;"></span></a>
			<?php	dynamic_sidebar( 'top_widgets' );
			} ?>
			
			<?php
			// Checking For One Page Menu
			$w_studio_pageMenu = '';
			$w_studio_onePage = '';
			$w_studio_menuStyle = '';
			while( have_posts() ):
				the_post();
				global $post;
				if( is_page() ) {
					$w_studio_pageMenu = get_post_meta( $post->ID, 'w-page-menu-select', true );
					$w_studio_onePage    = esc_attr(get_post_meta( $post->ID, 'w-is-one-page', true ));
					$w_studio_menuStyle    = esc_attr(get_post_meta( $post->ID, 'w-page-menu-styles', true ));
				}
			endwhile;
			if( isset( $w_studio_onePage ) ) {
			
			}else{
				$w_studio_onePage = '';
			}
				
			if( 'on' == $w_studio_onePage ){
				?><!-- One Page Menu start --><?php
				wp_nav_menu( array(
					'menu'				=> $w_studio_pageMenu,
					'container'         => 'nav',
					'container_class'   => 'wl-main-nav',
					'fallback_cb'       => 'wp_page_menu',
					'theme_location'    => 'one-page-menu',
					'walker'            => new W_Walker()
				) );
				?><!-- One Page Menu end --><?php
			} else {
					
				if( $w_studio_pageMenu == '' ) {
					$w_studio_pageMenu = '';
				}
				?><!-- Mega Menu start --><?php
				wp_nav_menu( array(
					'menu'				=> $w_studio_pageMenu,
					'container'         => 'nav',
					'container_class'   => 'wl-main-nav',
					'fallback_cb'       => 'wp_page_menu',
					'theme_location'    => 'main-menu',
					'walker'            => new W_Walker()
				) );
				?><!-- Mega Menu end --><?php

			}
			?>
			<?php if ( esc_attr($w_studio_optionValues[ 'w-search-form-header' ] )) { ?>
				<div class="wl-search-form"><?php get_template_part( 'searchform' ); ?></div>
			<?php } ?>
		</div>
	</div>
</div>