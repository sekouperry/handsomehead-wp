<?php
$w_studio_optionValues = get_option( 'w_studio' );
?>
	<!-- Main Menu -->
	<div id="main-menu" class="wl-full-width wl-top-menu wl-no-header wl-menu-lower">
		<div class="container">
			<div class="wl-header-wrap wl-marginzero wl-relative">
				<?php 
				if( is_page() ) {
					$w_studio_Logo_enable = get_post_meta( $post->ID, 'w-page-header-logo-enable', true ); 
				} else {
					$w_studio_Logo_enable = '';
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
							if( is_page() ) {
							$w_studio_pageLogo = esc_url(get_post_meta( $wp_query->post->ID, 'w-page-header-logo-image', true ));
							} else {
								$w_studio_pageLogo = '';
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
				<!-- Start Atribute Navigation -->
				<nav class="navbar bootsnav">
					<div class="attr-nav">
						<ul>
							<li class="side-menu"><a href="#"><i class="icon_menu"></i></a></li>
						</ul>
					</div>
				</nav>
				<!-- End Atribute Navigation -->
				
				<?php if ( esc_attr($w_studio_optionValues[ 'w-search-form-header' ] )) { ?>
					<div class="wl-search-form"><?php get_template_part( 'searchform' ); ?></div>
				<?php } ?>
				<?php if( is_active_sidebar( 'top_widgets' ) ) {
					dynamic_sidebar( 'top_widgets' );
				} ?>
			</div>
		</div>
	</div>
</header>
<!-- Start Navigation -->
<div class="navbar bootsnav">
    <!-- Start Side Menu -->
	<?php
	global $post;
	if( is_page() ) {
		$w_studio_menuStyle_meta    = esc_attr(get_post_meta( $post->ID, 'w-page-menu-styles', true ));
	} else {
		$w_studio_menuStyle_meta = '';
	}
	$w_studio_menuStyle_redux = isset($w_studio_optionValues['w-menu-style']) ? $w_studio_optionValues['w-menu-style'] : 'standard';
	$w_studio_burger = '';
	$w_studio_burger_text = '';
	$w_studio_full_wrap = '';
	$w_studio_full_wrap_end = '';
	if( is_page() ) {
		if ($w_studio_menuStyle_meta == 'full' || ($w_studio_menuStyle_meta == 'default' && $w_studio_menuStyle_redux == 'full')) {
			$w_studio_burger = 'side-2';
			$w_studio_burger_text = 'text-center';
			$w_studio_full_wrap = '<div class="side-full">';
			$w_studio_full_wrap_end = '</div>';
		} else if ($w_studio_menuStyle_meta == 'right' || ($w_studio_menuStyle_meta == 'default' && $w_studio_menuStyle_redux == 'right')) {
			$w_studio_burger = '';
			$w_studio_burger_text = '';
			$w_studio_full_wrap = '';
			$w_studio_full_wrap_end = '';
		} else if ($w_studio_menuStyle_meta == 'left' || ($w_studio_menuStyle_meta == 'default' && $w_studio_menuStyle_redux == 'left')) {
			$w_studio_burger = 'side-left';
			$w_studio_burger_text = '';
			$w_studio_full_wrap = '';
			$w_studio_full_wrap_end = '';
		}
	} else {
		if ( $w_studio_menuStyle_redux == 'full' ) {
			$w_studio_burger = 'side-2';
			$w_studio_burger_text = 'text-center';
			$w_studio_full_wrap = '<div class="side-full">';
			$w_studio_full_wrap_end = '</div>';
		} else if ( $w_studio_menuStyle_redux == 'right' ) {
			$w_studio_burger = '';
			$w_studio_burger_text = '';
			$w_studio_full_wrap = '';
			$w_studio_full_wrap_end = '';
		} else if ( $w_studio_menuStyle_redux == 'left' ) {
			$w_studio_burger = 'side-left';
			$w_studio_burger_text = '';
			$w_studio_full_wrap = '';
			$w_studio_full_wrap_end = '';
		}
	}
	?>
    <div class="side <?php echo esc_attr($w_studio_burger); ?> wl-main-nav">
    	<?php echo $w_studio_full_wrap; ?>
        <a href="#" class="close-side"><i class="icon_close"></i></a>
		<?php
		// Checking For One Page Menu
		while( have_posts() ):
			the_post();
			global $post;
			$w_studio_pageMenu = get_post_meta( $post->ID, 'w-page-menu-select', true );
			$w_studio_onePage    = esc_attr(get_post_meta( $post->ID, 'w-is-one-page', true ));
			$w_studio_menuStyle    = esc_attr(get_post_meta( $post->ID, 'w-page-menu-styles', true ));
		endwhile;
		if( isset( $w_studio_onePage ) ) {

		}else{
			$w_studio_onePage = '';
		}
			
		if( 'on' == $w_studio_onePage ) {
			?><!-- One Page Menu start --><?php
			wp_nav_menu( array(
				'menu'				=> $w_studio_pageMenu,
				'container'         => 'ul',
				'menu_id'			=> 'accordion',
				'menu_class'		=> 'panel-group '.$w_studio_burger_text,
				'fallback_cb'       => 'wp_page_menu',
				'theme_location'    => 'one-page-menu',
				'walker'            => new W_Burger_Walker()
			) );
			?><!-- One Page Menu end --><?php
		} else {
				
			if( !isset( $w_studio_pageMenu ) ) {
				$w_studio_pageMenu = '';
			}
			?><!-- Mega Menu start --><?php
			wp_nav_menu( array(
				'menu'				=> $w_studio_pageMenu,
				'container'         => 'ul',
				'menu_id'			=> 'accordion',
				'menu_class'		=> 'panel-group '.$w_studio_burger_text,
				'fallback_cb'       => 'wp_page_menu',
				'theme_location'    => 'main-menu',
				'walker'            => new W_Burger_Walker()
			) );
			?><!-- Mega Menu end --><?php

		}
		echo $w_studio_full_wrap_end;
		?>
	</div>
</div>