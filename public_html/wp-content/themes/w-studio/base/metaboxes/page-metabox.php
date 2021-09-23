<?php
/* Adding Metaboxes For Portfolio Pages */
add_action( 'add_meta_boxes' , 'w_studio_additionalMetaBoxes' , 100 );

/* Saving Post Data */
add_action( 'save_post' , 'w_studio_savePageData' );

/*
 * Function to add metabox
 * 
 *
 */
function w_studio_additionalMetaBoxes() {
    add_meta_box( 'w-page-header' , esc_html__( 'Page Settings' , 'w-studio' ) , 'w_studio_pageHeader' , 'page' , 'normal' , 'high' );
}

/**
 * Function To Generate Page Header Metabox Options
 *
 *
 */
function w_studio_pageHeader() {

    wp_nonce_field( 'w-page-header-options' , 'w-page-header-nonce' );

    global $post_id;
    // Getting Previously Saved Values
    $w_studio_values = get_post_custom( $post_id );
	
    $w_studio_headerLogo_enable = isset( $w_studio_values[ 'w-page-header-logo-enable' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-logo-enable' ][ 0 ] ) : '';
	$w_studio_headerLogo = isset( $w_studio_values[ 'w-page-header-logo-image' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-logo-image' ][ 0 ] ) : '';
	$w_studio_logo_link = isset( $w_studio_values[ 'w-page-logo-link' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-logo-link' ][ 0 ] ) : '';
	$w_studio_logo_link_new_tab = isset( $w_studio_values[ 'w-logo-link-open-new-tab' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-logo-link-open-new-tab' ][ 0 ] ) : '';
	
	$w_studio_sticky_menu = isset( $w_studio_values[ 'w-page-sticky-menu' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-sticky-menu' ][ 0 ] ) : '';
	$w_studio_standard_menu_position = isset( $w_studio_values[ 'w-page-standard-menu-position' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-standard-menu-position' ][ 0 ] ) : '';
    $w_studio_menu_styles = isset( $w_studio_values[ 'w-page-menu-styles' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-menu-styles' ][ 0 ] ) : '';
	$w_studio_page_title_alignment = isset( $w_studio_values[ 'w-page-title-alignment' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-title-alignment' ][ 0 ] ) : '';
	$w_studio_pageHeaderShowHide = isset( $w_studio_values[ 'w-page-header-show-hide' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-show-hide' ][ 0 ] ) : '';
	$w_studio_pageFooterShowHide = isset( $w_studio_values[ 'w-page-footer-show-hide' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-footer-show-hide' ][ 0 ] ) : '';
	$w_studio_hideHeaderMargin = isset( $w_studio_values[ 'w-hide-page-header-margin' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-hide-page-header-margin' ][ 0 ] ) : '';
	$w_studio_hideFooterMargin = isset( $w_studio_values[ 'w-hide-page-footer-margin' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-hide-page-footer-margin' ][ 0 ] ) : '';
	
	//slider options
    $w_studio_enableBannerSlider = isset( $w_studio_values[ 'w-page-banner-slider' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-banner-slider' ][ 0 ] ) : '';
    $w_studio_sliderCategory = isset( $w_studio_values[ 'w-slider-category' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-category' ][ 0 ] ) : '';
    $w_studio_sliderHeight = isset( $w_studio_values[ 'w-slider-height' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-height' ][ 0 ] ) : '';
    $w_studio_sliderWIdth = isset( $w_studio_values[ 'w-slider-width' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-width' ][ 0 ] ) : '';
    $w_studio_sliderMarginBottom = isset( $w_studio_values[ 'w-slider-margin-bottom' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-margin-bottom' ][ 0 ] ) : '';
	
	$w_studio_enableHeader = isset( $w_studio_values[ 'w-page-header' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header' ][ 0 ] ) : '';
    $w_studio_headerType = isset( $w_studio_values[ 'w-header-type' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-header-type' ][ 0 ] ) : '';
    $w_studio_youtubeUrl = isset( $w_studio_values[ 'w-youtube-url' ][ 0 ] ) ? esc_url( $w_studio_values[ 'w-youtube-url' ][ 0 ] ) : '';
    $w_studio_sound = isset( $w_studio_values[ 'w-bg-video-sound' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-bg-video-sound' ][ 0 ] ) : '';
    $w_studio_menuTextColor = isset( $w_studio_values[ 'w-page-menu-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-menu-color' ][ 0 ] ) : '#393939';
	$w_studio_headerImage = isset( $w_studio_values[ 'w-page-header-bg-image' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-bg-image' ][ 0 ] ) : '';
	
	$w_studio_bannerLogo = isset( $w_studio_values[ 'w-page-header-bg-logo' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-bg-logo' ][ 0 ] ) : '';
	$w_studio_bannerLogoPosition = isset( $w_studio_values[ 'w-page-banner-logo-position' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-banner-logo-position' ][ 0 ] ) : '';
	$w_studio_bannerLogoLink = isset( $w_studio_values[ 'w-banner-logo-link' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-banner-logo-link' ][ 0 ] ) : '';
	$w_studio_bannerLogoLinkOpen = isset( $w_studio_values[ 'w-banner-logo-link-open' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-banner-logo-link-open' ][ 0 ] ) : '';
    
	$w_studio_headerBgColor = isset( $w_studio_values[ 'w-page-header-bg-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-bg-color' ][ 0 ] ) : '';
    $w_studio_menuBgColor = isset( $w_studio_values[ 'w-page-menu-bg-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-menu-bg-color' ][ 0 ] ) : '';
    $w_studio_menuTop = isset( $w_studio_values[ 'w-page-menu-height' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-menu-height' ][ 0 ] ) : '';
    $w_studio_headerOverlayColor = isset( $w_studio_values[ 'w-page-header-overlay-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-overlay-color' ][ 0 ] ) : '#000000';
    $w_studio_headerOpacity = isset( $w_studio_values[ 'w-page-header-opacity' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-opacity' ][ 0 ] ) : '';
    $w_studio_headerTransition = isset( $w_studio_values[ 'w-page-header-transition-speed' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-transition-speed' ][ 0 ] ) : '';
    $w_studio_fullHeader = isset( $w_studio_values[ 'w-page-header-full' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-full' ][ 0 ] ) : '';
    $w_studio_headerHeight = isset( $w_studio_values[ 'w-page-header-height' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-height' ][ 0 ] ) : '';
    $w_studio_hideTitle = isset( $w_studio_values[ 'w-hide-page-title' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-hide-page-title' ][ 0 ] ) : '';
    $w_studio_title = isset( $w_studio_values[ 'w-page-title' ][ 0 ] ) ? wp_kses( $w_studio_values[ 'w-page-title' ][ 0 ], array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) ) : '';
    $w_studio_subTitle = isset( $w_studio_values[ 'w-page-sub-title' ][ 0 ] ) ? wp_kses( $w_studio_values[ 'w-page-sub-title' ][ 0 ] , array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) ) : '';
    $w_studio_titleAlignment = isset( $w_studio_values[ 'w-title-sub-title-alignment' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-title-sub-title-alignment' ][ 0 ] ) : '';
    $w_studio_titleFontSize = isset( $w_studio_values[ 'w-title-font-size' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-title-font-size' ][ 0 ] ) : '';
    $w_studio_subTitleFontSize = isset( $w_studio_values[ 'w-sub-title-font-size' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-sub-title-font-size' ][ 0 ] ) : '';
    $w_studio_headerFontColor = isset( $w_studio_values[ 'w-page-header-font-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-font-color' ][ 0 ] ) : '#000000';
    $w_studio_headerSubtitleColor = isset( $w_studio_values[ 'w-page-header-subtitle-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-subtitle-color' ][ 0 ] ) : '#000000';
    $w_studio_headerNavigationText = isset( $w_studio_values[ 'w-header-navigation-text' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-header-navigation-text' ][ 0 ] ) : '';
    $w_studio_headerNavigationLink = isset( $w_studio_values[ 'w-header-navigation-link' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-header-navigation-link' ][ 0 ] ) : '';
    $w_studio_headerNavigation = isset( $w_studio_values[ 'w-header-navigation' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-header-navigation' ][ 0 ] ) : '';
    $w_studio_headerNavlinkColor = isset( $w_studio_values[ 'w-page-header-Navigationlink-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-Navigationlink-color' ][ 0 ] ) : '#000000';
    $w_studio_headerNavIconColor = isset( $w_studio_values[ 'w-page-header-NavigationIcon-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-NavigationIcon-color' ][ 0 ] ) : '#ababab';
    $w_studio_headerNavlinkHoverColor = isset( $w_studio_values[ 'w-page-header-Navigationlink-hover-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-header-Navigationlink-hover-color' ][ 0 ] ) : '#000000';
    $w_studio_sidebarType = isset( $w_studio_values[ 'w-page-sidebar' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-sidebar' ][ 0 ] ) : '';
    $w_studio_sidebarLoad = isset( $w_studio_values[ 'w-page-load-sidebar' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-load-sidebar' ][ 0 ] ) : '';
    $w_studio_menuPosition = isset( $w_studio_values[ 'w-page-menu-position' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-menu-position' ][ 0 ] ) : '';
    $w_studio_isOnePage = isset( $w_studio_values[ 'w-is-one-page' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-is-one-page' ][ 0 ] ) : '';
    $w_studio_pageMenu = isset( $w_studio_values[ 'w-page-menu-select' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-page-menu-select' ][ 0 ] ) : '';

    ?>

    <!-- Header Logo remove -->
    <div class="w-header-meta">
        <label for="w-page-header-logo-enable"><?php esc_html_e( 'Remove Logo For This Page' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-page-header-logo-enable"
            name="w-page-header-logo-enable" <?php checked( $w_studio_headerLogo_enable , 'on' ); ?> />
    </div>
	
    <div class="w-header-meta">
        <label for="w-page-header-logo"><?php esc_html_e( 'Upload Logo (Only for this page)' , 'w-studio' ) ?></label>
        <div class="w-header-logo-meta">
			<div class="w-logo-wrapper">
				<span id="w-logo-close"></span>
				<input type="hidden" name="w-page-header-logo-image" id="w-page-header-logo-image"
					   value="<?php if( isset( $w_studio_headerLogo ) ) echo esc_attr( $w_studio_headerLogo ); ?>"
					   />
				<img class="w-page-header-logo-image-loader" src="<?php echo esc_attr( $w_studio_headerLogo ); ?>"/>
			</div>
				<input class="button" id="w-page-logo-uploader" type="button"
					   value="<?php esc_html_e( 'Upload logo' , 'w-studio' ); ?>"/>
        </div>
    </div>
	
	<!-- Logo Link -->
    <div class="w-header-meta">
        <label for="w-page-logo-link"><?php esc_html_e( 'Logo Link' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-page-logo-link" id="w-page-logo-link" value="<?php echo esc_attr( $w_studio_logo_link ); ?>"/>
    </div>
	
	<!-- Link open new tab -->
    <div class="w-header-meta">
        <label for="w-logo-link-open-new-tab"><?php esc_html_e( 'Open New Tab' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-logo-link-open-new-tab" name="w-logo-link-open-new-tab" <?php checked( $w_studio_logo_link_new_tab , 'on' ); ?> />
    </div>
	
	<!-- Page header show/hide -->
    <div class="w-header-meta">
        <label for="w-page-header-show-hide"><?php esc_html_e( 'Page Header Show/Hide' , 'w-studio' ) ?></label>
        <select name="w-page-header-show-hide" id="w-page-header-show-hide">
            <option value="default" <?php selected( $w_studio_pageHeaderShowHide , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ) ?></option>
			<option value="show" <?php selected( $w_studio_pageHeaderShowHide , 'show' ); ?>><?php esc_html_e( 'Show' , 'w-studio' ) ?></option>
            <option value="hide" <?php selected( $w_studio_pageHeaderShowHide , 'hide' ); ?>><?php esc_html_e( 'Hide' , 'w-studio' ) ?></option>
        </select>
    </div>
	
	<!-- Page footer show/hide -->
    <div class="w-header-meta">
        <label for="w-page-footer-show-hide"><?php esc_html_e( 'Page Footer Show/Hide' , 'w-studio' ) ?></label>
        <select name="w-page-footer-show-hide" id="w-page-footer-show-hide">
            <option value="default" <?php selected( $w_studio_pageFooterShowHide , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ) ?></option>
			<option value="show" <?php selected( $w_studio_pageFooterShowHide , 'show' ); ?>><?php esc_html_e( 'Show' , 'w-studio' ) ?></option>
            <option value="hide" <?php selected( $w_studio_pageFooterShowHide , 'hide' ); ?>><?php esc_html_e( 'Hide' , 'w-studio' ) ?></option>
        </select>
    </div>
	
	<!-- Header margin remove -->
    <div class="w-header-meta">
        <label for="w-hide-page-header-margin"><?php esc_html_e( 'Remove Header Margin' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-hide-page-header-margin"
               name="w-hide-page-header-margin" <?php checked( $w_studio_hideHeaderMargin , 'on' ) ?> />
    </div>
	
	<!-- Footer margin remove -->
    <div class="w-header-meta">
        <label for="w-hide-page-footer-margin"><?php esc_html_e( 'Remove Footer Margin' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-hide-page-footer-margin"
               name="w-hide-page-footer-margin" <?php checked( $w_studio_hideFooterMargin , 'on' ) ?> />
    </div>
	
    <!-- Page Title Show/Hide -->
    <div class="w-header-meta">
        <label for="w-hide-page-title"><?php esc_html_e( 'Page Title' , 'w-studio' ); ?></label>
		<select name="w-hide-page-title" id="w-hide-page-title">
            <option value="default" <?php selected( $w_studio_hideTitle , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option value="show" <?php selected( $w_studio_hideTitle , 'show' ); ?>><?php esc_html_e( 'Show' , 'w-studio' ); ?></option>
            <option value="hide" <?php selected( $w_studio_hideTitle , 'hide' ); ?>><?php esc_html_e( 'Hide' , 'w-studio' ); ?></option>
        </select>
    </div>
	
	<!-- Page title alignment -->
    <div class="w-header-meta">
        <label for="w-page-title-alignment"><?php esc_html_e( 'Page Title Alignment' , 'w-studio' ); ?></label>
        <select name="w-page-title-alignment" id="w-page-title-alignment">
            <option value="default" <?php selected( $w_studio_page_title_alignment , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option value="left" <?php selected( $w_studio_page_title_alignment , 'left' ); ?>><?php esc_html_e( 'Left' , 'w-studio' ); ?></option>
            <option value="center" <?php selected( $w_studio_page_title_alignment , 'center' ); ?>><?php esc_html_e( 'Center' , 'w-studio' ); ?></option>
            <option value="right" <?php selected( $w_studio_page_title_alignment , 'right' ); ?>><?php esc_html_e( 'Right' , 'w-studio' ); ?></option>
        </select>
    </div>

    <!-- page menu -->
    <div class="w-header-meta">
        <label
            for="w-page-menu-select"><?php esc_html_e( 'Select Page Menu' , 'w-studio' ) ?></label>
        <select name="w-page-menu-select" id="w-page-menu-select">
            <option value=""><?php esc_html_e( 'Select Menu' , 'w-studio' ) ?></option>
            <?php 
                $w_studio_menus = get_terms('nav_menu');
                foreach( $w_studio_menus as $w_studio_menu ) {
            ?>
            <option value="<?php echo esc_attr( $w_studio_menu->slug ); ?>" <?php selected( $w_studio_pageMenu , $w_studio_menu->slug ); ?>><?php echo esc_attr( $w_studio_menu->name ); ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Is One Page -->
    <div class="w-header-meta">
        <label for="w-is-one-page"><?php esc_html_e( 'One Page' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-is-one-page" name="w-is-one-page" <?php checked( $w_studio_isOnePage , 'on' ) ?> />
    </div>

    <!-- Page menu styling -->
    <div class="w-header-meta">
        <label for="w-page-menu-styles"><?php esc_html_e( 'Menu Styles' , 'w-studio' ); ?></label>
        <select name="w-page-menu-styles" id="w-page-menu-styles">
            <option
                value="default" <?php selected( $w_studio_menu_styles , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option
                value="standard" <?php selected( $w_studio_menu_styles , 'standard' ); ?>><?php esc_html_e( 'Standard Menu' , 'w-studio' ); ?></option>
            <option
                value="full" <?php selected( $w_studio_menu_styles , 'full' ); ?>><?php esc_html_e( 'Full Screen Overlay Menu' , 'w-studio' ); ?></option>
            <option
                value="left" <?php selected( $w_studio_menu_styles , 'left' ); ?>><?php esc_html_e( 'Left Side Menu' , 'w-studio' ); ?></option>
            <option
                value="right" <?php selected( $w_studio_menu_styles , 'right' ); ?>><?php esc_html_e( 'Right Side Menu' , 'w-studio' ); ?></option>
        </select>
    </div>
	
	<!-- Page Standard menu position -->
    <div class="w-header-meta">
        <label for="w-page-standard-menu-position"><?php esc_html_e( 'Menu Position' , 'w-studio' ); ?></label>
        <select name="w-page-standard-menu-position" id="w-page-standard-menu-position">
            <option
                value="default" <?php selected( $w_studio_standard_menu_position , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option
                value="left" <?php selected( $w_studio_standard_menu_position , 'left' ); ?>><?php esc_html_e( 'Left' , 'w-studio' ); ?></option>
            <option
                value="right" <?php selected( $w_studio_standard_menu_position , 'right' ); ?>><?php esc_html_e( 'Right' , 'w-studio' ); ?></option>
        </select>
    </div>
	
	<!-- Page sticky menu position -->
    <div class="w-header-meta">
        <label for="w-page-sticky-menu"><?php esc_html_e( 'Sticky Menu Option' , 'w-studio' ); ?></label>
        <select name="w-page-sticky-menu" id="w-page-sticky-menu">
            <option
                value="default" <?php selected( $w_studio_sticky_menu , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option
                value="enable" <?php selected( $w_studio_sticky_menu , 'enable' ); ?>><?php esc_html_e( 'Enable' , 'w-studio' ); ?></option>
            <option
                value="disable" <?php selected( $w_studio_sticky_menu , 'disable' ); ?>><?php esc_html_e( 'Disable' , 'w-studio' ); ?></option>
        </select>
    </div>

    <!-- Menu Text Color -->
    <div class="w-header-meta">
        <label for="w-page-menu-color"><?php esc_html_e( 'Main Menu Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-menu-color" name="w-page-menu-color" type="text"
               value="<?php echo esc_attr( $w_studio_menuTextColor ); ?>"/>
    </div>

    <!-- Menu Background Color Picker Field -->
    <div class="w-header-meta">
        <label for="w-page-menu-bg-color"><?php esc_html_e( 'Menu Background Transparent' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-page-menu-bg-color"
               name="w-page-menu-bg-color" <?php checked( $w_studio_menuBgColor , 'on' ) ?> />
    </div>

    <!-- Menu Top -->
    <div class="w-header-meta">
        <label for="w-page-menu-height"><?php esc_html_e( 'Menu Top Margin' , 'w-studio' ) ?></label>
        <input type="number" name="w-page-menu-height" id="w-page-menu-height"
               value="<?php echo esc_attr( $w_studio_menuTop ); ?>"/>px
    </div>

    <!-- Load Menu Bottom -->
    <div class="w-header-meta">
        <label for="w-page-menu-position"><?php esc_html_e( 'Load Menu Below Header' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-page-menu-position"
               name="w-page-menu-position" <?php checked( $w_studio_menuPosition , 'on' ) ?> />
    </div>
	
    <!-- Sidebar Option -->
    <div class="w-header-meta">
        <label for="w-page-sidebar"><?php esc_html_e( 'Page Sidebar Position' , 'w-studio' ); ?></label>
        <select name="w-page-sidebar" id="w-page-sidebar">
            <option value="fullwidth" <?php selected( $w_studio_sidebarType , 'fullwidth' ); ?>><?php esc_html_e( 'Full Width' , 'w-studio' ); ?></option>
            <option value="default" <?php selected( $w_studio_sidebarType , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option value="left" <?php selected( $w_studio_sidebarType , 'left' ); ?>><?php esc_html_e( 'Left Sidebar' , 'w-studio' ); ?></option>
            <option value="right" <?php selected( $w_studio_sidebarType , 'right' ); ?>><?php esc_html_e( 'Right Sidebar' , 'w-studio' ); ?></option>
        </select>
    </div>

    <!-- Sidebar Loading Option -->
    <div class="w-header-meta">
        <label for="w-page-load-sidebar"><?php esc_html_e( 'Select Sidebar' , 'w-studio' ); ?></label>
        <select name="w-page-load-sidebar" id="w-page-load-sidebar">
            <?php
            global $wp_registered_sidebars;
            foreach( $wp_registered_sidebars as $w_studio_sideBar ) { ?>
                <option value="<?php echo esc_attr( $w_studio_sideBar[ 'id' ] ); ?>" <?php selected( $w_studio_sidebarLoad , $w_studio_sideBar[ 'id' ] ); ?>><?php echo esc_attr( $w_studio_sideBar[ 'name' ] ); ?></option>
            <?php } ?>
        </select>
    </div>
    <hr>
	
	<!-- Enable/Disable page slider -->
    <div class="w-header-meta">
        <label for="w-page-banner-slider"><?php esc_html_e( 'Enable Banner Slider' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-page-banner-slider"
               name="w-page-banner-slider" <?php checked( $w_studio_enableBannerSlider , 'on' ); ?> />
    </div>
	
	<!-- Select Slider Category -->
    <div class="w-header-meta">
        <label for="w-slider-category"><?php esc_html_e( 'Select Slider Category' , 'w-studio' ) ?></label>
        <select id="w-slider-category" name="w-slider-category">
			<?php
				$slider_post = array(
					'type'=> 'slider',
					'taxonomy'=> 'slider-category'
				);
				 $w_studio_categories = get_categories($slider_post);
			foreach($w_studio_categories as $w_studio_category) { ?>
            <option value="<?php echo esc_attr( $w_studio_category->slug ); ?>" <?php selected( $w_studio_sliderCategory , esc_attr( $w_studio_category->slug ) ); ?>><?php echo esc_attr( $w_studio_category->name ); ?></option>
			<?php } ?>
		</select>
    </div>
	
	<!-- slider height -->
    <div class="w-header-meta">
        <label for="w-slider-height"><?php esc_html_e( 'Slider Height' , 'w-studio' ) ?></label>
        <input type="text" name="w-slider-height" id="w-slider-height" value="<?php echo esc_attr( $w_studio_sliderHeight ); ?>"/><?php esc_html_e( 'px', 'w-studio' ); ?>
    </div>
	
	<!-- Slider Width -->
    <div class="w-header-meta">
        <label for="w-slider-width"><?php esc_html_e( 'Slider Width' , 'w-studio' ) ?></label>
        <select id="w-slider-width" name="w-slider-width">
            <option value="fullwidth" <?php selected( $w_studio_sliderWIdth , 'fullwidth' ); ?>><?php esc_html_e( 'Full Width' , 'w-studio' ) ?></option>
            <option value="container" <?php selected( $w_studio_sliderWIdth , 'container' ); ?>><?php esc_html_e( 'Container' , 'w-studio' ) ?></option>
        </select>
    </div>
	
	<!-- slider bottom margin -->
    <div class="w-header-meta">
        <label for="w-slider-margin-bottom"><?php esc_html_e( 'Slider Margin Bottom' , 'w-studio' ) ?></label>
        <input type="text" name="w-slider-margin-bottom" id="w-slider-margin-bottom" value="<?php echo esc_attr( $w_studio_sliderMarginBottom ); ?>"/><?php esc_html_e( 'px', 'w-studio' ); ?>
    </div>
	
	<hr />
	
    <!-- Enable Disable page banner -->
    <div class="w-header-meta">
        <label for="w-page-banner-settings"><?php esc_html_e( 'Enable Page Banner' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-page-header-checkbox"
               name="w-page-header-checkbox" <?php checked( $w_studio_enableHeader , 'on' ) ?> />
    </div>

    <!-- Select Header Type -->
    <div class="w-header-meta">
        <label for="w-page-banner-type"><?php esc_html_e( 'Select Banner Type' , 'w-studio' ) ?></label>
        <select id="w-header-type" name="w-header-type">
            <option value="1" <?php selected( $w_studio_headerType , '1' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ) ?></option>
            <option value="2" <?php selected( $w_studio_headerType , '2' ); ?>><?php esc_html_e( 'Parallax' , 'w-studio' ) ?></option>
            <option value="3" <?php selected( $w_studio_headerType , '3' ); ?>><?php esc_html_e( 'Without Parallax' , 'w-studio' ) ?></option>
            <option value="4" <?php selected( $w_studio_headerType , '4' ); ?>><?php esc_html_e( 'Background Video' , 'w-studio' ) ?></option>
        </select>
    </div>

    <!-- youtube video url -->
    <div class="w-header-meta">
        <label for="w-youtube-url"><?php esc_html_e( 'Youtube Video URL' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-youtube-url" id="w-youtube-url" value="<?php echo esc_url( $w_studio_youtubeUrl ); ?>"/>
    </div>

    <!-- sound checkbox -->
    <div class="w-header-meta">
        <label for="w-bg-video-sound"><?php esc_html_e( 'Video Sound Level' , 'w-studio' ); ?></label>
        <input type="number" id="w-bg-video-sound" name="w-bg-video-sound" value="<?php echo esc_attr( $w_studio_sound ); ?>" />
    </div>

    <!-- Background Image -->
    <div class="w-header-meta">
        <label for="w-page-header-bg-image"><?php esc_html_e( 'Banner Background Image' , 'w-studio' ) ?></label>
        <div class="w-header-img-meta">
			<div class="w-header-banner-img-wrapper">
				<span id="w-banner-img-close"></span>
				<input type="text" name="w-page-header-bg-image" id="w-page-header-bg-image"
					   value="<?php if( isset( $w_studio_headerImage ) ) echo esc_attr( $w_studio_headerImage ); ?>"
					   style="display: none;"/>
				<img class="w-page-header-image-loader" src="<?php echo esc_attr( $w_studio_headerImage ); ?>"/>
			</div>
			<input class="button" id="w-page-image-uploader" type="button"
                   value="<?php esc_html_e( 'Choose Or Upload An Image' , 'w-studio' ) ?>"/>
        </div>
    </div>

    <!-- Header Background Color Picker Field -->
    <div class="w-header-meta">
        <label for="w-page-header-bg-color"><?php esc_html_e( 'Banner Background Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-bg-color" name="w-page-header-bg-color" type="text"
               value="<?php echo esc_attr( $w_studio_headerBgColor ); ?>"/>
    </div>

    <!-- Header Overlay Color -->
    <div class="w-header-meta">
        <label for="w-page-header-overlay-color"><?php esc_html_e( 'Banner Overlay Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-overlay-color" name="w-page-header-overlay-color" type="text"
               value="<?php echo esc_attr( $w_studio_headerOverlayColor ); ?>"/>
    </div>

    <!-- Page Header Opacity -->
    <div class="w-header-meta">
        <label for="w-page-header-opacity"><?php esc_html_e( 'Banner Overlay Opacity' , 'w-studio' ) ?></label>
        <input type="number" min="0" max="1" step="0.1" id="w-page-header-opacity" name="w-page-header-opacity"
               value="<?php echo esc_attr( $w_studio_headerOpacity ); ?>"/>
    </div>

    <!-- Page Header Transition Speed -->
    <div class="w-header-meta">
        <label
            for="w-page-header-transition-speed"><?php esc_html_e( 'Banner Transition Speed' , 'w-studio' ) ?></label>
        <input type="number" min="0" max="1" step="0.1" id="w-page-header-transition-speed"
               name="w-page-header-transition-speed" value="<?php echo esc_attr( $w_studio_headerTransition ); ?>"/>
    </div>
	
	<!-- Select Banner logo position -->
    <div class="w-header-meta">
        <label for="w-page-banner-logo-position"><?php esc_html_e( 'Banner Logo Position' , 'w-studio' ) ?></label>
        <select id="w-page-banner-logo-position" name="w-page-banner-logo-position">
            <option value="titleup" <?php selected( $w_studio_bannerLogoPosition , 'titleup' ); ?>><?php esc_html_e( 'Title Up' , 'w-studio' ) ?></option>
            <option value="titledown" <?php selected( $w_studio_bannerLogoPosition , 'titledown' ); ?>><?php esc_html_e( 'Title Down' , 'w-studio' ) ?></option>
        </select>
    </div>
	
	<!-- banner Logo -->
    <div class="w-header-meta">
        <label for="w-page-header-bg-logo"><?php esc_html_e( 'Banner Logo' , 'w-studio' ) ?></label>
        <div class="w-header-banner-logo-meta">
			<div class="w-header-banner-logo-wrapper">
				<span id="w-banner-logo-close"></span>
				<input type="text" name="w-page-header-bg-logo" id="w-page-header-bg-logo"
					   value="<?php if( isset( $w_studio_bannerLogo ) ) echo esc_attr( $w_studio_bannerLogo ); ?>"
					   style="display: none;"/>
				<img class="w-page-banner-logo-loader" src="<?php echo esc_attr( $w_studio_bannerLogo ); ?>"/>
			</div>
			<input class="button" id="w-page-banner-logo-uploader" type="button"
                   value="<?php esc_html_e( 'Choose Or Upload An Image' , 'w-studio' ) ?>"/>
        </div>
    </div>
	
	<!-- Banner Logo Link -->
    <div class="w-header-meta">
        <label for="w-banner-logo-link"><?php esc_html_e( 'Banner Logo Link' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-banner-logo-link" id="w-banner-logo-link"
               value="<?php echo esc_attr( $w_studio_bannerLogoLink ); ?>"/>
    </div>
	
	<!-- Link open new tab -->
    <div class="w-header-meta">
        <label for="w-banner-logo-link-open"><?php esc_html_e( 'Open New Tab' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-banner-logo-link-open" name="w-banner-logo-link-open" <?php checked( $w_studio_bannerLogoLinkOpen , 'on' ) ?> />
    </div>

    <!-- Page Header Height -->
    <div class="w-header-meta">
        <label for="w-page-header-full"><?php esc_html_e( 'Enable Full Height Banner' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-page-header-full"
               name="w-page-header-full" <?php checked( $w_studio_fullHeader , 'on' ) ?> />
    </div>

    <!-- Page Header Height -->
    <div class="w-header-meta">
        <label for="w-page-header-height"><?php esc_html_e( 'Banner Height' , 'w-studio' ) ?></label>
        <input type="number" name="w-page-header-height" id="w-page-header-height"
               value="<?php echo esc_attr( $w_studio_headerHeight ); ?>"/>px
    </div>

    <!-- Title -->
    <div class="w-header-meta">
        <label for="w-page-title"><?php esc_html_e( 'Banner Title (you can use <br/>)' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-page-title" id="w-page-title" value="<?php echo esc_attr( $w_studio_title ); ?>"/>
    </div>

    <!-- Title Font Size -->
    <div class="w-header-meta">
        <label for="w-title-font-size"><?php esc_html_e( 'Banner Title Font Size' , 'w-studio' ) ?></label>
        <input type="number" name="w-title-font-size" id="w-title-font-size"
               value="<?php echo esc_attr( $w_studio_titleFontSize ); ?>"/>px
    </div>

    <!-- Header Title Font Color -->
    <div class="w-header-meta">
        <label for="w-page-header-font-color"><?php esc_html_e( 'Banner Title Font Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-font-color" name="w-page-header-font-color" type="text"
               value="<?php echo esc_attr( $w_studio_headerFontColor ); ?>"/>
    </div>

    <!-- Sub title -->
    <div class="w-header-meta">
        <label for="w-page-sub-title"><?php esc_html_e( 'Banner Subtitle (you can use <br/>)' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-page-sub-title" id="w-page-sub-title"
               value="<?php echo esc_attr( $w_studio_subTitle ); ?>"/>
    </div>

    <!-- Sub Title Font Size -->
    <div class="w-header-meta">
        <label for="w-sub-title-font-size"><?php esc_html_e( 'Banner Subtitle Font Size' , 'w-studio' ) ?></label>
        <input type="number" name="w-sub-title-font-size" id="w-sub-title-font-size"
               value="<?php echo esc_attr( $w_studio_subTitleFontSize ); ?>"/>px
    </div>

    <!-- Header Subtitle Color -->
    <div class="w-header-meta">
        <label for="w-page-header-subtitle-color"><?php esc_html_e( 'Banner Subtitle Font Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-subtitle-color" name="w-page-header-subtitle-color" type="text"
               value="<?php echo esc_attr( $w_studio_headerSubtitleColor ); ?>"/>
    </div>
	
	 <!-- Page Header button Show/Hide -->
    <div class="w-header-meta">
        <label for="w-header-navigation"><?php esc_html_e( 'Enable Banner Button' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-header-navigation" name="w-header-navigation" <?php checked( $w_studio_headerNavigation , 'on' ) ?> />
    </div>

    <!-- Header Navigation Text -->
    <div class="w-header-meta">
        <label for="w-header-navigation-text"><?php esc_html_e( 'Banner Button Text' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-header-navigation-text" id="w-header-navigation-text"
               value="<?php echo esc_attr( $w_studio_headerNavigationText ); ?>"/>
    </div>

    <!-- Header Navigation Link -->
    <div class="w-header-meta">
        <label for="w-header-navigation-link"><?php esc_html_e( 'Banner Button Link' , 'w-studio' ) ?></label>
        <input type="textarea" name="w-header-navigation-link" id="w-header-navigation-link"
               value="<?php echo esc_attr( $w_studio_headerNavigationLink ); ?>"/>
    </div>

    <!-- Navigation Link Color -->
    <div class="w-header-meta">
        <label
            for="w-page-header-Navigationlink-color"><?php esc_html_e( 'Banner Button link Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-Navigationlink-color" name="w-page-header-Navigationlink-color"
               type="text" value="<?php echo esc_attr( $w_studio_headerNavlinkColor ); ?>"/>
    </div>

    <!-- Navigation Icon Color -->
    <div class="w-header-meta">
        <label
            for="w-page-header-NavigationIcon-color"><?php esc_html_e( 'Banner Button Icon Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-NavigationIcon-color" name="w-page-header-NavigationIcon-color"
               type="text" value="<?php echo esc_attr( $w_studio_headerNavIconColor ); ?>"/>
    </div>

    <!-- Navigation Link Hover Color -->
    <div class="w-header-meta">
        <label
            for="w-page-header-Navigationlink-hover-color"><?php esc_html_e( 'Banner Button link Hover Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-page-header-Navigationlink-hover-color"
               name="w-page-header-Navigationlink-hover-color" type="text"
               value="<?php echo esc_attr( $w_studio_headerNavlinkHoverColor ); ?>"/>
    </div>
	
	<!-- Banner Content Allignment -->
    <div class="w-header-meta">
        <label
            for="w-title-sub-title-alignment"><?php esc_html_e( 'Banner Content Alignment' , 'w-studio' ) ?></label>
        <select name="w-title-sub-title-alignment" id="w-title-sub-title-alignment">
            <option value="left" <?php selected( $w_studio_titleAlignment , 'left' ); ?>><?php esc_html_e( 'Left' , 'w-studio' ) ?></option>
            <option value="center" <?php selected( $w_studio_titleAlignment , 'center' ); ?>><?php esc_html_e( 'Center' , 'w-studio' ) ?></option>
            <option value="right" <?php selected( $w_studio_titleAlignment , 'right' ); ?>><?php esc_html_e( 'Right' , 'w-studio' ) ?></option>
        </select>
    </div>
<?php
}

/**
 * Function to save user data
 *
 * @param integer $post_id Current Post ID
 *
 * @return
 */
function w_studio_savePageData( $post_id ) {
    // Bail if doing auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Check for valid nonce
    if( !isset( $_POST[ 'w-page-header-nonce' ] ) || !wp_verify_nonce( $_POST[ 'w-page-header-nonce' ] , 'w-page-header-options' ) ) return;

    // If current user can't edit this post
    if( !current_user_can( 'edit_posts' ) ) return;

    // Saving page meta data

	 // Enable/Disable Page banner
    $w_studio_checkbox = isset( $_POST[ 'w-page-header-checkbox' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-page-header' , $w_studio_checkbox );

    if( $w_studio_checkbox == 'on' ) {

        // Header Type
        if( isset( $_POST[ 'w-header-type' ] ) ) update_post_meta( $post_id , 'w-header-type' , esc_attr( $_POST[ 'w-header-type' ] ) );

        if( $_POST[ 'w-header-type' ] != '1' ) {

            // Header Background Video
            if( isset( $_POST[ 'w-youtube-url' ] ) ) update_post_meta( $post_id , 'w-youtube-url' , esc_attr( $_POST[ 'w-youtube-url' ] ) );
            // Header Background Video sound
            if( isset( $_POST[ 'w-bg-video-sound' ] ) ) update_post_meta( $post_id , 'w-bg-video-sound' , esc_attr( $_POST[ 'w-bg-video-sound' ] ) );
            // Header Background Image
            if( isset( $_POST[ 'w-page-header-bg-image' ] ) ) update_post_meta( $post_id , 'w-page-header-bg-image' , esc_attr( $_POST[ 'w-page-header-bg-image' ] ) );
            // Background Overlay Color
            if( isset( $_POST[ 'w-page-header-overlay-color' ] ) ) update_post_meta( $post_id , 'w-page-header-overlay-color' , esc_attr( $_POST[ 'w-page-header-overlay-color' ] ) );

            // Page Header Opacity
            if( isset( $_POST[ 'w-page-header-opacity' ] ) ) update_post_meta( $post_id , 'w-page-header-opacity' , esc_attr( $_POST[ 'w-page-header-opacity' ] ) );

            // Page Header Transition Speed
            if( isset( $_POST[ 'w-page-header-transition-speed' ] ) ) update_post_meta( $post_id , 'w-page-header-transition-speed' , esc_attr( $_POST[ 'w-page-header-transition-speed' ] ) );
        }
		
		// Banner Logo
        if( isset( $_POST[ 'w-page-header-bg-logo' ] ) ) update_post_meta( $post_id , 'w-page-header-bg-logo' , esc_attr( $_POST[ 'w-page-header-bg-logo' ] ) );
        //banner logo position
		if( isset( $_POST[ 'w-page-banner-logo-position' ] ) ) update_post_meta( $post_id , 'w-page-banner-logo-position' , esc_attr( $_POST[ 'w-page-banner-logo-position' ] ) );
		
		//Banner logo link
		if( isset( $_POST[ 'w-banner-logo-link' ] ) ) update_post_meta( $post_id , 'w-banner-logo-link' , esc_attr( $_POST[ 'w-banner-logo-link' ] ) );

		// Banner Logo checkbox
		$w_studio_logo_openCheckbox = isset( $_POST[ 'w-banner-logo-link-open' ] ) ? 'on' : 'off';
		update_post_meta( $post_id , 'w-banner-logo-link-open' , $w_studio_logo_openCheckbox );

        // Background Color
        if( isset( $_POST[ 'w-page-header-bg-color' ] ) ) update_post_meta( $post_id , 'w-page-header-bg-color' , esc_attr( $_POST[ 'w-page-header-bg-color' ] ) );

        //Page Header Full
        $w_studio_checkbox = isset( $_POST[ 'w-page-header-full' ] ) ? 'on' : 'off';
        update_post_meta( $post_id , 'w-page-header-full' , $w_studio_checkbox );

        // Page Header Height
        if( isset( $_POST[ 'w-page-header-height' ] ) ) update_post_meta( $post_id , 'w-page-header-height' , esc_attr( $_POST[ 'w-page-header-height' ] ) );

        // Page Title
        if( isset( $_POST[ 'w-page-title' ] ) ) update_post_meta( $post_id , 'w-page-title' , wp_kses( $_POST[ 'w-page-title' ] , array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) ) );

        // Page Sub Title
        if( isset( $_POST[ 'w-page-sub-title' ] ) ) update_post_meta( $post_id , 'w-page-sub-title' , wp_kses( $_POST[ 'w-page-sub-title' ] , array( 'br' => array(), 'span' => array( 'class' => array(), 'id' => array() ), 'strong' => array( 'class' => array(), 'id' => array() ), 'em' => array( 'class' => array(), 'id' => array() ), 'small' => array( 'class' => array(), 'id' => array() ) ) ) );

        // Title Sub Title Alignment
        if( isset( $_POST[ 'w-title-sub-title-alignment' ] ) ) update_post_meta( $post_id , 'w-title-sub-title-alignment' , esc_attr( $_POST[ 'w-title-sub-title-alignment' ] ) );

        // Title Font Size
        if( isset( $_POST[ 'w-title-font-size' ] ) ) update_post_meta( $post_id , 'w-title-font-size' , esc_attr( $_POST[ 'w-title-font-size' ] ) );

        // Sub Title Font Size
        if( isset( $_POST[ 'w-sub-title-font-size' ] ) ) update_post_meta( $post_id , 'w-sub-title-font-size' , esc_attr( $_POST[ 'w-sub-title-font-size' ] ) );

        //  Title Font color
        if( isset( $_POST[ 'w-page-header-font-color' ] ) ) update_post_meta( $post_id , 'w-page-header-font-color' , esc_attr( $_POST[ 'w-page-header-font-color' ] ) );

        // Sub Title Font color w-page-header-Navigationlink-color
        if( isset( $_POST[ 'w-page-header-subtitle-color' ] ) ) update_post_meta( $post_id , 'w-page-header-subtitle-color' , esc_attr( $_POST[ 'w-page-header-subtitle-color' ] ) );

        // header-Navigationlink-text
        if( isset( $_POST[ 'w-header-navigation-text' ] ) ) update_post_meta( $post_id , 'w-header-navigation-text' , esc_attr( $_POST[ 'w-header-navigation-text' ] ) );
        // Header-Navigationlink-Show/Hide 

        // w-page-header-Navigationlink-link
        if( isset( $_POST[ 'w-header-navigation-link' ] ) ) update_post_meta( $post_id , 'w-header-navigation-link' , esc_attr( $_POST[ 'w-header-navigation-link' ] ) );

        // Header-Navigationlink-Show/Hide 
        $w_studio_checkbox = isset( $_POST[ 'w-header-navigation' ] ) ? 'on' : 'off';
        update_post_meta( $post_id , 'w-header-navigation' , $w_studio_checkbox );

        // Header-Navigationlink-color
        if( isset( $_POST[ 'w-page-header-Navigationlink-color' ] ) ) update_post_meta( $post_id , 'w-page-header-Navigationlink-color' , esc_attr( $_POST[ 'w-page-header-Navigationlink-color' ] ) );

        // Header-NavigationIcon-color
        if( isset( $_POST[ 'w-page-header-NavigationIcon-color' ] ) ) update_post_meta( $post_id , 'w-page-header-NavigationIcon-color' , esc_attr( $_POST[ 'w-page-header-NavigationIcon-color' ] ) );

        // Header-Navigationlink-Hover-color
        if( isset( $_POST[ 'w-page-header-Navigationlink-hover-color' ] ) ) update_post_meta( $post_id , 'w-page-header-Navigationlink-hover-color' , esc_attr( $_POST[ 'w-page-header-Navigationlink-hover-color' ] ) );
    }

    // Header Logo checkbox
    $w_studio_logo_checkbox = isset( $_POST[ 'w-page-header-logo-enable' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-page-header-logo-enable' , $w_studio_logo_checkbox );
	
    if($w_studio_logo_checkbox != 'on') {
    	// Header Logo
         if( isset( $_POST[ 'w-page-header-logo-image' ] ) ) update_post_meta( $post_id , 'w-page-header-logo-image' , esc_attr( $_POST[ 'w-page-header-logo-image' ] ) );
    }
	
	// Logo link open new tab
    $w_studio_logo_link_new_tab = isset( $_POST[ 'w-logo-link-open-new-tab' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-logo-link-open-new-tab' , $w_studio_logo_link_new_tab );
	
	//Logo link
	if( isset( $_POST[ 'w-page-logo-link' ] ) ) update_post_meta( $post_id , 'w-page-logo-link' , esc_attr( $_POST[ 'w-page-logo-link' ] ) );
	
    //Hide page Title
	if( isset( $_POST[ 'w-hide-page-title' ] ) ) update_post_meta( $post_id , 'w-hide-page-title' , esc_attr( $_POST[ 'w-hide-page-title' ] ) );

    // Sidebar Type
    if( isset( $_POST[ 'w-page-sidebar' ] ) ) update_post_meta( $post_id , 'w-page-sidebar' , esc_attr( $_POST[ 'w-page-sidebar' ] ) );

    // Sidebar Load
    if( isset( $_POST[ 'w-page-load-sidebar' ] ) ) update_post_meta( $post_id , 'w-page-load-sidebar' , esc_attr( $_POST[ 'w-page-load-sidebar' ] ) );

    // Load Menu Below Header
    $w_studio_checkbox = isset( $_POST[ 'w-page-menu-position' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-page-menu-position' , $w_studio_checkbox );

    // Is One Page
    $w_studio_checkbox = isset( $_POST[ 'w-is-one-page' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-is-one-page' , $w_studio_checkbox );

    // Main-Menu-color
    if( isset( $_POST[ 'w-page-menu-color' ] ) ) update_post_meta( $post_id , 'w-page-menu-color' , esc_attr( $_POST[ 'w-page-menu-color' ] ) );

    // menu background transparent 
    $w_studio_checkbox = isset( $_POST[ 'w-page-menu-bg-color' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-page-menu-bg-color' , $w_studio_checkbox );

	// Page menu Position
    if( isset( $_POST[ 'w-page-standard-menu-position' ] ) ) update_post_meta( $post_id , 'w-page-standard-menu-position' , esc_attr( $_POST[ 'w-page-standard-menu-position' ] ) );

    // Page menu styling
    if( isset( $_POST[ 'w-page-menu-styles' ] ) ) update_post_meta( $post_id , 'w-page-menu-styles' , esc_attr( $_POST[ 'w-page-menu-styles' ] ) );

    // Menu Top
    if( isset( $_POST[ 'w-page-menu-height' ] ) ) update_post_meta( $post_id , 'w-page-menu-height' , esc_attr( $_POST[ 'w-page-menu-height' ] ) );

	// Page sticky menu position
    if( isset( $_POST[ 'w-page-sticky-menu' ] ) ) update_post_meta( $post_id , 'w-page-sticky-menu' , esc_attr( $_POST[ 'w-page-sticky-menu' ] ) );
	
	// Page title alignment
    if( isset( $_POST[ 'w-page-title-alignment' ] ) ) update_post_meta( $post_id , 'w-page-title-alignment' , esc_attr( $_POST[ 'w-page-title-alignment' ] ) );
	
	// Page header show hide
    if( isset( $_POST[ 'w-page-header-show-hide' ] ) ) update_post_meta( $post_id , 'w-page-header-show-hide' , esc_attr( $_POST[ 'w-page-header-show-hide' ] ) );
	
	// hide page margin top 
    $w_studio_checkbox = isset( $_POST[ 'w-hide-page-header-margin' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-hide-page-header-margin' , $w_studio_checkbox );
	
	// hide page margin bottom 
    $w_studio_checkbox = isset( $_POST[ 'w-hide-page-footer-margin' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-hide-page-footer-margin' , $w_studio_checkbox );
	
	// Page footer show hide
    if( isset( $_POST[ 'w-page-footer-show-hide' ] ) ) update_post_meta( $post_id , 'w-page-footer-show-hide' , esc_attr( $_POST[ 'w-page-footer-show-hide' ] ) );
	
	// Enable/Disable Page banner slider
    $w_studio_enableBannerSlider = isset( $_POST[ 'w-page-banner-slider' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-page-banner-slider' , $w_studio_enableBannerSlider );
	
	// slider category
    if( isset( $_POST[ 'w-slider-category' ] ) ) update_post_meta( $post_id , 'w-slider-category' , esc_attr( $_POST[ 'w-slider-category' ] ) );
	
	// slider height
    if( isset( $_POST[ 'w-slider-height' ] ) ) update_post_meta( $post_id , 'w-slider-height' , esc_attr( $_POST[ 'w-slider-height' ] ) );
	
	// slider width
    if( isset( $_POST[ 'w-slider-width' ] ) ) update_post_meta( $post_id , 'w-slider-width' , esc_attr( $_POST[ 'w-slider-width' ] ) );
	
	// slider margin bottom
    if( isset( $_POST[ 'w-slider-margin-bottom' ] ) ) update_post_meta( $post_id , 'w-slider-margin-bottom' , esc_attr( $_POST[ 'w-slider-margin-bottom' ] ) );

	// page menu select
    if( isset( $_POST[ 'w-page-menu-select' ] ) ) update_post_meta( $post_id , 'w-page-menu-select' , esc_attr( $_POST[ 'w-page-menu-select' ] ) );
}